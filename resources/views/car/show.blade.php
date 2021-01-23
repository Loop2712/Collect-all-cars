@extends('layouts.car')

@section('content')

<section class="section product-detail">
    <div class="details container">
      <div class="left">
        <div class="main">
          <img src="{{ url('/image/'.$data->id ) }}" alt="" />
        </div>

        <!--    ภาพที่ 2 3 4 เผื่อมี   -->
        <div class="thumbnails">
          <div class="thumbnail">
            <img src="{{ url('/image/'.$data->id ) }}" alt="" />
          </div>
          <div class="thumbnail">
            <img src="{{ url('/image/'.$data->id ) }}" alt="" />
          </div>
        </div>
      </div>
      <div class="right">
          <div class="container">
        <h1>{{ $data->brand  }}  {{ $data->model  }} {{ $data->submodel  }}</h1>
        <div class="price">{{ ($data->price)  }} บาท</div>
        <h5></h5>
                <div class="row">
                    <div class="col">
                        <ul type="none">
                            <table>
                            <tr>
                                <td >ยี่ห้อ</td>
                                <td >{{ $data->brand  }}</td> 
                            </tr>
                            <tr>
                                <td >รุ่น</td>
                                <td >{{ $data->model }} {{ $data->submodel }}</td>
                            </tr>
                            <tr>
                                <td >จำนวนที่นั่ง</td>
                                <td >{{ $data->seats  }}</td> 
                            </tr>
                            <tr>
                                <td >ระบบเกียร์</td>
                                <td >{{ $data->gear  }}</td> 
                            </tr>
                            <tr>
                                <td >ระยะทาง</td>
                                <td >{{ $data->distnce  }} km</td>
                            </tr>
                            <tr>
                                <td >สี</td>
                                <td >{{ $data->color  }}</td> 
                            </tr>
                            <tr>
                                <td >น้ำมัน</td>
                                <td >{{ $data->fuel  }}</td>
                            </tr>
                            <tr>
                                <td >สถานที่</td>
                                <td >{{ $data->location  }}</td>
                            </tr>

                            </table>
                        </ul>
                    </div>
                    <div class="col">
                    <button type="button" class="btn btn-danger btn-lg"><a href="{{ $data->link  }}">ดูข้อมูลเพิ่มเติม</a></button>
                    </div>
                </div>
                </div>
                        


      </div>
    </div>
  </section>
@endsection