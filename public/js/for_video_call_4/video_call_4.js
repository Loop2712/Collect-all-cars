
function btn_toggle_mic_camera(){ // สำหรับ สร้างปุ่มที่ใช้ เปิด-ปิด กล้องและไมโครโฟน

    const divForVideoButton = document.querySelector('#divForVideoButton');

    const muteButton = document.createElement('button');
        muteButton.type = "button";
        muteButton.id = "muteAudio";
        muteButton.classList.add('btn','btn-secondary','mr-1');
        muteButton.innerHTML = '<i class="fa-solid fa-microphone"></i>';

    divForVideoButton.appendChild(muteButton);

    //สร้างปุ่ม เปิด-ปิด วิดีโอ
    const muteVideoButton = document.createElement('button');
        muteVideoButton.type = "button";
        muteVideoButton.id = "muteVideo";
        muteVideoButton.classList.add('btn','btn-secondary','ms-1');
        muteVideoButton.innerHTML = '<i class="fa-solid fa-video"></i>';

    divForVideoButton.appendChild(muteVideoButton);

    // document.querySelector('#footer_div').appendChild(divForVideoButton);

    muteButton.onclick = async function() {
        if (isAudio == true) {
            // Update the button text.
            document.getElementById(`muteAudio`).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #f00505; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
            // Mute the local video.
            channelParameters.localAudioTrack.setEnabled(false);

            // เปลี่ยน icon microphone ให้เป็นปิด ใน divVideo_
            document.getElementById(`mic_local`).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #f00505; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';

            isAudio = false;

        } else {
            // Update the button text.
            document.getElementById(`muteAudio`).innerHTML = '<i class="fa-solid fa-microphone"></i>';
            // Unmute the local video.
            channelParameters.localAudioTrack.setEnabled(true);
            channelParameters.localAudioTrack.play();
            // เปลี่ยน icon microphone ให้เป็นเปิด ใน divVideo_
            document.getElementById(`mic_local`).innerHTML = '<i class="fa-solid fa-microphone"></i>';

            isAudio = true;
        }
    }

    muteVideoButton.onclick = async function() {
        if (isVideo == true) {
            // Update the button text.
            document.getElementById(`muteVideo`).innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
            // Mute the local video.
            channelParameters.localVideoTrack.setEnabled(false);
            muteVideoButton.classList.add('btn-disabled');
            // เปลี่ยน icon camera ให้เป็นปิด ใน divVideo_
            document.getElementById(`camera_local`).innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';

            // ซ่อนโปรไฟล์ ตอนเปิดกล้อง
            document.querySelector('.profile-input-output').classList.remove('d-none');

            isVideo = false;

        } else {
            // Update the button text.
            document.getElementById(`muteVideo`).innerHTML = '<i class="fa-solid fa-video"></i>';
            // Unmute the local video.
            channelParameters.localVideoTrack.setEnabled(true);
            // muteVideoButton.classList.add('btn-success');
            muteVideoButton.classList.remove('btn-disabled');

            // เปลี่ยน icon camera ให้เป็นเปิด ใน divVideo_
            document.getElementById(`camera_local`).innerHTML = '<i class="fa-solid fa-video"></i>';

            // ซ่อนโปรไฟล์ ตอนเปิดกล้อง
            document.querySelector('.profile-input-output').classList.add('d-none');

            isVideo = true;

            if(document.querySelector('.imgdivLocal')){
                document.querySelector('.imgdivLocal').remove();
            }
        }
    }

}

// สำหรับ Div ต่างๆของ Local
function create_element_localvideo_call(localPlayerContainer,name_local,profile_local) {
    if(localPlayerContainer.id){
        // ใส่เนื้อหาใน divVideo ที่ถูกใช้โดยผู้ใช้
        if(document.getElementById('videoDiv_' + localPlayerContainer.id)) {
            var divVideo = document.getElementById('videoDiv_' + localPlayerContainer.id);
        }else{
            var divVideo = document.createElement('div');
            divVideo.setAttribute('id','videoDiv_' + localPlayerContainer.id);
            divVideo.setAttribute('class','custom-div');
            divVideo.setAttribute('style','background-color: black');
        }

        //======= สร้างปุ่มสถานะ && รูปโปรไฟล์ ==========

        // สร้างแท็ก <img> สำหรับรูปโปรไฟล์
        let ProfileInputOutputDiv = document.createElement("div");
            ProfileInputOutputDiv.className = "profile-input-output";
            ProfileInputOutputDiv.setAttribute('style','z-index: 1; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);');

        let profileImage = document.createElement('img');
            profileImage.setAttribute('src', profile_local); // เปลี่ยน 'ลิงก์รูปโปรไฟล์' เป็น URL ของรูปโปรไฟล์ของผู้ใช้
            profileImage.setAttribute('alt', 'โปรไฟล์');
            // profileImage.setAttribute('style', 'border-radius: 50%; width: 100px; height: 100px; max-width: 100%; max-height: 30%;');
            profileImage.setAttribute('class', 'profile_image');


        ProfileInputOutputDiv.appendChild(profileImage);

        // เพิ่มแท็ก แสดงเสียงไมค์เวลาพูด
        let statusMicrophoneOutput = document.createElement("div");
        statusMicrophoneOutput.id = "statusMicrophoneOutput_local";
        statusMicrophoneOutput.className = "status-sound-output d-none";
        statusMicrophoneOutput.setAttribute('style','z-index: 1;');

        let soundDiv = document.createElement("div");
            soundDiv.id = "sound_local";
            soundDiv.className = "sound";
            soundDiv.innerHTML = '<i class="fa-sharp fa-solid fa-volume fa-beat-fade" style="color: #ffffff;"></i>';

        statusMicrophoneOutput.appendChild(soundDiv);

        // เพิ่มแท็ก ไมค์และกล้อง

        let statusInputOutputDiv = document.createElement("div");
            statusInputOutputDiv.className = "status-input-output";
            statusInputOutputDiv.setAttribute('style','z-index: 1;');

        let micDiv = document.createElement("div");
            micDiv.id = "mic_local";
            micDiv.className = "mic";
            micDiv.innerHTML = '<i class="fa-solid fa-microphone"></i>';

        let cameraDiv = document.createElement("div");
            cameraDiv.id = "camera_local";
            cameraDiv.className = "camera";
            cameraDiv.innerHTML = '<i class="fa-solid fa-video"></i>';

        statusInputOutputDiv.appendChild(micDiv);
        statusInputOutputDiv.appendChild(cameraDiv);

        // เพิ่มแท็ก ชื่อและสถานะ

        let infomationUserDiv = document.createElement("div");
            infomationUserDiv.id = "infomation-user-local";
            infomationUserDiv.className = "infomation-user";
            infomationUserDiv.setAttribute('style','z-index: 1;');

        let nameUserVideoCallDiv = document.createElement("div");
            nameUserVideoCallDiv.id = "name_local_video_call";
            nameUserVideoCallDiv.className = "name-user-video-call";
            nameUserVideoCallDiv.innerHTML = '<h5 class="m-0 text-white float-end"><b>'+ name_local +'</b></h5>';

        let roleUserVideoCallDiv = document.createElement("div");
            roleUserVideoCallDiv.id = "role_local_video_call";
            roleUserVideoCallDiv.className = "role-user-video-call";
            roleUserVideoCallDiv.innerHTML = '<small class="d-block">ชื่อหน่วย</small>';

        infomationUserDiv.appendChild(nameUserVideoCallDiv);
        infomationUserDiv.appendChild(roleUserVideoCallDiv);

        // สร้าง div โปร่งใส
        let transparentDiv = document.createElement("div");
        transparentDiv.classList.add("transparent-div"); // เพิ่มคลาส CSS

        // เพิ่ม div ด้านในลงใน div หลัก
        divVideo.appendChild(ProfileInputOutputDiv);
        divVideo.appendChild(statusMicrophoneOutput);
        divVideo.appendChild(statusInputOutputDiv);
        divVideo.appendChild(infomationUserDiv);
        divVideo.appendChild(transparentDiv);
        //======= จบการ สร้างปุ่มสถานะ ==========

        // เพิ่ม div หลักลงใน div รวม
        divVideo.append(localPlayerContainer);

        let container_user_video_call = document.querySelector("#container_user_video_call");
        container_user_video_call.append(divVideo);

        divVideo.addEventListener("click", function() {
            handleClick(divVideo);
        });

        transparentDiv.addEventListener("click", function() {
            let id_agora_create = localPlayerContainer.id;
            console.log(id_agora_create);
            let clickvideoDiv = document.querySelector('#videoDiv_'+id_agora_create);
            clickvideoDiv.click();

            let userVideoCallBar = document.querySelector(".user-video-call-bar");
            let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

            if (customDivsInUserVideoCallBar.length > 0) {
                moveAllDivsToContainer();
            } else {
                moveDivsToUserVideoCallBar(clickvideoDiv);
            }
        });

    }
}

// สำหรับ Div ต่างๆของ Remote ตอน published
function create_element_remotevideo_call(remotePlayerContainer,name_remote ,bg_remote,user) {
    if(remotePlayerContainer.id){
        console.log("remotePlayerContainer");
        console.log(remotePlayerContainer);

        let containerId = remotePlayerContainer.id;

        let divVideo_New = document.createElement('div');
        divVideo_New.setAttribute('id','videoDiv_' + containerId);
        divVideo_New.setAttribute('class','custom-div');
        divVideo_New.setAttribute('style', 'background-color:' + bg_remote);

        //======= สร้างปุ่มสถานะ && รูปโปรไฟล์ ==========

        // เพิ่มแท็ก แสดงเสียงไมค์เวลาพูด
        let statusMicrophoneOutput = document.createElement("div");
        statusMicrophoneOutput.id = "statusMicrophoneOutput_remote_"+containerId;
        statusMicrophoneOutput.className = "status-sound-output d-none";
        statusMicrophoneOutput.setAttribute('style','z-index: 1;');

        let soundDiv = document.createElement("div");
            soundDiv.id = "sound_remote_" + containerId;
            soundDiv.className = "sound";
            soundDiv.innerHTML = '<i class="fa-sharp fa-solid fa-volume fa-beat-fade" style="color: #ffffff;"></i>';

        statusMicrophoneOutput.appendChild(soundDiv);

        // เพิ่มแท็ก ไมค์และกล้อง
        let statusInputOutputDiv = document.createElement("div");
            statusInputOutputDiv.className = "status-input-output";
            statusInputOutputDiv.setAttribute('style','z-index: 1;');

        let micDiv = document.createElement("div");
            micDiv.id = "mic_remote_"+containerId;
            micDiv.className = "mic";
            if(user.hasAudio == false){
                micDiv.innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #f00505; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
            }else{
                micDiv.innerHTML = '<i class="fa-solid fa-microphone"></i>';
            }

        let cameraDiv = document.createElement("div");
            cameraDiv.id = "camera_remote_"+containerId;
            cameraDiv.className = "camera";
            if(user.hasVideo == false){
                cameraDiv.innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
            }else{
                cameraDiv.innerHTML = '<i class="fa-solid fa-video"></i>';
            }
        statusInputOutputDiv.appendChild(micDiv);
        statusInputOutputDiv.appendChild(cameraDiv);

        // เพิ่มแท็ก ชื่อและสถานะ
        let infomationUserDiv = document.createElement("div");
            infomationUserDiv.className = "infomation-user";
            infomationUserDiv.setAttribute('style','z-index: 1;');

        let nameUserVideoCallDiv = document.createElement("div");
            nameUserVideoCallDiv.className = "name-user-video-call";
            nameUserVideoCallDiv.innerHTML = '<h5 class="m-0 text-white float-end"><b>'+name_remote+'</b></h5>';

        let roleUserVideoCallDiv = document.createElement("div");
            roleUserVideoCallDiv.className = "role-user-video-call";
            roleUserVideoCallDiv.innerHTML = '<small class="d-block">ชื่อหน่วย</small>';

        infomationUserDiv.appendChild(nameUserVideoCallDiv);
        infomationUserDiv.appendChild(roleUserVideoCallDiv);

        // เพิ่ม div ด้านในลงใน div หลัก
        divVideo_New.appendChild(statusMicrophoneOutput);
        divVideo_New.appendChild(statusInputOutputDiv);
        divVideo_New.appendChild(infomationUserDiv);

        //======= จบการ สร้างปุ่มสถานะ ==========

        divVideo_New.append(remotePlayerContainer);

        // หา div เดิมที่ต้องการแทนที่
        let oldDiv = document.getElementById("videoDiv_"+ containerId);

        // เพิ่ม div ใหม่ลงใน div หลัก หรือ div bar
        let userVideoCallBar = document.querySelector(".user-video-call-bar");
        let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");
        let container_user_video_call = document.querySelector("#container_user_video_call");

        // ตรวจสอบว่าเจอ div เดิมหรือไม่
        if (oldDiv) {
            // ใช้ parentNode.replaceChild() เพื่อแทนที่ div เดิมด้วย div ใหม่
            oldDiv.parentNode.replaceChild(divVideo_New, oldDiv);
        } else {
            if (customDivsInUserVideoCallBar.length > 0) {
                userVideoCallBar.append(divVideo_New);
            } else {
                container_user_video_call.append(divVideo_New);
            }
        }

        // คลิ๊ก div ให้เปลี่ยนขนาด
        divVideo_New.addEventListener("click", function() {
            handleClick(divVideo_New);
        });

        remotePlayerContainer.addEventListener("click", function() {
            console.log("remotePlayerContainer Click ---->");
            let id_agora_create = remotePlayerContainer.id;
            console.log(id_agora_create);
            let clickvideoDiv = document.querySelector('#videoDiv_'+id_agora_create);
            clickvideoDiv.click();

            let userVideoCallBar = document.querySelector(".user-video-call-bar");
            let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

            if (customDivsInUserVideoCallBar.length > 0) {
                moveAllDivsToContainer();
            } else {
                moveDivsToUserVideoCallBar(clickvideoDiv);
            }
        });
    }else{
        console.log("================ สร้าง divVideo_New remote ไม่สำเร็จ =================");
    }
}

// สำหรับ Div Dummy ต่างๆของ Remote ตอน unpublished
function create_dummy_videoTrack(user,name_remote,profile_remote,bg_remote){
    if(user.uid){

        // ใส่เนื้อหาใน divVideo ที่ถูกใช้โดยผู้ใช้
        let divVideo_New = document.createElement('div');
        divVideo_New.setAttribute('id','videoDiv_' + user.uid.toString());
        divVideo_New.setAttribute('class','custom-div');
        divVideo_New.setAttribute('style','background-color:'+bg_remote);

        //======= สร้างปุ่มสถานะ และรูปโปรไฟล์ ==========

        // สร้างแท็ก <img> สำหรับรูปโปรไฟล์
        let ProfileInputOutputDiv = document.createElement("div");
            ProfileInputOutputDiv.className = "profile-input-output";
            ProfileInputOutputDiv.setAttribute('style','z-index: 1; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);');

        let profileImage = document.createElement('img');
            profileImage.setAttribute('src', profile_remote); // เปลี่ยน 'ลิงก์รูปโปรไฟล์' เป็น URL ของรูปโปรไฟล์ของผู้ใช้
            profileImage.setAttribute('alt', 'โปรไฟล์');
            // profileImage.setAttribute('style', 'border-radius: 50%; width: 100px; height: 100px; max-width: 100%; max-height: 30%;');
            profileImage.setAttribute('class', 'profile_image');
        // เพิ่มแท็ก <img> ลงใน ProfileInputOutputDiv
        ProfileInputOutputDiv.appendChild(profileImage);

        // เพิ่มแท็ก แสดงเสียงไมค์เวลาพูด
        let statusMicrophoneOutput = document.createElement("div");
            statusMicrophoneOutput.id = "statusMicrophoneOutput_remote_" + user.uid.toString();
            statusMicrophoneOutput.className = "status-sound-output d-none";
            statusMicrophoneOutput.setAttribute('style','z-index: 1;');

        let soundDiv = document.createElement("div");
            soundDiv.id = "sound_remote_" + user.uid.toString();
            soundDiv.className = "sound";
            soundDiv.innerHTML = '<i class="fa-sharp fa-solid fa-volume fa-beat-fade" style="color: #ffffff;"></i>';

        statusMicrophoneOutput.appendChild(soundDiv);

        // เพิ่มแท็ก ไมค์และกล้อง
        let statusInputOutputDiv = document.createElement("div");
            statusInputOutputDiv.className = "status-input-output";
            statusInputOutputDiv.setAttribute('style','z-index: 1;');

        let micDiv = document.createElement("div");
            micDiv.id = "mic_remote_"+ user.uid.toString();
            micDiv.className = "mic";
            if(user.hasAudio == false){
                micDiv.innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #f00505; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
            }else{
                micDiv.innerHTML = '<i class="fa-solid fa-microphone"></i>';
            }

        let cameraDiv = document.createElement("div");
            cameraDiv.id = "camera_remote_"+ user.uid.toString();
            cameraDiv.className = "camera";
            if(user.hasVideo == false){
                cameraDiv.innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
            }else{
                cameraDiv.innerHTML = '<i class="fa-solid fa-video"></i>';
            }

        statusInputOutputDiv.appendChild(micDiv);
        statusInputOutputDiv.appendChild(cameraDiv);

        // เพิ่มแท็ก ชื่อและสถานะ
        let infomationUserDiv = document.createElement("div");
            infomationUserDiv.className = "infomation-user";
            infomationUserDiv.setAttribute('style','z-index: 1;');

        let nameUserVideoCallDiv = document.createElement("div");
            nameUserVideoCallDiv.className = "name-user-video-call";
            nameUserVideoCallDiv.innerHTML = '<h5 class="m-0 text-white float-end"><b>'+name_remote+'</b></h5>';

        let roleUserVideoCallDiv = document.createElement("div");
            roleUserVideoCallDiv.className = "role-user-video-call";
            roleUserVideoCallDiv.innerHTML = '<small class="d-block">ชื่อหน่วย</small>';

        infomationUserDiv.appendChild(nameUserVideoCallDiv);
        infomationUserDiv.appendChild(roleUserVideoCallDiv);

        // สร้าง div โปร่งใส
        let transparentDiv = document.createElement("div");
        transparentDiv.classList.add("transparent-div"); // เพิ่มคลาส CSS


        // เพิ่ม div ด้านในลงใน div หลัก
        divVideo_New.appendChild(ProfileInputOutputDiv);
        divVideo_New.appendChild(statusMicrophoneOutput);
        divVideo_New.appendChild(statusInputOutputDiv);
        divVideo_New.appendChild(infomationUserDiv);
        divVideo_New.appendChild(transparentDiv);
        //======= จบการ สร้างปุ่มสถานะ ==========

        // ถ้ามี dummy_trackRemoteDiv_ อยู่แล้ว ลบอันเก่าก่อน
        if(document.getElementById('dummy_trackRemoteDiv_' + user.uid.toString())) {
            document.getElementById('dummy_trackRemoteDiv_' + user.uid.toString()).remove();
        }

        //เพิ่มแท็กวิดีโอที่มีพื้นหลังแค่สีดำ
        // const remote_video_call = document.getElementById(user.uid.toString());
        closeVideoHTML  =
                        ' <div id="dummy_trackRemoteDiv_'+ user.uid.toString() +'" style="width: 100%; height: 100%; position: relative; overflow: hidden; background-color: '+bg_remote+';">' +
                            '<video class="agora_video_player" playsinline="" muted="" style="width: 100%; height: 100%; position: absolute; left: 0px; top: 0px; object-fit: cover;"></video>' +
                        '</div>' ;

        divVideo_New.insertAdjacentHTML('beforeend',closeVideoHTML); // แทรกล่างสุด

        // หา div เดิมที่ต้องการแทนที่
        let oldDiv = document.getElementById("videoDiv_"+ user.uid.toString());

        let userVideoCallBar = document.querySelector(".user-video-call-bar");
        let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");
        let container_user_video_call = document.querySelector("#container_user_video_call");
        console.log("customDivsInUserVideoCallBar.length in Dummy = "+ customDivsInUserVideoCallBar.length);

        // ตรวจสอบว่าเจอ div เดิมหรือไม่
        if (oldDiv) {
            // ใช้ parentNode.replaceChild() เพื่อแทนที่ div เดิมด้วย div ใหม่
            oldDiv.parentNode.replaceChild(divVideo_New, oldDiv);
        } else {
            if (customDivsInUserVideoCallBar.length > 0) {
                userVideoCallBar.append(divVideo_New);
            } else {
                container_user_video_call.append(divVideo_New);
            }
        }

        divVideo_New.addEventListener("click", function() {
            handleClick(divVideo_New);
        });

        transparentDiv.addEventListener("click", function() {

            let id_agora_create = user.uid.toString();
            console.log(id_agora_create);
            let clickvideoDiv = document.querySelector('#videoDiv_'+id_agora_create);
            clickvideoDiv.click();

            let userVideoCallBar = document.querySelector(".user-video-call-bar");
            let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

            if (customDivsInUserVideoCallBar.length > 0) {
                moveAllDivsToContainer();
            } else {
                moveDivsToUserVideoCallBar(clickvideoDiv);
            }
        });

    }else{
        console.log("------------------------------------------------------  หา user ไม่เจอ เลยขึ้น undifined ใน create_videoTrack()");
    }

}







