@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br>

<head>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=470120060837271"></script>

    <meta property="og:url"           content="https://page.line.me/702ytkls" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="วีเช็ค ร่วมกับ สพฉ.(1669)" />
    <meta property="og:description"   content="ให้การขอความช่วยเหลือเป็นเรื่องง่าย เพียงกดปุ่ม SOS.." />
    <meta property="og:image"         content="https://www.viicheck.com/img/poster/Poster%20sos%201669%20(User).png" />
</head>

<div class="col">

    <!-- Button trigger modal -->
    <button id="btn_thank_submit_score" type="button" class="btn btn-primary d-" data-toggle="modal" data-target="#modal_thank_submit_score">dcdcd</button>

    <!-- Modal -->
    <div class="modal fade" id="modal_thank_submit_score" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="" style="width: 98%;" src="{{ url('/img/flex/1669/thank_submit_score.png') }}">
                </div>
                <div class="notranslate">
                    <button style="position: absolute;bottom: 9.5%;right: 13%;width: 20%;height: 7%;" type="button" class="btn" onclick="document.getElementById('a_line').click();">
                        <!-- เสร็จสิ้น -->
                    </button>
                    <button style="position: absolute;bottom: 9.5%;left: 14%;width: 50%;height: 7%;" type="button" class="btn" onclick="shareOnFacebook();">
                        <!-- แบ่งปันเรื่องราวดีๆ -->
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function shareOnFacebook() {
        // ลิงก์ที่ต้องการแชร์
        let url = 'https://www.viicheck.com';
        // รูปภาพที่ต้องการแชร์
        let imageUrl = 'https://www.viicheck.com/img/more/Service-Viicheck%20ver3.png';
        // หัวข้อที่ต้องการแชร์
        let title = 'สพฉ. ร่วมกับวีเช็ค';

        // เรียกใช้ API ของ Facebook เพื่อแชร์หน้าเว็บไซต์
        FB.ui({
            method: 'share',
            href: url,
            title: title,
            picture: imageUrl,
        }, function(response){});
    }
</script>


<input type="hidden" name="score_old" id="score_old" value="{{ $score }}">
    <div class="container" style="font-family: 'Mitr', sans-serif;">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 25px;padding: 8px;background-image: linear-gradient(to left top, #48cae4, #009ace, #006ab3, #003b8e, #03045e);">
                    <div class="card-body" style="color: white;" >
                        <h4>สวัสดี <b>{{ $data_user->name }}</b> </h4>
                        บอกให้เรารู้ การช่วยเหลือเป็นอย่างไรบ้าง
                        <hr >
                        <b>เจ้าหน้าที่ :</b> {{ $data_sos_help_center->name_helper }}
                        <br>
                        <b>จาก :</b> {{ $data_sos_help_center->organization_helper }}
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
                <center>
                    <button type="button" class="btn btn-primary" style="border-radius: 50px;width: 60%;" onclick="submit_score('{{ $data_sos_help_center->id }}');">
                        ให้คะแนน
                    </button>
                </center>
            </div>
        </div>
    </div>
    <br>
    <a id="a_line" class="d-none" href="https://lin.ee/xnFKMfc"></a>

    
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

        function submit_score( sos_id ){

            let score_1 = document.querySelector('#score_1').value ;
            let score_2 = document.querySelector('#score_2').value ;
            let total_score = document.querySelector('#total_score').value ;
            let comment_help = document.querySelector('#comment_help').value ;

            
            if (comment_help) {
                comment_help = comment_help ;
            }else{
                comment_help = 'null';
            }
            
            fetch("{{ url('/') }}/api/submit_score_1669/" + sos_id + '/' + score_1 + '/' + score_2 + '/' + total_score + '/' + comment_help);

            document.querySelector('#btn_thank_submit_score').click();

        }

    </script>
@endsection
