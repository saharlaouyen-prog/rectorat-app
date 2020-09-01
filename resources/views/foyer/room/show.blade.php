@extends('foyer.layouts.app')

@section('content')

    <div class="container ">
        <h1 class="text-center mb-5">{{$room->name}}</h1>
        <div class="row">
            @if($room->image)
                <div class="col-md-6">
                    <div id="demo" class="carousel slide" data-ride="carousel">


                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            @foreach(json_decode($room->image) as $i=>$img)
                                <li data-target="#demo" data-slide-to="{{$i}}" @if ($i==0)
                                class="active"
                                    @endif></li>

                            @endforeach
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            @foreach(json_decode($room->image) as $i=>$img)

                                <div class="carousel-item  @if($i==0) active @endif">
                                    <img style="height: 450px" src="{{asset("/uploads/img/".$img)}}" alt="Los Angeles">
                                </div>

                            @endforeach

                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                </div>
            @endif
            @if (!empty($room->lat))
                <div class="col-md-6">
                    <iframe
                        class="w-100"
                        height="450"
                        frameborder="0" style="border:0"
                        src="https://maps.google.com/maps?q={{$room->lat}},{{$room->lng}}&z=14&amp;output=embed"
                        allowfullscreen>
                    </iframe>
                </div>
            @endif
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

               <!-- <div id="carouselExampleCaptions" class="carousel slide col-md-6" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="..." class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>-->
                </div>


    </div>


@endsection

@section('js')

@endsection
