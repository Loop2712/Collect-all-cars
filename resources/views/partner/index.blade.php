@extends('layouts.admin')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Partner</h3>
                    <div class="card-body">
                        <a href="{{ url('/partner_viicheck/create') }}" class="btn btn-success btn-sm" title="Add New Partner">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่ม Partner
                        </a>

                        <form method="GET" action="{{ url('/partner_viicheck') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th>
                                        <th>ชื่อ</th>
                                        <th>เบอร์โทร</th>
                                        <th>กลุ่มไลน์</th>
                                        <th>เมล</th>
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($partner as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>

                                        @if(!empty($item->line_group))
                                            <td>{{ $item->line_group }}</td>
                                        @elseif(empty($item->line_group))
                                            <td>
                                                <select id="select_line_group_{{ $loop->iteration }}" class="btn btn-sm btn-outline-success" onchange="change_line_group('{{ $loop->iteration }}','{{ $item->name }}');">
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
                                        <!-- <td>
                                            <a href="{{ url('/partner/' . $item->id) }}" title="View Partner"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/partner/' . $item->id . '/edit') }}" title="Edit Partner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/partner' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Partner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td> -->
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $partner->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        function change_line_group(loop, name_partner){
            let select_line_group = document.querySelector("#select_line_group_" + loop).value;
            console.log(select_line_group);
            console.log(name_partner);

            fetch("{{ url('/') }}/api/partner_viicheck_select_line_group/" + select_line_group + "/" + name_partner);

            var delayInMilliseconds = 1500;

                setTimeout(function() {
                    window.location.reload(true);
                }, delayInMilliseconds);
        }

    </script>
@endsection
