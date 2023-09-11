
function btn_toggle_mic_camera(videoTrack,audioTrack){ // สำหรับ สร้างปุ่มที่ใช้ เปิด-ปิด กล้องและไมโครโฟน
    //============== เมนูปุ่มด้านล่าง ==============
    const divForVideoButton = document.createElement('div');
    divForVideoButton.classList.add('buttonVideo');

    const muteButton = document.createElement('button');
        muteButton.type = "button";
        muteButton.id = "muteAudio";
        muteButton.classList.add('btn-secondary','ms-2');
        muteButton.innerHTML = '<i class="fa-solid fa-microphone"></i>';

    divForVideoButton.appendChild(muteButton);

    //สร้างปุ่ม เปิด-ปิด วิดีโอ
    const muteVideoButton = document.createElement('button');
        muteVideoButton.type = "button";
        muteVideoButton.id = "muteVideo";
        muteVideoButton.classList.add('btn-secondary','ms-2');
        muteVideoButton.innerHTML = '<i class="fa-solid fa-video"></i>';

    divForVideoButton.appendChild(muteVideoButton);

    document.querySelector('#footer_div').appendChild(divForVideoButton);



    muteButton.onclick = async function() {
        if (isMuteAudio == true) {
            // Update the button text.
            document.getElementById(`muteAudio`).innerHTML = '<i class="fa-solid fa-microphone-slash"></i>';
            // Mute the local video.
            channelParameters.localAudioTrack.setEnabled(false);
            // muteButton.classList.add('btn-disabled');
            // muteButton.classList.remove('btn-primary');
            isMuteAudio = false;
        } else {
            // Update the button text.
            document.getElementById(`muteAudio`).innerHTML = '<i class="fa-solid fa-microphone"></i>';
            // Unmute the local video.
            channelParameters.localAudioTrack.setEnabled(true);
            // muteButton.classList.add('btn-primary');
            // muteButton.classList.remove('btn-disabled');
            isMuteAudio = true;
        }
    }

    muteVideoButton.onclick = async function() {
        if (isMuteVideo == true) {
            // Update the button text.
            document.getElementById(`muteVideo`).innerHTML = '<i class="fa-solid fa-video-slash"></i>';
            // Mute the local video.
            channelParameters.localVideoTrack.setEnabled(false);
            muteVideoButton.classList.add('btn-disabled');
            // muteVideoButton.classList.remove('btn-success');
            isMuteVideo = false;

        } else {
            // Update the button text.
            document.getElementById(`muteVideo`).innerHTML = '<i class="fa-solid fa-video"></i>';
            // Unmute the local video.
            channelParameters.localVideoTrack.setEnabled(true);
            // muteVideoButton.classList.add('btn-success');
            muteVideoButton.classList.remove('btn-disabled');
            isMuteVideo = true;

            if(document.querySelector('.imgdivLocal')){
                document.querySelector('.imgdivLocal').remove();
            }
        }
    }

}


function create_element_localvideo_call(localPlayerContainer) {
    // ใส่เนื้อหาใน divVideo ที่ถูกใช้โดยผู้ใช้
    if(document.getElementById('videoDiv_' + localPlayerContainer.id)) {
        document.getElementById('videoDiv_' + localPlayerContainer.id).remove();
    }

    const divVideo = document.createElement('div');
    divVideo.setAttribute('id','videoDiv_' + localPlayerContainer.id);
    divVideo.setAttribute('class','video-box');
    divVideo.setAttribute('style','background-color: black');

    divVideo.append(localPlayerContainer);
    document.querySelector('#divVideo_Parent').append(divVideo);

}

function create_element_remotevideo_call(remotePlayerContainer) {

    // if(document.getElementById('videoDiv_' + remotePlayerContainer.id)) {
    //     document.getElementById('videoDiv_' + remotePlayerContainer.id).remove();
    // }

    // // ใส่เนื้อหาใน divVideo ที่ถูกใช้โดยผู้ใช้
    // const divVideo = document.createElement('div');
    // divVideo.setAttribute('id','videoDiv_' + remotePlayerContainer.id);
    // divVideo.setAttribute('class','video-box');
    // divVideo.setAttribute('style','background-color: grey');

    // divVideo.append(remotePlayerContainer);

    // document.querySelector('#divVideo_Parent').append(divVideo);

    // const containerId = 'videoDiv_' + remotePlayerContainer.id;

    // // ตรวจสอบว่า div มีอยู่แล้วหรือไม่
    // if (document.getElementById(containerId)) {
    //     document.getElementById(containerId).remove();
    // }

    // // สร้าง div ใหม่
    // const divVideo = document.createElement('div');
    // divVideo.setAttribute('id', containerId);
    // divVideo.setAttribute('class', 'video-box');
    // divVideo.setAttribute('style', 'background-color: grey');

    // divVideo.append(remotePlayerContainer);

    // // เพิ่ม div ใหม่ลงใน div หลัก
    // document.querySelector('#divVideo_Parent').append(divVideo);
}

function create_dummy_videoTrack(user){
    if(user.uid){
        // ถ้ามี videoDiv อยู่แล้ว ลบอันเก่าก่อน
        if(document.getElementById('videoDiv_' + user.uid.toString())) {
            document.getElementById('videoDiv_' + user.uid.toString()).remove();
        }

        // ใส่เนื้อหาใน divVideo ที่ถูกใช้โดยผู้ใช้
        const divVideo = document.createElement('div');
        divVideo.setAttribute('id','videoDiv_' + user.uid.toString());
        divVideo.setAttribute('class','video-box');
        divVideo.setAttribute('style','background-color: black');

        document.querySelector('#divVideo_Parent').append(divVideo);

            // ถ้ามี videoDiv อยู่แล้ว ลบอันเก่าก่อน
        if(document.getElementById('dummy_trackRemoteDiv' + user.uid.toString())) {
            document.getElementById('dummy_trackRemoteDiv' + user.uid.toString()).remove();
        }

        //เพิ่มแท็กวิดีโอที่มีพื้นหลังแค่สีดำ
        // const remote_video_call = document.getElementById(user.uid.toString());
        closeVideoHTML  =
                        ' <div id="dummy_trackRemoteDiv'+ user.uid.toString() +'" style="width: 100%; height: 100%; position: relative; overflow: hidden; background-color: gray;">' +
                            '<video class="agora_video_player" playsinline="" muted="" style="width: 100%; height: 100%; position: absolute; left: 0px; top: 0px; object-fit: cover;"></video>' +
                        '</div>' ;

        divVideo.insertAdjacentHTML('beforeend',closeVideoHTML); // แทรกล่างสุด

        // divVideo.append(remote_video_call); // เพิ่มแท็กวิดีโอที่มีพื้นหลังแค่สีดำ เข้าไปใน div class="video-box"



    }else{
        console.log("------------------------------------------------------  หา user ไม่เจอ เลยขึ้น undifined ใน create_dummy_videoTrack()");
    }

}



