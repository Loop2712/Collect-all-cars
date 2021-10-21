<br>
<div class="container" style="font-family: 'Prompt', sans-serif;display: flex;">
    <div class="card-deck text-center col-md-12">
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-body" >
                    <h5 class="card-title">ชื่อบริษัทประกัน</h5>
                    <input class="form-control" name="company" type="text" id="company" value="{{ isset($insurance->company) ? $insurance->company : ''}}" >
    {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-body" >
                    <h5 class="card-title">เบอร์แจ้งอุบัติเหตุ</h5>
                    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($insurance->phone) ? $insurance->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-body" >
                    <h5 class="card-title">สถานะพาร์ทเนอร์</h5>
                    <input type="radio" id="radio_Yes" name="radio_status_partner" onclick="document.querySelector('#status_partner').value = 'Yes';">
                    <label for="radio_Yes">เป็น</label>
                    &nbsp;
                    <input type="radio" id="radio_No" name="radio_status_partner" onclick="document.querySelector('#status_partner').value = 'No';">
                    <label for="radio_No">ไม่เป็น</label>
                

                    <input class="form-control" name="status_partner" type="hidden" id="status_partner" value="{{ isset($insurance->status_partner) ? $insurance->status_partner : ''}}" >
                    {!! $errors->first('status_partner', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        
    </div>
</div> 
<!-- <div class="form-group {{ $errors->has('company') ? 'has-error' : ''}}">
    <label for="company" class="control-label">{{ 'ชื่อบริษัทประกัน' }}</label>
    <input class="form-control" name="company" type="text" id="company" value="{{ isset($insurance->company) ? $insurance->company : ''}}" >
    {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'เบอร์แจ้งอุบัติเหตุ' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($insurance->phone) ? $insurance->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('status_partner') ? 'has-error' : ''}}">
    <label for="status_partner" class="control-label">{{ 'สถานะพาร์ทเนอร์' }}</label>

    <br>
    <input type="radio" id="radio_Yes" name="radio_status_partner" onclick="document.querySelector('#status_partner').value = 'Yes';">
    <label for="radio_Yes">Yes</label>
    <br>
    <input type="radio" id="radio_No" name="radio_status_partner" onclick="document.querySelector('#status_partner').value = 'No';">
    <label for="radio_No">No</label>
    <br>

    <input class="form-control" name="status_partner" type="hidden" id="status_partner" value="{{ isset($insurance->status_partner) ? $insurance->status_partner : ''}}" >
    {!! $errors->first('status_partner', '<p class="help-block">:message</p>') !!}
</div> -->


<div class="form-group d-flex justify-content-end">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Save' : 'Save' }}">
</div>
