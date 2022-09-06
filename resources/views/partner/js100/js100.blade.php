<div id="div_content_sos_js100" class="row text-center"> 

    <div class="col-3">
        <div style="margin-top: -10px;" >
            <h5 class="text-success float-left">
                <span style="font-size: 15px;">
                    <a target="break" href="{{ url('/').'/profile/'.$item->user_id }}">
                        <i class="far fa-eye text-primary"></i>
                    </a>
                </span>
                <span>
                    &nbsp;{{ $item->name }}
                    <br>
                </span>
            </h5>
        </div>
    </div>

    <div class="col-3">
        {{ $item->phone }}
    </div>

    <div class="col-3">
        <b>{{ $item->created_at}} </b>
    </div>

    <div class="col-3">
        <div style="margin-top: -10px;">
            <a id="tag_a_view_marker" class="link text-danger" href="#map" onclick="view_marker('{{ $item->lat }}' , '{{ $item->lng }}', '{{ $item->id }}', '{{ $item->name }}');">
                <i class="fas fa-map-marker-alt"></i> 
                <br>
                ดูหมุด
            </a>
        </div>
    </div>

    <br><br>
    <hr>
    <br><br>
</div>