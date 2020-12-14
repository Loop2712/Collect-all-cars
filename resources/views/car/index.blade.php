@extends('layouts.app')

@section('content')

                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                            

                            @foreach($data as $item)
                          
                            
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="bg-white rounded shadow-sm">
                                    <img src="{{ $item->image }}" alt="" class="img-fluid card-img-top">
                                    <div class="p-4">
                                        <h5> <a href="{{ $item->link }}" class="text-dark">{{ $item->brand }} {{ $item->model }} {{ $item->submodel }}</a></h5>
                                        <p class="small text-muted mb-0">{{ $item->gear }}   ปี {{ $item->year }}<br> {{ $item->location }} </p>
                                        <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                                        <p class="card-text">{{ $item->price }}  บาท</span></p>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-block btn-bottom " onclick="location.href='{{ $item->link }}'">view</button>
                                    </div>
                                </div>
                            </div>
        
                            @endforeach 

                            <div class="pagination-wrapper">
                                {{ $data->links() }}
                            </div>

                        

                        </div>
                        </div>
                </div>
            

@endsection

