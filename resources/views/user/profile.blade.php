@extends('user.layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="padding-top:100px;">
                <img src="/uploads/avatars/{{$user->avatar}}"
                     style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h2>{{$user->name}}'s Profile</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form enctype="multipart/form-data" method="post">
                    @method('PUT')
                    @csrf
                    <div col-md-10>
                        <div class="card bg-white ">
                            <h4>Update Profile</h4>
                            <input type="file" name="avatar">
                            <br>
                            <br>
                            <div class="card bg-light text-dark">
                                <div class="card-body">
                                    <div class="form-horizontal">
                                        <div class="form-group-lg ">
                                            <h6>Name </h6>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="form-horizontal">
                                        <div class="form-group-lg ">
                                            <h6>Email </h6>
                                            <input type="text" class="form-control" name="email"
                                                   value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>CIN:</label>
                                        <input type="text"  value="{{ $user->cin }}" class="form-control" name="cin" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Name of your Institution:</label>
                                        <input type="text"   value="{{ $user->name_establishment }}" class="form-control" name="name_establishment" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Class:</label>
                                        <input type="text"  value="{{ $user->class }}" class="form-control" name="class" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Tel:</label>
                                        <input type="text"  value="{{ $user->tel }}" class="form-control" name="tel" required>
                                    </div>


                                    <div class="form-horizontal">
                                        <div class="form-group-lg ">
                                            <h6>Password </h6>
                                            <input type="text" class="form-control" name="password"
                                                   placeholder="Type new password">
                                        </div>
                                    </div>

                                    <div class="form-horizontal">
                                        <div class="form-group-lg ">
                                            <h6>Password Confirmation </h6>
                                            <input type="text" class="form-control" name="password_confirmation"
                                                   placeholder="Re-type new password">
                                        </div>
                                    </div>


                                    <br>
                                    <br>

                                    <div class="form-horizontal">
                                        <div class="form-group-lg ">
                                            <button type="submit" class="pull-right btn btn-lg btn-primary ">Save
                                            </button>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @if(session('success'))
                    <div class="alert alert-success"><h1>{{session('success')}}</h1></div>
                @endif
            </div>
        </div>
    </div>

@endsection
