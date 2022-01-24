@extends('layouts.app')

@section('content')
<center>
  <div style="margin-top:-40px;" class="card">
    <div class="row">
        <div class="col-12">
            <br>
            <img  width="60%" src="{{ asset('/img/stickerline/PNG/15.png') }}">
            <br><br>
            
            @if($type == "CHECK IN")
              <h1 class="text-success notranslate"><b>{{ $type }}</b></h1>
            @endif
            @if($type == "CHECK OUT")
              <h1 class="text-danger notranslate"><b>{{ $type }}</b></h1>
            @endif

            <h4 class="text-info">{{ date("d/m/Y H:i" , strtotime($time)) }}</h4>

            <h4>คุณ : <b>{{ Auth::user()->name }}</b></h4>
            <p>ประวัติการเข้าออก {{ $check_in_at }}</p>
            @foreach($data_in_out as $item)
              @if(!empty($item->time_in))
                <b class="text-success">เข้า :</b> {{ date("d/m/Y H:i" , strtotime($item->time_in)) }}
                <br>
              @endif
              @if(!empty($item->time_out))
                <b class="text-danger">ออก :</b> {{ date("d/m/Y H:i" , strtotime($item->time_out)) }}
                <br>
              @endif
            @endforeach
            <br>
        </div>
    </div>
  </div>
</center>
<a id="btn_add_line" class="d-none" href="https://lin.ee/xnFKMfc">
  <img src="https://scdn.line-apps.com/n/line_add_friends/btn/th.png" alt="เพิ่มเพื่อน" width="100%" border="0">
</a>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START"); 
        setTimeout(function(){ 
          // document.getElementById("btn_add_line").click(); 
        }, 3500);
    });
</script>
@endsection