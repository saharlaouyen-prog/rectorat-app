@extends('office.layouts.app')

@section('content')

    <div class="container ">
        <h1 class="text-center mb-5">{{$user->name}}</h1>
        <div class="row align-content-center">
            <img src="/uploads/avatars/{{$user->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

            <hr>

            <div class="col-md-12">
                <br>
                <p> Email: {{$user->email}}</p>
                <p> CIN: {{$user->cin}}</p>
                <p> Tel: {{$user->tel}}</p>
                <p> Foyer Name: {{$user->room->room->foyer->name}}</p>
                <p> Room Name: {{$user->room->room->name}}</p>
            </div>

        </div>


    </div>


@endsection

@section('js')

@endsection
