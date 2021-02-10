@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Register_car {{ $register_car->id }}</div>
                    <div class="card-body">

                        <!-- <a href="{{ url('/register_car') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/register_car/' . $register_car->id . '/edit') }}" title="Edit Register_car"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('register_car' . '/' . $register_car->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Register_car" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/> -->
                        @if($register_car->car_type == "car")
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td><img width="40"src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($register_car->brand) }}.png"></td>
                                    </tr>
                                    <tr><th> ยี่ห้อรถ / Brand  </th><td> {{ $register_car->brand }} </td></tr>
                                    <tr><th> รุ่นรถ / Model  </th><td> {{ $register_car->generation }} </td></tr>
                                    <tr><th> ระบบเกียร์ </th><td>  </td></tr>
                                    <tr><th> น้ำมันที่ใช้ </th><td>  </td></tr>
                                    <tr><th> สี </th><td>  </td></tr>
                                    <tr><th> สถานที่ </th><td> 
                                    <div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
                        <select name="province" id="province" class="form-control" required>
                                <option value="" selected > - กรุณาเลือกจังหวัด / Please select province - </option> 
                                @foreach($location_array as $lo)
                                <option 
                                value="{{ $lo->province }}" 
                                {{ request('province') == $lo->province ? 'selected' : ''   }} >
                                {{ $lo->province }} 
                                </option>
                                @endforeach                                     
                        </select>
                        {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
                    </div> </td></tr>
                                    <tr><th> จำนวนที่นั่ง </th><td>  </td></tr>
                                    <tr><th> ระยะทาง </th><td>  </td></tr>
                                </tbody>
                            </table>
                        </div>
                        @elseif($register_car->car_type == "motorcycle")
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td><img width="40"src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($register_car->brand) }}.png"></td>
                                    </tr>
                                    <tr><th> ยี่ห้อรถ / Brand  </th><td> {{ $register_car->brand }} </td></tr>
                                    <tr><th> รุ่นรถ / Model  </th><td> {{ $register_car->generation }} </td></tr>
                                    <tr><th> ระบบเกียร์ </th><td> {{ $register_car->year }} </td></tr>
                                    <tr><th> สี </th><td>  </td></tr>
                                    <tr><th> เครื่องยนต์ (cc) </th><td>  </td></tr>
                                    <tr><th> สถานที่ </th><td>  </td></tr>
                                </tbody>
                            </table>
                        </div>
                        @endif

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
