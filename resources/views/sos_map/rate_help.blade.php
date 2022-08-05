@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br>
<input type="hidden" name="score_old" id="score_old" value="{{ $score }}">
    <div class="container" style="font-family: 'Mitr', sans-serif;">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 25px;padding: 8px;background-image: linear-gradient(to left top, #48cae4, #009ace, #006ab3, #003b8e, #03045e);">
                    <div class="card-body" style="color: white;" >
                        <h4>สวัสดี <b>{{ $data_users->name }}</b> </h4>
                        บอกให้เรารู้ การช่วยเหลือเป็นอย่างไรบ้าง
                        <hr >
                        <b>เจ้าหน้าที่ :</b> {{ $data_sos_map->helper }}
                        <br>
                        <b>จาก :</b> {{ $data_sos_map->organization_helper }}
                    </div>
                </div>
                <br>
            </div>
            <div id="score_yes" class="col-md-12 d-none">
                <div class="card" style="background-color:#00b4d8;border-radius: 25px;padding: 4px;">
                    <div class="card-body" style="color: white;">
                        <p class="text-center" style="font-size:18px;">คุณได้ให้คะแนนเจ้าหน้าที่แล้ว</p>
                    </div>
                </div>
            </div>
            <div id="score_no" class="col-md-12 d-none">
                <div class="card" style="background-color:#00b4d8;border-radius: 25px;padding: 4px;">
                    <div class="card-body" style="color: white;">
                        <p class="text-center" style="font-size:18px;">ความประทับใจในการช่วยเหลือ</p>
                        <div class="row">
                            <div class="col-1"></div>
                            <div id="score_1_1" class="col-2">
                                <i id="hartscore_1_1" class="fas fa-heart" onclick="change_heart_color('score_1','1')"></i>
                            </div>
                            <div id="score_1_2" class="col-2">
                                <i id="hartscore_1_2" class="fas fa-heart" onclick="change_heart_color('score_1','2')"></i>
                            </div>
                            <div id="score_1_3" class="col-2">
                                <i id="hartscore_1_3" class="fas fa-heart" onclick="change_heart_color('score_1','3')"></i>
                            </div>
                            <div id="score_1_4" class="col-2">
                                <i id="hartscore_1_4" class="fas fa-heart" onclick="change_heart_color('score_1','4')"></i>
                            </div>
                            <div id="score_1_5" class="col-2">
                                <i id="hartscore_1_5" class="fas fa-heart" onclick="change_heart_color('score_1','5')"></i>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                    <input class="form-control d-none" type="number" name="score_1" id="score_1" value="">
                </div>
                <br>
                <div class="card" style="background-color:#00b4d8;border-radius: 25px;padding: 4px;">
                    <div class="card-body" style="color: white;">
                        <p class="text-center" style="font-size:18px;">ระยะเวลาในการช่วยเหลือ</p>
                        <div class="row">
                            <div class="col-1"></div>
                            <div id="score_2_1" class="col-2">
                                <i id="hartscore_2_1" class="fas fa-heart" onclick="change_heart_color('score_2','1')"></i>
                            </div>
                            <div id="score_2_2" class="col-2">
                                <i id="hartscore_2_2" class="fas fa-heart" onclick="change_heart_color('score_2','2')"></i>
                            </div>
                            <div id="score_2_3" class="col-2">
                                <i id="hartscore_2_3" class="fas fa-heart" onclick="change_heart_color('score_2','3')"></i>
                            </div>
                            <div id="score_2_4" class="col-2">
                                <i id="hartscore_2_4" class="fas fa-heart" onclick="change_heart_color('score_2','4')"></i>
                            </div>
                            <div id="score_2_5" class="col-2">
                                <i id="hartscore_2_5" class="fas fa-heart" onclick="change_heart_color('score_2','5')"></i>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                    <input class="form-control d-none" type="number" name="score_2" id="score_2" value="">
                </div>
                <br>
                <div class="card" style="background-color:#00b4d8;border-radius: 25px;padding: 4px;">
                    <div class="card-body" style="color: white;">
                        <p class="text-center" style="font-size:18px;">คำแนะนำ/ติชม</p>
                        <div class="row">
                            <textarea class="form-control" rows="4" name="comment_help" id="comment_help" value="" cols="50"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card d-none" style="background-color:#00b4d8;border-radius: 25px;padding: 4px;">
                    <div class="card-body" style="color: white;">
                        <p class="text-center" style="font-size:18px;">ภาพรวมการช่วยเหลือ</p>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <input class="form-control" type="number" name="total_score" id="total_score" value="">
                    </div>
                </div>

                <button type="button" class="btn btn-primary float-right" style="border-radius: 50px;z-index: 99999;" onclick="submit_score('{{ $data_sos_map->id }}');">
                    ให้คะแนน
                </button>
            </div>
        </div>
    </div>
    <a class="d-none" id="btn_sos_thank_submit_score" href="{{ url('/sos_thank_submit_score') . '/' . $data_sos_map->user_id }}"></a>
    
    <script>
        
        document.addEventListener('DOMContentLoaded', (event) => {
            // console.log("START");
            let score_old = document.querySelector('#score_old').value;

            if (score_old === 'Yes') {
                document.querySelector('#score_yes').classList.remove('d-none');
                document.querySelector('#score_no').classList.add('d-none');
            }else{
                document.querySelector('#score_yes').classList.add('d-none');
                document.querySelector('#score_no').classList.remove('d-none');
            }

        });

        function change_heart_color(article_no , score){

            let score_1 = document.querySelector('#score_1');
            let score_2 = document.querySelector('#score_2');

            let total_score = document.querySelector('#total_score');
                total_score.value = "";

            for (var i_star = 1; i_star <= 5; i_star++) {

                let tag_class_star = document.createAttribute("class");
                    tag_class_star.value = "fas fa-heart";

                let score_no_star = document.querySelector('#hart' + article_no + '_' + i_star);
                    score_no_star.setAttributeNode(tag_class_star); 

            }

            let article_score = document.querySelector('#' + article_no);
                article_score.value = score ;

            for (var i = 1; i <= score; i++) {

                let tag_class = document.createAttribute("class");
                    tag_class.value = "fas fa-heart text-danger";

                let score_no = document.querySelector('#hart' + article_no + '_' + i);
                    score_no.setAttributeNode(tag_class); 

            }

            total_score.value = (parseFloat(score_1.value) + parseFloat(score_2.value)) / 2;

        }

        function submit_score( sos_map_id ){

            let score_1 = document.querySelector('#score_1').value ;
            let score_2 = document.querySelector('#score_2').value ;
            let total_score = document.querySelector('#total_score').value ;
            let comment_help = document.querySelector('#comment_help').value ;

            
            if (comment_help) {
                comment_help = comment_help ;
            }else{
                comment_help = 'null';
            }
            
            fetch("{{ url('/') }}/api/submit_score/" + sos_map_id + '/' + score_1 + '/' + score_2 + '/' + total_score + '/' + comment_help);

            document.querySelector('#btn_sos_thank_submit_score').click();
        }

    </script>
@endsection
