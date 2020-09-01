@extends('foyer.layouts.app')

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
                            @foreach( $reservations as $row)
                                <tr>
                                    <td>{{$row->user->name}}</td>
                                    <td>{{$row->user->email}}</td>
                                    <td>{{$row->user->cin}}</td>
                                    <td>{{$row->user->tel}}</td>
                                    <td>{{$row->room->name}}</td>
                                    <td>{{$row->room->foyer->name}}</td>


                                    <td>
                                        <a class="btn btn-primary btn-rotate"  onclick="confirm({{$row->id}})">
                                            accept
                                        </a>

                                        <button class="btn btn-danger" onclick="refuse({{$row->id}})">
                                            Refuse
                                        </button>


                                        <form action="{{route('foyer.dashboard.student.reservations.accept',['id'=>$row->id])}}"
                                              id="accept-room-{{$row->id}}"
                                              method="post">
                                            @csrf
                                            @method('post')
                                        </form>
                                        <form action="{{route('foyer.dashboard.student.reservations.refuse',['id'=>$row->id])}}"
                                              id="refuse-room-{{$row->id}}"
                                              method="post">
                                            @csrf
                                            @method('post')
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
        function confirm(id) {



            Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, confirm it!'
            }).then((result) => {


                if (result.value) {
                    console.log("accept-room-" + id);
                    document.getElementById('accept-room-' + id).submit();

                }
            })
        }
        function refuse(id) {



            Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, refused it!'
            }).then((result) => {


                if (result.value) {
                    console.log("refuse-room-" + id);
                    document.getElementById('refuse-room-' + id).submit();

                }
            })
        }

    </script>
@endsection
