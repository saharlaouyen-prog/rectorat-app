@extends('office.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Rooms list</div>

                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>description</th>
                                <th>Tv</th>
                                <th>Wc</th>
                                <th>Wifi</th>
                                <th>Kitchenette</th>
                                <th>Foyer Name</th>
                                <th>is published</th>
                                <th></th>
                            </tr>
                            </thead>
                            @foreach( $rooms as $row)
                                <tr>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->type}}</td>
                                    <td>{{$row->description}}</td>
                                    <td>{{$row->tv ? 'yes' :'no'}}</td>
                                    <td>{{$row->wc ? 'yes' :"no"}}</td>
                                    <td>{{$row->wifi ? 'yes' :"no"}}</td>
                                    <td>{{$row->kitchenette ? 'yes' :"no"}}</td>
                                    <td>{{$row->foyer->name}}</td>
                                    <td>{{$row->is_published ? 'yes':'no'}}</td>
                                    <td>
                                        <form action="{{route("office.dashboard.room.togglePublish",$row->id)}}" method="post">
                                            @csrf
                                            @method("patch")
                                            <button type="submit" class="btn btn-primary btn-rotate">
                                                {{$row->is_published ? 'hide room':'publish room'}}
                                            </button>
                                        </form>

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
