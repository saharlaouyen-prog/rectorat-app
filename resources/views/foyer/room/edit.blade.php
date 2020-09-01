@extends('foyer.layouts.app')

@section('content')

    <div class="container ">

        <form action={{route('foyer.dashboard.room.update',$room->id)}} enctype="multipart/form-data" method="POST">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Room Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$room->name}}"
                               placeholder="ex: Room Cl"
                               required>

                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea type="text" class="form-control" name="description" cols="3"
                                  required>{{$room->description}}</textarea>

                    </div>
                    <div class="form-group">
                        <label class="pt-3">Add a type:</label>
                        <select name="type" class="form-control" id="">
                            <option {{$room->type=="Individual" ? "selected":""}} value="Individual">Individual</option>
                            <option {{$room->type=="Double" ? "selected":""}} value="Double">Double</option>
                            <option {{$room->type=="For Three" ? "selected":""}} value="For Three">For Three</option>
                        </select>


                    </div>
                    <div class="form-group">

                        <input type="checkbox" {{$room->wc==1 ? "checked":""}} name="wc" id="">
                        <label for="">private WC</label>

                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$room->tv==1 ? "checked":""}} name="tv" id="">
                        <label for="">private TV</label>

                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$room->wifi==1 ? "checked":""}} name="wifi" id="">
                        <label for="">private Wifi</label>

                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$room->kitchenette==1 ? "checked":""}} name="kitchenette" id="">
                        <label for="">private Kitchenette</label>

                    </div>

                    <div class="form-group">
                        <label>Price:</label>
                        <input type="double" class="form-control" name="name" value="{{$room->price}}"
                               placeholder="200"
                               required>

                    </div>


                    <div class="form-group">
                        <label for="">images</label><br><small>old images will be delete if you upload new images</small>
                        <input type="file" class="form-control-file pt-3 dropify" id="image" multiple name="files[]">
                    </div>
                    @if($room->image)
                        <div class="py-5">


                            @foreach(json_decode($room->image) as $i=>$img)

                                <img class="mr-2" style="width: 50px;height: 50px" src="{{asset("/uploads/img/".$img)}}"
                                     alt="Los Angeles">

                            @endforeach
                        </div>
                    @endif

                </div>
                <div class="col-md-6">

                    <div class="form-group ">


                        <div id="map_canvas5"
                             style="width: 100%; height: 400px; position: relative; overflow: hidden;">

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Latitude</label>
                            <input type="text" class="form-control" name="lat" id="lat" value="{{$room->lat}}"
                                   readonly=""></div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Longitude</label>
                            <input type="text" class="form-control" name="lng" id="long" value="{{$room->lng}}"
                                   readonly=""></div>
                    </div>

                </div>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-warning" href="{{route("foyer.dashboard.home")}}">Return room list</a>
        </form>

    </div>


@endsection

@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACeW1ooRwl6rVsr_RDBpnaasGaalaz5jo"></script>

    <script type="text/javascript">
        window.onload = function () {
            var latlng = new google.maps.LatLng({{$room->lat ??"35.64528792271182"}},{{$room->lng ??"10.64121028906249"}});
            var map = new google.maps.Map(document.getElementById('map_canvas5'), {
                    center: latlng,
                    zoom: 8,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
            );
            var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title: 'Set lat/lon values for this property',
                    draggable: true
                }
            );
            google.maps.event.addListener(marker, 'dragend', function (a) {
                    $("#lat").val(a.latLng.lat());
                    $("#long").val(a.latLng.lng());
                }
            );
        };
    </script>

@endsection
