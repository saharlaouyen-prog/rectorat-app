@extends('user.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach( $room as $row)

                <div class="col-md-4 ">
                    <div class="card ">


                        @if(!empty($row->image))
                            <img class="card-img-top" src="/uploads/img/{{$row->image}}" alt="img" style="width:100%">
                        @else
                            <img class="card-img-top" src="/uploads/img/default.jpg" alt="" style="width:100%">
                        @endif


                        <div class="card-header">
                            <h4>{{$row->name}}</h4>
                        </div>

                        <div class="card-body">

                            <p>Type: <span class="badge badge-secondary">{{$row->type}}</span></p>
                            <p> Private TV: <span class="badge badge-secondary">{{$row->tv ? 'yes' :'no'}}</span></p>
                            <p> Private WC: <span class="badge badge-secondary">{{$row->wc ? 'yes' :'no'}}</span></p>
                            <p> Private WIFI: <span class="badge badge-secondary">{{$row->wifi ? 'yes' :'no'}}</span>
                            </p>
                            <p> Private KITCHENETTE: <span
                                    class="badge badge-secondary">{{$row->kitchenette ? 'yes' :'no'}}</span></p>
                            <p> Price: <span class="badge badge-secondary">{{$row->price}}</span></p>

                            @guest
                                <a href="{{route('login')}}">Login or Register to reserve</a>
                            @endguest
                            @auth
                                @if($row->isReservedByUser())
                                    already reserved

                                @else
                                    <a class="btn btn-primary btn-rotate"
                                       href="{{route("reservation.fill",$row->id)}}">
                                        <i class="fa fa-long-arrow-left"></i>&nbsp;Reserve
                                    </a>
                                @endif
                            @endauth

                        </div>
                    </div>
                </div>
            @endforeach


        </div>

    </div>

@endsection
@section('js')
    <script type="text/javascript" defer>

        $('#example').DataTable();


    </script>
@endsection
