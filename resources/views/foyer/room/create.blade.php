@extends('foyer.layouts.app')

@section('content')

    <div class="container ">

        <form action={{route('foyer.dashboard.room.store')}} enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Room Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="ex: Room Cl"
                               required>

                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea type="text" class="form-control" name="description" cols="3"
                                  required>
                </textarea>

                    </div>
                    <div class="form-group">
                        <label class="pt-3">Add a type:</label>
                        <select name="type" class="form-control" id="">
                            <option value="Individual">Individual</option>
                            <option value="Double">Double</option>
                            <option value="For Three">For Three</option>
                        </select>


                    </div>
                    <div class="form-group">

                        <input type="checkbox" name="wc" id="">
                        <label for="">private WC</label>

                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="tv" id="">
                        <label for="">private TV</label>

                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="wifi" id="">
                        <label for="">private WIFI</label>

                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="kitchenette" id="">
                        <label for="">private Kitchenette</label>

                    </div>
                    <div class="form-group">
                        <label>Price of Room:</label>
                        <input type="double" class="form-control" name="price" placeholder="300"
                               required>

                    </div>


                    <div class="form-group">
                        <label for="">images</label>
                        <input type="file" class="form-control-file pt-3 dropify" id="image" multiple name="files[]">
                    </div>

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
                            <input type="text" class="form-control" name="lat"
                                   value="{{old('lat')}}" id="lat"
                                   readonly=""></div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Longitude</label>
                            <input type="text" class="form-control" name="lng"
                                   value="{{old('lng')}}" id="long"
                                   readonly=""></div>
                    </div>

                </div>
            </div>


            <button type="submit" class="btn btn-primary">Add</button>
            <a class="btn btn-warning" href="{{route("foyer.dashboard.home")}}">Return room list</a>
        </form>

    </div>


@endsection

@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACeW1ooRwl6rVsr_RDBpnaasGaalaz5jo"></script>

    <script type="text/javascript">
        window.onload = function () {
            var latlng = new google.maps.LatLng(35.64528792271182,10.64121028906249);
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
