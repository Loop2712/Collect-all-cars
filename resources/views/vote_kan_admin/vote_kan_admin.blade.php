@extends('layouts.viicheck_for_vote_kan')

<style>
    #all_dashboard{
        text-align: justify;
        font-family: 'Mitr', sans-serif !important;
        /* font-family: 'Taviraj', serif; */
    }
</style>

@section('content')

<div id="all_dashboard" class="p-2">
    <h3 class="text-dark font-weight-bold">แสดงผลคะแนน</h3>
    <div id="show_score" class="mb-3 " >
        @include ('vote_kan_admin.show_score')
    </div>

</div>


{{-- <script src="https://unpkg.com/modern-screenshot"></script>
<script>
    function SaveImageGlobal(id_div) {
        setTimeout(() => {
            const targetElement = document.querySelector('#'+id_div);
            targetElement.style.backgroundColor = 'white';

            modernScreenshot.domToPng(targetElement).then(dataUrl => {
                const link = document.createElement('a')
                link.download = 'screenshot.png'
                link.href = dataUrl
                link.click()
            })
        }, 500);
    }
</script> --}}



@endsection
