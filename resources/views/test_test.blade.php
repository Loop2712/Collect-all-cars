@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  @php
                    $student_id = 123456789 ;
                  @endphp
                  <a id="btn_login_line" href="https://www.viicheck.com/login/line/tu?Student=tu_{{ $student_id }}" 
                  class="btn btn-success" onclick="api_tu();"> login line TU</a> 
                </div>
            </div>
          </div>
    </div>
</div>

<script>
  
  function api_tu(){

      let data = {
          "name" : "ฐนกร",
          "last_name" : "ตุงคโสภา",
          "faculty" : "วิทยาศาสตร์และเทคโนโลยี",
          "department" : "วิทยาการคอมพิวเตอร์",
          "student_id" : "123456789",
      };

      fetch("https://www.viicheck.com/api/api_tu_greats", {
              method: 'post',
              body: JSON.stringify(data),
              headers: {
                  'Content-Type': 'application/json'
              }
          }).then(function (response){
              return response.text();
          }).then(function(text){
              console.log(text);
          }).catch(function(error){
              console.error(error);
          });
  }

</script>