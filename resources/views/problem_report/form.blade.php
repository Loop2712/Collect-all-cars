<style>
    .problem-img {
        object-fit: contain;
    }

    .upload-container {
        text-align: center;
    }

    #imageInput {
        display: none;
    }

    .custom-input {
        display: inline-block;
        padding: 10px 20px;
        border: 2px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
        background-color: #f1f1f1;
        color: #333;
        font-weight: bold;
        width: 100%;
        font-size: 14px;
    }

    #previewImage {
        max-width: 300px;
        max-height: 300px;
        display: none;
        margin-top: 10px;
        object-fit: contain;
    }
</style>
<div class="container" style="margin-top: 50px;margin-bottom: 50px;">
    <div class="row">
        <div class="col-12 col-lg-12 mx-auto ">
            <div class="card">
                <div class="row g-0">
                <div class="col-lg-5  p-5">
                        <div class="text-start">
                            <img src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}" width="120" alt="">
                        </div>
                        <h4 class="mt-5 font-weight-bold">แจ้งปัญหาการใช้งาน</h4>
                        <p class="text-muted">ขออภัยสำหรับปัญหาที่เกิดขึ้น เราจะรีบแก้ไขโดยด่วน</p>
                        <div class="w-100 d-flex justify-content-center">
                            <img src="{{ asset('/img/stickerline/PNG/37.2.png') }}" class="problem-img w-75" alt="...">
                        </div>

                    </div>
                    <div class="col-lg-7 border-start">
                        <div class="card-body">
                            <div class="p-5 h-100">

                                <div class="mb-3">
                                    <label class="form-label">รูปภาพ</label>
                                    <div class="upload-container">
                                        <label for="imageInput" class="custom-input">Choose Image</label>
                                        <input type="file" name="image" id="imageInput" value="{{ isset($problem_report->image) ? $problem_report->image : ''}}" accept="image/*">
                                        <br>
                                        <div class="w-100 d-flex justify-content-center">
                                            <img id="previewImage" src="#" alt="Image preview">

                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">อธิบายเหตุการณ์ที่เกิดปัญหา</label>
                                    <textarea class="form-control" name="description" placeholder="กรอกรายละเอียด" rows="3" id="description" value="{{ isset($problem_report->description) ? $problem_report->description : ''}}"></textarea>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">แจ้งปัญหา</button>
                                    <a href="#" onclick="history.back()" class="btn btn-light"><i class="bx bx-arrow-back mr-1"></i>Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("imageInput").addEventListener("change", function() {
        var preview = document.getElementById("previewImage");
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = "block";
        };

        reader.readAsDataURL(file);
    });
</script>
<!-- <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="text" id="image" value="{{ isset($problem_report->image) ? $problem_report->image : ''}}">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div> -->
<!-- <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <input class="form-control" name="description" type="text" id="description" value="{{ isset($problem_report->description) ? $problem_report->description : ''}}">
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div> -->
<div class="d-none form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="รับแจ้ง">
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-none form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{Auth::user()->id}}">
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-none form-group {{ $errors->has('solution') ? 'has-error' : ''}}">
    <label for="solution" class="control-label">{{ 'Solution' }}</label>
    <input class="form-control" name="solution" type="text" id="solution" value="{{ isset($problem_report->solution) ? $problem_report->solution : ''}}">
    {!! $errors->first('solution', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-none form-group {{ $errors->has('remark') ? 'has-error' : ''}}">
    <label for="remark" class="control-label">{{ 'Remark' }}</label>
    <input class="form-control" name="remark" type="text" id="remark" value="{{ isset($problem_report->remark) ? $problem_report->remark : ''}}">
    {!! $errors->first('remark', '<p class="help-block">:message</p>') !!}
</div>

<!-- 
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div> -->