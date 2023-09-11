function toggleCamera() {
    if (statusCamera == "open") {
        statusCamera = "close"; //เซ็ต statusCamera เป็น close
        document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/video_call_4/before_video_call_4' . '/' ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&appId="+appId+"&appCertificate="+appCertificate+"&sos_id="+sos_id+"&consult_doctor_id="+consult_doctor_id);
        // ตรวจสอบว่ากล้องถูกเปิดหรือไม่
        navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(videoStream) {

            // ปิดกล้อง
            var videoElement = document.getElementById('videoDiv');
            var stramVideo = videoElement.srcObject;
            var videoTracks = stramVideo.getVideoTracks();

            // console.log(videoTracks);

            videoTracks[0].stop();
            document.querySelector('#toggleCameraButton').classList.add('background-Red');
            document.querySelector('#toggleCameraButton').innerHTML = '<i style="font-size: 25px;" class="fa-regular fa-camera-slash"></i>'
            // console.log('ปิดกล้อง');
        })

    }else{
        statusCamera = "open"; // เซ็ต statusCamera เป็น open
        document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/video_call_4/before_video_call_4' . '/' ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&appId="+appId+"&appCertificate="+appCertificate+"&sos_id="+sos_id+"&consult_doctor_id="+consult_doctor_id);
        // เปิดกล้อง
        navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(newVideoStream) {
            // ได้รับสตรีมวิดีโอใหม่สำเร็จ
            videoStream = newVideoStream;
            var videoElement = document.getElementById('videoDiv');
            videoElement.srcObject = videoStream;
            document.querySelector('#toggleCameraButton').classList.remove('background-Red');
            document.querySelector('#toggleCameraButton').innerHTML = '<i style="font-size: 25px;" class="fa-regular fa-camera"></i>'
            // console.log('เปิดกล้อง');

            // console.log(videoStream);
        })
        .catch(function(error) {
            // ไม่สามารถเข้าถึงกล้องได้ หรือผู้ใช้ไม่อนุญาต
            console.error('เกิดข้อผิดพลาดในการเข้าถึงกล้อง:', error);
        });
    }
    setTimeout(() => {
        console.log(statusCamera);


    }, 1000);

}
