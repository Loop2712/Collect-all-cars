

//=====================   ฟังก์ชัน ขยาย-ย่อ ขนาด div-box video    =============================

function toggleVideoBox(element) {
    // ตรวจสอบว่า div ถูกขยายอยู่หรือไม่
    if (element.classList.contains('expanded')) {
        // ถ้าถูกขยายอยู่ให้ย่อลง
        element.classList.remove('expanded');
    } else {
        // ถ้าไม่ถูกขยายให้ขยาย
        element.classList.add('expanded');

        // ย้าย div ที่ถูกขยายขึ้นไปอยู่บนสุดของ parent
        element.parentNode.insertBefore(element, element.parentNode.firstChild);

        // ย่อ `div-box` ที่ไม่ได้ถูกคลิกเมื่อคลิก `div-box` อื่น ๆ
        videoBoxes.forEach((box) => {
            if (box !== element && box.classList.contains('expanded')) {
                box.classList.remove('expanded');

                // box.style.width = 'calc(40% - 0.5rem) !important';
                // box.style.height = 'calc(25% - 0.5rem) !important';
                // box.style.margin = 'auto';
            }
        });
    }
}

// เพิ่ม event listener สำหรับ divs ทั้งหมดที่ต้องการให้คลิกขยายหรือย่อ
const videoBoxes = document.querySelectorAll('.video-box');
videoBoxes.forEach((box) => {
    box.addEventListener('click', function () {
        toggleVideoBox(this);
    });
});

//----------------------------- End ฟังก์ชัน ขยาย-ย่อ ขนาด div-box video  -----------------------------------

//================= เปลี่ยน class divVideo_Parent ตามจำนวน div ย่อย เพื่อแสดงผลตามจำนวนคน ==================

var divVideoParent = document.getElementById("divVideo_Parent");

// ฟังก์ชันที่จะทำการตรวจสอบและปรับคลาสตามจำนวน div
function updateClassBasedOnCount() {
    // เลือก div ย่อยทั้งหมดที่มีคลาส "video-box"
    var videoBoxes_inParent = divVideoParent.getElementsByClassName("video-box");
    var numberOfVideoBoxes = videoBoxes_inParent.length;

    // สร้างรายการคลาสที่ต้องการเปลี่ยน
    var classListToApply = ["one-people", "two-people", "three-people", "four-people"];

    // เริ่มต้นด้วยการลบทุกคลาสจาก div หลัก
    divVideoParent.classList.remove(...classListToApply);

    // ใส่คลาสที่เหมาะสมตามจำนวน div ย่อย
    if (numberOfVideoBoxes > 0 && numberOfVideoBoxes <= classListToApply.length) {
        divVideoParent.classList.add(classListToApply[numberOfVideoBoxes - 1]);
    }
}

// เรียกใช้ฟังก์ชันเพื่อตั้งคลาสเริ่มต้น
updateClassBasedOnCount();

// สร้าง MutationObserver เพื่อตรวจสอบการเปลี่ยนแปลงใน DOM
var observer = new MutationObserver(function (mutationsList, observer) {
    // เรียกใช้ฟังก์ชันเมื่อมีการเปลี่ยนแปลงใน DOM
    updateClassBasedOnCount();
});

// ตั้งค่า MutationObserver เพื่อตรวจสอบการเปลี่ยนแปลงใน DOM
var observerConfig = { childList: true };

// เริ่มต้นการตรวจสอบการเปลี่ยนแปลงใน DOM
observer.observe(divVideoParent, observerConfig);

//---------------------------------- End เปลี่ยน class divVideo_Parent --------------------------------------



