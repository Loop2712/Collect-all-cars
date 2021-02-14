<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                <label for="title" class="control-label">{{ 'หัวข้อข่าว / Title' }}</label><span style="color: #FF0033;"> *</span>
                <input class="form-control" name="title" type="text" id="title" value="{{ isset($news->title) ? $news->title : ''}}" required>
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
                <label for="location" class="control-label">{{ 'สถานที่ / Location' }}</label><span style="color: #FF0033;"> *</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-outline-danger btn-sm" onclick="getLocation()"><i class="fas fa-map-marker-alt"></i> ตำแหน่งของฉัน</span>
                <!-- <input class="form-control" name="location" type="text" id="location" value="{{ isset($news->location) ? $news->location : ''}}"  placeholder="กรุณาเปิดตำแหน่งที่ตั้งของท่าน" required> -->
                <select name="location" id="location" class="form-control" required>
                        <option value="" selected > - กรุณาเลือกตำแหน่งที่ตั้ง - </option>
                </select>
                {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                <label for="photo" class="control-label">{{ 'รูปภาพ / Photo' }}</label><span style="color: #FF0033;"> *</span>
                <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($news->photo) ? $news->photo : ''}}" required>
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
        </div>
        <div class="col-12 col-md-6">
            <label class="control-label">{{ 'เนื้อหาที่มีความรุนแรง' }}</label><span style="color: #FF0033;"> *</span><br>
            <input type="radio" name="severe" value="{{ isset($news->severe) ? $news->severe : 'Yes'}}" required>&nbsp;&nbsp; ใช่ &nbsp;&nbsp;&nbsp;

            <input type="radio" name="severe" value="{{ isset($news->severe) ? $news->severe : 'No'}}" required>&nbsp;&nbsp; ไม่ใช่
        </div>
    </div>
</div>
<br>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ยืนยัน' : 'ยืนยัน' }}">
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
                    let option = document.createElement("option");
                    option.text = item.tambon_th +" "+ item.amphoe_th +" "+ item.changwat_th
                    option.value = item.tambon_th +" "+ item.amphoe_th +" "+ item.changwat_th
                    location.add(option);                
                }
                
            });
}
</script>
