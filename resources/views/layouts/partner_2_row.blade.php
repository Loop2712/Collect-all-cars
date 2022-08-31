<div class="col-12 owl-carousel-two align-self-center" style="padding:0px;">
    <div class="owl-carousel">
        @php
          $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->get()
        @endphp
        @foreach($partner as $item)
            @if($loop->iteration % 2 != 0)
            <div class="item" style="padding:5px;z-index:-1;">
                <div class="testimon">
                    <a href="{{$item->link}}" target="bank">
                        <img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                    </a>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    <div class="owl-carousel">
        @php
          $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->get()
        @endphp
        @foreach($partner as $item)
            @if($loop->iteration % 2 == 0)
                <div class="item" style="padding:5px;z-index:-1;">
                    <div class="testimon">
                        <a href="{{$item->link}}" target="bank">
                            <img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>