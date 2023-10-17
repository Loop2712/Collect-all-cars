@extends('layouts.viicheck_for_officer')

@section('content')
<style>
    .card {
        border-radius: 8px;
    }

    *:not(i) {
        font-family: 'Kanit', sans-serif;
    }

    .rounded-pill {
        border-radius: 50rem !important;
    }

    .badge {
        display: inline-block;
        padding: 0.35em 0.65em;
        font-size: 0.75em;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }

    .badge:empty {
        display: none;
    }

    .btn .badge {
        position: relative;
        top: -1px;
    }
    hr {
  margin: 1rem 0;
  color: inherit;
  background-color: currentColor;
  border: 0;
  opacity: 0.25;
}

hr:not([size]) {
  height: 1px;
}.badge-wrap {
  position: relative;
  display: inline-block;
}


.badge-without-number {
  	position: absolute;
    font-size: 11px;
    width: 20px;
  	height: 20px;
    border-radius: 50%;
  	top: -5px;
  	right: 0;
	background-color: #29cc39;

}

.badge-without-number.with-wave {
  animation-name: wave;
  animation-duration: 1s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

.badge-without-number.with-wave-waring {
  animation-name: wave-waring;
  animation-duration: 1s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

@keyframes wave {
  0% {box-shadow: 0 0 0px 0px #29cc39;}
  100% {box-shadow: 0 0 0px 10px rgba(245, 66, 78, 0);}
}

@keyframes wave-waring {
  0% {box-shadow: 0 0 0px 0px #ffc107;}
  100% {box-shadow: 0 0 0px 10px rgba(245, 66, 78, 0);}
}.helper-img{
    width: 50px;
    height: 50px;
    border-radius:50%;
    object-fit: cover;
}
</style>
<div class="container py-2">
    <div class="row">
        <div class="col py-2">
            <div class="card radius-15 shadow">
                <div class="card-body">
                    <div class="float-end text-muted">{{ thaidate("lที่ j F Y H:i น." , strtotime($data_report->sos_map->created_at)) }}</div>
                    <h4 class="card-title text-primary"><b>หัวข้อ : {{$data_report->sos_map->title_sos}}</b></h4>
                    <p>{{$data_report->sos_map->title_sos_other}}</p>

                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-1"><b>วิธีแก้ไขเบื้องต้น</b></h5>
                        </div>
                    </div>
                    <p>{{$data_report->how_to_fix}}</p>
                    <!-- {{$data_report->link}} -->
                    @php 
                        $link_url = $data_report->link;
                        $link_url = str_replace("http://","",$link_url);
                        $link_url = str_replace("https://","",$link_url);

                    @endphp
                    <a href="http://{{$link_url}}"  class="btn btn-primary">ลิงก์คู่มือ</a>

                    @if(!empty($data_report->sos_map->helper))
                        <hr>
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-1"><b>เจ้าหน้าที่</b></h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-3 cursor-pointer">
                            <div class="product-img me-2">
                                    <img src="{{ url('storage')}}/{{ $data_helper->photo }}"  class="helper-img" alt="helper img">
                                </div>
                            <div class="">
                                <h6 class="mb-0 font-14"><b>{{$data_report->sos_map->helper}}</b></h6>
                                <p class="mb-0">{{ substr_replace(substr_replace($data_helper->phone, '-', 3, 0), '-', 7, 0) }}</p>
                            </div>
                            <div class="ms-auto">
                                <a href="tel:$data_helper->phone" class="btn btn-success">ติดต่อ</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <h2 class="font-weight-light text-muted mt-3">Timeline</h2>
    <!-- timeline item 2 -->
    <div class="row">
        <div class="col-auto text-center flex-column d-none d-sm-flex">
            <div class="row h-50">
                <div class="col border-end">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                <!-- <span class="badge rounded-pill @if($data_report->sos_map->status !== " รับแจ้งเหตุ") bg-light border @else bg-primary @endif">&nbsp;</span> -->
                @if($data_report->sos_map->status !== "รับแจ้งเหตุ")
                 <span class="badge rounded-pill  bg-light border">&nbsp;</span>
                @else 
                    <div class="badge badge-wrap">
                        <div  class="badge-without-number with-wave-waring bg-warning"></div>
                </div>
                @endif
            </h5>
            <div class="row h-50">
                <div class="col border-end">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <div class="col py-2">
            <div class="card border-primary shadow radius-15">
                <div class="card-body">
                    <h4 class="card-title text-primary"><b>แจ้งซ่อม</b></h4>
                    <p class="card-text">{{ thaidate("lที่ j F Y H:i น." , strtotime($data_report->sos_map->created_at)) }}</p>
                </div>
            </div>
        </div>
    </div>

    @if($data_report->sos_map->status === "กำลังไปช่วยเหลือ" or $data_report->sos_map->status === "เสร็จสิ้น")
    <div class="row">
        <div class="col-auto text-center flex-column d-none d-sm-flex">
            <div class="row h-50">
                <div class="col border-end">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                @if($data_report->sos_map->status !== "กำลังไปช่วยเหลือ")
                    <span class="badge rounded-pill  bg-light border">&nbsp;</span>
                @else 
                    <div class="badge badge-wrap">
                            <div  class="badge-without-number with-wave-waring bg-warning"></div>
                    </div>  
                @endif
                <!-- <span class="badge rounded-pill @if($data_report->sos_map->status !== " กำลังไปช่วยเหลือ") bg-light border @else bg-primary @endif">&nbsp;</span> -->
            </h5>
            <div class="row h-50">
                <div class="col border-end">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <div class="col py-2">
            <div class="card border-primary shadow radius-15">
                <div class="card-body">
                    <h4 class="card-title text-warning"><b>ดำเนินการซ่อม</b></h4>
                    <p class="card-text">{{ thaidate("lที่ j F Y H:i น." , strtotime($data_report->sos_map->time_go_to_help)) }}</p>
                    <p class="card-text"></p>
                    ใช้เวลารับเรื่อง {{ \Carbon\Carbon::parse($data_report->sos_map->created_at)->locale('th')->diffForHumans(\Carbon\Carbon::parse($data_report->sos_map->time_go_to_help), true) }}
                    
                </div>
            </div>
        </div>

    </div>
    @endif
    @if($data_report->sos_map->status === "เสร็จสิ้น")
    <div class="row">
        <div class="col-auto text-center flex-column d-none d-sm-flex">
            <div class="row h-50">
                <div class="col border-end">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                @if($data_report->sos_map->status !== "เสร็จสิ้น")
                
                <span class="badge rounded-pill  bg-light border">&nbsp;</span>
                @else 
                <div class="badge badge-wrap">
                        <div  class="badge-without-number with-wave"></div>
                </div> 
                @endif
            </h5>
            
            <div class="row h-50">
                <div class="col border-end">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <div class="col py-2">
            <div class="card border-primary shadow radius-15">
                <div class="card-body">
                    <h4 class="card-title text-success"><b>เสร็จสิ้น</b></h4>
                    <p class="card-text">{{ thaidate("lที่ j F Y H:i น." , strtotime($data_report->sos_map->help_complete_time)) }}</p>
                    <p class="card-text">
                    ใช้เวลาซ่อม {{ \Carbon\Carbon::parse($data_report->sos_map->time_go_to_help)->locale('th')->diffForHumans(\Carbon\Carbon::parse($data_report->sos_map->help_complete_time), true) }}</p>
                    
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<!-- <div class="container">
    <div class="card mt-4 p-3 ">
        <h3><b>หัวข้อ : {{$data_report->sos_map->title_sos}}</b></h3>
        <p>{{$data_report->sos_map->title_sos_other}} </p>
    </div>
    <h1>asf</h1>
</div> -->
@endsection