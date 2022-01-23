<div class="col-12" id="">
    <video width="100%" height="100%" autoplay="true" id="videoElement"></video>
</div>

<!-- <canvas id="mycanvas"></canvas> -->
<p class="btn btn-warning" id="btnScan">Scan</p>

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


<script src="{{ asset('js/jsQR.js')}}"></script>

<script>
    DWTQR("videoElement");
    $("#btnScan").click(function(){
        dwStartScan();
    });
    function dwQRReader(data){
        alert(data);
    }

    var dwVDO, dwCanvasTag, dwVDOCanvas, QRhandle;

    function DWTQR(c){ //by DwThai.Com
        dwVDO = document.querySelector('#videoElement');
        dwCanvasTag=  document.getElementById(c);
        dwVDOCanvas = dwCanvasTag.getContext("2d");
    }

    function dwStartScan(){

        if (navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }) 
            // { video: true}
            // { video: { facingMode: { exact: "environment" } } }
            .then(function (stream) {
                if (typeof video.srcObject == "object") {
                    video.srcObject = stream;
                    dwVDO.srcObject = stream;
                    dwVDO.play();
                    QRhandle= requestAnimationFrame(dwQRScan);
                } else {
                    video.src = URL.createObjectURL(stream);
                }
            })
            .catch(function (err0r) {
                console.log("Something went wrong!");
            });
        }

            // navigator.mediaDevices.getUserMedia({video: { facingMode: "environment" } }).then(function(stream){
            //   dwVDO.srcObject = stream;
            //   dwVDO.play();
            //   QRhandle= requestAnimationFrame(dwQRScan);
            // });
    }

    function dwQRScan() {
          if(dwVDO.readyState === dwVDO.HAVE_ENOUGH_DATA) {
            dwVDOCanvas.drawImage(dwVDO, 0, 0, dwCanvasTag.width, dwCanvasTag.height);
           var imgData = dwVDOCanvas.getImageData(0, 0, dwCanvasTag.width, dwCanvasTag.height);
           var qrcode = jsQR(imgData.data, imgData.width, imgData.height);//Using jsQR
                    if(qrcode) {
                      var setBorder=qrcode.location;
                      borderCapture(setBorder.topLeftCorner, setBorder.topRightCorner);
                      borderCapture(setBorder.topRightCorner, setBorder.bottomRightCorner);
                      borderCapture(setBorder.bottomRightCorner, setBorder.bottomLeftCorner);
                      borderCapture(setBorder.bottomLeftCorner, setBorder.topLeftCorner);
                      var qrdata = qrcode.data;
                          if(qrdata!=""){
                              dwVDO.src=null;
                              dwQRReader(qrdata);
                              cancelAnimationFrame(QRhandle);
                              return;
                          }
                    }
          }
           QRhandle=requestAnimationFrame(dwQRScan);
    }

    function borderCapture(begin, end) {
          dwVDOCanvas.beginPath();
          dwVDOCanvas.moveTo(begin.x, begin.y);
          dwVDOCanvas.lineTo(end.x, end.y);
          dwVDOCanvas.lineWidth = 3;
          dwVDOCanvas.strokeStyle = "#0E0";
          dwVDOCanvas.stroke();
    }

    
</script>
