<?php

namespace App\Http\Controllers;

use App\Models\Maintain_category;
use App\Models\Maintain_device_code;
use App\Models\Maintain_noti;
use App\Models\Sos_partner;
use App\Models\Sos_partner_area;
use App\Models\Sos_partner_officer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MaintainDashboardController extends Controller
{
    // ======================================= Test Dashboard =============================================================

    public function dashboard_viifix_index(Request $request)
    {
        $data_user = Auth::user();

        $data_partner = Sos_partner::where('id',$data_user->organization_id)->first();

        $data_partner_area = Sos_partner_area::where('sos_partner_id',$data_partner->id)->get();

        return view('test_repair_admin/repair_dashboard/fix_dashboard_index',compact('data_partner','data_partner_area'));
    }

    public function getAmountMaintainDashboard(Request $request) {
        $partner_id = $request->get('partner_id');
        $data_amount_maintains = Maintain_noti::join('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->join('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->join('sos_partner_areas', 'maintain_notis.area_id', '=', 'sos_partner_areas.id')
        ->where('maintain_notis.partner_id',$partner_id)
        ->select('maintain_notis.*',
        'maintain_categorys.name as name_categories',
        'maintain_sub_categorys.name as name_subs_categories',
        'sos_partner_areas.name_area as sos_name_area',)
        ->orderBy('created_at', 'DESC')
        ->get();

        return $data_amount_maintains;
    }

    public function get_5_ListMaintains(Request $request) {
        $partner_id = $request->get('partner_id');
        $data_fix = Maintain_device_code::join('sos_partner_areas', 'maintain_device_codes.area_id', '=', 'sos_partner_areas.id')
        ->orderByRaw('CAST(maintain_device_codes.count AS UNSIGNED) DESC') // แปลง count เป็น ตัวเลขแบบไม่ติดลบ เพื่อใช้ในการเรียงลำดับ
        ->select('maintain_device_codes.*',
        'sos_partner_areas.name_area as sos_name_area')
        ->limit(5)
        ->get();

        return $data_fix;
    }

    public function get_5_FastestMaintains(Request $request) {
        $partner_id = $request->get('partner_id');

        $data_fastest_maintains = Maintain_noti::where('partner_id', $partner_id)
            ->orderByRaw('TIMESTAMPDIFF(SECOND, datetime_success, datetime_command) DESC')
            ->limit(5)
            ->get();

        foreach ($data_fastest_maintains as $maintain) {
            // ตรวจสอบว่า officer_id ไม่เป็น null และแปลงเป็น array
            $officer_ids = !empty($maintain->officer_id) ? explode(',', $maintain->officer_id) : [];

            // ค้นหา fullname ของ officer ที่เกี่ยวข้อง
            $officer_fullnames = Sos_partner_officer::whereIn('id', $officer_ids)
                ->pluck('full_name') // ใช้ pluck เพื่อดึงเฉพาะ full_name
                ->toArray(); // แปลงผลลัพธ์เป็น array

            $maintain->name_officer = implode(', ', $officer_fullnames); // แปลงเป็น string โดยคั่นด้วย comma
        }
        return $data_fastest_maintains;
    }

    public function get_5_SlowestMaintains(Request $request) {
        $partner_id = $request->get('partner_id');

        $data_slowest_maintains = Maintain_noti::where('partner_id', $partner_id)
            ->orderByRaw('TIMESTAMPDIFF(SECOND, datetime_success, datetime_command) ASC')
            ->limit(5)
            ->get();

        foreach ($data_slowest_maintains as $maintain) {
            // ตรวจสอบว่า officer_id ไม่เป็น null และแปลงเป็น array
            $officer_ids = !empty($maintain->officer_id) ? explode(',', $maintain->officer_id) : [];

            // ค้นหา fullname ของ officer ที่เกี่ยวข้อง
            $officer_fullnames = Sos_partner_officer::whereIn('id', $officer_ids)
                ->pluck('full_name') // ใช้ pluck เพื่อดึงเฉพาะ full_name
                ->toArray(); // แปลงผลลัพธ์เป็น array

            $maintain->name_officer = implode(', ', $officer_fullnames); // แปลงเป็น string โดยคั่นด้วย comma
        }
        return $data_slowest_maintains;
    }

    public function get_cateChartMaintains(Request $request) {
        $area_id = $request->get('area_id');

        $categories = Maintain_category::where('area_id', $area_id)
            ->with('maintain_sub_categories') // เรียก Eager Loading
            ->get();

        $cateChartData = $categories->map(function($category) {
            return [
                'name' => $category->name,
                'count' => $category->count ?? 0,
                'color' => $category->color ?? '000000',
                'subcate' => $category->maintain_sub_categories
            ];
        });


        return response()->json($cateChartData);
    }


    public function get_areaAmountChartMaintains(Request $request) {
        $partner_id = $request->get('partner_id');
        $data_sosPartnerArea = Sos_partner_area::where('sos_partner_id', $partner_id)->get();

        $areaAmountData = [];
        foreach ($data_sosPartnerArea as $PartnerArea) {

            // เตรียมข้อมูล data array สำหรับ 12 เดือน
            $monthlyData = array_fill(0, 12, 0);
            $maintains = Maintain_noti::where('area_id', $PartnerArea->id)->get();

            // แยกข้อมูลตามเดือนจาก created_at
            foreach ($maintains as $item) {
                $month = (int) $item->created_at->format('n') - 1; // แปลงเดือนเป็น 0-11 สำหรับ array
                $monthlyData[$month]++;
            }

            // เพิ่มข้อมูลของแต่ละพื้นที่ลงใน array
            $areaAmountData[] = [
                'name' => $PartnerArea->name_area,
                'data' => $monthlyData,
            ];
        }

        return $areaAmountData;
    }

    public function WorkCalendarDashboard(Request $request, $partner_id) {

        $data_maintains = Maintain_noti::where('partner_id',$partner_id)
        ->join('maintain_categorys', 'maintain_notis.category_id', '=', 'maintain_categorys.id')
        ->join('maintain_sub_categorys', 'maintain_notis.sub_category_id', '=', 'maintain_sub_categorys.id')
        ->join('maintain_device_codes', 'maintain_notis.device_code_id', '=', 'maintain_device_codes.id')
        ->select('maintain_notis.*',
        'maintain_categorys.name as name_categories',
        'maintain_categorys.color as color_categories',
        'maintain_sub_categorys.name as name_subs_categories',
        'maintain_device_codes.name as name_device',)
        ->get();

        foreach ($data_maintains as $maintain) {
            // ตรวจสอบว่า officer_id ไม่เป็น null และแปลงเป็น array
            $officer_ids = !empty($maintain->officer_id) ? explode(',', $maintain->officer_id) : [];

            // ค้นหา fullname ของ officer ที่เกี่ยวข้อง
            $officer_fullnames = Sos_partner_officer::whereIn('id', $officer_ids)
                ->pluck('full_name') // ใช้ pluck เพื่อดึงเฉพาะ full_name
                ->toArray(); // แปลงผลลัพธ์เป็น array

            $maintain->name_officer = implode(', ', $officer_fullnames); // แปลงเป็น string โดยคั่นด้วย comma
        }

        return $data_maintains;
    }

    // ======================================= End Test Dashboard =========================================================

}
