@extends('office.layouts.app')

@section('content')

    <div class="container ">

        <form action={{route('office.dashboard.foyer.update',$foyer->id)}} enctype="multipart/form-data" method="POST">
            @csrf
            @method("PUT")
            <div class="row">
                    <div class="form-group w-100">
                        <label>Foyer Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$foyer->name}}"
                               required>

                    </div>
                <div class="form-group w-100">
                        <label>Foyer Name:</label>
                        <input type="number" class="form-control" name="capacity" value="{{$foyer->capacity}}"
                               required>

                    </div>
                    <div class="form-group w-100">
                        <label>Address:</label>
                        <textarea type="text" class="form-control" name="address" cols="3"
                                  required>{{$foyer->address}}</textarea>

                    </div>

                    <div class="form-group w-100">

                        <input type="checkbox" {{$foyer->is_active==1 ? "checked":""}} name="is_active" id="">
                        <label for="">foyer privé</label>

                    </div>
                    <div class="form-group w-100">
                        <input type="checkbox" {{$foyer->is_public==1 ? "checked":""}} name="is_public" id="">
                        <label for="">foyer sous-traitant</label>

                    </div>



                </div>


            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-warning" href="{{route("office.dashboard.foyers")}}">Return room list</a>
        </form>

    </div>


@endsection

@section('js')

@endsection
