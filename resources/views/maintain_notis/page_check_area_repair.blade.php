@extends('layouts.viicheck')

@section('content')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .not_area {
        width: 100%;
        height: calc(100dvh);
        position: relative;
    }

    .icon_sorry {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 20px;
    }

    footer,
    header,
    #topbar {
        display: none !important;
    }



    .breadcrumb-title {
        font-size: 20px;
        /* border-right: 1.5px solid #aaa4a4; */
        font-weight: bolder;
    }


    .page-breadcrumb .breadcrumb li.breadcrumb-item {
        font-size: 16px;
    }


    .page-breadcrumb .breadcrumb-item+.breadcrumb-item::before {
        display: inline-block;
        padding-right: .5rem;
        color: #6c757d;
        font-family: 'LineIcons';
        content: "\ea5c";
    }

    .area-maintain {
        display: flex;
        align-items: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 100%;
        font-size: 16px;
    }

    .card {
        background-color: #fff;
        border-radius: 15px;
    }

    body {
        padding-bottom: 0 !important;
    }

    body.bg-white {
        background-color: #f0f3f8 !important;
    }

    .detail-item-maintain {
        /* white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; */
        /* width: 100%; */
        margin-left: 10px;
    }

    .text-item-maintain {
        line-height: 1.3;
    }

    .font-18 {
        font-size: 18px;
    }

    .font-16 {
        font-size: 16px;
    }

    .font-14 {
        font-size: 14px;
    }

    .text-overflow-1 {
        display: -webkit-box;
        width: 100%;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .text-overflow-2 {
        display: -webkit-box;
        width: 100%;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .text-danger,
    .bg-light-danger {
        background-color: #fbe0e0;
        color: #e62e45;
    }

    .text-warning,
    .bg-light-warning {
        background-color: #ede1ff !important;
        color: #8833ff !important;
    }

    .bg-light-primary {
        background-color: #e2e5ff;
    }

    .text-success,
    .bg-light-success {
        background-color: #dff7e1;
    }

    .tag-new {
        background-color: #e62e45;
        color: #fff;
        border-radius: 50px;
        padding: 3px 15px;
        font-size: 12px !important;
        position: absolute;
        top: 0%;
        right: 0%;
        transform: translate(-50%, -50%);
    }
    .item-notis:hover p ,.item-notis{
        color: #000 !important;
    }
</style>
<div class="container">

    <div id="search_area" class="not_area">
        <div class="icon_sorry">
            <img src="{{url('img/stickerline/Flex/2.png')}}" style="max-width: 150px;" alt="">
            <p class="text-center mt-3 mb-0"><b>กำลังค้นหาตำแหน่ง</b></p>
            <p class="text-center"><b>โปรดรอสักครู่..</b></p>
        </div>
    </div>

    <div id="select_area" class="not_area d-none">
        <div class="icon_sorry">
            <img src="{{url('img/stickerline/Flex/14.png')}}" style="max-width: 150px;" alt="">
            <p id="show_text_navigate" class="text-center mt-3 mb-0"><b>เลือกพื้นที่</b></p>
            <div id="btn_namearea" class="notranslate">
                <!--  -->
            </div>
        </div>
    </div>

    <div id="not_area" class="not_area d-none">
        <div class="icon_sorry">
            <img src="{{url('img/stickerline/PNG/5.png')}}" style="max-width: 150px;" alt="">
            <p class="text-center mt-3 mb-0"><b>ขออภัย</b></p>
            <p class="text-center"><b>คุณไม่อยู่ในพื้นที่</b></p>
        </div>
    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        getUserLocation();
    });

    var latitude ;
    var longitude ;
    
    function search_polygon_area(){

        fetch("{{ url('/') }}/api/search_polygon_area")
            .then(response => response.json())
            .then(result => {
                if(result){
                    // console.log(result);

                    let array_name_area = [];

                    for (let i = 0; i < result.length; i++) {
                        // เปลี่ยน polygon JSON string เป็น array
                        let polygonArray = JSON.parse(result[i].sos_area);

                        // ตัวอย่างการทดสอบจุด
                        let point = { lat: latitude, lng: longitude };
                        let check = isPointInPolygon(point, polygonArray);

                        if (check) {
                            // console.log("อยู่ในพื้นที่ : " + result[i].name_area);
                            // เพิ่มเป็น JSON object ที่มีทั้ง name_area และ id
                            array_name_area.push({ 
                                id: result[i].id, 
                                name_area: result[i].name_area 
                            });
                        } else {
                            // console.log("ไม่อยู่ใน : " + result[i].name_area);
                        }

                        // เรียก show_name_area_inside เมื่อจบ for loop
                        if (i === result.length - 1) {
                            show_name_area_inside(array_name_area);
                        }
                    }
                }
            });

    }

    function show_name_area_inside(areas) {
        // console.log("รายชื่อพื้นที่ที่อยู่ภายใน:", areas);

        if(areas.length != 0){
            document.querySelector('#search_area').classList.add('d-none');
            document.querySelector('#not_area').classList.add('d-none');
            document.querySelector('#select_area').classList.remove('d-none');

            if(areas.length == 1){
                document.querySelector('#show_text_navigate').innerHTML = `
                    กำลังไปยัง <br> ` + areas[0].name_area ;

                setTimeout(function() {
                    window.location.href = "{{ url('/') }}" + "/maintain_notis?area_id=" + areas[0].id;
                }, 1500);
                
            }else{
                let btn_namearea = document.querySelector('#btn_namearea');

                for (let i = 0; i < areas.length; i++) {
                    html = `
                        <a href="{{ url('/') }}/maintain_notis?area_id=`+ areas[i].id+`" class="btn btn-primary mt-2" style="width:100%;">`+areas[i].name_area+`</a>
                        <br>
                    `;

                    btn_namearea.insertAdjacentHTML("beforeend", html);
                }
            }
        }
        else{
            document.querySelector('#search_area').classList.add('d-none');
            document.querySelector('#select_area').classList.add('d-none');
            document.querySelector('#not_area').classList.remove('d-none');
        }
    }

    function getUserLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    latitude = position.coords.latitude;
                    longitude = position.coords.longitude;
                    // console.log("Latitude:", latitude);
                    // console.log("Longitude:", longitude);

                    search_polygon_area();
                    
                },
                (error) => {
                    console.error("Error getting location:", error.message);
                }
            );
        } else {
            console.error("Geolocation is not supported by this browser.");
        }
    }

    function isPointInPolygon(point, polygon) {
        const x = point.lat;
        const y = point.lng;
        let isInside = false;

        for (let i = 0, j = polygon.length - 1; i < polygon.length; j = i++) {
            const xi = polygon[i].lat, yi = polygon[i].lng;
            const xj = polygon[j].lat, yj = polygon[j].lng;

            const intersect = ((yi > y) !== (yj > y)) &&
                (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
            if (intersect) isInside = !isInside;
        }

        return isInside;
    }


</script>
@endsection