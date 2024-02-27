<style>
    @media screen and (min-width: 1024px) {
        .icon_size {
            width: 100px;
        }
    }

    @media screen and (max-width: 1024px) {
        .icon_size {
            width: 50px;
        }
    }
</style>

<h4 class="text-dark p-1 font-weight-bold">ข้อมูลเจ้าหน้าที่ศูนย์สั่งการ</h4>
<hr>
<!--=============== 4 card row =====================-->


<div class="row row-cols-1 row-cols-lg-4">
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-blues">
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">เจ้าหน้าที่ศูนย์สั่งการ</h5>
                        <h3 class="mb-0 text-dark font-weight-bold" id="count_id_command"> คน</h3>
                    </div>
                    <div class="ms-auto text-dark">
                        <img class="icon_size" src="{{ asset('/img/stickerline/PNG/34.2.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-lush">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold" >พร้อมช่วยเหลือ</h5>
                        <h3 class="mb-0 text-dark font-weight-bold" id="count_count_Standby"> คน</h3>
                    </div>
                    <div class="ms-auto text-dark">
                        <img class="icon_size" src="{{ asset('/img/stickerline/PNG/38.1.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-kyoto">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">กำลังช่วยเหลือ</h5>
                        <h3 class="mb-0 text-dark font-weight-bold" id="count_count_Helping"> คน</h3>
                    </div>
                    <div class="ms-auto text-dark">
                        <img class="icon_size" src="{{ asset('/img/stickerline/PNG/23.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-burning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">ไม่พร้อม</h5>
                        <h3 class="mb-0 text-dark font-weight-bold" id="count_count_notReady"> คน</h3>
                    </div>
                    <div class="ms-auto text-dark">
                        <img class="icon_size" src="{{ asset('/img/stickerline/PNG/17.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!--======= รายชื่อเจ้าหน้าที่ศูนย์สั่งการ 5 ลำดับ ล่าสุด ============-->
    <div class="col-12 col-lg-12 mb-3">
        <div class="card radius-10 w-100 h-100">
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0">เจ้าหน้าที่ศูนย์สั่งการ <span id="count_news_officer"></span> ลำดับ ล่าสุด</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_1669_show') }}">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 pt-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="fz_header">
                            <tr>
                                <th>ชื่อ</th>
                                <th>เพศ</th>
                                <th>สถานะ</th>
                                <th>เป็นสมาชิกมาแล้ว</th>
                                <th>ผู้สร้าง</th>
                            </tr>
                        </thead>
                        <tbody id="teble_commmand_center" class="fz_body">
                          
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ใช้ CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/th.js"></script>


<script>
        document.addEventListener('DOMContentLoaded', (event) => {
            getdata_Index();
        })
     
        function getdata_Index() {
            let user_id = '{{Auth::user()->id}}';
            let teble_commmand_center = document.querySelector('#teble_commmand_center');
                teble_commmand_center.innerHTML = "";

            fetch("{{ url('/') }}/api/API_dashboard_index_1669?user_id=" + user_id)
            .then(response => response.json())
            .then(result => {
                //     console.log(result);

                // console.log('asd');

                let officerStandby = result.filter(item => item.status === "Standby").length;
                let officerHelping = result.filter(item => item.status === "Helping").length;
                let officerOffline = result.filter(item => item.status === "").length;
                let count_news_officer = 0;
                let officer_profile;
                let officer_status;
                let dateCreatedAt;
                document.querySelector('#count_id_command').innerHTML = result.length + " คน";
                document.querySelector('#count_count_Standby').innerHTML = officerStandby + " คน";
                document.querySelector('#count_count_Helping').innerHTML = officerHelping + " คน";
                document.querySelector('#count_count_notReady').innerHTML = officerOffline + " คน";

                for (let i = 0; i < result.length && i < 5; i++) {

                  
                    //รูป
                    if (result[i].user_avatar && !result[i].user_photo) {
                        officer_profile = `<img src="${result[i].user_avatar}">`;
                    }else if (result[i].user_photo){
                        officer_profile = `<img src="{{ url('storage') }}/${result[i].user_photo}">`;
                    } else {
                        officer_profile = ` <img src="{{ asset('/Medilab/img/icon.png') }}">`;
                    }
             
                    //สถานะ
                    if (result[i].status) {
                        switch (result[i].status) {
                            case 'Standby':
                                officer_status = `<span class="badge badge-pill bg-success">${result[i].status}</span>`;
                                break;
                            case 'Helping':
                                officer_status = `<span class="badge badge-pill bg-warning">${result[i].status}</span>`;
                                break;
                            default:
                                officer_status = `<span class="badge badge-pill bg-secondary"> ไม่อยู่ </span>`;
                                break;
                        }
                    } else {
                        officer_status = `<span class="badge badge-pill bg-secondary"> ไม่อยู่ </span>`;
                    }  
                    
                    //เป็นสมาชิกมาแล้ว
                    if (result[i].created_at) {
                        dateCreatedAt = moment(result[i].created_at);
                        dateMember = dateCreatedAt.locale("th").fromNow();
                    } else {
                        dateMember = "---";
                    }

                    // const element = result[i];
                    // console.log(result[i].id);

                    data_commmand_center = `
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                           ${officer_profile} 
                                        </div>
                                        <div class="ms-2 ">
                                            <span class="mt-3 font-14"> ${result[i].name_officer_command}</span>
                                        </div>
                                    </div>
                               </td>
                                <td>${result[i].user_gender ?  result[i].user_gender : "ไม่ระบุ"}</td>
                                <td>${officer_status}</td>
                                <td>${dateMember}</td>
                                <td>${result[i].name_creator ? result[i].name_creator : "Viicheck"}</td>
                            </tr>`;


                    teble_commmand_center.insertAdjacentHTML('beforeend', data_commmand_center); // แทรกบนสุด
                    count_news_officer += 1;
                }

                document.querySelector('#count_news_officer').innerHTML = count_news_officer;
        });

    }
</script>
