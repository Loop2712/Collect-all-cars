@extends('layouts.viicheck')

@section('content')

    <div class="card border-top border-0 border-4 border-primary notranslate" style="margin-top:100px;">
        <div class="card-body p-5">
            <div class="card-title">
                <center>
                    {{-- <p class="mb-0 text-dark">
                        ชื่อกลุ่มไลน์ : {{ $data_group_line->groupName }}
                    </p> --}}
                    <br>
                    <h5 class="mb-0 text-primary">
                        <b>ลงทะเบียนเจ้าหน้าที่</b>
                    </h5>
                </center>
            </div>
            <hr>
            <div class="row g-3">
                <div class="col-md-6 ">
                    <form method="POST" action="{{ url('/sos_partner_officers') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('sos_partner_officers.form', ['formMode' => 'create'])

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
