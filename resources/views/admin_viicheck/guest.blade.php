<div class="row">
    <div class="col-12">
        <div class="row alert alert-secondary">
            <div class="col-1"></div>
            <div class="col-5">
                <b>ชื่อ</b><br>
                Name
            </div>
            <div class="col-3">
                <b>รายงานทั้งหมด</b><br>
                All reports
            </div>
            <div class="col-3">
                <b>การจัดอันดับ</b><br>
                Ranking
            </div>
        </div>
        <hr>
        @foreach($guest as $item)
        <div class="row">
            <div class="col-1">
                <center>{{ $loop->iteration }}</center>
            </div>
            <div class="col-5">
                <h5 class="text-success"><b>{{ $item->name }}</b></h5>
            </div>
            <div class="col-3">
                <b>{{ $item->count }}</b>
            </div>
            <div class="col-3">
                @if(!empty($item->user->ranking))
                @switch($item->user->ranking)
                    @case('Gold')
                        <p class="btn btn-sm btn-light " href=""><img width="20" src="{{ url('/img/ranking/gold.png') }}"> Gold</p>
                    @break
                    @case('Silver')
                        <p class="btn btn-sm btn-light " href=""><img width="20" src="{{ url('/img/ranking/silver.png') }}"> Silver</p>
                    @break
                    @case('Bronze')
                        <p class="btn btn-sm btn-light " href=""><img width="20" src="{{ url('/img/ranking/bronze.png') }}"> Bronze</p>
                    @break
                @endswitch
                @endif
            </div>
        </div>
        <hr>
        @endforeach
    </div>
</div>