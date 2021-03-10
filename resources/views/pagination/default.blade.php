<div class="panel-block columns is-mobile">
  <div class="column is-6 is-offset-6">
    
  </div>
</div>

<nav>
@if ($paginator->hasPages()) <!-- กําหนดว่ามีรายการเพียงพอที่จะแบ่งออกเป็นหลายหน้าหรือไม่ -->
  <ul class="pagination flex-wrap d-flex justify-content-center">
    <li class="page-item">
    {{-- Previous Page Link --}}
       @if ($paginator->onFirstPage())  <!-- ตรวจสอบว่าอยู่หน้าแรกไหม -->
      <a class="page-link"  disabled><i class="fa fa-angle-left"></i></a>
      @else
      <a class="page-link"  href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a>
      @endif
    </li>
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
          @if (is_string($element))
          <li class="page-item"><a class="page-link">&hellip;</a></li>
          <!-- <span class="pagination-ellipsis">&hellip;</span> -->
          @endif
        {{-- Array Of Links --}}
          @if (is_array($element))
            @foreach ($element as $page => $url)
              @if ($page == $paginator->currentPage())
              <li class="page-item active"><a class="page-link" href="#" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
              @else
              <li class="page-item"><a class="page-link" href="{{ $url }}" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
              @endif
            @endforeach
          @endif
        @endforeach


    <li class="page-item">
    {{-- Next Page Link --}}
       @if ($paginator->hasMorePages())  <!--กําหนดว่ามีสินค้าเพิ่มเติมในแหล่งข้อมูลหรือไม่ -->
       <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a>
      @else
      <a class="page-link" href="#" disabled><i class="fa fa-angle-right"></i></a>
      @endif

    </li>
  </ul>
  @endif
</nav>  
  

      



