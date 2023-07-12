<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USERS REPORT</title>

    <!-- Bootstrap CSS -->
	<link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('partner_new/css/app.css') }}" rel="stylesheet">

</head>
<h2 class="text-center">USERS REPORT</h2>
<body>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap5">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-striped table-bordered dataTable" role="grid"
                                aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th>name</th>
                                        <th>name_staff</th>
                                        <th>sex</th>
                                        <th>birth</th>
                                        <th>Province/District</th>
                                        <th>Country</th>
                                        <th>Language</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_data as $user)
                                        <tr role="row">
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->name_staff}}</td>
                                            <td>{{$user->sex}}</td>
                                            <td>{{$user->brith}}</td>
                                            @if (!empty($user->location_P) && !empty($user->location_A))
                                                <td>{{$user->location_P}}/{{$user->location_A}}</td>
                                            @elseif(!empty($user->location_P) && empty($user->location_A))
                                                <td>{{$user->location_P}}</td>
                                            @else
                                                <td> - </td>
                                            @endif
                                            <td>{{$user->country}}</td>
                                            <td>{{$user->language}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
