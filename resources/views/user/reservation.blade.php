@extends('user.layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8">
            <form action={{route('reservation.store',$id)}} enctype="multipart/form-data" method="post">
                @csrf
            <div class="row">

                <div class="col-md-12">
                    <div class="card bg-white " >
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" value="{{auth()->user()->name}}" class="form-control" name="name" readonly >
                    </div>

                    <div class="form-group">
                        <label>CIN:</label>
                        <input type="text" value="{{auth()->user()->cin}}" class="form-control" name="cin" readonly >
                    </div>


                    <div class="form-group">
                        <label>Name of your Institution:</label>
                        <input type="text"  value="{{auth()->user()->name_establishment}}"  class="form-control" name="institution" readonly>
                    </div>

                    <div class="form-group">
                        <label>Class:</label>
                        <input type="text" value="{{auth()->user()->class}}" class="form-control" name="class" readonly>
                    </div>

                    <div class="form-group">
                        <label>Tel:</label>
                        <input type="text"  value="{{auth()->user()->tel}}"  class="form-control" name="tel" readonly>
                    </div>

                    <div class="form-horizontal">
                        <div class="form-group-lg ">
                            <a class="btn btn-success" href="{{route("profile")}}">edit my info</a>
                            <button type="submit" class="pull-right btn  btn-primary ">Confirm</button>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
            </form>
        </div>
        </div>


    </div>

@endsection
@section('js')


@endsection
