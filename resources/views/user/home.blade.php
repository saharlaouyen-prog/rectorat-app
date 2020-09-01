@extends('user.layouts.app')

@section('content')

    @guest()
        <div class="section section-header">
            <div class="parallax filter filter-color-black">
                <div class="image"
                     style="background-image: url(https://images.unsplash.com/photo-1516308354296-1c9c5b561e0b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80)">
                </div>
                <div class="container">
                    <div class="content">
                        <div class="title-area">
                            <h1 class="title-modern">Nom du site</h1>
                            <h3>Réservez vos chambres au foyers facilement</h2>
                        </div>

                        <div class="button-get-started ">
                            <a href="{{route("register")}}" target="_blank" class="btn btn-white btn-fill btn-lg ">
                                S'inscrire </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endguest


            @if(empty($reservation))
                <div class="parallax filter filter-color-black">
                    <div class="image"
                         style="background-image: url(https://images.unsplash.com/photo-1516308354296-1c9c5b561e0b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80)">
                        >
                    </div>
                    <div class="container">
                        <div class="content">
                            <div class="row">
                                <div class="title-area">
                                    <h2>Les foyers</h2>
                                    <div class="separator separator-danger">✻</div>
                                    <p class="description">Voiçi les foyers les plus visités sur notre site</p>
                                </div>
                            </div>

                            <div class="team">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="row">


                                            @foreach( $foyer as $row)

                                                <div class="col-md-4 ">
                                                    <div class="card card-member">
                                                        <a class="content" href="{{route("room.show",$row->id)}}"
                                                           style="text-decoration : none;">
                                                            <div class="avatar avatar-danger">
                                                                @if(!empty($row->image))
                                                                    <img class="img" src="/uploads/img/{{$row->image}}"
                                                                         alt="img" style="width:100%">
                                                                @else
                                                                    <img class="img" src="/uploads/img/default.jpg" alt=""
                                                                         style="width:100%">
                                                                @endif
                                                            </div>
                                                            <div class="description">
                                                                <h3 class="title">{{$row->name}}</h3>
                                                                <p class="small-text">{{$row->address}}</p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>


                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            @else
                <h1 style="color: red">your reservation is accepted </h1>
            @endif


@endsection
@section('js')
    <script type="text/javascript" defer>

        $('#example').DataTable();


    </script>
@endsection
