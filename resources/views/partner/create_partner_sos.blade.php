@extends('layouts.admin')

@section('content')
<form method="POST" action="{{ url('/sos_partners') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">สร้างพาร์ทเนอร์</h3>
                    <div class="card-body">

                        <h5>ข้อมูล Paartner</h5>
                        <div class="row">
                            <div class="col-4 mt-3">
                                <label for="name" class="control-label">{{ 'ชื่อ' }}</label>
                                <input class="form-control" type="text" name="name" id="name" value="">
                            </div>
                            <div class="col-3 mt-3">
                                <label for="phone" class="control-label">{{ 'เบอร์ติดต่อ' }}</label>
                                <input class="form-control" type="text" name="phone" id="phone" value="">
                            </div>
                            <div class="col-3 mt-3">
                                <label for="mail" class="control-label">{{ 'เมล' }}</label>
                                <input class="form-control" type="text" name="mail" id="mail" value="">
                            </div>
                            <div class="col-2 mt-3">
                                <label for="logo" class="control-label">{{ 'โลโก้' }}</label>
                                <input class="form-control" name="logo" type="file" id="logo" value="">
                            </div>

                            <div class="col-3 mt-3">
                                <label for="type_partner" class="control-label">{{ 'ประเภทพาร์ทเนอร์' }}</label>
                                <select name="type_partner" class="form-control"  id="type_partner">
                                        <option selected value="">กรุณาเลือก</option>
                                        <option value="university">สถานศึกษา</option>
                                        <option value="government">สถานที่ราชการ</option>
                                        <option value="company">บริษัทเอกชน</option>
                                        <option value="volunteer">อาสาสมัคร</option>
                                        <option value="condo">คอนโด</option>
                                        <option value="other">อื่นๆ</option>
                                </select>
                            </div>
                            <div class="col-9 mt-3">
                                <label for="full_name" class="control-label">{{ 'ชื่อเต็ม' }}</label>
                                <input class="form-control" type="text" name="full_name" id="full_name" value="">
                            </div>

                            <div class="col-3 mt-3">
                                <label for="color_main" class="control-label">{{ 'color_main' }}</label>
                                <input class="form-control" name="color_main" type="text" id="color_main" value="">
                            </div>
                            <div class="col-3 mt-3">
                                <label for="color_navbar" class="control-label">{{ 'color_navbar' }}</label>
                                <input class="form-control" name="color_navbar" type="text" id="color_navbar" value="">
                            </div>
                            <div class="col-3 mt-3">
                                <label for="color_body" class="control-label">{{ 'color_body' }}</label>
                                <input class="form-control" name="color_body" type="text" id="color_body" value="">
                            </div>
                            <div class="col-3 mt-3">
                                <label for="class_color_menu" class="control-label">{{ 'class_color_menu' }}</label>
                                <input class="form-control" name="class_color_menu" type="text" id="class_color_menu" value="">
                            </div>

                            <div class="col-12 mt-3 d-flex justify-content-between px-5 py-2">
                                <div>
                                    <input class="" name="show_homepage" type="checkbox" id="show_homepage" value="show"> show_homepage
                                </div>
                                <div>
                                    <input class="" name="open_sos" type="checkbox" id="open_sos" value="Yes"> open_sos
                                </div>
                                <div>
                                    <input class="" name="open_repair" type="checkbox" id="open_repair" value="Yes"> open_repair
                                </div>
                                <div>
                                    <input class="" name="open_move" type="checkbox" id="open_move" value="Yes"> open_move
                                </div>
                                <div>
                                    <input class="" name="open_news" type="checkbox" id="open_news" value="Yes"> open_news
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h5>สร้างรหัส Admin Partner</h5>
                        <div class="row">
                            <div class="col-3 mt-3">
                                <label for="username" class="control-label">{{ 'username' }}</label>
                                <input class="form-control" type="text" name="username" id="username" value="" required>
                            </div>
                            <div class="col-3 mt-3">
                                <label for="password" class="control-label">{{ 'password' }}</label>
                                <input class="form-control" type="text" name="password" id="password" value="" required>
                            </div>
                            <div class="col-6 mt-3"></div>

                            <div class="col-3 mt-3">
                                <label for="language" class="control-label">{{ 'language' }}</label>
                                <select name="language" class="form-control"  id="language">
                                    <option selected value="th">th</option>
                                    <option value="en">en</option>
                                    <option value="zh-TW">zh-TW</option>
                                    <option value="zh-CN">zh-CN</option>
                                    <option value="ja">ja</option>
                                    <option value="ko">ko</option>
                                    <option value="es">es</option>
                                    <option value="lo">lo</option>
                                    <option value="my">my</option>
                                    <option value="de">de</option>
                                    <option value="ar">ar</option>
                                    <option value="hi">hi</option>
                                    <option value="ru">ru</option>
                                </select>
                            </div>
                            <div class="col-3 mt-3">
                                <label for="country" class="control-label">{{ 'country' }}</label>
                                <select id="country" name="country" class="form-control">
                                    <option selected value="TH">TH</option>
                                </select>
                            </div>
                            <div class="col-3 mt-3">
                                <label for="time_zone" class="control-label">{{ 'time_zone' }}</label>
                                <select id="time_zone" name="time_zone" class="form-control">
                                    <option selected value="Asia/Bangkok">Asia/Bangkok</option>
                                </select>
                            </div>
                            <div class="col-3 mt-3">
                                <label for="nationalitie" class="control-label">{{ 'nationalitie' }}</label>
                                <select id="nationalitie" name="nationalitie" class="form-control">
                                    <option selected value="Thai">Thai</option>
                                </select>
                            </div>
                        </div>

                        <script>

                            document.addEventListener('DOMContentLoaded', (event) => {
                                search_nationalitie();
                                search_data_time_zones();
                                search_data_country();
                            });

                            function search_nationalitie() {
                                fetch("{{ url('/') }}/api/search_nationalitie")
                                    .then(response => response.json())
                                    .then(result => {
                                        // console.log(result);

                                        let nationalitie = document.querySelector('#nationalitie');

                                        for (let item of result) {
                                            let option = document.createElement("option");
                                            option.text = item.nationality;
                                            option.value = item.nationality;

                                            nationalitie.add(option);
                                        }

                                    });
                            }

                            function search_data_time_zones() {
                                fetch("{{ url('/') }}/api/search_data_time_zones")
                                    .then(response => response.json())
                                    .then(result => {
                                        // console.log(result);

                                        let time_zone = document.querySelector('#time_zone');

                                        for (let item of result) {
                                            let option = document.createElement("option");
                                            option.text = item.TimeZone;
                                            option.value = item.TimeZone;

                                            time_zone.add(option);
                                        }

                                    });
                            }

                            function search_data_country() {
                                fetch("{{ url('/') }}/api/search_data_country")
                                    .then(response => response.json())
                                    .then(result => {
                                        // console.log(result);

                                        let country = document.querySelector('#country');

                                        for (let item of result) {
                                            let option = document.createElement("option");
                                            option.text = item.CountryCode;
                                            option.value = item.CountryCode;

                                            country.add(option);
                                        }

                                    });
                            }
                        </script>

                        <hr>

                        <div class="row">
                            <div class="col-12 mt-3">
                                <!-- <button type="button" class="btn btn-primary float-right">Create Partner</button> -->
                                <input class="btn btn-primary float-right" type="submit" value="Create Partner">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
