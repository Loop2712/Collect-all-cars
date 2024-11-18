@extends('layouts.partners.theme_partner_new')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .status-repair {
        position: absolute;
        top: 40px;
        right: 10px;
        transform: translate(-50%, -50%);
    }  .overflow {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: calc(100% - 80px);

    }
    .overflow-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
/*
    .overflow:hover {
        white-space: normal;
        overflow: visible;
        text-overflow: unset;
    } */
</style>

@section('content')
<div class="container-fluid">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">การประเมินคุณภาพการซ่อม</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}/viifix_repair_quality/index">เจ้าหน้าที่</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $data_officer->full_name}}</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <span class="d-flex align-items-center justify-content-between btn btn-success radius-10 px-4" style="cursor: text;">ดำเนินการทั้งหมด&nbsp;&nbsp;
                <b id="count_maintain" style="font-size: 25px;"></b>
            </span>

        </div>
    </div>
    <div id="div_container" class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

    </div>
</div>


<script>
    let partner_id = '{{ $data_partner->id }}';
    let officer_id = '{{ $data_officer->id }}';

    document.addEventListener('DOMContentLoaded', function () {
        createDataOfficer(partner_id,officer_id);
    });
</script>

<script>
    async function createDataOfficer(partner_id,officer_id) {
        try {
            const response = await fetch("{{ url('/') }}/api/create_data_officer_quality_repiar_view", {
                method: 'POST', // เปลี่ยน method เป็น'POST' , 'GET', 'PUT' หรือ 'DELETE' ตามความต้องการ
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    // ใส่ข้อมูลที่ต้องการส่งไปยัง API
                    partner_id: partner_id,
                    officer_id: officer_id,
                })
            });
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }

            const data = await response.json();
            console.log('Data Officer created:', data);

            document.querySelector('#count_maintain').innerHTML = data['maintain'].length;

            data['maintain'].forEach((item) => {
                let photo_officer;
                if (item.photo_officer) {
                    photo_officer = '{{ url("/") }}/storage/' + item.photo_officer;
                } else {
                    photo_officer = "{{url('img/stickerline/PNG/1.png')}}";
                }

                let status_bg;
                let rating_maintain;
                let rating_operation;
                let rating_impression;
                let rating_sum;
                let star;

                if (item.status === "เสร็จสิ้น") {
                    status_bg = "bg-success";
                } else if (item.status === "รอดำเนินการ"){
                    status_bg = "bg-warning";
                }else if (item.status === "กำลังดำเนินการ"){
                    status_bg = "bg-info";
                }else if (item.status === "แจ้งซ่อม"){
                    status_bg = "bg-danger";
                }else {
                    status_bg = "bg-secondary";
                }

                if (item.status === "เสร็จสิ้น") {
                    rating_maintain = item.rating_maintain;
                    rating_operation = item.rating_operation;
                    rating_impression = item.rating_impression;
                    rating_sum = item.rating_sum;
                    star = generateStars(item.rating_maintain);
                } else{
                    rating_maintain = '-';
                    rating_operation = '-';
                    rating_impression = '-';
                    rating_sum = '-';
                    star = generateStars(0);
                }
                let url_item = `<a href="{{ url('viifix_repair_quality/detail') }}?maintain_id=${item.id}&officer_id=${officer_id}" target="_blank" class="btn btn-outline-primary w-100 mt-3">ดูเพิ่มเติม</a>`;
                const htmlContent = `
                    <div class="col">
                        <div class="card radius-15">
                            <div class="card-body text-center">
                                <div class="p-4 border radius-15">
                                    <span class="badge ${status_bg} status-repair">${item.status}</span>
                                    <img src="${photo_officer}" width="110" height="110" class="rounded-circle shadow" alt="" style="object-fit: cover;">
                                    <h5 class="mb-0 mt-2"><b>${data.full_name}</b></h5>
                                    <p class="mb-3 mt-0">${item.datetime_command}</p>
                                    <div class="d-flex w-100 ">
                                        <dt class="me-1">ซ่อมบำรุง : </dt>
                                        <dd class="overflow">${item.title}</dd>
                                    </div>

                                    <div class=" overflow-2">
                                        <span class="me-1 "><b>รายละเอียด : </b></span>
                                        <span class="">${item.detail_title}</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex align-items-center">
                                        <div class="fm-file-box bg-light-primary text-primary"><i class="fa-duotone fa-solid fa-medal"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class=" text-start mb-0"><b>คุณภาพ</b></h6>
                                            <div class="d-flex">
                                                ${star}
                                            </div>
                                        </div>
                                        <h6 class="text-primary mb-0">${rating_maintain} คะแนน</h6>
                                    </div>
                                    <div class="d-flex align-items-center mt-3">
                                        <div class="fm-file-box bg-light-success text-success"><i class="fa-solid fa-person-running-fast"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class=" text-start mb-0"><b>ความเร็ว</b></h6>
                                            <div class="d-flex">
                                                ${star}
                                            </div>
                                        </div>
                                        <h6 class="text-primary mb-0">${rating_operation} คะแนน</h6>
                                    </div>
                                    <div class="d-flex align-items-center mt-3">
                                        <div class="fm-file-box bg-light-danger text-danger"><i class="fa-solid fa-face-smile-beam"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class=" text-start mb-0"><b>พึงพอใจ</b></h6>
                                            <div class="d-flex">
                                                ${star}
                                            </div>
                                        </div>
                                        <h6 class="text-primary mb-0">${rating_impression} คะแนน</h6>
                                    </div>
                                    <div class="d-flex align-items-center mt-3">
                                        <div class="fm-file-box bg-light-info text-info"><i class="fa-solid fa-stars"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class=" text-start mb-0"><b>รวม</b></h6>
                                            <div class="d-flex">
                                                ${star}
                                            </div>
                                        </div>
                                        <h6 class="text-primary mb-0">${rating_sum} คะแนน</h6>
                                    </div>
                                    ${url_item}
                                </div>
                            </div>
                        </div>
                    </div>`;

                document.getElementById('div_container').insertAdjacentHTML('beforeend', htmlContent);
            });

        } catch (error) {
            console.error('There was a problem with the fetch operation:', error);
        }
    }

    // ฟังก์ชันสร้างดาว
    function generateStars(rating) {
        const stars = [];
        const fullStars = Math.floor(rating); // คะแนนเต็ม
        const halfStars = rating % 1 >= 0.5 ? 1 : 0; // คะแนนครึ่ง
        const emptyStars = 5 - fullStars - halfStars; // คะแนนว่าง

        for (let i = 0; i < fullStars; i++) {
            stars.push('<i class="fa-solid fa-star" style="color:#FFD058"></i>');
        }
        for (let i = 0; i < halfStars; i++) {
            stars.push('<i class="fa-solid fa-star-half-stroke" style="color:#FFD058"></i>');
        }
        for (let i = 0; i < emptyStars; i++) {
            stars.push('<i class="fa-solid fa-star" style="color:#e0e0e0"></i>');
        }

        return stars.join('');
    }
</script>

@endsection
