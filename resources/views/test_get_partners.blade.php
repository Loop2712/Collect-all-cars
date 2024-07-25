@php
	$data_partner = App\Models\Partner::get();

	// สร้างตัวแปรเพื่อเก็บผลลัพธ์
	$unique_names = [];
	$name_areas = [];

	// ลูปผ่านข้อมูลแต่ละแถว
	foreach ($data_partner as $partner) {
	    $name = $partner->name;
	    $name_area = $partner->name_area;

	    // ถ้า name_area เป็นค่าว่าง ให้ใส่ "main" แทน
	    if (empty($name_area)) {
	        $name_area = 'main';
	    }

	    // ตรวจสอบว่า name นี้มีอยู่ใน $unique_names หรือไม่
	    if (!isset($unique_names[$name])) {
	        // ถ้าไม่มี ให้เพิ่มเข้าไป
	        $unique_names[$name] = 1;
	        $name_areas[$name] = [$name_area];
	    } else {
	        // ถ้ามีอยู่แล้ว ให้เพิ่ม name_area เข้าไปในรายการ
	        $unique_names[$name]++;
	        if (!in_array($name_area, $name_areas[$name])) {
	            $name_areas[$name][] = $name_area;
	        }
	    }
	}
@endphp

<h1>ทั้งหมด : {{ count($unique_names) }}</h1>
<hr>
@foreach ($unique_names as $name => $count)
	<h3>
		{{ $name }} =>  Count: {{ $count }}
	</h3>
	<p>
		{{ implode(', ', $name_areas[$name]) }}
	</p>
	<br>
@endforeach