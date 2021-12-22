<div class="col-12">
    <h3>
        พื้นที่บริการ <b class="text-info">{{ $name_area }}</b>
    </h3>
    <br>
    <a id="btn_service_current" href="{{ url('/service_current?name_area=' . $name_area) }}" class="btn btn-primary text-white">พื้นที่ปัจจุบัน</a>
    <a id="btn_service_pending" href="{{ url('/service_pending?name_area=' . $name_area) }}" class="btn btn-warning text-white">รอการตรวจสอบ</a>
    <a id="btn_service_area" href="{{ url('/service_area?name_area=' . $name_area) }}"class="btn btn-secondary text-white">ปรับพื้นที่บริการ</a>
<hr>
</div>