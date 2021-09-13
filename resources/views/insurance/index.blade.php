@extends('layouts.admin')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">บริษัทประกันภัย</h3>
                    <div class="card-body">
                        <a href="{{ url('/insurance/create') }}" class="btn btn-success btn-sm" title="Add New Insurance">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มบริษัท
                        </a>

                        <form method="GET" action="{{ url('/insurance') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>ชื่อบริษัทประกันภัย</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>สถานะพาร์ทเนอร์</th>
                                        <th>Line Group</th>
                                        <th>Mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($insurance as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->company }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->status_partner }}</td>

                                        @if(!empty($item->line_group))
                                            <td>{{ $item->line_group }}</td>
                                        @elseif(empty($item->line_group) and $item->status_partner == "Yes")
                                            <td>
                                                <select id="select_line_group_{{ $loop->iteration }}" class="btn btn-sm btn-outline-success" onchange="change_line_group('{{ $loop->iteration }}','{{ $item->company }}');">
                                                    <option value="" selected>- เลือกกลุ่มไลน์ -</option>
                                                    @foreach($group_line as $item)
                                                        <option value="{{ $item->groupName }}" 
                                                        {{ request('groupName') == $item->groupName ? 'selected' : ''   }} >
                                                        {{ $item->groupName }} 
                                                        </option>
                                                    @endforeach 
                                                </select>
                                            </td>
                                        @else
                                            <th> <!-- // --> </th>
                                        @endif

                                        <td>{{ $item->mail }}</td>
                                        <td>
                                            <!-- <a href="{{ url('/insurance/' . $item->id) }}" title="View Insurance"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                            <a href="{{ url('/insurance/' . $item->id . '/edit') }}" title="Edit Insurance"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                            <form method="POST" action="{{ url('/insurance' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Insurance" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash-alt"></i> ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $insurance->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        function change_line_group(loop, company){
            let select_line_group = document.querySelector("#select_line_group_" + loop).value;
            console.log(select_line_group);
            console.log(company);

            fetch("{{ url('/') }}/api/insurance_select_line_group/" + select_line_group + "/" + company);

            var delayInMilliseconds = 1500; //1 second

                setTimeout(function() {
                    window.location.reload(true);
                }, delayInMilliseconds);
        }

    </script>
@endsection
