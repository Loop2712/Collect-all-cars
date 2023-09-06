
function btn_toggle_mic_camera(){ // สำหรับ สร้างปุ่มที่ใช้ เปิด-ปิด กล้องและไมโครโฟน
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
            // Mute the local video.
            channelParameters.localAudioTrack.setEnabled(false);
            // Update the button text.
            document.getElementById(`muteAudio`).innerHTML = '<i class="fa-solid fa-microphone-slash"></i>';
            // muteButton.classList.add('btn-disabled');
            // muteButton.classList.remove('btn-primary');
            isMuteAudio = false;
        } else {
            // Unmute the local video.
            channelParameters.localAudioTrack.setEnabled(true);
            // Update the button text.
            document.getElementById(`muteAudio`).innerHTML = '<i class="fa-solid fa-microphone"></i>';
            // muteButton.classList.add('btn-primary');
            // muteButton.classList.remove('btn-disabled');
            isMuteAudio = true;
        }
    }

    muteVideoButton.onclick = async function() {
        if (isMuteVideo == true) {
            // Mute the local video.
            channelParameters.localVideoTrack.setEnabled(false);
            // Update the button text.
            document.getElementById(`muteVideo`).innerHTML = '<i class="fa-solid fa-video-slash"></i>';
            muteVideoButton.classList.add('btn-disabled');
            // muteVideoButton.classList.remove('btn-success');
            isMuteVideo = false;

        } else {
            // Unmute the local video.
            channelParameters.localVideoTrack.setEnabled(true);
            // Update the button text.
            document.getElementById(`muteVideo`).innerHTML = '<i class="fa-solid fa-video"></i>';
            // muteVideoButton.classList.add('btn-success');
            muteVideoButton.classList.remove('btn-disabled');
            isMuteVideo = true;

            if(document.querySelector('.imgdivLocal')){
                document.querySelector('.imgdivLocal').remove();
            }
        }
    }
}


function create_element_video_call(user_id ,PlayerContainer) {
    if (!userDivVideoMap[user_id]) {
        userDivVideoMap[user_id] = user_id;
        // ใส่เนื้อหาใน divVideo ที่ถูกใช้โดยผู้ใช้
        const divVideo = document.createElement('div');
        divVideo.setAttribute('id','videoDiv_' + PlayerContainer.id);
        divVideo.setAttribute('class','video-box');
        divVideo.setAttribute('style','background-color: rgb(224, 236, 116)');

        divVideo.append(PlayerContainer);
        document.querySelector('#divVideo_Parent').append(divVideo);
    } else {
        console.log('ผู้ใช้ ' + user_id + ' มีการใช้ divVideo ' + userDivVideoMap[user_id]);
    }
}


function create_dummy_videoTrack(user){

    if(document.getElementById('video_trackRemoteDiv')) {
        document.getElementById('video_trackRemoteDiv').remove();
    }

    //เพิ่มแท็กวิดีโอที่มีพื้นหลังแค่สีดำ
    let remote_video_call = document.getElementById(user.uid.toString());
        closeVideoHTML  =
                        ' <div id="dummy_trackRemoteDiv" style="width: 100%; height: 100%; position: relative; overflow: hidden; background-color: gray;">' +
                                '<video class="agora_video_player" playsinline="" muted="" style="width: 100%; height: 100%; position: absolute; left: 0px; top: 0px; object-fit: cover;"></video>' +
                            '</div>' ;
        remote_video_call.insertAdjacentHTML('beforeend', closeVideoHTML); // แทรกล่างสุด

}



