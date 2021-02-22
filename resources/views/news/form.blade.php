<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                <label for="title" class="control-label">{{ 'หัวข้อข่าว / Title' }}</label><span style="color: #FF0033;"> *</span> <span class="text-secondary"> (<span class="text-secondary" id="str_title">0</span>/30)</span> 
                <input class="form-control" name="title" type="text" id="title" value="{{ isset($news->title) ? $news->title : ''}}" required  onkeydown="str_title();">
                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                <label for="content" class="control-label">{{ 'เนื้อหา / Content' }}</label><span style="color: #FF0033;"> *</span>
                <input class="form-control" name="content" type="text" id="content" value="{{ isset($news->content) ? $news->content : ''}}" required>
                {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
                <label for="location" class="control-label">{{ 'สถานที่ / Location' }}</label><span style="color: #FF0033;"> *</span>&nbsp;&nbsp;&nbsp;<p class="btn btn-outline-danger btn-sm" onclick="getLocation();"><i class="fas fa-map-marker-alt"></i> ตำแหน่งของฉัน</p>
                <!-- <input class="form-control" name="location" type="text" id="location" value="{{ isset($news->location) ? $news->location : ''}}"  placeholder="กรุณาเปิดตำแหน่งที่ตั้งของท่าน" required> -->
                <select name="location" id="location" class="form-control" required>
                        <option value="" selected > - กรุณาเลือกตำแหน่งที่ตั้ง - </option>
                </select>
                {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                <label for="photo" class="control-label">{{ 'รูปภาพ / Photo' }}</label><span style="color: #FF0033;"> *</span>
                <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($news->photo) ? $news->photo : ''}}" required accept="image/*" multiple="multiple">
                {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
                <input class="form-control" name="lat" type="hidden" id="lat" value="{{ isset($news->lat) ? $news->lat : ''}}" readonly>
                {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
                <input class="form-control" name="lng" type="hidden" id="lng" value="{{ isset($news->lng) ? $news->lng : ''}}" readonly>
                {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
                <input class="form-control" name="province" type="hidden" id="province" value="{{ isset($news->province) ? $news->province : ''}}" readonly>
                {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                <input class="form-control" name="name" type="hidden" id="name" value="{{ isset($news->name) ? $news->name : Auth::user()->name}}" required readonly>
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ isset($news->user_id) ? $news->user_id : Auth::user()->id}}" required readonly>
                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
                <input class="form-control" name="active" type="hidden" id="active" value="{{ isset($news->active) ? $news->active : 'Yes'}}" required readonly>
                {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-12 col-md-6">
            <label class="control-label">{{ 'เนื้อหาที่มีความรุนแรง' }}</label><span style="color: #FF0033;"> *</span><br>
            <input type="radio" name="severe" value="{{ isset($news->severe) ? $news->severe : 'Yes'}}" required>&nbsp;&nbsp; ใช่ &nbsp;&nbsp;&nbsp;

            <input type="radio" name="severe" value="{{ isset($news->severe) ? $news->severe : 'No'}}" required>&nbsp;&nbsp; ไม่ใช่
        </div>
        <div class="col-12 col-md-6">
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(function () {
                    $("#photo").change(function () {
                        var dvPreview = $("#dvPreview");
                        dvPreview.html("");
                        $($(this)[0].files).each(function () {
                            var file = $(this);
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var divImagePreview = $("<div/>");
                                divImagePreview.attr("style", "display: flex; align-items: center;");

                                var hiddenRotation = $("<input type='hidden' id='hfRotation' value='0' />");
                                divImagePreview.append(hiddenRotation);

                                var btnLeft = $("<p style='z-index: 2' class='left'><i class='btn btn-danger btn-sm fas fa-undo'></i></p><span>&nbsp;&nbsp;</span>");
                                divImagePreview.append(btnLeft);

                                var img = $("<img />");
                                img.attr("style", "height: 65%; width: 65%; z-index: 0;");
                                img.attr("class", "preview");
                                img.attr("src", e.target.result);
                                divImagePreview.append(img);

                                var btnRight = $("<span>&nbsp;&nbsp;</span><p style='z-index: 2' class='right'><i class='btn btn-danger btn-sm fas fa-redo'></i></p>");
                                divImagePreview.append(btnRight);

                                dvPreview.append(divImagePreview);
                                dvPreview.append("<br/>");
                            }
                            reader.readAsDataURL(file[0]);
                        });
                    });
                    $('body').on('click', '.left,.right', function () {
                        var hfRotation = $(this).closest('div').find('[id*=hfRotation]');
                        var img = $(this).closest('div').find('.preview');
                        var rotation = parseInt($(hfRotation).val());

                        if ($(this).attr('class') == "left") {
                            rotation = (rotation - 90) % 360;
                            let rotation2 = document.querySelector("#rotation");
                            rotation2.value = rotation ;
                        } else if ($(this).attr('class') == "right") {
                            rotation = (rotation + 90) % 360;
                            let rotation2 = document.querySelector("#rotation");
                            rotation2.value = '*'+rotation ;
                        }
                        $(img).css({ 'transform': 'rotate(' + rotation + 'deg)' });
                        $(hfRotation).val(rotation);

                        // let rotation2 = document.querySelector("#rotation");
                        // rotation2.value = rotation ;
                    });
                });
            </script>
            <input class="form-control" name="rotation" type="hidden" id="rotation" value="{{ isset($news->rotation) ? $news->rotation : 0}}" readonly>
                {!! $errors->first('rotation', '<p class="help-block">:message</p>') !!}
            <br><br>
            <div id="dvPreview"></div>
        </div>
    </div>
</div>
<br>

<div class="form-group">
    <input id="submit" class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ยืนยัน' : 'ยืนยัน' }}">
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    console.log("START");
    getLocation();
});

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
    let lat = document.querySelector("#lat");
    let lng = document.querySelector("#lng");

        lat.value = position.coords.latitude ;
        lng.value = position.coords.longitude ;

        console.log(position.coords.latitude);
        console.log(position.coords.longitude);

        fetch("{{ url('/') }}/api/location/" + lat.value +"/"+lng.value+"/province")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                let location = document.querySelector("#location");
                    location.innerHTML = "";
                for(let item of result){
                    let province = document.querySelector("#province");
                    province.value = item.changwat_th
                    
                    let option = document.createElement("option");
                    option.text = item.tambon_th +" "+ item.amphoe_th +" "+ item.changwat_th
                    option.value = item.tambon_th +" "+ item.amphoe_th +" "+ item.changwat_th
                    location.add(option);                
                }
                
            });
}

function str_title() {
    var title = document.querySelector("#title");
    var str_title = document.querySelector("#str_title");
        console.log(title.value);

    let str = title.value
        console.log(str.length);

        str_title.innerHTML = (str.length + 1) ;

        if (str.length >= 30 ) {
            // alert("ขออภัย คุณใช้ตัวอักษรเกินกำหนด");
            document.querySelector('#str_title').classList.remove('text-secondary');
            document.querySelector('#str_title').classList.add('text-danger');
            document.querySelector('#submit').classList.add('d-none');
            document.querySelector('#title').focus();
        }else{
            document.querySelector('#str_title').classList.add('text-secondary');
            document.querySelector('#str_title').classList.remove('text-danger');
            document.querySelector('#submit').classList.remove('d-none');
        }

}

</script>
