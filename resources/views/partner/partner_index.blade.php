@extends('layouts.partners.theme_partner')

@section('content')
        <center>
            <div class="card col-md-11" style="font-family: 'Prompt', sans-serif;border-radius: 25px;">
                <div class="row">
                    <div class="card-body col-md-6" style="hight: 500px">
                        <img src="img/stickerline/PNG/1.png" width="100%" alt="viicheck">
                    </div>
                    <div class="card-body col-md-6 d-flex align-items-center">
                        <div class="col-md-12">
                        @foreach($data_partners as $data_partner)
                        <h1 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"> <b>ยินดีต้อนรับ </b> </h1>
                        <h1 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"> <b>{{ $data_partner->name }}</b> </h1>
                        <h1 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"> <b>เข้าสู่</b> </h1>
                        <h1 style="font-family: 'Prompt', sans-serif;text-shadow: 4px 4px 4px rgba(150, 150, 150, 1);margin-top:25px;"> <b>ViiCheck Partner</b> </h1>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </center>
@endsection
