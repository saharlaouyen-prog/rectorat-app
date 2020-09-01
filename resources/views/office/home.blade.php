@extends('office.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Students list</div>

                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>CIN</th>
                                <th>Tel</th>
                                <th>Room Name</th>
                                <th>Foyer Name</th>
                                <th></th>
                            </tr>
                            </thead>
                            @foreach( $users as $row)
                                <tr>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->cin}}</td>
                                    <td>{{$row->tel}}</td>
                                    <td>{{$row->room->room->name}}</td>
                                    <td>{{$row->room->room->foyer->name}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-rotate" href="{{route("office.user.show",$row->id)}}">
                                            show
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" defer>

        $('#example').DataTable();


    </script>
@endsection
