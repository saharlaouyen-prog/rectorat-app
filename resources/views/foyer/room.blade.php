@extends('foyer.layouts.app')

@section('content')

    <div class="container ">
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
                                <th>Description</th>
                                <th>Tv</th>
                                <th>Wc</th>
                                <th>Wifi</th>
                                <th>Kitchenette</th>
                                <th>Price</th>
                                <th>Action</th>
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
                                    <td>{{$row->price}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-rotate" href="{{route("foyer.dashboard.room.show",$row->id)}}">
                                            show
                                        </a>
                                        <a class="btn btn-success" href="{{route("foyer.dashboard.room.edit",$row->id)}}">edit</a>

                                        <button class="btn btn-danger" onclick="confirm({{$row->id}})">
                                            Delete
                                        </button>


                                        <form action="{{route('foyer.dashboard.room.destroy',['id'=>$row->id])}}"
                                              id="delete-room-{{$row->id}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        <a href="{{route("foyer.dashboard.room.create")}}">create new room</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('js')
    <script type="text/javascript" defer>
        $(function () {
            // Time wasted here: 3 hours

            // For card rotation
            $(".btn-rotate").click(function () {
                // Long explanation: The button that is clicked, will have its grand parent add a class to its child. The main reason I couldn't use .parent() was that it gets the closest positioned parent, either relative or absolute. The problem was that the card-front got the .rotate-container as its parent, but the card-back was being the closest positioned element as the parent of the button. In order to circumvent this I either needed to use 3 offsetparent() and have really messy code, or just use the .closest() which as its name suggests gets the closest named or unnamed element. So in the end, I get the grand parent of the button which is the .rotate container and I find its children which are the .card-front and .card-back and toggle the rotation classes on them. Also if I didn't specify which button's ancestor would assign the class, whenever any btn-rotate button is clicked, all three cards would rotate at once which makes for a funny yet unhelpful design.
                var $parent = $(this).closest(".rotate-container");

                // Probably easier to use an id, but I made it work
                $parent.children(".card-front").toggleClass(" rotate-card-front");
                $parent.children(".card-back").toggleClass(" rotate-card-back");
            });


        });
        $('#example').DataTable();

        function updateForm(room) {


            $('#id_room').val(room.id);
            $('#name-room').val(room.name);
            $('#type-room').val(room.type);

            console.log(room);

            $('#image-room').attr("data-default-file", "/uploads/img/" + room.image);
            $('#image-room').dropify();

            $("#update-modal").modal()

        }

        function confirm(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {


                if (result.value) {
                    console.log("delete-room-" + id);
                    document.getElementById('delete-room-' + id).submit();

                }
            })
        }


    </script>
@endsection
