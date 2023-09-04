

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


