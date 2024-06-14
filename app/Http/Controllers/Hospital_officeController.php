<?php

namespace App\Http\Controllers;

use App\Exports\SeedsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Hospital_office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Data_1669_officer_hospital;
use App\Models\Hospital_office_affiliation;
use App\Models\Hospital_office_department;
use App\Models\Hospital_office_health_type;
use App\Models\Hospital_office_service_area;
use App\Models\Sos_1669_to_hospital;
use App\Models\Sos_help_center;
use App\Models\Sos_1669_form_yellow;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class Hospital_officeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // $data = Hospital_office::where('province',"กาญจนบุรี")->get();
        $data = Hospital_office::where('province', 'น่าน')->where('lat' , '=' , NULL)->take(40)->get();

        $currentDomain = $request->getHost();

        // foreach ($data as $item) {

        //     $data_arr = [];
        //     // echo "<br>";
        //     // echo $item->name;

        //     $apiKey = '';
        //     $placeName = $item->name;

        //     $response = Http::get('https://maps.googleapis.com/maps/api/place/findplacefromtext/json', [
        //         'key' => $apiKey,
        //         'input' => $placeName,
        //         'inputtype' => 'textquery',
        //         'fields' => 'formatted_address,name,rating,opening_hours,geometry',
        //         'locationbias' => 'point:latitude,longitude', // เปลี่ยน latitude และ longitude ตามที่คุณต้องการ
        //     ]);


        //     $places = $response->json();

        //     $data_arr = [];

        //     // ตรวจสอบว่ามีข้อมูล candidates อยู่ใน response หรือไม่
        //     if (isset($places['candidates']) && is_array($places['candidates']) && count($places['candidates']) > 0) {
        //         foreach ($places['candidates'] as $candidate) {
        //             $formatted_address = $candidate['formatted_address'];
        //             $location = $candidate['geometry']['location'];
        //             $lat = $location['lat'];
        //             $lng = $location['lng'];

        //             // เพิ่มข้อมูลลงใน $data_arr
        //             $data_arr[] = [
        //                 'formatted_address' => $formatted_address,
        //                 'lat' => $lat,
        //                 'lng' => $lng
        //             ];
        //         }
        //     }



        //     if( !empty($data_arr[0]['formatted_address']) ){

        //         echo $placeName;
        //         echo "<br>";

        //         DB::table('hospital_offices')
        //             ->where([
        //                     ['name', $placeName],
        //                 ])
        //             ->update([
        //                     'address' => $data_arr[0]['formatted_address'],
        //                     'lat' => $data_arr[0]['lat'],
        //                     'lng' => $data_arr[0]['lng'],
        //                 ]);

        //     }

        //     // echo "<pre>";
        //     // print_r($data_arr);
        //     // echo "<pre>";

        //     echo "=========================";
        //     echo "<br>";

        // }

        // exit();


        return view('hospital_office.index', compact('data') );
    }

    public function hospital_offices_index()
    {
        $data_user = Auth::user();

        $data_hospital = Data_1669_officer_hospital::where('user_id', $data_user->id)->first();

        return view('hospital_office.hospital_offices_index', compact('data_hospital'));
    }

    public function create_hospital()
    {
        return view('hospital_office.create_hospital');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('hospital_office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        if (!empty($requestData['affiliation'])) {
            $affiliation = ['name' => trim($requestData['affiliation'])]; // ใช้ trim() เพื่อลบช่องว่างด้านหน้าและด้านหลังของข้อมูล
            Hospital_office_affiliation::firstOrCreate($affiliation);
        }

        if (!empty($requestData['department'])) {
            $department = ['name' => trim($requestData['department'])]; // ใช้ trim() เพื่อลบช่องว่างด้านหน้าและด้านหลังของข้อมูล
            Hospital_office_department::firstOrCreate($department);
        }

        if (!empty($requestData['health_type'])) {
            $health_type = ['name' => trim($requestData['health_type'])]; // ใช้ trim() เพื่อลบช่องว่างด้านหน้าและด้านหลังของข้อมูล
            Hospital_office_health_type::firstOrCreate($health_type);
        }

        if (!empty($requestData['service_area'])) {
            $service_area = ['name' => trim($requestData['service_area'])]; // ใช้ trim() เพื่อลบช่องว่างด้านหน้าและด้านหลังของข้อมูล
            Hospital_office_service_area::firstOrCreate($service_area);
        }

        $date1 = DateTime::createFromFormat('Y-m-d', $requestData['founding_date']);
        $requestData['founding_date'] = $date1->format('d/m/Y');

        $date2 = DateTime::createFromFormat('Y-m-d', $requestData['closing_date']);
        $requestData['closing_date'] = $date2->format('d/m/Y');

        $requestData['latest_update'] = date('d/m/Y H:i:s');

        Hospital_office::create($requestData);

        return redirect('view_hospital_offices')->with('flash_message', 'Hospital_office added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $hospital_office = Hospital_office::findOrFail($id);

        return view('hospital_office.show', compact('hospital_office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $hospital_office = Hospital_office::findOrFail($id);

        return view('hospital_office.edit', compact('hospital_office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";
        // exit();

        $hospital_office = Hospital_office::findOrFail($id);

        $date1 = DateTime::createFromFormat('Y-m-d', $requestData['founding_date']);
        $requestData['founding_date'] = $date1->format('d/m/Y');

        $date2 = DateTime::createFromFormat('Y-m-d', $requestData['closing_date']);
        $requestData['closing_date'] = $date2->format('d/m/Y');

        $requestData['latest_update'] = date('d/m/Y H:i:s');

        $hospital_office->update($requestData);

        // return redirect('hospital_office')->with('flash_message', 'Hospital_office updated!');
        return redirect('/view_hospital_offices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Hospital_office::destroy($id);

        return redirect('hospital_office')->with('flash_message', 'Hospital_office deleted!');
    }

    function create_hospital_office(Request $request)
    {
        $requestData = $request->all();

        foreach ($requestData as $item) {
            $data_arr = [];

            foreach ($item as $key => $value) {
                switch ($key) {
                    case 'รหัส 9 หลัก':
                        $data_arr['code_9_digit'] = $value;
                        break;
                    case 'รหัส 5 หลัก':
                        $data_arr['code_5_digit'] = $value;
                        break;
                    case 'เลขอนุญาตให้ประกอบสถานบริการสุขภาพ 11 หลัก':
                        $data_arr['code_11_digit'] = $value;
                        break;
                    case 'ชื่อ':
                        $data_arr['name'] = $value;
                        break;
                    case 'ประเภทองค์กร':
                        $data_arr['organization_type'] = $value;
                        break;
                    case 'ประเภทหน่วยบริการสุขภาพ':
                        $data_arr['health_type'] = $value;

                        break;
                    case 'สังกัด':
                        $data_arr['affiliation'] = $value;

                        break;
                    case 'แผนก/กรม':
                        $data_arr['department'] = $value;

                        break;
                    case 'เตียงที่ใช้จริง':
                        $data_arr['actual_bed'] = $value;
                        break;
                    case 'สถานะการใช้งาน':
                        $data_arr['usage_status'] = $value;
                        break;
                    case 'เขตบริการ':
                        $data_arr['service_area'] = $value;

                        break;
                    case 'ที่อยู่':
                        $data_arr['address'] = $value;
                        break;
                    case 'จังหวัด':
                        $data_arr['province'] = $value;
                        break;
                    case 'อำเภอ/เขต':
                        $data_arr['district'] = $value;
                        break;
                    case 'ตำบล/แขวง':
                        $data_arr['sub_district'] = $value;
                        break;
                    case 'หมู่':
                        $data_arr['village'] = $value;
                        break;
                    case 'รหัสไปรษณีย์':
                        $data_arr['zip_code'] = $value;
                        break;
                    case 'แม่ข่าย':
                        $data_arr['server'] = $value;
                        break;
                    case 'วันที่ก่อตั้ง':
                        $data_arr['founding_date'] = $value;
                        break;
                    case 'วันที่ปิดบริการ':
                        $data_arr['closing_date'] = $value;
                        break;
                    case 'อัพเดตล่าสุด':
                        $data_arr['latest_update'] = $value;
                        break;
                    case 'lat':
                        $data_arr['lat'] = $value;
                        break;
                    case 'lng':
                        $data_arr['lng'] = $value;
                        break;
                    default:
                        $data_arr[$key] = $value;
                        break;
                }
            }

            if (!empty($data_arr['affiliation'])) {
                $affiliation = ['name' => trim($data_arr['affiliation'])]; // ใช้ trim() เพื่อลบช่องว่างด้านหน้าและด้านหลังของข้อมูล
                Hospital_office_affiliation::firstOrCreate($affiliation);
            }

            if (!empty($data_arr['department'])) {
                $department = ['name' => trim($data_arr['department'])]; // ใช้ trim() เพื่อลบช่องว่างด้านหน้าและด้านหลังของข้อมูล
                Hospital_office_department::firstOrCreate($department);
            }

            if (!empty($data_arr['health_type'])) {
                $health_type = ['name' => trim($data_arr['health_type'])]; // ใช้ trim() เพื่อลบช่องว่างด้านหน้าและด้านหลังของข้อมูล
                Hospital_office_health_type::firstOrCreate($health_type);
            }

            if (!empty($data_arr['service_area'])) {
                $service_area = ['name' => trim($data_arr['service_area'])]; // ใช้ trim() เพื่อลบช่องว่างด้านหน้าและด้านหลังของข้อมูล
                Hospital_office_service_area::firstOrCreate($service_area);
            }

            if (empty($data_arr['latest_update'])) {
                $data_arr['latest_update'] = date('d/m/Y H:i:s');
            }

            // สร้างข้อมูลในตาราง Hospital_office
            Hospital_office::create($data_arr);

        }

        return "success" ;

    }

    function get_hospital_offices($m_lat ,$m_lng ,$province){

        $latitude = (float)$m_lat;
        $longitude = (float)$m_lng;

        $data = Hospital_office::where('province', $province)
        ->where('active', 'Yes')
        ->whereNotNull('lat')
        ->selectRaw("*, (3959 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lng) - radians(?)) + sin(radians(?)) * sin(radians(lat)))) AS distance", [$latitude, $longitude, $latitude])
        ->orderBy('distance')
        ->get();

        return $data ;

    }

    function view_hospital_offices(){

        return view('hospital_office.view_hospital_offices');

    }

    function get_data_hospital($province){

        $data = Hospital_office::where('province', $province)->get();

        return $data ;

    }

    function open_active_hospital($id){

        $data = Hospital_office::where('id', $id)->first();

        return view('hospital_office.open_active_hospital', compact('data'));
    }

    function create_account_hospital($area , $id , $creator){

        $data_hospital = Hospital_office::where('id', $id)->first();

        $user = new User();
        $user->name = $data_hospital->name;
        $user->email = "กรุณาเพิ่มอีเมล";
        $user->provider_id = uniqid('สพฉ-', true);
        $user->username = $data_hospital->code_5_digit;
        $user->password = Hash::make($data_hospital->code_5_digit);
        $user->status = "active";
        $user->role = "admin-partner";
        $user->organization = "สพฉ";
        $user->country = "TH";
        $user->language = "th";
        $user->time_zone = "Asia/Bangkok";
        $user->creator = $creator;
        $user->sub_organization = "โรงพยาบาล";

        $user->save();

        $last_user = User::where('username' , $data_hospital->code_5_digit)->first();

        $officer_hospital = new Data_1669_officer_hospital();
        $officer_hospital->name_officer_hospital = $data_hospital->name;
        $officer_hospital->user_id = $last_user->id;
        $officer_hospital->hospital_offices_id = $data_hospital->id;
        $officer_hospital->area = $area;
        $officer_hospital->creator = $creator;

        $officer_hospital->save();

        DB::table('hospital_offices')
            ->where([
                    ['id', $id],
                ])
            ->update([
                    'active' => "Yes",
                ]);

        return $user ;

    }

    function create_1669_to_hospitals($hospital_id , $sos_1669_id , $command_id){

        $data_user = Auth::user();
        $data_hospital = Hospital_office::where('id', $hospital_id)->first();
        $officer_hospitals = Data_1669_officer_hospital::where('hospital_offices_id', $hospital_id)->first();
        $form_yellow = Sos_1669_form_yellow::where('sos_help_center_id', $sos_1669_id)->first();

        $data = [];
        $data['area'] = $data_hospital->province;
        $data['officer_hospital_id'] = $officer_hospitals->id;
        $data['command_id'] = $command_id;
        $data['sos_help_center_id'] = $sos_1669_id;
        $data['form_yellow_id'] = $form_yellow->id;
        $data['status'] = "รอดำเนินการ";
        $data['hospital_office_id'] = $hospital_id;

        Sos_1669_to_hospital::create($data);

        $last_data = Sos_1669_to_hospital::latest()->first();

        DB::table('sos_help_centers')
            ->where([
                    ['id', $sos_1669_id],
                ])
            ->update([
                    'hospital_office_id' => $last_data->hospital_office_id,
                ]);

        return $data_hospital ;
    }

    function edit_my_hospital($id){

        // $data_user = Auth::user();
        // $data_hospital = Data_1669_officer_hospital::where('user_id', $data_user->id)->first();
        // $hospital_offices = Hospital_office::where('id', $data_hospital->hospital_offices_id)->first();

        $hospital_office = Hospital_office::where('id', $id)->first();

        return view('hospital_office.edit_my_hospital', compact('hospital_office'));

    }

    function dropdown_data(){
        $data_arr = [];
        $data_arr['affiliation'] = Hospital_office_affiliation::groupBy('name')->get();
        $data_arr['department'] = Hospital_office_department::groupBy('name')->get();
        $data_arr['health_type'] = Hospital_office_health_type::groupBy('name')->get();
        $data_arr['service_area'] = Hospital_office_service_area::groupBy('name')->get();

        return $data_arr;
    }

}
