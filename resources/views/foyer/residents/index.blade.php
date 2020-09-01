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
                                <th>Payment Number</th>
                                <th>Accepted</th>
                                <th>Resident</th>
                                <th>Payed</th>

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
                                    <td>{{$row->num_pay}}</td>
                                    <td>{{$row->is_accepted ? 'yes' :'no'}}</td>
                                    <td>{{$row->payement ? 'yes' :'no'}}</td>
                                    <td>{{$row->resident ? 'yes' :'no'}}</td>



                                    <td>
                                        <a class="btn btn-primary btn-rotate" href="{{route("foyer.dashboard.student.edit",$row->id)}}">
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
