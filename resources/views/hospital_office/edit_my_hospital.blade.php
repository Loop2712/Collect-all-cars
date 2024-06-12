@extends('layouts.partners.theme_partner_new')

@section('content')

<style>
    /* =================ตัว loading animation==================== */
    .loader {
        width: 35px;
        aspect-ratio: 1;
        border-radius: 50%;
        border: 8px solid #45dcf0;
        animation:
            l20-1 0.8s infinite linear alternate,
            l20-2 1.6s infinite linear;
    }
    @keyframes l20-1{
        0%    {clip-path: polygon(50% 50%,0       0,  50%   0%,  50%    0%, 50%    0%, 50%    0%, 50%    0% )}
        12.5% {clip-path: polygon(50% 50%,0       0,  50%   0%,  100%   0%, 100%   0%, 100%   0%, 100%   0% )}
        25%   {clip-path: polygon(50% 50%,0       0,  50%   0%,  100%   0%, 100% 100%, 100% 100%, 100% 100% )}
        50%   {clip-path: polygon(50% 50%,0       0,  50%   0%,  100%   0%, 100% 100%, 50%  100%, 0%   100% )}
        62.5% {clip-path: polygon(50% 50%,100%    0, 100%   0%,  100%   0%, 100% 100%, 50%  100%, 0%   100% )}
        75%   {clip-path: polygon(50% 50%,100% 100%, 100% 100%,  100% 100%, 100% 100%, 50%  100%, 0%   100% )}
        100%  {clip-path: polygon(50% 50%,50%  100%,  50% 100%,   50% 100%,  50% 100%, 50%  100%, 0%   100% )}
    }
    @keyframes l20-2{
        0%    {transform:scaleY(1)  rotate(0deg)}
        49.99%{transform:scaleY(1)  rotate(135deg)}
        50%   {transform:scaleY(-1) rotate(0deg)}
        100%  {transform:scaleY(-1) rotate(-135deg)}
    }
    /* =================จบตัว loading animation==================== */

    .fade-out {
        opacity: 1;
        transition: opacity 1s ease-out;
    }

    .fade-out.hide {
        opacity: 0;
    }
</style>


<div class="row">
    <div class="col-md-12">
        <a href="{{ url('/view_hospital_offices') }}" title="ย้อนกลับ"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ</button></a>
        <br />
        <br />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <form class="row g-3" method="POST" action="{{ url('/hospital_office/' . $hospital_office->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                        @include ('hospital_office.form', ['formMode' => 'edit'])

                    </form>
                </div>
            </div>
    </div>
</div>


@endsection
