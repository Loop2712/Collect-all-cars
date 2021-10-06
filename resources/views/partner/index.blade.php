@extends('layouts.admin')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Partner</h3>
                    <div class="card-body">
                        <a href="{{ url('/partner_viicheck/create') }}" class="btn btn-success btn-sm" title="Add New Partner">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่ม Partner
                        </a>

                        <form method="GET" action="{{ url('/partner_viicheck') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-12">
                                <hr>
                                @foreach($partner as $item)
                                <div class="row">
                                    <div class="col-4">
                                        <h4>
                                            <b>Partner : </b>{{ $item->name }}
                                        </h4>
                                        <div style="margin-top:20px;">
                                            <b>Phone : </b>{{ $item->phone }} &nbsp;&nbsp;&nbsp;
                                            <b>Mail : </b>{{ $item->mail }}&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <center>
                                            <h6>Group line</h6>
                                            <div style="margin-top:20px;">
                                                @if(!empty($item->line_group))
                                                    {{ $item->line_group }}
                                                @elseif(empty($item->line_group))
                                                    <select id="select_line_group_{{ $loop->iteration }}" class="btn btn-sm btn-outline-success" onchange="change_line_group('{{ $loop->iteration }}','{{ $item->name }}');">
                                                        <option value="" selected>- เลือกกลุ่มไลน์ -</option>
                                                        @foreach($group_line as $item)
                                                            <option value="{{ $item->groupName }}" 
                                                            {{ request('groupName') == $item->groupName ? 'selected' : ''   }} >
                                                            {{ $item->groupName }} 
                                                            </option>
                                                        @endforeach 
                                                    </select>
                                                @else
                                                    <!-- // -->
                                                @endif
                                            </div>
                                        </center>
                                    </div>
                                    <div class="col-2">
                                        <center>
                                            <h6>Area current</h6>
                                            <div style="margin-top:20px;">
                                                @if(!empty($item->sos_area))
                                                    <i class="fas fa-check text-success"></i>
                                                @else
                                                    <i class="fas fa-times text-danger"></i>
                                                @endif
                                            </div>
                                        </center>
                                    </div>
                                    <div class="col-2">
                                        <center>
                                            <h6>
                                                Area pending
                                                @if(!empty($item->new_sos_area))
                                                    <span class="notify_alert" style="position: absolute; font-size:12px;color: red;top: -8px;left: 190px;">
                                                        <b>new</b>
                                                    </span>
                                                @endif
                                            </h6>
                                            <div style="margin-top:20px;">
                                                @if(!empty($item->new_sos_area))
                                                    <a href="" class="btn btn-sm btn-info" data-toggle="collapse" data-target="#collapseExample_{{ $item->id }}" aria-expanded="false" aria-controls="collapseExample_{{ $item->id }}">
                                                        ตรวจสอบ 
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </center>
                                    </div>
                                    <div class="col-1">
                                        <br>
                                        ดูข้อมูล <i class="fas fa-eye text-info"></i>
                                    </div>
                                </div>
                                <hr>
                                <div class="collapse container" id="collapseExample_{{ $item->id }}">
                                    <i class="far fa-times-circle float-right" data-toggle="collapse" data-target="#collapseExample_{{ $item->id }}" aria-expanded="false" aria-controls="collapseExample_{{ $item->id }}"></i>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="float-right">
                                                <button type="button" class="btn btn-sm btn-success">
                                                    &nbsp;&nbsp;อนุมัติ&nbsp;&nbsp;
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger">
                                                    ไม่อนุมัติ
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div id="map" style="background-color: red;"></div>
                                            <input class="d-none" type="text" id="va_zoom" name="" value="6">
                                            <input class="d-none" type="text" id="center_lat" name="" value="13.7248936">
                                            <input class="d-none" type="text" id="center_lng" name="" value="100.4930264">
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&callback=initMap&v=weekly"async></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
    });
        
        function change_line_group(loop, name_partner){
            let select_line_group = document.querySelector("#select_line_group_" + loop).value;
            console.log(select_line_group);
            console.log(name_partner);

            fetch("{{ url('/') }}/api/partner_viicheck_select_line_group/" + select_line_group + "/" + name_partner);

            var delayInMilliseconds = 1500;

                setTimeout(function() {
                    window.location.reload(true);
                }, delayInMilliseconds);
        }

        var draw_area ;
    var markers = [] ;
    var map ;
    var area = [] ;
    var marker ; 

    function initMap() {
        
        let text_zoom = document.getElementById("va_zoom").value;
        let num_zoom = parseFloat(text_zoom);

        let text_center_lat = document.getElementById("center_lat").value;
        let num_center_lat = parseFloat(text_center_lat);

        let text_center_lng = document.getElementById("center_lng").value;
        let num_center_lng = parseFloat(text_center_lng);

        let count_position = document.querySelector('#count_position');

        // 13.7248936,100.4930264 lat lng ประเทศไทย

        const myLatlng = { lat: num_center_lat, lng: num_center_lng };

        map = new google.maps.Map(document.getElementById("map"), {
            zoom: num_zoom,
            center: myLatlng,
        });
        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            // content: "คลิกที่แผนที่เพื่อรับโลเคชั่น",
            // position: myLatlng,
        });

        infoWindow.open(map);
        // Configure the click listener.
        map.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
                // position: mapsMouseEvent.latLng,
            });

            infoWindow.setContent(
                JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
            );

            let text_content = infoWindow.content ;
            

            // console.log(text_content)

            const contentArr = text_content.split(",");

            const lat_Arr = contentArr[0].split(":");

                let marker_lat = lat_Arr[1];

            const lng_Arr = contentArr[1].split(":");

                let marker_lng = lng_Arr[1].replace("\n}", "");

            // console.log(marker_lat)
            // console.log(marker_lng)
            
            addMarker(count_position , marker_lat , marker_lng);

            infoWindow.open(map);

            add_location(text_content, count_position.value, map , marker_lat , marker_lng)
        });
        
    }


    </script>
@endsection
