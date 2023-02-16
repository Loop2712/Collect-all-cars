@extends('layouts.admin')

@section('content')
    <form method="GET" action="{{ url('/send_mail_proposal/') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}
      <div class="container-fluid mt-3">
        <div class="card col-12">
            <div class="row">
              <div class="col-12 mt-3">
                  <span class="btn btn-primary float-start" style="width:20%;" onclick="add_mail();">
                    เพิ่มเมลที่จะส่ง
                  </span>
              </div>
              <hr>
            </div>
            <br>
            <div id="div_add_email" class="row">
                <div class="col-3">
                  <div class="form-group">
                      <label for="title" class="control-label">Title 1</label>
                      <input class="form-control" type="text" name="title_1"  id="title_1" value="" >
                  </div>
                  <div class="form-group">
                      <label for="title" class="control-label">E-mail 1</label>
                      <input class="form-control" type="email" name="mail_1"  id="mail_1" value="" >
                  </div>
                </div>
            </div>
        </div>
      </div>
      <div class="form-group">
          <input class="btn btn-primary" type="submit">
      </div>
    </form>

    <script>
      

      var mail_count = 1 ;

      function add_mail(){
        
        mail_count = mail_count + 1 ;

        let div_add_email = document.querySelector('#div_add_email');
        let text_html ;

        let div_col_3 = document.createElement("div");
        let id = document.createAttribute("id");
            id.value = "div_mail_" + mail_count;

        div_col_3.setAttributeNode(id); 
        div_add_email.appendChild(div_col_3);  

        text_html =
              '<div class="form-group">'+
                  '<label for="title" class="control-label">Title '+mail_count+'</label>'+
                  '<input class="form-control" type="text" name="title_'+mail_count+'"  id="title_'+mail_count+'" value="" >'+
              '</div>'+
            '<div class="form-group">'+
                '<label for="title" class="control-label">E-mail '+mail_count+'</label>'+
                '<input class="form-control" type="email" name="mail_'+mail_count+'"  id="mail_'+mail_count+'" value="" >'+
            '</div>';

        document.querySelector('#div_mail_' + mail_count).innerHTML = text_html ;
      }

    </script>

@endsection
