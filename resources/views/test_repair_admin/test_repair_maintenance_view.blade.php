//composer.json//

"doctrine/dbal": "2.12",

"mpdf/mpdf": "^8.2",

//api//

// maintain
Route::get('/get_sub_category', 'Maintain_notisController@get_sub_category');

// END maintain

<!-- line api controller -->

use App\Models\Sos_1669_form_yellow;
use App\Models\Sos_1669_form_pink;
use App\Models\Sos_1669_form_green;
use App\Models\Sos_1669_form_blue;

$data_unit = Data_1669_operating_unit::where('id' , $unit_id)->first();//
$data_form_yellow = Sos_1669_form_yellow::where('sos_help_center_id', $id_sos_1669);

$string_json = str_replace("ID_SOS_HELP_CENTER",$show_code_officer,$string_json);//
$string_json = str_replace("ID_SOS_HELP_CENTER",$data_sos->operating_code,$string_json);

if ($answer == "go_to_help") {//
                $data_create_form_color = [
                    "sos_help_center_id" => $id_sos_1669,
                    "sos_form_yellow_id" => $data_form_yellow->id,
                    "location_sos" => $data_sos->location_sos,
                    "symptom" => $data_sos->symptom,
                ];
                
                
                $form_color_name = null;
                $form_color_id = null;
                // ------------------------------------------------------------------
                // สร้าง form สีต่างๆตามระดับ officer
                if ($data_officers->level == 'ALS' or $data_officers->level == 'ILS') {
                    # form_greens
                    $data_form_green = Sos_1669_form_green::create($data_create_form_color);  
                
                    $form_color_name = "green";
                    $form_color_id = $data_form_green->id;
                } elseif($data_officers->level == 'BLS') {
                    $data_form_pink = Sos_1669_form_pink::create($data_create_form_color);  
                    
                    $form_color_name = "pink";
                    $form_color_id = $data_form_pink->id;
                }else{
                    // form_blues
                    $data_form_blue = Sos_1669_form_blue::create($data_create_form_color);  
                
                    $form_color_name = "blue";
                    $form_color_id = $data_form_blue->id;
                    
                }



                'helper_id' => $data_user->id,
                        'time_go_to_help' => $date_now,
                        'wait' => null,
                        'form_color_name' => $form_color_name,
                        'form_color_id_user_1 ' => $form_color_id,         