
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
        muteVideoButton.classList.add('btn','btn-secondary','mr-1');
        muteVideoButton.innerHTML = '<i class="fa-solid fa-video"></i>';

    divForVideoButton.appendChild(muteVideoButton);

    // document.querySelector('#footer_div').appendChild(divForVideoButton);

    muteButton.onclick = async function() {
        if (isAudio == true) {
            // Update the button text.
            document.getElementById(`muteAudio`).innerHTML = '<i class="fa-solid fa-microphone-slash"></i>';
            // Mute the local video.
            channelParameters.localAudioTrack.setEnabled(false);

            // เปลี่ยน icon microphone ให้เป็นปิด ใน divVideo_
            document.getElementById(`mic_local`).innerHTML = '<i class="fa-duotone fa-microphone-slash"></i>';

            isAudio = false;
        } else {
            // Update the button text.
            document.getElementById(`muteAudio`).innerHTML = '<i class="fa-solid fa-microphone"></i>';
            // Unmute the local video.
            channelParameters.localAudioTrack.setEnabled(true);
            // เปลี่ยน icon microphone ให้เป็นเปิด ใน divVideo_
            document.getElementById(`mic_local`).innerHTML = '<i class="fa-duotone fa-microphone"></i>';

            isAudio = true;
        }
    }

    muteVideoButton.onclick = async function() {
        if (isVideo == true) {
            // Update the button text.
            document.getElementById(`muteVideo`).innerHTML = '<i class="fa-solid fa-video-slash"></i>';
            // Mute the local video.
            channelParameters.localVideoTrack.setEnabled(false);
            muteVideoButton.classList.add('btn-disabled');
            // เปลี่ยน icon camera ให้เป็นปิด ใน divVideo_
            document.getElementById(`camera_local`).innerHTML = '<i class="fa-duotone fa-video-slash"></i>';

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
            document.getElementById(`camera_local`).innerHTML = '<i class="fa-duotone fa-video"></i>';

            // ซ่อนโปรไฟล์ ตอนเปิดกล้อง
            document.querySelector('.profile-input-output').classList.add('d-none');

            isVideo = true;

            if(document.querySelector('.imgdivLocal')){
                document.querySelector('.imgdivLocal').remove();
            }
        }
    }

}


function create_element_localvideo_call(localPlayerContainer,profile_local) {
    // ใส่เนื้อหาใน divVideo ที่ถูกใช้โดยผู้ใช้
    if(document.getElementById('videoDiv_' + localPlayerContainer.id)) {
        document.getElementById('videoDiv_' + localPlayerContainer.id).remove();
    }

    let divVideo = document.createElement('div');
    divVideo.setAttribute('id','videoDiv_' + localPlayerContainer.id);
    divVideo.setAttribute('class','custom-div');
    divVideo.setAttribute('style','background-color: grey');

    //======= สร้างปุ่มสถานะ && รูปโปรไฟล์ ==========

    // สร้างแท็ก <img> สำหรับรูปโปรไฟล์
    let ProfileInputOutputDiv = document.createElement("div");
        ProfileInputOutputDiv.className = "profile-input-output";
        ProfileInputOutputDiv.setAttribute('style','z-index: 9999; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);');

    let profileImage = document.createElement('img');
        profileImage.setAttribute('src', profile_local); // เปลี่ยน 'ลิงก์รูปโปรไฟล์' เป็น URL ของรูปโปรไฟล์ของผู้ใช้
        profileImage.setAttribute('alt', 'โปรไฟล์');
        profileImage.setAttribute('style', 'border-radius: 50%; width: 100px; height: 100px; max-width: 100%; max-height: 100%;');

    // เพิ่มแท็ก <img> ลงใน ProfileInputOutputDiv
    ProfileInputOutputDiv.appendChild(profileImage);

    let statusInputOutputDiv = document.createElement("div");
        statusInputOutputDiv.className = "status-input-output";
        statusInputOutputDiv.setAttribute('style','z-index: 9999;');

    let micDiv = document.createElement("div");
        micDiv.id = "mic_local";
        micDiv.className = "mic";
        micDiv.innerHTML = '<i class="fa-duotone fa-microphone"></i>';

    let cameraDiv = document.createElement("div");
        cameraDiv.id = "camera_local";
        cameraDiv.className = "camera";
        cameraDiv.innerHTML = '<i class="fa-duotone fa-video"></i>';

    statusInputOutputDiv.appendChild(micDiv);
    statusInputOutputDiv.appendChild(cameraDiv);

    let infomationUserDiv = document.createElement("div");
        infomationUserDiv.id = "infomation-user-local";
        infomationUserDiv.className = "infomation-user";
        infomationUserDiv.setAttribute('style','z-index: 9999;');

    let nameUserVideoCallDiv = document.createElement("div");
        nameUserVideoCallDiv.id = "name_local_video_call";
        nameUserVideoCallDiv.className = "name-user-video-call";
        nameUserVideoCallDiv.innerHTML = '<h5 class="m-0 text-white float-end"><b>ชื่อผู้ใช้</b></h5>';

    let roleUserVideoCallDiv = document.createElement("div");
        roleUserVideoCallDiv.id = "role_local_video_call";
        roleUserVideoCallDiv.className = "role-user-video-call";
        roleUserVideoCallDiv.innerHTML = '<small class="d-block">ชื่อหน่วย</small>';

    infomationUserDiv.appendChild(nameUserVideoCallDiv);
    infomationUserDiv.appendChild(roleUserVideoCallDiv);

    // เพิ่ม div ด้านในลงใน div หลัก
    divVideo.appendChild(ProfileInputOutputDiv);
    divVideo.appendChild(statusInputOutputDiv);
    divVideo.appendChild(infomationUserDiv);

    //======= จบการ สร้างปุ่มสถานะ ==========

    // เพิ่ม div หลักลงใน div รวม
    divVideo.append(localPlayerContainer);

    document.querySelector('#container_user_video_call').append(divVideo);

    divVideo.addEventListener("click", function() {
        handleClick(divVideo);
    });

}

function create_element_remotevideo_call(remotePlayerContainer) {

    const containerId = remotePlayerContainer.id;

    // ตรวจสอบว่า div มีอยู่แล้วหรือไม่
    if (document.getElementById("videoDiv_"+ containerId)) {
        document.getElementById("videoDiv_"+ containerId).remove();
    }

    // ใส่เนื้อหาใน divVideo ที่ถูกใช้โดยผู้ใช้
    let divVideo = document.createElement('div');
        divVideo.setAttribute('id','videoDiv_' + containerId);
        divVideo.setAttribute('class','custom-div');
        divVideo.setAttribute('style','background-color: grey');

        //======= สร้างปุ่มสถานะ && รูปโปรไฟล์ ==========

    // สร้างแท็ก <img> สำหรับรูปโปรไฟล์
    // let ProfileInputOutputDiv = document.createElement("div");
    //     ProfileInputOutputDiv.className = "profile-input-output";
    //     ProfileInputOutputDiv.setAttribute('style','z-index: 9999; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);');

    // let profileImage = document.createElement('img');
    //     profileImage.setAttribute('src', 'https://f.ptcdn.info/487/073/000/qt2wmw4n966a6s3VrFxT-o.jpg'); // เปลี่ยน 'ลิงก์รูปโปรไฟล์' เป็น URL ของรูปโปรไฟล์ของผู้ใช้
    //     profileImage.setAttribute('alt', 'โปรไฟล์');
    //     profileImage.setAttribute('style', 'border-radius: 50%; width: 100px; height: 100px; max-width: 100%; max-height: 100%;');

    // เพิ่มแท็ก <img> ลงใน ProfileInputOutputDiv
    ProfileInputOutputDiv.appendChild(profileImage);

    let statusInputOutputDiv = document.createElement("div");
        statusInputOutputDiv.className = "status-input-output";
        statusInputOutputDiv.setAttribute('style','z-index: 9999;');

    let micDiv = document.createElement("div");
        micDiv.className = "mic";
        micDiv.innerHTML = '<i class="fa-duotone fa-microphone"></i>';

    let cameraDiv = document.createElement("div");
        cameraDiv.className = "camera";
        cameraDiv.innerHTML = '<i class="fa-solid fa-video"></i>';

    statusInputOutputDiv.appendChild(micDiv);
    statusInputOutputDiv.appendChild(cameraDiv);

    let infomationUserDiv = document.createElement("div");
        infomationUserDiv.className = "infomation-user";
        infomationUserDiv.setAttribute('style','z-index: 9999;');

    let nameUserVideoCallDiv = document.createElement("div");
        nameUserVideoCallDiv.className = "name-user-video-call";
        nameUserVideoCallDiv.innerHTML = '<h5 class="m-0 text-white float-end"><b>ชื่อผู้ใช้</b></h5>';

    let roleUserVideoCallDiv = document.createElement("div");
        roleUserVideoCallDiv.className = "role-user-video-call";
        roleUserVideoCallDiv.innerHTML = '<small class="d-block">ชื่อหน่วย</small>';

    infomationUserDiv.appendChild(nameUserVideoCallDiv);
    infomationUserDiv.appendChild(roleUserVideoCallDiv);

    // เพิ่ม div ด้านในลงใน div หลัก
    divVideo.appendChild(ProfileInputOutputDiv);
    divVideo.appendChild(statusInputOutputDiv);
    divVideo.appendChild(infomationUserDiv);

    //======= จบการ สร้างปุ่มสถานะ ==========

    divVideo.append(remotePlayerContainer);

    // เพิ่ม div ใหม่ลงใน div หลัก หรือ div bar
    let userVideoCallBar = document.querySelector(".user-video-call-bar");
    let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

    if (customDivsInUserVideoCallBar.length > 0) {
        let firstCustomDiv = customDivsInUserVideoCallBar[0];
        userVideoCallBar.insertBefore(divVideo, firstCustomDiv.nextSibling);
    } else {
        let container_user_video_call = document.querySelector("#container_user_video_call");
        container_user_video_call.append(divVideo);
    }

    // คลิ๊ก div ให้เปลี่ยนขนาด
    divVideo.addEventListener("click", function() {
        handleClick(divVideo);
    });
}

function create_dummy_videoTrack(user,name_remote,profile_remote){
    if(user.uid){
        // ถ้ามี videoDiv อยู่แล้ว ลบอันเก่าก่อน
        if(document.getElementById('videoDiv_' + user.uid.toString())) {
            document.getElementById('videoDiv_' + user.uid.toString()).remove();
        }

        // ใส่เนื้อหาใน divVideo ที่ถูกใช้โดยผู้ใช้
        let divVideo = document.createElement('div');
        divVideo.setAttribute('id','videoDiv_' + user.uid.toString());
        divVideo.setAttribute('class','custom-div');
        divVideo.setAttribute('style','background-color: grey');

        //======= สร้างปุ่มสถานะ และรูปโปรไฟล์ ==========

        // สร้างแท็ก <img> สำหรับรูปโปรไฟล์
        let ProfileInputOutputDiv = document.createElement("div");
            ProfileInputOutputDiv.className = "profile-input-output";
            ProfileInputOutputDiv.setAttribute('style','z-index: 9999; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);');

        let profileImage = document.createElement('img');
            profileImage.setAttribute('src', profile_remote); // เปลี่ยน 'ลิงก์รูปโปรไฟล์' เป็น URL ของรูปโปรไฟล์ของผู้ใช้
            profileImage.setAttribute('alt', 'โปรไฟล์');
            profileImage.setAttribute('style', 'border-radius: 50%; width: 100px; height: 100px; max-width: 100%; max-height: 100%;');

        // เพิ่มแท็ก <img> ลงใน ProfileInputOutputDiv
        ProfileInputOutputDiv.appendChild(profileImage);

        let statusInputOutputDiv = document.createElement("div");
            statusInputOutputDiv.className = "status-input-output";
            statusInputOutputDiv.setAttribute('style','z-index: 9999;');

        let micDiv = document.createElement("div");
            micDiv.className = "mic";
            micDiv.innerHTML = '<i class="fa-duotone fa-microphone"></i>';

        let cameraDiv = document.createElement("div");
            cameraDiv.className = "camera";
            cameraDiv.innerHTML = '<i class="fa-solid fa-video"></i>';

        statusInputOutputDiv.appendChild(micDiv);
        statusInputOutputDiv.appendChild(cameraDiv);

        let infomationUserDiv = document.createElement("div");
            infomationUserDiv.className = "infomation-user";
            infomationUserDiv.setAttribute('style','z-index: 9999;');

        let nameUserVideoCallDiv = document.createElement("div");
            nameUserVideoCallDiv.className = "name-user-video-call";
            nameUserVideoCallDiv.innerHTML = '<h5 class="m-0 text-white float-end"><b>'+name_remote+'</b></h5>';

        let roleUserVideoCallDiv = document.createElement("div");
            roleUserVideoCallDiv.className = "role-user-video-call";
            roleUserVideoCallDiv.innerHTML = '<small class="d-block">ชื่อหน่วย</small>';

        infomationUserDiv.appendChild(nameUserVideoCallDiv);
        infomationUserDiv.appendChild(roleUserVideoCallDiv);

        // เพิ่ม div ด้านในลงใน div หลัก
        divVideo.appendChild(ProfileInputOutputDiv);
        divVideo.appendChild(statusInputOutputDiv);
        divVideo.appendChild(infomationUserDiv);

        //======= จบการ สร้างปุ่มสถานะ ==========

        // ถ้ามี dummy_trackRemoteDiv_ อยู่แล้ว ลบอันเก่าก่อน
        if(document.getElementById('dummy_trackRemoteDiv_' + user.uid.toString())) {
            document.getElementById('dummy_trackRemoteDiv_' + user.uid.toString()).remove();
        }

        //เพิ่มแท็กวิดีโอที่มีพื้นหลังแค่สีดำ
        // const remote_video_call = document.getElementById(user.uid.toString());
        closeVideoHTML  =
                        ' <div id="dummy_trackRemoteDiv_'+ user.uid.toString() +'" style="width: 100%; height: 100%; position: relative; overflow: hidden; background-color: gray;">' +
                            '<video class="agora_video_player" playsinline="" muted="" style="width: 100%; height: 100%; position: absolute; left: 0px; top: 0px; object-fit: cover;"></video>' +
                        '</div>' ;

        divVideo.insertAdjacentHTML('beforeend',closeVideoHTML); // แทรกล่างสุด

        // divVideo.append(remote_video_call); // เพิ่มแท็กวิดีโอที่มีพื้นหลังแค่สีดำ เข้าไปใน div class="video-box"

        divVideo.addEventListener("click", function() {
            handleClick(divVideo);
        });

        let userVideoCallBar = document.querySelector(".user-video-call-bar");
        let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

        if (customDivsInUserVideoCallBar.length > 0) {
            let firstCustomDiv = customDivsInUserVideoCallBar[0];
            userVideoCallBar.insertBefore(divVideo, firstCustomDiv.nextSibling);
        } else {
            let container_user_video_call = document.querySelector("#container_user_video_call");
            container_user_video_call.append(divVideo);
        }




    }else{
        console.log("------------------------------------------------------  หา user ไม่เจอ เลยขึ้น undifined ใน create_dummy_videoTrack()");
    }

}





// ตรวจสอบจำนวน div ที่มี class "custom-div" และปรับความกว้าง
// function updateDivWidth() {
//     let container = document.getElementById('container_user_video_call');
//     let customDivs = container.getElementsByClassName('custom-div');
//     let count = customDivs.length;

//     if (count > 1) {
//         container.classList.add("grid-template");
//     } else {
//         container.classList.remove("grid-template");
//     }
// }







