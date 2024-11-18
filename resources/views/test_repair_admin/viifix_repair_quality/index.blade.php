@extends('layouts.partners.theme_partner_new')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .circle_img {
        width: 50px;
        height: 50px;
        background-color: #000;
        /* สีของวงกลม */
        border-radius: 50%;
    }

    .circle_img img {
        border-radius: 50%;
    }
</style>
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">การประเมินคุณภาพการซ่อม</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>พื้นที่</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">ทั้งหมด</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <select class="form-select" id="select_status_repair" >
            <option selected="" value="ทั้งหมด">พื้นที่ : ทั้งหมด</option>
            <option value="พระนครศรีอยุธยา" >พระนครศรีอยุธยา</option>
            <option value="นครนายก" >นครนายก</option>
        </select>

    </div>
</div>
<div id="div_container" class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

    {{-- <div class="col">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="p-4 border radius-15">
                    <img src="{{url('img/stickerline/PNG/1.png')}}" width="110" height="110" class="rounded-circle shadow" alt="" style="object-fit: cover;">
                    <h5 class="mb-0 mt-2"><b>Pauline I. Bird</b></h5>
                    <p class="mb-3 mt-0">พระนครศรีอยุธยา</p>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">ดำเนินการ</span>
                        <span class="text-primary"><b>278 เคส</b></span>
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">รอดำเนินการ</span>
                        <span class="text-info"><b>5 เคส</b></span>
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <span class=" text-secondary">เสร็จสิ้น</span>
                        <span class="text-success"><b>273 เคส</b></span>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="fm-file-box bg-light-primary text-primary"><i class="fa-duotone fa-solid fa-medal"></i>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class=" text-start mb-0"><b>คุณภาพ</b></h6>
                            <div class="d-flex">
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                            </div>
                        </div>
                        <h6 class="text-primary mb-0">5 คะแนน</h6>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <div class="fm-file-box bg-light-success text-success"><i class="fa-solid fa-person-running-fast"></i>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class=" text-start mb-0"><b>ความเร็ว</b></h6>
                            <div class="d-flex">
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-duotone fa-star" style="color:#FFD058"></i>
                            </div>
                        </div>
                        <h6 class="text-primary mb-0">4 คะแนน</h6>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <div class="fm-file-box bg-light-danger text-danger"><i class="fa-solid fa-face-smile-beam"></i>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class=" text-start mb-0"><b>พึงพอใจ</b></h6>
                            <div class="d-flex">
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-duotone fa-star" style="color:#FFD058"></i>
                                <i class="fa-duotone fa-star" style="color:#FFD058"></i>
                            </div>
                        </div>
                        <h6 class="text-primary mb-0">3 คะแนน</h6>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <div class="fm-file-box bg-light-info text-info"><i class="fa-solid fa-stars"></i>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class=" text-start mb-0"><b>รวม</b></h6>
                            <div class="d-flex">
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-solid fa-star" style="color:#FFD058"></i>
                                <i class="fa-duotone fa-star" style="color:#FFD058"></i>
                            </div>
                        </div>
                        <h6 class="text-primary mb-0">4 คะแนน</h6>
                    </div>
                    <div class="d-grid mt-3"> <a href="{{ url('/demo_repair_quality_view') }}" class="btn btn-outline-primary radius-15">ดูเพิ่มเติม</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

</div>


<script>
    let partner_id = '{{ $data_partner->id }}';

    document.addEventListener('DOMContentLoaded', function () {
        createDataOfficer(partner_id,null);
    });
</script>

<script>
    async function createDataOfficer(partner_id,officer_id) {
        try {
            const response = await fetch("{{ url('/') }}/api/create_data_officer_quality_repiar_index", {
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

            data.forEach((person) => {
                let photo_officer;
                if (person.photo_officer) {
                    photo_officer = '{{ url("/") }}/storage/' + person.photo_officer;
                } else {
                    photo_officer = "{{url('img/stickerline/PNG/1.png')}}";
                }

                let rating_maintain;
                let rating_operation;
                let rating_impression;
                let rating_sum;
                let star_maintain;
                let star_operation;
                let star_impression;
                let star_sum;

                if (person['rating'].rating_maintain !== 0) {
                    rating_maintain = person['rating'].rating_maintain;
                    star_maintain = generateStars(person['rating'].rating_maintain);
                } else{
                    rating_maintain = '-';
                    star_maintain = generateStars(0);
                }

                if (person['rating'].rating_operation !== 0) {
                    rating_operation = person['rating'].rating_operation;
                    star_operation = generateStars(person['rating'].rating_operation);
                } else{
                    rating_operation = '-';
                    star_operation = generateStars(0);
                }

                if (person['rating'].rating_impression !== 0) {
                    rating_impression = person['rating'].rating_impression;
                    star_impression = generateStars(person['rating'].rating_impression);
                } else{
                    rating_impression = '-';
                    star_impression = generateStars(0);
                }

                if (person['rating'].rating_sum !== 0) {
                    rating_sum = person['rating'].rating_sum;
                    star_sum = generateStars(person['rating'].rating_sum);
                } else{
                    rating_sum = '-';
                    star_sum = generateStars(0);
                }

                url_person = `<a href="{{ url('viifix_repair_quality/view/') }}/${person.id}"  class="btn btn-outline-primary radius-15">ดูเพิ่มเติม</a>`;
                const htmlContent = `
                    <div class="col">
                        <div class="card radius-15">
                            <div class="card-body text-center">
                                <div class="p-4 border radius-15">
                                    <img src="${photo_officer}" width="110" height="110" class="rounded-circle shadow" alt="" style="object-fit: cover;">
                                    <h5 class="mb-0 mt-2"><b>${person.full_name}</b></h5>
                                    <p class="mb-3 mt-0">{person.area}</p>

                                    <!-- Maintain Section -->
                                    <div class="d-flex justify-content-between w-100">
                                        <span class="text-secondary">ดำเนินการ</span>
                                        <span class="text-primary"><b>${person.maintain?.in_progress || 0} เคส</b></span>
                                    </div>
                                    <div class="d-flex justify-content-between w-100">
                                        <span class="text-secondary">รอดำเนินการ</span>
                                        <span class="text-info"><b>${person.maintain?.pending || 0} เคส</b></span>
                                    </div>
                                    <div class="d-flex justify-content-between w-100">
                                        <span class="text-secondary">เสร็จสิ้น</span>
                                        <span class="text-success"><b>${person.maintain?.success || 0} เคส</b></span>
                                    </div>
                                    <hr>

                                    <!-- Rating Section -->
                                    <div class="d-flex align-items-center">
                                        <div class="fm-file-box bg-light-primary text-primary"><i class="fa-duotone fa-solid fa-medal"></i></div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class=" text-start mb-0"><b>คุณภาพ</b></h6>
                                            <div class="d-flex">
                                                ${star_maintain}
                                            </div>
                                        </div>
                                        <h6 class="text-primary mb-0">${rating_maintain} คะแนน</h6>
                                    </div>

                                    <div class="d-flex align-items-center mt-3">
                                        <div class="fm-file-box bg-light-success text-success"><i class="fa-solid fa-person-running-fast"></i></div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class=" text-start mb-0"><b>ความเร็ว</b></h6>
                                            <div class="d-flex">
                                                ${star_operation}
                                            </div>
                                        </div>
                                        <h6 class="text-primary mb-0">${rating_operation} คะแนน</h6>
                                    </div>

                                    <div class="d-flex align-items-center mt-3">
                                        <div class="fm-file-box bg-light-danger text-danger"><i class="fa-solid fa-face-smile-beam"></i></div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class=" text-start mb-0"><b>พึงพอใจ</b></h6>
                                            <div class="d-flex">
                                                ${star_impression}
                                            </div>
                                        </div>
                                        <h6 class="text-primary mb-0">${rating_impression} คะแนน</h6>
                                    </div>

                                    <div class="d-flex align-items-center mt-3">
                                        <div class="fm-file-box bg-light-info text-info"><i class="fa-solid fa-stars"></i></div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class=" text-start mb-0"><b>รวม</b></h6>
                                            <div class="d-flex">
                                                ${star_sum}
                                            </div>
                                        </div>
                                        <h6 class="text-primary mb-0">${rating_sum} คะแนน</h6>
                                    </div>
                                    <!-- Repeat for each rating category as needed -->

                                    <div class="d-grid mt-3">
                                        ${url_person}
                                    </div>
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
