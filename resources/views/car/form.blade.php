<div class="row">

    <div class="form-group col-lg-6">
        <label class="control-label">{{ 'ยี่ห้อ / Brand' }}</label>
        <input class="form-control form-control-sm" name="brand" type="text" value="{{ isset($data->brand) ? $data->brand : ''}}" >     
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'รุ่น / Model' }}</label>
        <input class="form-control form-control-sm" name="model" type="text" value="{{ isset($data->model) ? $data->model : ''}}" > 
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ ' รายละเอียดรุ่น / Version' }}</label>
        <input class="form-control form-control-sm" name="submodel" type="text" value="{{ isset($data->submodel) ? $data->submodel : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'ปี / Year' }}</label>
        <input class="form-control form-control-sm" name="year" type="number" value="{{ isset($data->year) ? $data->year : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'ขนาดเครื่องยนต์ / Engine Capacity' }}</label>
        <input class="form-control form-control-sm" name="motor" type="text" value="{{ isset($data->motor) ? $data->motor : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'ระบบเกียร์ / Gearbox  ' }}</label>
        <input class="form-control form-control-sm" name="gear" type="text" value="{{ isset($data->gear) ? $data->gear : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'จำนวนที่นั่ง / Capacity' }}</label>
        <input class="form-control form-control-sm" name="seats" type="number" value="{{ isset($data->seats) ? $data->seats : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'เลขไมล์ (กม.) / Mileage (km.) ' }}</label>
        <input class="form-control form-control-sm" name="distance" type="number" value="{{ isset($data->distance) ? $data->distance : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'สี / Body Color' }}</label>
        <input class="form-control form-control-sm" name="color" type="text" value="{{ isset($data->color) ? $data->color : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'รูปภาพ / Image' }}</label>
        <input class="form-control form-control-sm" name="image" type="file" value="{{ isset($data->image) ? $data->image : ''}}" >
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'ประเภทเชื้อเพลิง / Fuel Type' }}</label>
        <input class="form-control form-control-sm" name="fuel" type="text" value="{{ isset($data->fuel) ? $data->fuel : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'ราคา / Price' }}</label>
        <input class="form-control form-control-sm" name="price" type="text" value="{{ isset($data->price) ? $data->price : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'ประเภทรถ / Car Type ' }}</label>
        <input class="form-control form-control-sm" name="price" type="text" value="{{ isset($data->price) ? $data->price : ''}}" >    
    </div>
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($post->title) ? $post->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ isset($post->content) ? $post->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'Category' }}</label>
    <select name="category" class="form-control" id="category" >
    @foreach (json_decode('{technology: Technology, tips: Tips, health: Health}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($post->category) && $post->category == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
