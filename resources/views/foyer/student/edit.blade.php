@extends('foyer.layouts.app')

@section('content')

    <div class="container ">

        <form action={{route('foyer.dashboard.student.update',$reservation->id)}} enctype="multipart/form-data" method="POST">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Payment Number:</label>
                        <input type="integer" class="form-control" name="num_pay" value="{{$reservation->num_pay}}"
                               placeholder="2314"
                               required>

                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$reservation->is_accepted==1 ? "checked":""}} name="is_accepted" id="">
                        <label for="">Accepted</label>

                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$reservation->payement==1 ? "checked":""}} name="payement" id="">
                        <label for="">Payed</label>

                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$reservation->resident==1 ? "checked":""}} name="resident" id="">
                        <label for="">Resident</label>

                    </div>





                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-warning" href="{{route("foyer.dashboard.home")}}">Return room list</a>
                </div>



            </div>
        </form>

    </div>


@endsection

@section('js')

@endsection
