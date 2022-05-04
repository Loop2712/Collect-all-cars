
<div id="div_organization" class="">
    <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลองค์กร' }}</span><span style="color: #FF0033;"> *<br><br></span>

    @if(empty($organization))
        <div class="row" id="div_selest_name_partner">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <select name="name_partner" id="name_partner" class="form-control notranslate" onchange="input_data_partner();">
                            <option value="" selected > - กรุณาเลือกองค์กร - </option> 
                            @if(!empty($all_partners))
                                @foreach($all_partners as $all_partner)
                                    <option
                                    value="{{ $all_partner->name }}" 
                                    {{ request('name') == $all_partner->name ? 'selected' : ''   }} >
                                    {{ $all_partner->full_name }} 
                                    </option>
                                @endforeach
                            @endif
                    </select>
                </div>
            </div>
        </div>

        <div id="data_organization" class="d-none">
            <div class="row">
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'ชื่อองค์กร' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'อีเมล' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'เบอร์โทรศัพท์' }}</label><span style="color: #FF0033;"> *</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('juristicNameTH') ? 'has-error' : ''}}">
                        <input class="form-control" name="juristicNameTH" type="text" id="juristicNameTH" value=""  placeholder="ชื่อองค์กร" readonly>
                        {!! $errors->first('juristicNameTH', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input class="form-control" name="organization_mail" type="email" id="organization_mail" value=""   placeholder="อีเมล" readonly>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input class="form-control" name="phone_2" type="phone_2" id="phone_2" value=""  placeholder="กรุณาใส่เบอร์ติดต่อ" pattern="[0-9]{9-10}" readonly>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(!empty($organization))
        <div id="not_empty_data_organization" >
            <div class="row">
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'ชื่อองค์กร' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'อีเมล' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'เบอร์โทรศัพท์' }}</label><span style="color: #FF0033;"> *</span>
                </div>
            </div>
            
            <div class="row">
                @foreach($data_partners as $item)
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('juristicNameTH') ? 'has-error' : ''}}">
                        <input class="form-control" name="juristicNameTH" type="text" id="juristicNameTH" value="{{ $item->name }}"  placeholder="ชื่อองค์กร" readonly>
                        {!! $errors->first('juristicNameTH', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input class="form-control" name="organization_mail" type="email" id="organization_mail" value="{{ $item->mail }}"   placeholder="อีเมล" readonly>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input class="form-control" name="phone_2" type="phone_2" id="phone_2" value="{{ $item->phone }}"  placeholder="กรุณาใส่เบอร์ติดต่อ" pattern="[0-9]{9-10}" readonly>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif



<hr>
</div>

<script>
    function input_data_partner(){

        let name_partner = document.querySelector('#name_partner');

        let juristicNameTH = document.querySelector('#juristicNameTH');
        let organization_mail = document.querySelector('#organization_mail');
        let phone_2 = document.querySelector('#phone_2');


        fetch("{{ url('/') }}/api/input_data_partner/"+name_partner.value)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                juristicNameTH.value = result[0]['name'];
                organization_mail.value = result[0]['mail'];
                phone_2.value = result[0]['phone'];
            });

        document.querySelector('#data_organization').classList.remove('d-none');
    }

</script>
