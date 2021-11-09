<input class="d-none" type="text" id="CountryCode" name="CountryCode" value="">

<div id="btn_tel"></div>

<!-- SOS ไทย -->
<div id="sos_TH" class="row d-none">
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">เหตุด่วนเหตุร้าย</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="save_sos_content('police','191');" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 191</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">จ.ส.100</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="save_sos_content('js100','1137');" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1137</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">หน่วยแพทย์กู้ชีวิต</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="save_sos_content('life_saving','1669');" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1669</a>
    </div>
    <div class="col-6 ">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">ป่อเต็กตึ๊ง</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="save_sos_content('pok_tek_tung','1418');" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1418</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">สายด่วนทางหลวง</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="save_sos_content('highway','1193');" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1193</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">ทนายอาสา</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="save_sos_content('lawyers','1167');" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1167</a>
    </div>
</div> 
<!-- จบ SOS ไทย -->

<!-- SOS ลาว -->
<div id="sos_LA" class="row d-none">
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">ตำรวจ</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="police_la();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 191</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">รถพยาบาล</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="ambulance_la();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 195</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">เพลิงไหม้</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="fire_la();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 190</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">ตำรวจท่องเที่ยว</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="tourist_police_la();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 192</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">Electricity</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="electricity_la();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1199</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">Water</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="water_la();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1169</a>
    </div>
</div> 
<!-- จบ SOS ลาว -->

<!-- SOS อินโดนีเซีย -->
<div id="sos_ID" class="row d-none">
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">Police</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="police_id();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 110</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">Ambulance</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="ambulance_id();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 119</a>
    </div>
</div> 
<!-- จบ SOS อินโดนีเซีย -->



<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        let user_id = document.querySelector('#user_id').value;

        fetch("{{ url('/') }}/api/check_sos_country/" + user_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let countryCode = document.querySelector('#CountryCode');
                    countryCode.value = result['countryCode'];

                if (result['countryCode']) {

                    if (result['countryCode'] !== 'TH') {
                    document.querySelector('#btn_quick_help').classList.add('d-none');
                    }

                    document.querySelector('#sos_'+result['countryCode']).classList.remove('d-none');
                }

            });

    });

    function save_sos_content(type_content,phone) {
        let text_phone = document.querySelector("#text_phone");
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");

        let content = document.querySelector("#content");
            content.value = type_content ;

        document.querySelector("#btn_submit").click();

        let btn_tel = document.querySelector('#btn_tel');

        let tag_a = document.createElement("tag_a");
            let tag_a_href = document.createAttribute("href");
            tag_a_href.value = 'tel:' + phone;
            tag_a.setAttributeNode(tag_a_href);

            btn_tel.appendChild(tag_a);

    }

</script>