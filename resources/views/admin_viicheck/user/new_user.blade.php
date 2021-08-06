@extends('layouts.admin')

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">สร้างบัญชีผู้ใช้ / <span style="font-size: 18px;">Create an account</span></h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                <p>กรุณาเลือกพาร์ทเนอร์ / Please select a partner</p>

                                    <a href="{{ url('/create_user') }}?partners=js100" class="btn btn-outline-success " onclick="return confirm(&quot; คุณต้องการที่จะสร้างบัญชีผู้ใช้ จส 100 ใช่หรือไม่ ?&quot;)">
                                        <img width="22" src="https://m.thaiware.com/upload_misc/software/2017_07/thumbnails/13243_170703102646Yi.jpg"> JS100
                                    </a>

                                    <a href="{{ url('/create_user') }}?partners=2bgreen" class="btn btn-outline-danger " onclick="return confirm(&quot; คุณต้องการที่จะสร้างบัญชีผู้ใช้ 2BGreen ใช่หรือไม่ ?&quot;)">
                                        <!-- <img width="22" src="https://www.viicheck.com/images/GreenLogo.png"> --> 2BGreen
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
