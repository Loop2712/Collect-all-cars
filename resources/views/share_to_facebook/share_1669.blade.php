@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br>

<head>
	<title>วีเช็ค ร่วมกับ สพฉ.(1669)</title>

	<meta property="og:url"           content="https://page.line.me/702ytkls" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="วีเช็ค ร่วมกับ สพฉ.(1669)" />
	<meta property="og:description"   content="ให้การขอความช่วยเหลือเป็นเรื่องง่าย เพียงกดปุ่ม SOS.." />
	<meta property="og:image"         content="https://www.viicheck.com/img/poster/1669_share_facebook.png" />
</head>

<a class="d-none" id="btn_addline" href="https://lin.ee/xnFKMfc">
    <button type="button" class="btn btn-success"></button>
</a>
<img class="d-none" width="100%" src="https://www.viicheck.com/img/poster/1669_share_facebook.png">
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START"); 
        document.getElementById("btn_addline").click();

    });
</script>

@endsection