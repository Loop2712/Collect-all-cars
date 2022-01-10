<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="form-group {{ $errors->has('company') ? 'has-error' : ''}}">
                <label for="company" class="control-label"><b>{{ 'บริษัท' }}</b></label><span style="color: #FF0033;"> *</span>
                <input class="form-control" name="company" type="text" id="company" value="{{ isset($promotion->company) ? $promotion->company : ''}}" required>
                {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
                <label for="type" class="control-label"><b>{{ 'ประเภทโปรโมชั่น' }}</b></label><span style="color: #FF0033;"> *</span>
                <br>
                <input type="radio" id="type_car" name="type" onclick="document.querySelector('#type').value = 'car';" required> รถยนต์ 
                <br>
                <input type="radio" id="type_motorcycle" name="type" onclick="document.querySelector('#type').value = 'motorcycle';"> รถจักรยานยนต์
                <input class="form-control" name="type" type="hidden" id="type" value="{{ isset($promotion->type) ? $promotion->type : ''}}" >
                {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('titel') ? 'has-error' : ''}}">
                <label for="titel" class="control-label"><b>{{ 'หัวข้อโปรโมชั่น' }}</b></label><span style="color: #FF0033;"> *</span>
                <input class="form-control" name="titel" type="text" id="titel" value="{{ isset($promotion->titel) ? $promotion->titel : ''}}" required>
                {!! $errors->first('titel', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                <label for="photo" class="control-label"><b>{{ 'รูปภาพ' }}</b></label>
                <span style="color: #FF0033;"> *</span>                
                <input class="form-control" name="photo" type="text" id="photo" value="{{ isset($promotion->photo) ? $promotion->photo : ''}}" required>
                {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
                <label for="detail" class="control-label"><b>{{ 'รายละเอียด' }}</b></label>
                <textarea class="form-control" name="detail" type="text" id="detail" value="{{ isset($promotion->detail) ? $promotion->detail : ''}}" rows="5">
                </textarea>
                {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="form-group {{ $errors->has('time_period') ? 'has-error' : ''}}">
                        <label for="time_period" class="control-label"><b>{{ 'วันสิ้นสุดโปรโมชั่น' }}</b></label>
                        <input class="form-control" name="time_period" type="date" id="time_period" value="{{ isset($promotion->time_period) ? $promotion->time_period : ''}}">
                        {!! $errors->first('time_period', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-4">
                    <br>
                    <p style="margin-top:8px;" type="button" class="btn btn-success">วันนี้เป็นต้นไป</p>
                </div>
                </div>
            
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
            </div>
        </div>

        <!-- ---------------------------------------- -->
        <div class="col-6">
            <div class="row">
                @if(!empty($promotion))
                @foreach($promotion as $item)
                <div class="col-4">
                    <div class="card" style="">
                        <img src="https://e1.pngegg.com/pngimages/680/369/png-clipart-voiture-voiture-voiture-compacte-porte-de-voiture-vehicule-electrique-dessin-anime-dessin-jaune-transport.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div>
                                <h4 class="card-title">company</h4>
                                <p class="card-title"><b>titel</b></p>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <p class="card-text"><i class="far fa-clock"></i>&nbsp;time_period</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>


