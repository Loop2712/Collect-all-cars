<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'ชื่อหน่วยปฏิบัติการ' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($data_1669_operating_unit->name) ? $data_1669_operating_unit->name : ''}}" required="">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="mt-3 form-group {{ $errors->has('area') ? 'has-error' : ''}}">

    <!-- <label for="area" class="control-label">{{ 'Area' }}</label>
    <input class="form-control" name="area" type="text" id="area" value="{{ isset($data_1669_operating_unit->area) ? $data_1669_operating_unit->area : Auth::user()->sub_organization }}" readonly>
    {!! $errors->first('area', '<p class="help-block">:message</p>') !!} -->

    @if($sub_organization != "ศูนย์ใหญ่")
        <input class="form-control" type="text" name="area" id="area" value="{{ $sub_organization }}" readonly>
    @else
        <label  class="control-label" style="font-size:17px;"><b>เลือกพื้นที่</b> </label>
        <select class="form-control" name="area" id="area" required="">
            <option value="" selected>เลือกพื้นที่</option>
            @foreach($polygon_provinces as $item_op)
                <option value="{{ $item_op->province_name }}">{{ $item_op->province_name }}</option>
            @endforeach
        </select>
    @endif
</div>


<div class="form-group mt-3">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ยืนยัน' }}">
</div>
