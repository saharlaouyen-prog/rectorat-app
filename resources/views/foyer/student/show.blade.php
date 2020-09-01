@extends('foyer.layouts.app')

@section('content')

    <div class="container ">
        <h1 class="text-center mb-5">{{$room->name}}</h1>
        <div class="row">

            <div class="col-md-12">


                <p> {{$room->description}}</p>
            </div>
            <hr>

            <div class="col-md-6"><p> type: {{$room->type}}</p>
                <p> Private Tv: {{$room->tv ? 'yes' :'no'}}</p>
                <p> Private Wc : {{$room->wc ? 'yes' :"no"}}</p>
                <p> Private Wifi : {{$room->wifi ? 'yes' :"no"}}</p>
                <p> Private Kitchenette : {{$room->kitchenette ? 'yes' :"no"}}</p>
                <p> Price : {{$room->price}}</p>

            </div>

        </div>


    </div>


@endsection

@section('js')

@endsection
