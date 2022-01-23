<div class="col-12" id="">
    <video width="100%" height="100%" autoplay="true" id="videoElement"></video>
</div>


<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($check_in->user_id) ? $check_in->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_in') ? 'has-error' : ''}}">
    <label for="time_in" class="control-label">{{ 'Time In' }}</label>
    <input class="form-control" name="time_in" type="datetime-local" id="time_in" value="{{ isset($check_in->time_in) ? $check_in->time_in : ''}}" >
    {!! $errors->first('time_in', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_out') ? 'has-error' : ''}}">
    <label for="time_out" class="control-label">{{ 'Time Out' }}</label>
    <input class="form-control" name="time_out" type="datetime-local" id="time_out" value="{{ isset($check_in->time_out) ? $check_in->time_out : ''}}" >
    {!! $errors->first('time_out', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('check_in_at') ? 'has-error' : ''}}">
    <label for="check_in_at" class="control-label">{{ 'Check In At' }}</label>
    <input class="form-control" name="check_in_at" type="text" id="check_in_at" value="{{ isset($check_in->check_in_at) ? $check_in->check_in_at : ''}}" >
    {!! $errors->first('check_in_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
    <label for="student_id" class="control-label">{{ 'Student Id' }}</label>
    <input class="form-control" name="student_id" type="text" id="student_id" value="{{ isset($check_in->student_id) ? $check_in->student_id : ''}}" >
    {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

<script>

    requestAnimationFrame(tick);  // เริ่มตั้นทำงาน
    function tick(){
        // กำหนดคำสั่งตามต้องการ
        // คำสั่งส่วนนี้จะทำซ้ำ 60 ครั้งใน 1 วินาที
      requestAnimationFrame(tick);   // วนลูปเข้าไปทำคำสั่งซ้ำเรื่อยๆ 
    }

    var video = document.querySelector('#videoElement');

    if (navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true}) 
        // { video: true}
        // { video: { facingMode: { exact: "environment" } } }
        .then(function (stream) {
            if (typeof video.srcObject == "object") {
                video.srcObject = stream;
            } else {
                video.src = URL.createObjectURL(stream);
            }
        })
        .catch(function (err0r) {
            console.log("Something went wrong!");
        });
    }

    function tick() {
        loadingMessage.innerText = "⏳ Loading video..." // กำลังโหลดวิดีโอ

        if (video.readyState === video.HAVE_ENOUGH_DATA) { // ถ้าวิดีโอพร้อม
            // ซ่อนแสดง element ต่างๆ
            loadingMessage.hidden = true;
            canvasElement.hidden = false;
            outputContainer.hidden = false;
     
            // สร้าง canvas สำหรับวาดภาพหรือสร้างรูปภาพ กำหนดความกว้างความสูงเท่ากับ video
            canvasElement.height = video.videoHeight;
            canvasElement.width = video.videoWidth;
            // เอาภาพใน video เขียนลองใน canvas นั่นคือ รูปภาพจากวิดีโอถุูกวาดลง canvs ทุกๆ 60 ครั้งใน 1 วินาที
            // เป็นเหมือนการเกิด animation ขึ้นใน frame rate เท่ากับ 60
            canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
            // ดึงข้อมูลรูปภาพของ video ที่เขียนลง canvas มาใช้
            var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
            // แล้วเอาเข้าไปตรวจสอบหาค่า จาก qrcode ในรูปถ้ามี นั่นคือ ในขณะที่วิดีโอกำลังอยู่ภาพจะถูกส่งไปตรวจสอบ qrcode ตลอด
            // แล้วคืนค่ามาในตัวแปร code
            var code = jsQR(imageData.data, imageData.width, imageData.height, {
              inversionAttempts: "dontInvert",
            });

            if (code) {// ถ้ามีข้อมุล qrcode
                // ทำการวดรูปกรอบสี่เหลียม ตามตำแหน่ง qrcode ที่พบในรูปลงไปในรูปใน canvas ใช้ฟังก์ชั่น drawLine()
                drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
                drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
                drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
                drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
                // ซ่อน แสดงส่วน element ข้อมูล qrcode
                outputMessage.hidden = true;
                outputData.parentElement.hidden = false;
                 outputData.innerText = code.data;
            } else {
                // ถ้าไม่พบ qrcode หรือเอา qrcode ออกจาหน้ากล้อง กำหนดซ่อนแสดง ข้อความแจ้ง
                outputMessage.hidden = false;
                outputData.parentElement.hidden = true;
            }
        }
        requestAnimationFrame(tick); // วนลูปทำซ้ำ
    }

    function drawLine(begin, end, color) {
        canvas.beginPath();
        canvas.moveTo(begin.x, begin.y);
        canvas.lineTo(end.x, end.y);
        canvas.lineWidth = 4;
        canvas.strokeStyle = color;
        canvas.stroke();
    }
</script>
