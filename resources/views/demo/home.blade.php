@extends('layouts.viicheck_new')

@section('content')
<style>
    /* Modal Overlay - พื้นหลังทับหน้าจอ */
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

/* Language Modal - กล่องหลักของ Modal */
.language-modal {
  background-color: white;
  padding: 24px;
  border-radius: 12px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
  width: 90%;
  max-width: 400px;
  max-height: 80vh;
  display: flex;
  flex-direction: column;
}

/* Modal Header - ส่วนหัวของ Modal */
.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.modal-title {
  margin: 0;
  font-size: 24px;
  color: #333;
  font-weight: 600;
}

.close-button {
  background: none;
  border: none;
  font-size: 32px;
  cursor: pointer;
  color: #888;
  padding: 0;
}

/* Modal Body - ส่วนเนื้อหา Modal */
.modal-body {
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

/* Search Box - ช่องค้นหา */
.search-box {
  margin-bottom: 16px;
}

.search-input {
  width: 100%;
  padding: 12px 16px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 16px;
  box-sizing: border-box;
}

/* Language List - รายการภาษา */
.language-list {
  list-style: none;
  padding: 0;
  margin: 0;
  overflow-y: auto;
  max-height: calc(80vh - 150px);
}

/* Language Item - แต่ละรายการในรายการภาษา */
.language-item {
  display: flex;
  align-items: center;
  padding: 14px 16px;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

.language-item:hover {
  background-color: #f5f5f5;
}

.lang-flag {
  width: 24px; /* กำหนดขนาดของธงให้ใหญ่ขึ้นเล็กน้อย */
  height: auto;
  margin-right: 12px; /* เพิ่มระยะห่างจากชื่อภาษา */
  border: 1px solid #ddd;
  border-radius: 3px;
}

.language-name {
  font-size: 18px;
  color: #444;
  font-weight: 500;
}

/* Scrollbar Style - ปรับแต่ง scrollbar ให้สวยงาม (สำหรับ WebKit browsers) */
.language-list::-webkit-scrollbar {
  width: 8px;
}

.language-list::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 10px;
}

.language-list::-webkit-scrollbar-thumb {
  background: #ccc;
  border-radius: 10px;
}

.language-list::-webkit-scrollbar-thumb:hover {
  background: #a8a8a8;
}
</style>
<div class="modal-overlay" style="display: none;">
  <div class="language-modal">
    <div class="modal-header">
      <h2 class="modal-title">เลือกภาษาของคุณ</h2>
      <button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
      <div class="search-box">
        <input type="text" placeholder="ค้นหาภาษา..." class="search-input">
      </div>
      <ul class="language-list">
        <li class="language-item" data-lang="en">
          <img src="https://flagcdn.com/w20/gb.png" alt="UK flag" class="lang-flag">
          <span class="language-name">English</span>
        </li>
        <li class="language-item" data-lang="hi">
          <img src="https://flagcdn.com/w20/in.png" alt="India flag" class="lang-flag">
          <span class="language-name">हिन्दी</span>
        </li>
        <li class="language-item" data-lang="zh">
          <img src="https://flagcdn.com/w20/cn.png" alt="China flag" class="lang-flag">
          <span class="language-name">中文</span>
        </li>
        <li class="language-item" data-lang="ar">
          <img src="https://flagcdn.com/w20/sa.png" alt="Saudi Arabia flag" class="lang-flag">
          <span class="language-name">العربية</span>
        </li>
        <li class="language-item" data-lang="ru">
          <img src="https://flagcdn.com/w20/ru.png" alt="Russia flag" class="lang-flag">
          <span class="language-name">Русский</span>
        </li>
        <li class="language-item" data-lang="es">
          <img src="https://flagcdn.com/w20/es.png" alt="Spain flag" class="lang-flag">
          <span class="language-name">Español</span>
        </li>
        <li class="language-item" data-lang="de">
          <img src="https://flagcdn.com/w20/de.png" alt="Germany flag" class="lang-flag">
          <span class="language-name">Deutsch</span>
        </li>
        <li class="language-item" data-lang="ja">
          <img src="https://flagcdn.com/w20/jp.png" alt="Japan flag" class="lang-flag">
          <span class="language-name">日本語</span>
        </li>
        <li class="language-item" data-lang="ko">
          <img src="https://flagcdn.com/w20/kr.png" alt="South Korea flag" class="lang-flag">
          <span class="language-name">한국어</span>
        </li>
        <li class="language-item" data-lang="th">
          <img src="https://flagcdn.com/w20/th.png" alt="Thailand flag" class="lang-flag">
          <span class="language-name">ไทย</span>
        </li>
        <li class="language-item" data-lang="lo">
          <img src="https://flagcdn.com/w20/la.png" alt="Laos flag" class="lang-flag">
          <span class="language-name">ລາວ</span>
        </li>
        <li class="language-item" data-lang="my">
          <img src="https://flagcdn.com/w20/mm.png" alt="Myanmar flag" class="lang-flag">
          <span class="language-name">မြန်မာပြည်</span>
        </li>
      </ul>
    </div>
  </div>
</div>
<script>
    // Function สำหรับจัดการ Modal
function setupLanguageModal() {
  const modalOverlay = document.querySelector('.modal-overlay');
  const closeButton = document.querySelector('.close-button');
  const openButton = document.getElementById('open-modal-button');
  const searchInput = document.querySelector('.search-input');
  const languageItems = document.querySelectorAll('.language-item');

  // ฟังก์ชันเปิด Modal
  function openModal() {
    modalOverlay.style.display = 'flex';
  }

  // ฟังก์ชันปิด Modal
  function closeModal() {
    modalOverlay.style.display = 'none';
  }

  // Event Listener สำหรับปุ่มเปิด Modal
  if (openButton) {
    openButton.addEventListener('click', openModal);
  }

  // Event Listener สำหรับปุ่มปิด Modal
  if (closeButton) {
    closeButton.addEventListener('click', closeModal);
  }

  // Event Listener สำหรับการคลิกนอก Modal
  if (modalOverlay) {
    modalOverlay.addEventListener('click', (event) => {
      if (event.target === modalOverlay) {
        closeModal();
      }
    });
  }

  // ฟังก์ชันสำหรับกรองภาษาตามคำค้นหา
  function filterLanguages() {
    const searchTerm = searchInput.value.toLowerCase();

    languageItems.forEach(item => {
      const languageName = item.querySelector('.language-name').textContent.toLowerCase();
      const langCode = item.getAttribute('data-lang').toLowerCase();

      // ตรวจสอบว่าชื่อภาษาหรือรหัสภาษามีคำที่ค้นหาหรือไม่
      if (languageName.includes(searchTerm) || langCode.includes(searchTerm)) {
        item.style.display = 'flex';
      } else {
        item.style.display = 'none';
      }
    });
  }

  // Event Listener สำหรับช่องค้นหา
  if (searchInput) {
    searchInput.addEventListener('input', filterLanguages);
  }
}

// เรียกใช้ฟังก์ชันเมื่อ DOM โหลดเสร็จ
document.addEventListener('DOMContentLoaded', setupLanguageModal);
</script>
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    ระบบช่วยเหลือฉุกเฉิน<br>
                    <span class="text-gradient">ViiCheck</span>
                </h1>
                <p class="hero-description">
                    <!-- ระบบช่วยเหลือฉุกเฉินและติดต่อเจ้าของรถที่ครอบคลุมทั่วประเทศไทย<br>
                    พร้อมให้บริการ 24 ชั่วโมง เพื่อความปลอดภัยของคุณ -->
                    ViiCheck One-Stop-Service<br>
                    บริการช่วยเหลือเหตุฉุกเฉิน แพทย์ฉุกเฉิน<br>
                    ผู้ช่วยประสานงานและงานช่างซ่อมบำรุง
                </p>
                <div class="hero-buttons">
                    <button class="btn btn-primary btn-large">
                        <i class="fas fa-exclamation-triangle"></i>
                        เรียกความช่วยเหลือ
                    </button>
                    <button class="btn btn-outline btn-large">
                        <i class="fas fa-car"></i>
                        ติดต่อเจ้าของรถ
                    </button>
                </div>
                <div class="hero-features">
                    <div class="feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>ปลอดภัย 100%</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-clock"></i>
                        <span>24 ชั่วโมง</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>77 จังหวัด</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="section-header">
   <button id="open-modal-button">เลือกภาษา</button>
                <h2 class="section-title">สถิติที่น่าภาคภูมิใจ</h2>
                <p class="section-description">
                    ตัวเลขที่แสดงถึงความเชื่อมั่นและประสิทธิภาพของระบบ ViiCheck
                </p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-value">150,000+</div>
                    <div class="stat-label">สมาชิก</div>
                    <div class="stat-description">ผู้ใช้งานที่ไว้วางใจ</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="stat-value">75,000+</div>
                    <div class="stat-label">ยานพาหนะ</div>
                    <div class="stat-description">ที่ลงทะเบียนในระบบ</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="stat-value">25,000+</div>
                    <div class="stat-label">ครั้งที่ให้การช่วยเหลือ</div>
                    <div class="stat-description">สถิติการช่วยเหลือสำเร็จ</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="stat-value">77</div>
                    <div class="stat-label">จังหวัดที่ครอบคลุม</div>
                    <div class="stat-description">ทั่วประเทศไทย</div>
                </div>
            </div>

            <div class="achievement-badge">
                <i class="fas fa-trophy"></i>
                ได้รับรางวัลระบบช่วยเหลือฉุกเฉินยอดเยี่ยม ประจำปี 2024
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <style>
        .video-modal {
            display: none;
            /* ซ่อนตอนแรก */
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
        }

        .video-modal-content {
            position: absolute;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            width: 100%;
            max-width: 800px;
            background: #000;
            padding: 0;
            border-radius: 8px;
            overflow: hidden;
        }

        .video-modal-content iframe {
            width: 100%;
            height: 450px;
        }

        .video-close {
            position: absolute;
            top: -20px;
            right: 12px;
            color: white;
            font-size: 50px;
            cursor: pointer;
        }
    </style>
    <!-- Video Modal -->
    <!-- ===== Modal ===== -->
    <div class="video-modal" id="videoModal">
        <div class="video-modal-content">
            <span class="video-close" id="videoClose">&times;</span>
            <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <section id="services" class="services">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">บริการของเรา</h2>
                <p class="section-description">
                    บริการครบครันเพื่อความปลอดภัยและความสะดวกสบายของคุณ
                </p>
            </div>

            <div class="services-grid">
                <!-- ViiSOS Service -->
                <div class="service-card">
                    <div class="service-card-child">
                        <div class="service-header">
                            <div class="service-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <h3 class="service-title">ระบบช่วยเหลือเหตุฉุกเฉิน ViiSOS</h3>
                        </div>
                       <div class="service-content">
                            <div class="service-video">
                                <a href="https://www.youtube.com/embed/X8SX35pf3dY" class="video-placeholder">
                                    <i class="fas fa-play-circle"></i>
                                    <span>วิดีโอสาธิต ViiSOS</span>
                                </a>
                                <div class="img-step">
                                    <img src="{{ asset('img/ขั้นตอนการลงทะเบียน/viisos1.png') }}" class="gallery-image-how-to-use clickable-image">
                                </div>
                            </div>

                            <div class="service-steps">
                                <h4>ขั้นตอนการใช้งาน:</h4>
                                <ol>
                                    <li>
                                        สแกน QR CODE เพื่อเข้าสู่ Line Official ของ Viicheck 
                                        <button class="btn-step-img" data-img="{{ asset('img/ขั้นตอนการลงทะเบียน/viisos1.png') }}">ดู</button>
                                    </li>
                                    <li>
                                        เลือกเมนู SOS 
                                        <button class="btn-step-img" data-img="{{ asset('img/ขั้นตอนการลงทะเบียน/viisos2.png') }}">ดู</button>
                                    </li>
                                    <li>
                                        กดขอความช่วยเหลือจากเจ้าหน้าที่ได้เลย!! 
                                        <button class="btn-step-img" data-img="{{ asset('img/ขั้นตอนการลงทะเบียน/viisos3.png') }}">ดู</button>
                                    </li>
                                </ol>
                            </div>
                        </div>


                    </div>
                </div>
                
                 <!-- Repair Service -->
<style>
    .img-fix {
        border-radius: 5px;
        opacity: 1;
        transition: opacity 1s ease-in-out;
            aspect-ratio: 16 / 9;
    }
    .fade-out {
        opacity: 0;
    }
    .fade-in {
        opacity: 1;
    }
</style>
                <div class="service-card">
                    <div class="service-card-child">

                        <div class="service-header">
                            <div class="service-icon">
                                <i class="fas fa-tools"></i>
                            </div>
                            <h3 class="service-title">ระบบแจ้งซ่อม</h3>
                            <h3 class="service-title">ViiFIX</h3>
                        </div>
                        <div class="service-content" >

                            <div class="service-video">
                                <div class="img-fix">
                                    <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viifix/1.jpg') }}" alt="การใช้งาน ViiSOS - ระบบช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image " style="border-radius: 5px;">
                                </div>
                                <div class="img-fix img-fix-none">
                                    <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viifix/2.jpg') }}" alt="การใช้งาน ViiSOS - ระบบช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image " style="border-radius: 5px;">
                                </div>
                            </div>

                            <div class="service-steps">
                                <h4>ขั้นตอนการใช้งาน:</h4>
                                <ol>
                                    <li>บริการล้างแอร์</li>
                                    <li>บริการล้างเครื่องซักผ้า</li>
                                    <li>บริการงานสุขภัณฑ์และงานประปา</li>
                                    <li>บริการทำความสะอาดกำจัดคราบเปื้อน ละกำจัดไรฝุ่นบนที่นอน-โซฟา</li>
                                    <li>บริการฉีดพ่นน้ำ ยาฆ่าเชื้อ</li>
                                    <li>บริการตรวจรับคอนโดมิเนียม, บ้านเดี่ยว, บ้านแฝด หรือทาวน์โฮม</li>
                                    <li>สำรวจซ่อมซ่อมทุกประเภทพร้อมออกใบเสนอราคา (รวมถึงเหตุแผ่นดินไหว)</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const totalImages = 14; // จำนวนรูปทั้งหมด
                        const basePath = "{{ asset('/img/ขั้นตอนการลงทะเบียน/viifix/') }}/"; 
                        const imgElements = document.querySelectorAll(".service-video .img-fix");

                        let currentImages = [1, 2]; // รูปเริ่มต้นที่แสดง
                        let currentIndex = 0; // บน/ล่าง สลับกัน

                        function getNewImage(excludeList) {
                            // สุ่มรูปใหม่ โดยไม่เอารูปที่อยู่ใน excludeList
                            let available = Array.from({ length: totalImages }, (_, i) => i + 1)
                                .filter(num => !excludeList.includes(num));
                            const randIndex = Math.floor(Math.random() * available.length);
                            return available[randIndex];
                        }

                        function changeImage() {
                            const img = imgElements[currentIndex];
                            const exclude = [...currentImages]; // ห้ามซ้ำกับทั้งสองภาพปัจจุบัน

                            const newImg = getNewImage(exclude);

                            img.classList.add("fade-out");

                            setTimeout(() => {
                                img.src = basePath + newImg + ".jpg";
                                img.classList.remove("fade-out");
                                img.classList.add("fade-in");

                                // อัพเดตว่า index นี้ใช้ภาพอะไรแล้ว
                                currentImages[currentIndex] = newImg;

                                setTimeout(() => {
                                    img.classList.remove("fade-in");
                                }, 1000);
                            }, 1000);

                            // สลับ index (บน/ล่าง)
                            currentIndex = (currentIndex + 1) % imgElements.length;
                        }

                        setInterval(changeImage, 3000);
                    });
                </script>


                <!-- ViiMOVE Service -->
                <div class="service-card">
                    <div class="service-card-child">

                        <div class="service-header">
                            <div class="service-icon">
                                <i class="fas fa-car"></i>
                            </div>
                            <h3 class="service-title">ระบบติดต่อเจ้าของรถ ViiMOVE</h3>
                        </div>
                        <div class="service-content">

                            <div class="service-video">

                                <a href="https://www.youtube.com/embed/kb9UjWQCltg" class="video-placeholder">
                                    <i class="fas fa-play-circle"></i>
                                    <span>วิดีโอสาธิต ViiSOS</span>
                                </a>
                                <div class="img-step">

                                    <img src="{{ asset('img/ขั้นตอนการลงทะเบียน/viisos1.png') }}" class="gallery-image-how-to-use  clickable-image ">
                                </div>

                            </div>

                            <div class="service-steps">
                                <h4>ขั้นตอนการใช้งาน:</h4>
                                <ol>
                                    <li>สแกน QR CODE เพื่อเข้าสู่ Line Official ของ Viicheck <button class="btn-step-img" data-img="{{ asset('img/ขั้นตอนการลงทะเบียน/viisos1.png') }}">ดู</button></li>
                                    <li>ลงทะเบียนในการใช้งาน Viicheck <button class="btn-step-img" data-img="{{ asset('img/ขั้นตอนการลงทะเบียน/viimove1.png') }}">ดู</button></li>
                                    <li>กรอกข้อมูลรถของคุณเพื่อใช้บริการ Viicheck <button class="btn-step-img" data-img="{{ asset('img/ขั้นตอนการลงทะเบียน/viimove2.png') }}">ดู</button></li></li>
                                    <li>ดาวน์โหลดและติดสติ๊กเกอร์ <button class="btn-step-img" data-img="{{ asset('img/ขั้นตอนการลงทะเบียน/viimove3.png') }}">ดู</button></li></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // หา service-content ทุก block
    const serviceContents = document.querySelectorAll(".service-content");

    serviceContents.forEach(content => {
        const imgElement = content.querySelector(".img-step img");
        const buttons = content.querySelectorAll(".service-steps button");

        buttons.forEach(button => {
            button.addEventListener("click", () => {
                const newImg = button.getAttribute("data-img");
                if (newImg) {
                    imgElement.src = newImg;
                }
            });
        });
    });
});
</script>
                <!-- <div class="service-card">
                    <div class="service-card-child">

                        <div class="service-header">
                            <div class="service-icon">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div>
                                <h3 class="service-title">ระบบแจ้งซ่อม</h3>
                                <h3 class="service-title">Vii...</h3>

                            </div>

                        </div>

                        <div class="service-gallery">
                            <div class="gallery-item">
                                <div class="image-placeholder">
                                    <img src="{{ asset('/img/review/1.jpg') }}" alt="การใช้งาน ViiSOS - ระบบช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image" style="border-radius: 5px;">

                                </div>
                            </div>
                            <div class="gallery-item">
                                <div class="image-placeholder">
                                    <img src="{{ asset('/img/review/1.jpg') }}" alt="การใช้งาน ViiSOS - ระบบช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image" style="border-radius: 5px;">

                                </div>
                            </div>
                            <div class="gallery-item">
                                <div class="image-placeholder">
                                    <img src="{{ asset('/img/review/1.jpg') }}" alt="การใช้งาน ViiSOS - ระบบช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image" style="border-radius: 5px;">

                                </div>
                            </div>
                            <div class="gallery-item">
                                <div class="image-placeholder">
                                    <img src="{{ asset('/img/review/1.jpg') }}" alt="การใช้งาน ViiSOS - ระบบช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image" style="border-radius: 5px;">

                                </div>
                            </div>
                            <div class="gallery-item">
                                <div class="image-placeholder">
                                    <img src="{{ asset('/img/review/1.jpg') }}" alt="การใช้งาน ViiSOS - ระบบช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image" style="border-radius: 5px;">

                                </div>
                            </div>
                            <div class="gallery-item">
                                <div class="image-placeholder">
                                    <img src="{{ asset('/img/review/1.jpg') }}" alt="การใช้งาน ViiSOS - ระบบช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image" style="border-radius: 5px;">

                                </div>
                            </div>
                            <div class="gallery-item">
                                <div class="image-placeholder">
                                    <img src="{{ asset('/img/review/1.jpg') }}" alt="การใช้งาน ViiSOS - ระบบช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image" style="border-radius: 5px;">

                                </div>
                            </div>
                            <div class="gallery-item">
                                <div class="image-placeholder">
                                    <img src="{{ asset('/img/review/1.jpg') }}" alt="การใช้งาน ViiSOS - ระบบช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image" style="border-radius: 5px;">

                                </div>
                            </div>
                            <div class="gallery-item">
                                <div class="image-placeholder">
                                    <img src="{{ asset('/img/review/1.jpg') }}" alt="การใช้งาน ViiSOS - ระบบช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image" style="border-radius: 5px;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    
<script>
document.addEventListener("DOMContentLoaded", () => {
    const serviceCards = document.querySelectorAll(".service-card");
    const servicesGrid = document.querySelector(".services-grid");

    function updateServicesGrid() {
        const hasActive = document.querySelector(".service-card.active");
        if (hasActive) {
            servicesGrid.classList.add("active");
        } else {
            servicesGrid.classList.remove("active");
        }
    }

    serviceCards.forEach(card => {
        card.addEventListener("click", () => {
            if (card.classList.contains("active")) {
                card.classList.remove("active");
            } else {
                serviceCards.forEach(c => c.classList.remove("active"));
                card.classList.add("active");
            }
            updateServicesGrid();
        });
    });
});
</script>
    <!-- Awards Section -->
    <section id="awards" class="awards">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">รางวัลและความสำเร็จ</h2>
                <p class="section-description">
                    รางวัลที่ได้รับซึ่งแสดงถึงคุณภาพและความน่าเชื่อถือของบริการ
                </p>
            </div>

            <div class="awards-content">
                <div class="award-image">
                    <div class="image-placeholder large">
                        <img style="object-fit: cover;width: 560px;height: 420px;border-radius: 10px;" src="{{ asset('/img/more/award-2.jpg') }}" alt="" class="img-cover clickable-image">
                    </div>
                </div>

                <div class="awards-list">
                    <div class="award-item">
                        <div class="award-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <div class="award-content">
                            <h4>รางวัล</h4>
                            <p>การวิจัยและนวัตกรรมการแพทย์ฉุกเฉิน” National EMS Forum 2023 : Research and Innovation on Emergency Medicine</p>
                        </div>
                    </div>

                    <div class="award-item">
                        <div class="award-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="award-content">
                            <h4>อันดับ</h4>
                            <p>ชนะเลิศอันดับที่ 1</p>
                        </div>
                    </div>

                    <div class="award-item">
                        <div class="award-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="award-content">
                            <h4>ปี</h4>
                            <p>2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .lightbox {
            display: none;
            /* ใช้ flex เพื่อจัดกลาง */

            position: fixed;
            z-index: 999999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .lightbox-content {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 90vw;
            max-height: 90vh;
            object-fit: contain;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .close {
            position: absolute;
            top: 30px;
            right: 45px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }

        .gallery-item img {
            transition: opacity 0.5s ease-in-out;
            opacity: 1;
        }
    </style>
    </style>
    <!-- Gallery Section -->
    <section id="gallery" class="gallery">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">ภาพการใช้งาน</h2>
                <p class="section-description">
                    ภาพการใช้งานจริงจากผู้ใช้บริการทั่วประเทศ
                </p>
            </div>

            <!-- <div class="gallery-grid">
                <div class="gallery-item">
                    <img class="clickable-image" src="{{ asset('/img/review/1.jpg') }}" alt="การใช้งาน ViiSOS">
                </div>
                <div class="gallery-item">
                    <img class="clickable-image" src="{{ asset('/img/review/2.jpg') }}" alt="การใช้งาน ViiMOVE">
                </div>
                <div class="gallery-item">
                    <img class="clickable-image" src="{{ asset('/img/review/3.jpg') }}" alt="ระบบแจ้งซ่อม">
                </div>
                <div class="gallery-item">
                    <img class="clickable-image" src="{{ asset('/img/review/4.jpg') }}" alt="การติดสติ๊กเกอร์">
                </div>
                <div class="gallery-item">
                    <img class="clickable-image" src="{{ asset('/img/review/5.jpg') }}" alt="การช่วยเหลือฉุกเฉิน">
                </div>
                <div class="gallery-item">
                    <img class="clickable-image" src="{{ asset('/img/review/6.jpg') }}" alt="ผู้ใช้งานพึงพอใจ">
                </div>
            </div> -->
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="{{ asset('/img/review/1.jpg') }}" alt="การใช้งาน ViiSOS - ระบบช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image">
                    <div class="gallery-overlay">
                        <span>การใช้งาน ViiSOS</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('/img/review/2.jpg') }}" alt="การใช้งาน ViiMOVE - ระบบติดต่อเจ้าของรถ" class="gallery-image clickable-image">
                    <div class="gallery-overlay">
                        <span>การใช้งาน ViiMOVE</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('/img/review/3.jpg') }}" alt="ระบบแจ้งซ่อม" class="gallery-image clickable-image">
                    <div class="gallery-overlay">
                        <span>ระบบแจ้งซ่อม</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('/img/review/4.jpg') }}" alt="การติดสติ๊กเกอร์ QR Code" class="gallery-image clickable-image">
                    <div class="gallery-overlay">
                        <span>การติดสติ๊กเกอร์</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('/img/review/5.jpg') }}" alt="การช่วยเหลือฉุกเฉิน" class="gallery-image clickable-image">
                    <div class="gallery-overlay">
                        <span>การช่วยเหลือฉุกเฉิน</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('/img/review/6.jpg') }}" alt="ผู้ใช้งานพึงพอใจ" class="gallery-image clickable-image">
                    <div class="gallery-overlay">
                        <span>ผู้ใช้งานพึงพอใจ</span>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const imagesData = [{
                        src: "{{ asset('/img/review/1.jpg') }}",
                        title: "การใช้งาน ViiSOS"
                    },
                    {
                        src: "{{ asset('/img/review/2.jpg') }}",
                        title: "การใช้งาน ViiMOVE"
                    },
                    {
                        src: "{{ asset('/img/review/3.jpg') }}",
                        title: "ระบบแจ้งซ่อม"
                    },
                    {
                        src: "{{ asset('/img/review/4.jpg') }}",
                        title: "การติดสติ๊กเกอร์"
                    },
                    {
                        src: "{{ asset('/img/review/5.jpg') }}",
                        title: "การช่วยเหลือฉุกเฉิน"
                    },
                    {
                        src: "{{ asset('/img/review/6.jpg') }}",
                        title: "ผู้ใช้งานพึงพอใจ"
                    },
                    {
                        src: "{{ asset('/img/review/7.jpg') }}",
                        title: "ระบบแจ้งซ่อม"
                    },
                    {
                        src: "{{ asset('/img/review/8.jpg') }}",
                        title: "การติดสติ๊กเกอร์"
                    },
                    {
                        src: "{{ asset('/img/review/9.jpg') }}",
                        title: "การช่วยเหลือฉุกเฉิน"
                    },
                    {
                        src: "{{ asset('/img/review/10.jpg') }}",
                        title: "ผู้ใช้งานพึงพอใจ"
                    }
                ];

                const galleryItems = document.querySelectorAll('.gallery-item');

                setInterval(() => {
                    const randomIndex = Math.floor(Math.random() * galleryItems.length);
                    const imgElement = galleryItems[randomIndex].querySelector('img');
                    const textElement = galleryItems[randomIndex].querySelector('.gallery-overlay span');

                    if (!imgElement || !textElement) return;

                    const usedImages = Array.from(document.querySelectorAll('.gallery-item img'))
                        .map(img => img.src.split('/').pop()); // เอาเฉพาะชื่อไฟล์

                    let availableImages = imagesData.filter(img =>
                        !usedImages.includes(img.src.split('/').pop()) // เช็กเฉพาะชื่อไฟล์
                    );

                    if (availableImages.length === 0) return;

                    const newData = availableImages[Math.floor(Math.random() * availableImages.length)];

                    imgElement.style.opacity = 0;
                    textElement.style.opacity = 0;

                    setTimeout(() => {
                        imgElement.src = newData.src;
                        imgElement.alt = newData.title;
                        textElement.textContent = newData.title;

                        imgElement.style.opacity = 1;
                        textElement.style.opacity = 1;
                    }, 500);
                }, 3000);
            });
        </script>


    </section>
    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox">
        <div style="display: flex;justify-content: center;align-items: center; width: 100%; height: 100%;">

            <span class="close">&times;</span>
            <img class="lightbox-content" id="lightbox-img">
        </div>
    </div>

    <script>
        document.querySelectorAll('.clickable-image').forEach(img => {
            img.addEventListener('click', function() {
                const lightbox = document.getElementById('lightbox');
                const lightboxImg = document.getElementById('lightbox-img');
                lightbox.style.display = 'block';
                lightboxImg.src = this.src;
            });
        });

        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('lightbox').style.display = 'none';
        });
    </script> @php
    $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->get();
    @endphp
    <!-- Partners Section -->
    <section class="partners">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Powered by</h2>
                <p class="section-description">
                    พันธมิตรที่ไว้วางใจและสนับสนุนระบบ ViiCheck
                </p>
            </div>

            <div class="partners">
                <div class="partners-track">
                    @foreach($partner as $item)
                    @if($item->name == "Ocean Life")
                    <a class="partner-item" href="https://www.ocean.co.th/services/digital-healthcare/ocean-life-saver" target="_blank">
                        <div class="partner-logo">
                            <img style="width: 100%; object-fit: contain;" src="{{ url('storage/'.$item->logo) }}">
                        </div>
                        <span class="partner-name">{{ $item->full_name }}</span>
                    </a>
                    @else
                    <div class="partner-item">
                        <div class="partner-logo">
                            <img style="width: 100%; object-fit: contain;" src="{{ url('storage/'.$item->logo) }}">
                        </div>
                        <span class="partner-name">{{ $item->full_name }}</span>
                    </div>
                    @endif
                    @endforeach

                    <!-- Duplicate อีกชุดเพื่อให้เลื่อนต่อเนื่อง -->
                    @foreach($partner as $item)
                    @if($item->name == "Ocean Life")
                    <a class="partner-item" href="https://www.ocean.co.th/services/digital-healthcare/ocean-life-saver" target="_blank">
                        <div class="partner-logo">
                            <img style="width: 100%; object-fit: contain;" src="{{ url('storage/'.$item->logo) }}">
                        </div>
                        <span class="partner-name">{{ $item->full_name }}</span>
                    </a>
                    @else
                    <div class="partner-item">
                        <div class="partner-logo">
                            <img style="width: 100%; object-fit: contain;" src="{{ url('storage/'.$item->logo) }}">
                        </div>
                        <span class="partner-name">{{ $item->full_name }}</span>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
    </section>

 

    <script>
        // Mobile Navigation Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileNav = document.getElementById('mobileNav');
            const navbar = document.getElementById('navbar');

            // Toggle mobile navigation
            mobileMenuBtn.addEventListener('click', function() {
                mobileNav.classList.toggle('active');
                const icon = mobileMenuBtn.querySelector('i');

                if (mobileNav.classList.contains('active')) {
                    icon.className = 'fas fa-times';
                } else {
                    icon.className = 'fas fa-bars';
                }
            });

            // Close mobile nav when clicking on links
            const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
            mobileNavLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileNav.classList.remove('active');
                    mobileMenuBtn.querySelector('i').className = 'fas fa-bars';
                });
            });

            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                    navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
                } else {
                    navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                    navbar.style.boxShadow = 'none';
                }
            });

            // Smooth scrolling for anchor links
            const anchorLinks = document.querySelectorAll('a[href^="#"]');
            anchorLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        const offsetTop = targetElement.offsetTop - 80; // Account for fixed navbar
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-on-scroll');
                    }
                });
            }, observerOptions);

            // Observe elements for animation
            const animateElements = document.querySelectorAll('.stat-card, .service-card-child, .award-item, .gallery-item, .partner-item');
            animateElements.forEach(el => {
                observer.observe(el);
            });

            // Stats counter animation
            function animateCounter(element, target, duration = 2000) {
                let start = 0;
                const increment = target / (duration / 16);

                function updateCounter() {
                    start += increment;
                    if (start < target) {
                        element.textContent = Math.floor(start).toLocaleString() + '+';
                        requestAnimationFrame(updateCounter);
                    } else {
                        element.textContent = target.toLocaleString() + '+';
                    }
                }

                updateCounter();
            }

            // Trigger counter animation when stats section is visible
            const statsObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const statValues = entry.target.querySelectorAll('.stat-value');
                        statValues.forEach(statValue => {
                            const text = statValue.textContent;
                            const number = parseInt(text.replace(/[^0-9]/g, ''));
                            if (number > 1000) {
                                animateCounter(statValue, number);
                            }
                        });
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            const statsSection = document.querySelector('.stats');
            if (statsSection) {
                statsObserver.observe(statsSection);
            }

            const videoPlaceholders = document.querySelectorAll('.video-placeholder');
            const videoModal = document.getElementById('videoModal');
            const videoFrame = document.getElementById('videoFrame');
            const videoClose = document.getElementById('videoClose');

            videoPlaceholders.forEach(placeholder => {
                placeholder.addEventListener('click', function(e) {
                    e.preventDefault(); // ป้องกันการเด้งไปลิงก์
                    const videoUrl = this.getAttribute('href') + "?autoplay=1";
                    videoFrame.src = videoUrl;
                    videoModal.style.display = 'block';
                });
            });

            videoClose.addEventListener('click', () => {
                videoModal.style.display = 'none';
                videoFrame.src = ""; // หยุดวิดีโอ
            });

            window.addEventListener('click', (e) => {
                if (e.target === videoModal) {
                    videoModal.style.display = 'none';
                    videoFrame.src = "";
                }
            });

            // Gallery item click handlers
            const galleryItems = document.querySelectorAll('.gallery-item');
            galleryItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Here you would typically open a lightbox or larger view
                    const itemText = this.querySelector('.image-placeholder span').textContent;
                    alert(`เปิดภาพ: ${itemText}`);
                });
            });

            // Contact buttons functionality
            const contactButtons = document.querySelectorAll('.btn');
            contactButtons.forEach(button => {
                if (button.textContent.includes('ติดต่อเรา')) {
                    button.addEventListener('click', function() {
                        // Scroll to contact section
                        const contactSection = document.querySelector('#contact');
                        if (contactSection) {
                            const offsetTop = contactSection.offsetTop - 80;
                            window.scrollTo({
                                top: offsetTop,
                                behavior: 'smooth'
                            });
                        }
                    });
                }

                if (button.textContent.includes('SOS')) {
                    button.addEventListener('click', function() {
                        // Here you would typically trigger emergency call or redirect
                        alert('เรียกความช่วยเหลือฉุกเฉิน!\nกำลังเชื่อมต่อกับศูนย์ควบคุม...');
                    });
                }
            });

            // Form validation (if you add contact forms later)
            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            // Loading states for interactive elements
            function showLoading(element) {
                element.classList.add('loading');
                element.style.pointerEvents = 'none';
            }

            function hideLoading(element) {
                element.classList.remove('loading');
                element.style.pointerEvents = 'auto';
            }

            // Parallax effect for hero section
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const parallax = document.querySelector('.hero-bg');
                if (parallax) {
                    const speed = scrolled * 0.5;
                    parallax.style.transform = `translateY(${speed}px)`;
                }
            });

            // Add hover effects for better UX
            const hoverElements = document.querySelectorAll('.stat-card, .service-card, .award-item, .partner-item');
            hoverElements.forEach(element => {
                element.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px)';
                });

                element.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Add loading state to page
            window.addEventListener('load', function() {
                document.body.classList.add('loaded');
            });

            // Error handling for missing elements
            function safeQuerySelector(selector) {
                const element = document.querySelector(selector);
                if (!element) {
                    console.warn(`Element not found: ${selector}`);
                }
                return element;
            }

            // Initialize tooltips (if needed)
            function initTooltips() {
                const tooltipElements = document.querySelectorAll('[data-tooltip]');
                tooltipElements.forEach(element => {
                    element.addEventListener('mouseenter', function() {
                        const tooltip = document.createElement('div');
                        tooltip.className = 'tooltip';
                        tooltip.textContent = this.getAttribute('data-tooltip');
                        document.body.appendChild(tooltip);

                        const rect = this.getBoundingClientRect();
                        tooltip.style.left = rect.left + rect.width / 2 - tooltip.offsetWidth / 2 + 'px';
                        tooltip.style.top = rect.top - tooltip.offsetHeight - 5 + 'px';
                    });

                    element.addEventListener('mouseleave', function() {
                        const tooltip = document.querySelector('.tooltip');
                        if (tooltip) {
                            tooltip.remove();
                        }
                    });
                });
            }

            initTooltips();

            // Performance optimization: Debounce scroll events
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            // Apply debounce to scroll events
            const debouncedScrollHandler = debounce(function() {
                // Any expensive scroll operations here
            }, 10);

            window.addEventListener('scroll', debouncedScrollHandler);
        });

        // Utility functions
        function formatNumber(num) {
            if (num >= 1000000) {
                return (num / 1000000).toFixed(1) + 'M';
            } else if (num >= 1000) {
                return (num / 1000).toFixed(1) + 'K';
            }
            return num.toString();
        }

        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Export functions for potential use in other scripts
        window.ViiCheckUtils = {
            formatNumber,
            isElementInViewport,
            validateEmail: function(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
        };
    </script>
@endsection
