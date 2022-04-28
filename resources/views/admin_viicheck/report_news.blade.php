<div class="row">
    <div class="col-12">
        <div class="row alert alert-secondary">
            <div class="col-1"></div>
            <div class="col-5">
                <b>หัวข้อข่าว</b><br>
                Title news
            </div>
            <div class="col-6">
                <b>เหตุผลการรายงาน</b><br>
                Title reports
            </div>
        </div>
        <hr>
        @foreach($report_news as $item)
        <div class="row">
            <div class="col-1">
                <center>{{ $loop->iteration }}</center>
            </div>
            <div class="col-5">
                <h5 style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;" class="text-dark"><b>{{ $item->title_news }}</b></h5>
            </div>
            <div class="col-6">
                <p style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden; font-size: 14px;">{{ $item->content }}</p>
            </div>
        </div>
        <hr>
        @endforeach
    </div>
</div>