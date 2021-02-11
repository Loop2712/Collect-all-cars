<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($news->title) ? $news->title : ''}}" onchange="getLocation()">
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <input class="form-control" name="content" type="text" id="content" value="{{ isset($news->content) ? $news->content : ''}}" onchange="getLocation()" >
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="control-label">{{ 'Location' }}</label>
    <input class="form-control" name="location" type="text" id="location" value="{{ isset($news->location) ? $news->location : ''}}" readonly placeholder="กรุณาเปิดตำแหน่งที่ตั้งของท่าน" required>
    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($news->photo) ? $news->photo : ''}}" >
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<input type="text" name="lat" id="lat" readonly>
<input type="text" name="lat" id="long" readonly>
<br><br>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

<p id="demo"></p>

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
    let long = document.querySelector("#long");
    let location = document.querySelector("#location");

        lat.value = position.coords.latitude ;
        long.value = position.coords.longitude ;
        location.value = position.coords.longitude ;

        console.log(position.coords.latitude);
        console.log(position.coords.longitude);

        fetch("{{ url('/') }}/api/car_brand")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                
                
            });
            return input_car_brand.value;
}

</script>
