@extends('office.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Foyers list</div>

                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>address</th>
                                <th>capacity</th>
                                <th>foyer privé</th>
                                <th>foyer sous-traitant</th>
                                <th></th>
                            </tr>
                            </thead>
                            @foreach( $foyers as $row)
                                <tr>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->address}}</td>
                                    <td>{{$row->capacity}}</td>
                                    <td>{{$row->is_active ? 'yes':'no'}}</td>
                                    <td>{{$row->is_public ? 'yes':'no'}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-rotate" href="{{route("office.dashboard.foyer.edit",$row->id)}}">
                                            edit
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
