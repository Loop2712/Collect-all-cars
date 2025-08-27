<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <!-- <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" /> -->
    <!-- loader-->
    <link href="{{ asset('partner_new/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('partner_new/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <link href="{{ asset('partner_new/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('partner_new/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Synadmin – Bootstrap5 Admin Template</title>
</head>
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .authentication-lock-screen {
        height: 100vh !important;
        padding: 0 1rem !important;
    }

    .btn-calling-officer {
        width: 70px !important;
        height: 70px !important;
        margin-top: 50px;
        border-radius: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        bottom: 5%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .owl-carousel .owl-item img {
      height: 40px;
      object-fit: contain;
    }
</style>

<body class="">
    <!-- wrapper -->
    <div class="wrapper d-flex justify-content-center align-items-center" style="height: 100dvh;">
        <div style="position: fixed;top: 0;width: 100%; height: 50px;background-color: #db2d2e;display: flex;align-items: center;padding-left: 15px; border-radius: 0 0 10px 10px;z-index: 10;">
            <img src="{{ asset('/img/logo/logo-flex-line.png') }}" alt="" height="40">
        </div>
        <div class="col-12 px-2 " >
            <div class="card h-100" style="border-radius: 15px;">
                <div class="row g-0">
                    <div class="col-12 border-end">
                        <div class="card-body">
                            <div class="p-3">
                                <div class="text-start">
                                    <img src="assets/images/logo-img.png" width="180" alt="">
                                </div>
                                <h4 class="mt-2 font-weight-bold"><b>ข้อมูลการช่วยเหลือ</b></h4>
                                <div class="d-flex align-items-center">
                                </div>
                                <div class="mt-4">
                                    <h6 class="mb-0 text-primary "><b>หน่วยงาน</b></h6>
                                    <div>อบต.เวียงท่ากาน อ.สันป่าตอง</div>
                                </div>

                                <div class="mt-4">
                                    <h6 class="mb-0 text-primary "><b>เจ้าหน้าที่</b></h6>
                                    <p class="mb-0">1.สมศักดิ์ รักดี</p>
                                    <p class="mb-0">2.สมศรี รักษา</p>
                                    <p class="mb-0">3.สมบูรณ์ รักษา</p>
                                </div>

                                <div class="mt-4">
                                    <h6 class="mb-0 text-primary "><b>ป้ายทะเบียนรถ</b></h6>
                                    <p class="mb-0">งข7292ชม</p>
                                </div>

                                <div class="mt-4">
                                    <h6 class="mb-0 text-primary "><b>เวลา</b></h6>
                                    <p class="mb-0">2024-06-01 07:06:00</p>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <a href="" class="btn btn-primary">ติดตามรถ</a>
                            </div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Launch demo modal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="position: fixed;bottom: 0;width: 100%; height: 60px;background-color: #6e6e6e;display: flex;align-items: center;padding-left: 15px;z-index: 10;">
            <div class="owl-carousel owl-theme owl-loaded owl-drag">

                <div class="owl-stage-outer">

                    <div class="owl-stage" style="transform: translate3d(-1527px, 0px, 0px); transition: all 0.25s ease 0s; width: 3334px;">
                        <div class="owl-item " style="">
                            <img src="{{ asset('/img/logo/logo-flex-line.png') }}" alt="">

                        </div>
                        <div class="owl-item " style="">
                            <img src="{{ asset('/img/logo/logo-flex-line.png') }}" alt="">

                        </div>
                        <div class="owl-item " style="">
                            <img src="{{ asset('/img/logo/logo-flex-line.png') }}" alt="">

                        </div>
                        <div class="owl-item " style="">
                            <img src="{{ asset('/img/logo/logo-flex-line.png') }}" alt="">

                        </div>

                        <div class="owl-item " style="">
                            <img src="{{ asset('/img/logo/logo-flex-line.png') }}" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content bg-lock-screen">
                <div class="modal-body p-0">
                    <div class="authentication-lock-screen d-flex align-items-center justify-content-center ">
                        <div class="card shadow-none bg-transparent">
                            <div class="card-body p-md-5 text-center">
                                <h2 class="text-white">ติดต่อเจ้าหน้าที่</h2>
                                <h5 class="text-white">กรุณาติดต่อเจ้าหน้าที่เพื่อสอบ-ถามข้อมูลเพิ่มเติมและติดตามสถานะ</h5>
                                <div class="">
                                    <img src="{{ url('/img/stickerline/PNG/27.png') }}" class="mt-5" width="120" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 justify-content-center d-flex">
                        <a href="" class="btn btn-success btn-calling-officer mt-3">
                            <i class="fa-sharp fa-solid fa-phone"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>

    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            dots: false,
            autoWidth:true,
            autoplayHoverPause: true
        });
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
    <!-- end wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>

</html>