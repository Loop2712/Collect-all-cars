<input class="d-none" type="text" id="CountryCode" name="" value="">

<!-- SOS ไทย -->
<div id="sos_th" class="row d-none">
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">เหตุด่วนเหตุร้าย</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="police_th();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 191</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">จ.ส.100</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="js100_th();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1137</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">หน่วยแพทย์กู้ชีวิต</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="life_saving_th();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1669</a>
    </div>
    <div class="col-6 ">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">ป่อเต็กตึ๊ง</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="pok_tek_tung_th();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1418</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">สายด่วนทางหลวง</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="highway_th();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1193</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">ทนายอาสา</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="lawyers_th();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1167</a>
    </div>
</div> 
<!-- จบ SOS ไทย -->

<!-- SOS ลาว -->
<div id="sos_lo" class="row d-none">
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">ตำรวจ</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="police_la();" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 191</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">รถพยาบาล</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 195</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">เพลิงไหม้</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 190</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">ตำรวจท่องเที่ยว</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 192</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">Electricity</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1199</a>
    </div>
    <div class="col-6">
        <p style="font-size:15px; text-align: center; margin-top:10px; ">Water</p>
        <a class="btn btn-danger btn-block shadow-box text-white" onclick="" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1169</a>
    </div>
</div> 
<!-- จบ SOS ลาว -->



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

                if (result['countryCode'] === 'TH') {
                    document.querySelector('#sos_th').classList.remove('d-none');
                }

                if (result['countryCode'] === 'LA') {
                    document.querySelector('#sos_lo').classList.remove('d-none');
                }


            });

    });

</script>