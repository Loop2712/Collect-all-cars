@extends('layouts.admin')

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">สร้างบัญชีผู้ใช้ / <span style="font-size: 18px;">Create an account</span></h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div id="card-body" class="card-body">
                                <p>กรุณาเลือกพาร์ทเนอร์ / Please select a partner</p>

                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button id="btn_modal_confirm_create" class="btn d-none" data-toggle="modal" data-target="#exampleModal">
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header d-none">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <center>
                                    <img width="50%" src="{{ asset('/img/stickerline/PNG/7.png') }}">
                                    <br><br>
                                    <h5 class="text-danger">ยืนยันการสร้างสมาชิก</h5>
                                    <h4 id="modal_name_partner" class="text-primary"></h4>
                                </center>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                <a id="btn_modal" class="btn btn-primary text-white">ยืนยัน</a>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // console.log("START");

            fetch("{{ url('/') }}/api/all_partners")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    show_all_organization(result);
                });
        });

        function random_item(items)
        {
            return items[Math.floor(Math.random()*items.length)];
        }

        function show_all_organization(result){

            let btn_color = ['primary text-white','secondary text-white','success text-white','danger text-white','warning text-white','info text-white','outline-primary text-primary','outline-secondary text-secondary','outline-success text-success','outline-danger text-danger','outline-warning text-warning','outline-info text-info'];

             for (let i = 0; i < result.length; i++) {

                    // console.log(result[i]);

                let card_body = document.querySelector('#card-body');

                let tag_a = document.createElement("a");
                    tag_a.innerHTML = result[i]['name'] ;

                let a_class = document.createAttribute("class");
                    a_class.value = "btn btn-" + random_item(btn_color);

                let a_onclick = document.createAttribute("onclick");
                    a_onclick.value = "confirm_create('" + result[i]['name'] + "')";
                  
                tag_a.setAttributeNode(a_class); 
                tag_a.setAttributeNode(a_onclick); 

                card_body.appendChild(tag_a);
             }

        }

        function confirm_create(name)
        {
            document.querySelector('#btn_modal_confirm_create').click();

            let btn_modal = document.querySelector('#btn_modal');

            let a_href = document.createAttribute("href");
                a_href.value = "{{ url('/create_user') }}?partners=" + name;

            btn_modal.setAttributeNode(a_href); 

            let modal_name_partner = document.querySelector('#modal_name_partner');
                modal_name_partner.innerHTML = name;
        }
    </script>

@endsection
