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

    .img-group {
        display: flex;
        width: 100%;
        overflow-y: auto;
        gap: 5px;

    }

    .img-show img {
        max-width: 200px;
        transition: all .15s ease-in-out;

    }

    .img-group img {
        transition: all .15s ease-in-out;
        max-width: 80px;
        cursor: pointer;
        filter: blur(1px) grayscale(100%);
        -webkit-filter: blur(1px) grayscale(100%);
        -moz-filter: blur(1px) grayscale(100%);
        -o-filter: blur(1px) grayscale(100%);
        -ms-filter: blur(1px) grayscale(100%);
    }

    .img-group img.active {
        filter: none !important;
    } .radius-50{
        border-radius: 50px !important;
        color: #fff !important;
    }
</style>
<div class="container">
    <div class="pt-4">
        <div class="content">
            <div class="row p-3">
                <div class="px-3 py-1 col-12 mb-3">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body ">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">ลงทะเบียน</h5>
                            </div>
                            <hr>
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label for="name" class="form-label">ชื่อ-นามสกุล</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="phone" class="form-label">เบอร์</label>
                                    <input type="text" class="form-control" id="phone">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="position" class="form-label">ตำแหน่ง</label>
                                    <input type="text" class="form-control" id="position">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="" class="form-label">แผนก</label>
                                    <input type="text" class="form-control" id="">
                                </div>
                                <div class="col-12">
                                <button class="btn-submit btn btn-success px-5 float-end">
                                    ยืนยัน
                                </button>
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
