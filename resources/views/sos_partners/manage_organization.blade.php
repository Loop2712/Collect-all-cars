
@extends('layouts.partners.theme_partner_sos')

@section('content')

<div class="card border-top border-0 border-4 border-info">
	<div class="card-body">
		<div class="border p-4 rounded">
			<div class="card-title d-flex align-items-center">
				<div>
					<i class="fa-duotone fa-sitemap me-1 font-22 text-info"></i>
				</div>
				<h5 class="mb-0 text-info">การจัดการข้อมูลองค์กร</h5>
			</div>
			<hr>
			<div class="row mb-3">
				<label for="name" class="col-sm-3 col-form-label">ชื่อ (สำหรับแสดงผล)</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="name" name="name" value="{{ $data_sos_partner->name }}">
				</div>
			</div>
			<div class="row mb-3">
				<label for="full_name" class="col-sm-3 col-form-label">ชื่อเต็ม</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="full_name" name="full_name" value="{{ $data_sos_partner->full_name }}">
				</div>
			</div>
			<div class="row mb-3">
				<label for="phone" class="col-sm-3 col-form-label">เบอร์ติดต่อ</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="phone" name="phone" value="{{ $data_sos_partner->phone }}">
				</div>
			</div>
			<div class="row mb-3">
				<label for="mail" class="col-sm-3 col-form-label">Mail</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="mail" name="mail" value="{{ $data_sos_partner->mail }}">
				</div>
			</div>
			<div class="row mb-3">
				<label for="color_main" class="col-sm-3 col-form-label">สีหลัก (สำหรับแสดงผลต่อผู้ใช้ เช่นปุ่ม SOS)</label>
				<div class="col-sm-3">
					<input type="text" class="form-control for_color" id="color_main" name="color_main" value="{{ $data_sos_partner->color_main }}">
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="show_color_main" style="background-color: {{ $data_sos_partner->color_main }};">
				</div>
			</div>
			<div class="row mb-3">
				<label for="color_navbar" class="col-sm-3 col-form-label">สี Navbar</label>
				<div class="col-sm-3">
					<input type="text" class="form-control for_color" id="color_navbar" name="color_navbar" value="{{ $data_sos_partner->color_navbar }}">
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="show_color_navbar" style="background-color: {{ $data_sos_partner->color_navbar }};">
				</div>
			</div>
			<div class="row mb-3">
				<label for="class_color_menu" class="col-sm-3 col-form-label">สี Menu</label>
				<div class="col-sm-3">
					<input type="text" class="form-control for_color" id="class_color_menu" name="class_color_menu" value="{{ $data_sos_partner->class_color_menu }}">
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="show_class_color_menu" style="background-color: {{ $data_sos_partner->class_color_menu }};">
				</div>
			</div>
			<div class="row mb-3 d-none">
				<label for="color_body" class="col-sm-3 col-form-label">สี พื้นหลัง</label>
				<div class="col-sm-3">
					<input type="text" class="form-control for_color" id="color_body" name="color_body" value="{{ $data_sos_partner->color_body }}">
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="show_color_body" style="background-color: {{ $data_sos_partner->color_body }};">
				</div>
			</div>
			<div class="row mb-3">
				<label for="secret_token" class="col-sm-3 col-form-label">Secret Token (สำหรับตั้งค่าต่างๆในระบบ)</label>
				<div class="col-sm-9">
					<p>
						<span id="text_secret_token">{{ $data_sos_partner->secret_token }}</span> <i class="fa-solid fa-copy btn" onclick="copy_secret_token();"></i>
					</p>
				</div>
			</div>


			<div class="row">
				<label class="col-sm-3 col-form-label"></label>
				<div class="col-sm-9">
					<button type="submit" class="btn btn-success px-5" id="save_data_partner" disabled>บันทึกการเปลี่ยนแปลง</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

document.addEventListener('DOMContentLoaded', (event) => {
    // console.log("START");
    set_data_start();
    initializeInputListeners();
});

function set_data_start(){
	// เก็บค่าของ input ทุกตัวในอ็อบเจ็กต์เริ่มต้น
    const initialValues = {
        name: document.getElementById('name').value,
        full_name: document.getElementById('full_name').value,
        phone: document.getElementById('phone').value,
        mail: document.getElementById('mail').value,
        color_main: document.getElementById('color_main').value,
        color_navbar: document.getElementById('color_navbar').value,
        class_color_menu: document.getElementById('class_color_menu').value,
        color_body: document.getElementById('color_body').value
    };

    // ตรวจจับการเปลี่ยนแปลงใน input ทุกตัว
    document.querySelectorAll('input').forEach(function(input) {
        input.addEventListener('input', function() {
            // ตรวจสอบว่าค่า input ใดเปลี่ยนไปจากค่าเริ่มต้นหรือไม่
            const isChanged = Object.keys(initialValues).some(key => 
                document.getElementById(key).value !== initialValues[key]
            );

            if(input.name == "color_navbar"){
                // console.log(input.name)
                document.querySelector('#div_color_navbar').setAttribute("style", "background-color: "+input.value+";");
            }

            if(input.name == "class_color_menu"){
                // console.log(input.name)
                document.querySelector('#header-wrapper_menu').setAttribute("style", "background-color: "+input.value+";");
                document.querySelector('#switcher-wrapper_menu').setAttribute("style", "background-color: "+input.value+";");
            }

            // ถ้ามีการเปลี่ยนแปลงที่แตกต่างจากค่าเริ่มต้น ให้เปิดปุ่ม save_data_partner
            document.getElementById('save_data_partner').disabled = !isChanged;
        });
    });

    // ฟังก์ชันสำหรับส่งข้อมูลเมื่อกดปุ่ม Save
    document.getElementById('save_data_partner').addEventListener('click', function() {
        // เก็บข้อมูล input ทุกตัวลงในอ็อบเจ็กต์
        const updatedData = {
            id: "{{ $data_sos_partner->id }}",
            name: document.getElementById('name').value,
            full_name: document.getElementById('full_name').value,
            phone: document.getElementById('phone').value,
            mail: document.getElementById('mail').value,
            color_main: document.getElementById('color_main').value,
            color_navbar: document.getElementById('color_navbar').value,
            class_color_menu: document.getElementById('class_color_menu').value,
            color_body: document.getElementById('color_body').value
        };

        // ส่งข้อมูลไปยังเซิร์ฟเวอร์โดยใช้ fetch API
        fetch("{{ url('/') }}/api/edit_data_sos_partners", {  
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(updatedData)
        })
        .then(response => response.text())
        .then(data => {
            alert('บันทึกข้อมูลเรียบร้อยแล้ว!');
            // console.log('Success:', data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    });

}


// ฟังก์ชันเริ่มต้นที่จะผูก event กับ input ทุกตัวที่มี name
function initializeInputListeners() {
    // เลือก input ทุกตัวที่มี class for_color
    const colorInputs = document.querySelectorAll('.for_color');

    colorInputs.forEach(input => {
        input.addEventListener('input', function () {
            // ดึงค่า ID ของ input ปัจจุบันที่มีการเปลี่ยนแปลง
            const inputId = input.id;
            // หาค่า input ที่มี id ขึ้นต้นด้วย show_
            const showInput = document.getElementById('show_' + inputId);
            if (showInput) {
                // ตั้งค่าสีพื้นหลังของ input ที่เจอ
                showInput.style.backgroundColor = input.value;
            }
        });
    });
}

function copy_secret_token(){
	const textToCopy = document.getElementById('text_secret_token').textContent;
    
    // ใช้ Clipboard API เพื่อคัดลอกข้อความ
    navigator.clipboard.writeText(textToCopy).then(() => {
        alert('คัดลอกข้อความเรียบร้อยแล้ว!');
    }).catch(err => {
        console.error('ไม่สามารถคัดลอกข้อความได้:', err);
    });
}
</script>

@endsection
