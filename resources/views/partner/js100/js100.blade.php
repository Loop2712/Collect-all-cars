<div id="div_content_sos_js100" class="row text-center"> 
    <div class="col-3">
        <div style="margin-top: -10px;" >
            <h5 class="text-success float-left">
                <span style="font-size: 15px;">
                    <a target="bank" href="item->user_id">
                        <i class="far fa-eye text-primary"></i>
                    </a>
                </span>
                <span>&nbsp;{ $item->name }<br> </span>
            </h5>
            <span>{ $item->phone }</span>
        </div>
    </div>
    <div class="col-3">
        <div style="margin-top: -10px;">
            <p>
                <b>
                { date("d/m/Y" , strtotime($item->created_at)) } <br>
                { date("H:i" , strtotime($item->created_at)) }
                </b>
            </p>

            <br>
            <a href="{ url('storage')}/{ $item->photo }" target="bank">
                <img class="main-shadow" style="border-radius: 50%; object-fit:cover;" width="150px" height="150px" src="{ url('storage')}/{ $item->photo }">
            </a>
            <br><br>
        </div>
    </div>
    <div class="col-3">
    <div style="margin-top: -10px;">
            <a href="#" class="btn btn-sm btn-warning radius-30" ><i class="fadeIn animated bx bx-message-rounded-error"></i>ระหว่างดำเนินการ</a>
            <a href="#" class="btn btn-sm btn-danger radius-30" ><i class="fadeIn animated bx bx-x"></i>ยังไม่ได้ดำเนินการ</a>
        
            <a href="#" class="btn btn-sm btn-success radius-30" ><i class="bx bx-check-double"></i>ช่วยเหลือเสร็จสิ้น</a>
            
                <p style="margin-top:8px;"><b>
                {date("d/m/Y" , strtotime($item->help_complete_time)) } { date("H:i" , strtotime($item->help_complete_time)) }
                </b></p> 

            <a href="{ url('storage')}/{ $item->photo_succeed }" target="bank">
                <img class="main-shadow" style="border-radius: 50%; object-fit:cover;" width="150px" height="150px" src="{ url('storage')}/{ $item->photo_succeed }">
            </a>
            <br><br>
    </div>
    </div>
    <div class="col-2">
        ปี เดือน วัน
        <span>-</span>

    </div>
    <div class="col-1">
    <div style="margin-top: -10px;">
        <a id="tag_a_view_marker" class="link text-danger" href="#map" onclick="view_marker('{ $item->lat }' , '{ $item->lng }', '{ $item->id }', '{ $item->name_area }');">
            <i class="fas fa-map-marker-alt"></i> 
            <br>
            ดูหมุด
        </a>
    </div>
    </div>
    <br>
    <hr>
    <br><br>
</div>