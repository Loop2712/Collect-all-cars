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

    .img-box {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .img-item {
        width: 75px;
        height: 75px;
        border-radius: 10px;
        border: rgb(14, 16, 17, .25) 1px solid;
        cursor: pointer;
        position: relative;
    }

    .icon-img-item {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 50px;
    }

    .show_password {
        position: absolute;
        top: 50%;
        right: 0%;
        transform: translate(-50%, -50%);
        cursor: pointer;
        transition: all .15s ease-in-out;
    }
</style>
<div class="container d-flex justify-content-center align-items-center" style="height: 100dvh;">
    <div class="content w-100" style="max-width: 550px;">
        <div class="row p-3">
            <div class="px-3 py-1 col-12">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body ">
                        <div class="card-title d-flex align-items-center">
                            <div>
                                <i class="fa-brands fa-line me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">กลุ่มไลน์ : name_group_line</h5>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="col-12" id="accept_set_group_line">
                                <h4 class="text-danger text-center my-5">
                                    ยืนยันการผูกกลุ่มไลน์นี้
                                    กับองค์กรของคุณหรือไม่
                                </h4>
                                <br>
                                <button class="btn btn-success  px-5 float-end" onclick="document.querySelector('#accept_set_group_line').classList.toggle('d-none');document.querySelector('#set_group_line').classList.toggle('d-none');">
                                    ยืนยัน
                                </button>
                            </div>

                            <div class="col-12 d-none" id="set_group_line">
                                <label for="name" class="form-label">Secret token</label>
                                <div style="position: relative;">
                                    <input type="password" class="form-control" id="password-field" placeholder="กรอก Secret token">
                                    <div class="show_password">
                                        <i class="fa-regular fa-eye me-1 font-22 text-secondary toggle-password" toggle="#password-field"></i>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-secondary  px-3 float-start" onclick="document.querySelector('#accept_set_group_line').classList.toggle('d-none');document.querySelector('#set_group_line').classList.toggle('d-none');">
                                    กลับ
                                </button>
                                <button class="btn btn-success  px-5 float-end">
                                    ยืนยัน
                                </button>
                            </div>
                        </div>
                        <!-- <div class="row g-3">
                                <div class="col-12">
                                    <label for="name" class="form-label">ชื่อ-นามสกุล</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">เบอร์</label>
                                    <input type="text" class="form-control" id="phone">
                                </div>
                                <div class="col-12">
                                    <label for="mail" class="form-label">อีเมล</label>
                                    <input type="email" class="form-control" id="mail">
                                </div>
                                <div class="col-6">
                                    <label for="position" class="form-label">ตำแหน่ง</label>
                                    <input type="text" class="form-control" id="position">
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">แผนก</label>
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.toggle-password').forEach(function(element) {
        element.addEventListener('click', function() {
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');

            var input = document.querySelector(this.getAttribute('toggle'));
            if (input.getAttribute('type') === 'password') {
                input.setAttribute('type', 'text');
            } else {
                input.setAttribute('type', 'password');
            }
        });
    });
</script>
@endsection