
                    <div class="card-body">
                                    
                        <div class="row">
                            <form action="{{URL::to('/car')}}" method="get" >
                                                        
                                                    
                                    <div class="form-group col-md-12">
                                        <label>ยี่ห้อรถ</label>
                                        <select name="brand" id="brand" class="form-control" onchange="this.form.submit()">
                                            <option value="" selected>ทุกยี่ห้อ</option> 
                                                @foreach($brand_array as $br)
                                                    <option 
                                                        value="{{ $br->brand }}" 
                                                        {{ request('brand') == $br->brand ? 'selected' : ''   }}  >
                                                        {{ $br->brand }} 
                                                    </option>
                                                @endforeach                                     
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label>ประเภท</label>
                                        <select name="typecar" id="typecar" class="form-control" onchange="this.form.submit()">
                                            <option value="" selected>ทุกประเภท</option> 
                                                @foreach($type_array as $ty)
                                                    <option 
                                                        value="{{ $ty->type }}" 
                                                        {{ request('type') == $ty->type ? 'selected' : ''   }} >
                                                        {{ $ty->type }} 
                                                    </option>
                                                @endforeach                                     
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label>เกียร์</label>
                                        <select name="gear" id="gear" class="form-control" onchange="this.form.submit()">
                                            <option value="" selected>ระบบเกียร์ทั้งหมด</option> 
                                                @foreach($gear_array as $ge)
                                                    <option 
                                                        value="{{ $ge->gear }}" 
                                                        {{ request('gear') == $ge->gear ? 'selected' : ''   }} >
                                                        {{ $ge->gear }} 
                                                    </option>
                                                @endforeach                                     
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label>ปี</label>
                                        <select name="year" id="year" class="form-control" onchange="this.form.submit()">
                                            <option value="" selected>ทุกปี</option> 
                                                @foreach($year_array as $ye)
                                                    <option 
                                                        value="{{ $ye->year }}" 
                                                        {{ request('year') == $ye->year ? 'selected' : ''   }} >
                                                        {{ $ye->year }} 
                                                    </option>
                                                @endforeach                                     
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label>สี</label>
                                        <select name="color" id="color" class="form-control" onchange="this.form.submit()">
                                            <option value="" selected>ทุกสี</option> 
                                                @foreach($color_array  as $co)
                                                    <option 
                                                        value="{{ $co->color  }}" 
                                                        {{ request('color ') == $co->color  ? 'selected' : ''   }} >
                                                        {{ $co->color  }} 
                                                    </option>
                                                @endforeach                                     
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label>เชื้อเพลิง</label>
                                        <select name="   " id="   " class="form-control" onchange="this.form.submit()">
                                            <option value="" selected>ทุกเชื้อเพลิง</option> 
                                                <!-- @foreach($year_array as $ye)
                                                    <option 
                                                        value="{{ $ye->year }}" 
                                                        {{ request('year') == $ye->year ? 'selected' : ''   }} >
                                                        {{ $ye->year }} 
                                                    </option>
                                                @endforeach                                      -->
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label>สถานที่</label>
                                        <select name="location" id="location" class="form-control" onchange="this.form.submit()">
                                            <option value="" selected>ทุกสถานที่</option> 
                                                <!-- @foreach($year_array as $ye)
                                                    <option 
                                                        value="{{ $ye->year }}" 
                                                        {{ request('year') == $ye->year ? 'selected' : ''   }} >
                                                        {{ $ye->year }} 
                                                    </option>
                                                @endforeach                                      -->
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label>เลขไมค์</label>
                                            <input class="form-control" type="text" placeholder="น้อยสุด">
                                            <input class="form-control" type="text" placeholder="มากสุด">
                                            <button type="submit" class="btn ">  ค้นหา </button>
                                    </div>
                                    <div class="col-md-12">
                                        <label>ราคา</label>
                                            <input class="form-control" type="text" placeholder="น้อยสุด">
                                            <input class="form-control" type="text" placeholder="มากสุด">
                                            <button type="submit" class="btn ">  ค้นหา </button>
                                    </div>
     
                            </form>
                        </div>
                    </div>
                            
                