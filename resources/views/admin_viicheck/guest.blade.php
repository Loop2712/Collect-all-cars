<div class="row">
    <div class="col-12">
        <div class="row alert alert-secondary">
            <div class="col-1"></div>
            <div class="col-5"><b>Name</b></div>
            <div class="col-3"><b>All reports</b></div>
            <div class="col-3"><b>Ranking</b></div>
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
                    @case('Senior')
                        <a class="btn btn-sm btn-light " href=""><i class="fas fa-crown" style="color: #B8860B"></i> Senior</a>
                    @break
                    @case('Common')
                        <a class="btn btn-sm btn-light " href=""><i class="fas fa-award" style="color: #87CEEB"></i> Common</a>
                    @break
                    @case('Normal')
                        <a class="btn btn-sm btn-light " href=""><i class="fas fa-shield-alt" style="color: #3CB371"></i> Normal</a>
                    @break
                @endswitch
                @endif
            </div>
        </div>
        <hr>
        @endforeach
    </div>
</div>