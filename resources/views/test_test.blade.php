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
                  <a id="btn_login_line" href="https://www.viicheck.com/login/line/tu_sos?Student=tu_{{ $student_id }}" 
                  class="btn btn-success" onclick="api_data_tu();"> SOS TU & ViiCHECK</a> 

                  <a href="https://www.viicheck.com/login/line/?Student=tu_{{ $student_id }}" 
                  class="btn btn-info" onclick="api_data_tu();"> REGISTER</a>

                  <a href="https://api.whatsapp.com/send?phone=0998823219&text=hello" class="btn btn-danger"> WhatsApp</a> 
                </div>
            </div>
          </div>
    </div>
</div>

<script>
  
  function api_data_tu(){

      let data = {
          "name" : "ฐนกร",
          "last_name" : "ตุงคโสภา",
          "faculty" : "วิทยาศาสตร์และเทคโนโลยี",
          "department" : "วิทยาการคอมพิวเตอร์",
          "student_id" : "123456789",
          "phone" : "0999999999",
      };

      fetch("https://www.viicheck.com/api/api_data_tu_greats", {
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