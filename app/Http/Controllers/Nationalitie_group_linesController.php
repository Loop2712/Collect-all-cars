<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Nationalitie_group_line;
use Illuminate\Http\Request;
use App\Models\Nationality;
use App\Models\Group_line;
use App\Models\MyLog;
use Illuminate\Support\Facades\DB;

class Nationalitie_group_linesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $nationalitie_group_lines = Nationalitie_group_line::where('groupId', 'LIKE', "%$keyword%")
                ->orWhere('groupName', 'LIKE', "%$keyword%")
                ->orWhere('pictureUrl', 'LIKE', "%$keyword%")
                ->orWhere('language', 'LIKE', "%$keyword%")
                ->orWhere('id_nationalitie', 'LIKE', "%$keyword%")
                ->latest()
                ->get();
        } else {
            $nationalitie_group_lines = Nationalitie_group_line::latest()->get();
        }

        $group_nationality = Nationality::where('language','!=',null)
            ->groupBy('language')
            ->orderBy('language','ASC')
            ->where('name_group_line' , '=' , null)
            ->get();

        $group_line = Group_line::where('owner' , '=' , null)->get();

        return view('nationalitie_group_lines.index', compact('nationalitie_group_lines','group_nationality','group_line'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('nationalitie_group_lines.create');
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
        
        Nationalitie_group_line::create($requestData);

        return redirect('nationalitie_group_lines')->with('flash_message', 'Nationalitie_group_line added!');
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
        $nationalitie_group_line = Nationalitie_group_line::findOrFail($id);

        return view('nationalitie_group_lines.show', compact('nationalitie_group_line'));
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
        $nationalitie_group_line = Nationalitie_group_line::findOrFail($id);

        return view('nationalitie_group_lines.edit', compact('nationalitie_group_line'));
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
        
        $nationalitie_group_line = Nationalitie_group_line::findOrFail($id);
        $nationalitie_group_line->update($requestData);

        return redirect('nationalitie_group_lines')->with('flash_message', 'Nationalitie_group_line updated!');
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
        Nationalitie_group_line::destroy($id);

        return redirect('nationalitie_group_lines')->with('flash_message', 'Nationalitie_group_line deleted!');
    }

    function send_pass_code_to_line($language , $id_guoup_line){

        $data_group_line = Group_line::where('id' , $id_guoup_line)->first();

        $code = "";
        for ($i = 0; $i < 4; $i++) {
          $code .= strval(mt_rand(0, 9));
        }

        $groupId = $data_group_line->groupId ;

        $template_path = storage_path('../public/json/text_passcode.json');
        $string_json = file_get_contents($template_path);

        $string_json = str_replace("<PASSCODE>",$code,$string_json);
        $string_json = str_replace("<language>",$language,$string_json);

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => $groupId,
            "messages" => $messages,
        ];

        $opts = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];
                            
        $context  = stream_context_create($opts);
        $url = "https://api.line.me/v2/bot/message/push";
        $result = file_get_contents($url, false, $context);

        // SAVE LOG
        $data = [
            "title" => "send_pass_code_to_line",
            "content" => "to >> " . $data_group_line->groupName,
        ];
        MyLog::create($data);

        return $code ;

    }

    function create_new_sos_group_line($language , $id_guoup_line){

        $data_group_line = Group_line::where('id' , $id_guoup_line)->first();
        $data_nationalitie = Nationality::where('language' , $language)->get();
        $all_id_nationalitie = [];

        $i = 0;
        foreach ($data_nationalitie as $item){
            $all_id_nationalitie[$i] = $item->id ;
            $i = $i + 1 ;
        }

        $data_create = [];
        $data_create['groupId'] = $data_group_line->groupId;
        $data_create['groupName'] = $data_group_line->groupName;
        $data_create['pictureUrl'] = $data_group_line->pictureUrl;
        $data_create['language'] = $language;
        $data_create['id_nationalitie'] = implode(",", $all_id_nationalitie);;

        Nationalitie_group_line::create($data_create);

        $data_new_Nationalitie_group_line = Nationalitie_group_line::latest()->first();

        DB::table('nationalities')
            ->where('language', $language)
            ->update([
                'group_line_id' => $data_new_Nationalitie_group_line->id,
                'name_group_line' => $data_group_line->groupName,
        ]);

        $template_path = storage_path('../public/json/nationalitie/register_officer.json');
        $string_json = file_get_contents($template_path);

        $string_json = str_replace("<NAMEGROUPLINE>",$data_group_line->groupName,$string_json);
        $string_json = str_replace("<language>",$language,$string_json);

        $messages = [ json_decode($string_json, true) ];

        $body = [
            "to" => $data_group_line->groupId,
            "messages" => $messages,
        ];

        $opts = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];
                            
        $context  = stream_context_create($opts);
        $url = "https://api.line.me/v2/bot/message/push";
        $result = file_get_contents($url, false, $context);

        // SAVE LOG
        $data = [
            "title" => "send flex register_officer",
            "content" => "to >> " . $data_group_line->groupName,
        ];
        MyLog::create($data);

        Group_line::where('id' , $id_guoup_line)->delete();

        return 'success' ;

    }
}
