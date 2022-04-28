@extends('layouts.viicheck')

<body>
	<div class="col-md-12">
  <h1 class="d-none d-lg-block" style="margin-top:180px; text-align:center;">FAQ คำถามที่พบบ่อย</h1>
  <h1 class="d-block d-md-none" style="margin-top:150px; text-align:center;">FAQ<br>คำถามที่พบบ่อย</h1>
  	<main>
  		<details open>
    		<summary>ViiCHECK คืออะไร</summary>
    			<div class="faq__content">
      				<p style="text-indent:1.5em;"><b>One-Stop-Service Platform</b> ที่เป็นแหล่งจัดเก็บข้อมูลของยานพาหนะออนไลน์ โดยมุ่งเน้นในการสร้างสังคมที่ดีขึ้น</p>
    			</div>
  		</details>

    	<details>
    		<summary>ViiCHECK มีบริการอะไรบ้าง</summary>
    		<div class="faq__content">
      			<p style="text-indent:1.5em;"><b>ViiMOVE</b> : เปลี่ยนการแจ้งเตือนการเลื่อนรถแบบเก่าๆ ให้ง่ายและรวดเร็วมากขึ้น โดย ViiMOVE เป็นระบบเพื่อช่วยในการติดต่อ สะดวก ปลอดภัย และที่สำคัญ ฟรี ไม่มีค่าใช้จ่าย <br></p>
	  			<p style="text-indent:1.5em;"><b>SOS</b> : รวมรวมเบอร์โทรศัพท์ศูนย์ช่วยเหลือที่จำเป็นในยามฉุกเฉิน เช่น เบอร์โทรศัพท์แจ้งเหตุด่วนเหตุร้าย, หน่วยแพทย์กู้ชีวิต, จส.100 เป็นต้น<br></p>
	  			<p style="text-indent:1.5em;"><b>Promotion</b>: อัพเดทโปรโมชั่นจากศูนย์บริการชั้นนำในทุกๆสัปดาห์ มีทั้งโปรโมชั่นรถยนต์ และรถจักรยานยนต์<br></p>
	  			<p style="text-indent:1.5em;"><b>บริการอื่นๆ</b> เช่น บริการแจ้งเตือนวันหมดอายุของประกัน และ พรบ. ของรถคันนั้นๆ , บริการเก็บหลักฐานสำคัญ เช่น ใบอนุญาตการขับขี่รถยนต์ และ รถจักรยานยนต์ และบริการเช็คราคากลางของรถยนต์โดยอ้างอิงราคากลางจากกรมขนส่งทางบก </p>
    		</div>
  		</details>
  		<details>
    		<summary>ข้อมูลที่จำเป็นต้องใช้ในการลงทะเบียน</summary>
    			<div class="faq__content">
					<p style="text-indent:1.5em;">ยี่ห้อรถที่ขับขี่, รุ่นของรถที่ขับขี่, ทะเบียนรถ, จังหวัดของทะเบียนรถ และจังหวัดที่ผู้ขับขี่อยู่ (กรอกลงทะเบียนเพียงครั้งแรกเท่านั้น)</p>
    			</div>
  		</details>
		<details>
    		<summary>ผู้ใช้บริการสามารถใช้บริการได้ตลอดเวลาหรือไม่ ? </summary>
    			<div class="faq__content">
      				<p style="text-indent:1.5em;">ผู้บริการสามารถเรียกใช้บริการเราได้ตลอด 24 ชั่วโมง</div>
  		</details>

    	<details>
    		<summary>จำเป็นต้องลงทะเบียนก่อนการใช้งานทุกครั้งหรือไม่</summary>
    		<div class="faq__content">
      			<p style="text-indent:1.5em;">ผู้ใช้บริการลงทะเบียนเพียงครั้งแรกเท่านั้น </p>
	  			</div>
  		</details>
  		<details>
    		<summary>สามารถติดตามข่าวสาร ViiCHECK ได้ที่ไหนบ้าง</summary>
    			<div class="faq__content">
					<p style="text-indent:1.5em;">สามารถติดตามผ่านทาง Website: www.viicheck.com และ ผ่านทาง Social Network ต่างๆ เช่น Facebook , Instagram, Youtube และ Line Official @viicheck </div>
  		</details>
		<details>
    		<summary>อยากทราบข้อมูลบริการเพิ่มเติม ต้องทำอย่างไร</summary>
    			<div class="faq__content">
					<p style="text-indent:1.5em;">สามารถติดต่อ ViiCHECK Contact Center 02-0277856 หรือ Messengerหรือ ติดต่อเราผ่านทาง E-mail: contact.viicheck@gmail.com</div>
  		</details>
   </main>
</div>

<script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CE7DC2JW&placement=wwwcssscriptcom";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

</script>

</body>
</html>

<style>
body {
  font-size: 16px;
  font-weight: 400;
  line-height: 1.5;
  letter-spacing: 0.5px;
  text-align: center;
  height: 100vh;
}
h1 {
  font-size: clamp(20px, 4vw, 30px);
  line-height: 1.2;
  margin-bottom: 40px;
  margin-top: 150px;
}
main {
  max-width: 1000px;
  margin: 0 auto;
}
summary {
  font-size: 1.25rem;
  font-weight: 600;
  background-color: #fafafa;
  background-image: radial-gradient(circle at 40% 91%, rgba(251, 251, 251,0.04) 0%, rgba(251, 251, 251,0.04) 50%,rgba(229, 229, 229,0.04) 50%, rgba(229, 229, 229,0.04) 100%),radial-gradient(circle at 66% 97%, rgba(36, 36, 36,0.04) 0%, rgba(36, 36, 36,0.04) 50%,rgba(46, 46, 46,0.04) 50%, rgba(46, 46, 46,0.04) 100%),radial-gradient(circle at 86% 7%, rgba(40, 40, 40,0.04) 0%, rgba(40, 40, 40,0.04) 50%,rgba(200, 200, 200,0.04) 50%, rgba(200, 200, 200,0.04) 100%),radial-gradient(circle at 15% 16%, rgba(99, 99, 99,0.04) 0%, rgba(99, 99, 99,0.04) 50%,rgba(45, 45, 45,0.04) 50%, rgba(45, 45, 45,0.04) 100%),radial-gradient(circle at 75% 99%, rgba(243, 243, 243,0.04) 0%, rgba(243, 243, 243,0.04) 50%,rgba(37, 37, 37,0.04) 50%, rgba(37, 37, 37,0.04) 100%),linear-gradient(90deg, rgb(34, 222, 237),rgb(135, 89, 215));
  color: #fff;
  padding: 1rem;
  margin-bottom: 1rem;
  outline: none;
  border-radius: 0.25rem;
  text-align: left;
  cursor: pointer;
  position: relative;
}
p { text-align: left; }
details[open] summary ~ * {
  animation: sweep .5s ease-in-out;
}
@keyframes sweep {
  0%    {opacity: 0; margin-top: -10px}
  100%  {opacity: 1; margin-top: 0px}
}
details > summary::after {
  position: absolute;
  content: "+";
  right: 20px;
}
details[open] > summary::after {
  position: absolute;
  content: "-";
  right: 20px;
}
details > summary::-webkit-details-marker {
  display: none;
}

</style>






