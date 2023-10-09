
{{-- <link href="{{ asset('css/video_call_4/video_call_4.css') }}" rel="stylesheet"> --}}
<link href="{{ asset('css/video_call_4/layout_video_call_4.css') }}" rel="stylesheet">

<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
<link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet">

{{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<link href="{{ asset('partner_new/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('partner_new/css/icons.css') }}" rel="stylesheet"> --}}


<style>
    html,
	body,
	{
		height: calc(100%);
		min-height: calc(100% ) !important;
		padding-bottom: 0;
		/* padding-top: 0; */
		/* margin-top: 0; */
		margin-bottom: 0;
	}



</style>


<div class="d-flex justify-content-center align-items-end h-100">
    <div class="container">
        <div class="btn btnSpecial" >
            <i class="fa-solid fa-microphone-stand"></i>
            <div class="smallCircle" id="droptrigger">
                <i class="fa-sharp fa-solid fa-angle-up"></i>
            </div>
        </div>
        <div class="dropcontent">
            <ul class="ui-list">
                <li class="ui-list-item">รายการ 1</li>
                <li class="ui-list-item">รายการ 2</li>
                <li class="ui-list-item">รายการ 3</li>
                <li class="ui-list-item">รายการ 4</li>
                <li class="ui-list-item">รายการ 5</li>
                <li class="ui-list-item">รายการ 6</li>
              </ul>
        </div>
    </div>
</div>










<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('Agora_Web_SDK_FULL/AgoraRTC_N-4.17.0.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

{{-- <script src="{{ asset('js/for_video_call_4/resize_div_video_call.js') }}"></script> --}}
<script src="{{ asset('js/for_video_call_4/video_call_4.js') }}"></script>


<script>
    // const microphoneButton = document.getElementById('microphone-button');
    // const menu = document.getElementById('menu');

    // microphoneButton.addEventListener('click', () => {
    //     menu.classList.toggle('hidden');
    // });

    // document.addEventListener('click', (event) => {
    //     if (event.target !== microphoneButton && event.target !== menu) {
    //         menu.classList.add('hidden');
    //     }
    // });



</script>
