@extends('layouts.viicheck')

@section('content')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

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



    .font-18 {
        font-size: 18px;
    }

    .font-16 {
        font-size: 16px;
    }

    .font-14 {
        font-size: 14px;
    }

    hr {
        margin: 1rem 0;
        color: inherit;
        background-color: currentColor;
        border: 0;
        opacity: .25;
    }

    hr:not([size]) {
        height: 1px;
    }
</style>

<style>
    #rating_input {
        min-width: 100% !important;

    }

    #rating_input .rating-group {
        display: flex;
        justify-content: space-between;
        width: 100% !important;
    }

    #rating_input .rating__icon {
        pointer-events: none;
    }

    #rating_input .rating__input {
        position: absolute !important;
        left: -9999px !important;
    }

    #rating_input .rating__input--none {
        display: none
    }

    #rating_input .rating__label {
        cursor: pointer;
        padding: 0 0.1em;
        font-size: 2rem;
        display: flex;
        justify-content: center;
        width: 100%;
        transition: all .15s ease-in-out;
    }

    #rating_input .rating__icon--star {
        color: orange;
    }

    #rating_input .rating__input:checked~.rating__label .rating__icon--star {
        color: #ddd;
        transition: all .15s ease-in-out;
    }

    #rating_input .rating-group:hover .rating__label .rating__icon--star {
        color: orange;
        transition: all .15s ease-in-out;
    }

    #rating_input .rating__input:hover~.rating__label .rating__icon--star {
        color: #ddd;
        transition: all .15s ease-in-out;
    }


    .btn-vote-training {
        border-radius: 50px;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        -ms-border-radius: 50px;
        -o-border-radius: 50px;
        font-weight: bolder;
    }

    .btn-vote-training:disabled {
        background-color: #A3A3A3 !important;
        color: #57759C !important;
    }

    .radius-50 {
        border-radius: 50px !important;
    }
</style>
<div class="container">
    <div class="pt-4">
        <div class="content">
            <div class="row p-3">
                <div class="px-3 py-1 col-12 mb-3 col-md-6 ">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body ">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">ข้อมูลการแจ้งซ่อม</h5>
                            </div>
                            <hr>
                            <div>
                                <h3><b>ซ่อม<span>{{$maintain_noti->name_sub_categorys}}</span></b></h3>
                                <p class="mb-0">สถานที่ : {{$maintain_noti->name_area}}</p>
                                <p>ปัญหา : {{$maintain_noti->title}}</p>
                                <p class="mb-0">{{$maintain_noti->detail_title}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-3 py-1 col-12 col-md-6 mb-3">

                    <div class="card border-top border-0 border-4 border-warning">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="fa-solid fa-wrench me-1 font-22 text-warning"></i>
                                </div>
                                <h5 class="mb-0 text-warning">การประเมินงานซ่อมบำรุง</h5>
                            </div>
                            <hr>
                            <div class="w-100 d-flex justify-content-center">

                                <div id="rating_input">
                                    <h5 class="mb-2"><b>คุณภาพงานซ่อมบำรุง</b></h5>
                                    <div class="rating-group">
                                        <!-- หัวข้อที่ 1 -->
                                        <input disabled class="rating__input rating__input--none" name="rating1" id="rating1-none" value="0" type="radio">
                                        <label aria-label="1 star" class="rating__label" for="rating1-1">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" checked name="rating1" id="rating1-1" value="1" type="radio">
                                        <label aria-label="2 stars" class="rating__label" for="rating1-2">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" name="rating1" id="rating1-2" value="2" type="radio">
                                        <label aria-label="3 stars" class="rating__label" for="rating1-3">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" name="rating1" id="rating1-3" value="3" type="radio">
                                        <label aria-label="4 stars" class="rating__label" for="rating1-4">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" name="rating1" id="rating1-4" value="4" type="radio">
                                        <label aria-label="5 stars" class="rating__label" for="rating1-5">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" name="rating1" id="rating1-5" value="5" type="radio">
                                    </div>

                                    <h5 class="mb-2 mt-3"><b>ความรวดเร็วในการดำเนินการ</b></h5>
                                    <!-- หัวข้อที่ 2 -->
                                    <div class="rating-group">
                                        <input disabled class="rating__input rating__input--none" name="rating2" id="rating2-none" value="0" type="radio">
                                        <label aria-label="1 star" class="rating__label" for="rating2-1">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" checked name="rating2" id="rating2-1" value="1" type="radio">
                                        <label aria-label="2 stars" class="rating__label" for="rating2-2">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" name="rating2" id="rating2-2" value="2" type="radio">
                                        <label aria-label="3 stars" class="rating__label" for="rating2-3">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" name="rating2" id="rating2-3" value="3" type="radio">
                                        <label aria-label="4 stars" class="rating__label" for="rating2-4">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" name="rating2" id="rating2-4" value="4" type="radio">
                                        <label aria-label="5 stars" class="rating__label" for="rating2-5">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" name="rating2" id="rating2-5" value="5" type="radio">
                                    </div>

                                    <h5 class="mb-2 mt-3"><b>ความประทับใจ</b></h5>
                                    <div class="rating-group">
                                        <input disabled class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                                        <label aria-label="1 star" class="rating__label" for="rating3-1">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" checked name="rating3" id="rating3-1" value="1" type="radio">
                                        <label aria-label="2 stars" class="rating__label" for="rating3-2">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                                        <label aria-label="3 stars" class="rating__label" for="rating3-3">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                                        <label aria-label="4 stars" class="rating__label" for="rating3-4">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                                        <label aria-label="5 stars" class="rating__label" for="rating3-5">
                                            <div>
                                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </label>
                                        <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                                    </div>

                                </div>

                            </div>
                            <h5 class="mb-2 mt-3"><b>คำแนะนำติชม</b></h5>
                            <textarea class="form-control" id="rating_remark" placeholder="คำแนะนำติชมเพิ่มเติม" rows="5"></textarea>
                            <button type="submit" class="btn btn-primary px-5 float-end mt-3 w-100 radius-50" onclick="getRating()">ประเมิน</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let maintain_id = '{{$maintain_noti->id}}';

    function getRating() {
        
        let rating_maintain = 0;
        let rating_operation = 0;
        let rating_impression = 0;

        const ratingGroups = document.querySelectorAll('.rating-group');
        const ratingRemark = document.getElementById('rating_remark').value; // ดึงค่าจาก textarea

        ratingGroups.forEach((group, index) => {
            const ratingInputs = group.querySelectorAll(`input[name="rating${index + 1}"]`);
            for (const input of ratingInputs) {
                if (input.checked) {
                    // แยกคะแนนตาม index เพื่อให้ตรงกับคอลัมน์ในฐานข้อมูล
                    if (index === 0) {
                        rating_maintain = input.value;
                    } else if (index === 1) {
                        rating_operation = input.value;
                    } else if (index === 2) {
                        rating_impression = input.value;
                    }
                    break;
                }
            }
        });

        let text_ratingRemark = ''; // ประกาศตัวแปรข้างนอก if-else

        if (ratingRemark) {
            text_ratingRemark = `<p class="mb-0">คำแนะนำติชม : ${ratingRemark}</p>`;
        }

        swal.fire({
            title: 'ยืนยันการประเมิน',
            html: `<p class="mb-0">คุณภาพงานซ่อมบำรุง : ${rating_maintain} คะแนน</p> <p class="mb-0">ความรวดเร็วในการดำเนินการ : ${rating_operation} คะแนน</p> <p class="mb-0">ความประทับใจ : ${rating_impression} คะแนน </p> ${text_ratingRemark}`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#7e7e7e',
            confirmButtonText: 'ยืนยัน'
        }).then((result) => {
            if (result.value) {

                fetch(`{{ url('/') }}/api/submit_rating_maintain`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // สำหรับป้องกัน CSRF
                    },
                    body: JSON.stringify({
                        maintain_id: maintain_id,
                        rating_maintain: rating_maintain,
                        rating_operation: rating_operation,
                        rating_impression: rating_impression,
                        rating_remark: ratingRemark // ส่งข้อมูลคำแนะนำเพิ่มเติม
                    })
                })
                .then(response => response.json())
                .then(result => {
                    // แสดงผลลัพธ์จาก API (ถ้ามี)
                    // console.log(result);
                    Swal.fire({
                        html: '<h3 class="text-success">บันทึกเสร็จสิ้น</h3>',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false,
                    }).then(() => {
                        // Redirect ไปยังหน้าที่ต้องการ
                        window.location="{{ url('/') }}/maintain_notis";

                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
                
                
               

            }
        })
        // ส่งข้อมูลไปยัง API ด้วย POST method
        

        // alert(`Ratings:\nMaintain: ${rating_maintain}, Operation: ${rating_operation}, Impression: ${rating_impression}, Remark: ${ratingRemark}`);
    }
</script>

@endsection