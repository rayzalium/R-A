@extends('Admin.layout.layout')
@section('adminContent')


<div class="main-content section bg-primary text-dark section-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">

            <form  action="{{ route('users.update', $users->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card bg-primary shadow-soft border-light text-center py-4">
                    <div class="card-body">
                        <div class="row justify-content-left mt-1">
                            <span class="h5">{{ $users->name  }}</span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="name"> Name</label>
                            <input type="text" name="name" value="{{ old('name', $users->name) }}"  class="form-control" id="name" aria-describedby="nameHelp" placeholder="name">
                        </div>
                        <div class="form-group mb-4">
                            <label for="email"> email </label>
                            <input type="text" name="email" value="{{ old('name', $users->email) }}" class="form-control" id="no_of_flight" aria-describedby="comIDHelp" placeholder="serial">
                        </div>

                        <div class="form-group mb-4">
                            <label for="user_id">user_id</label>
                            <input type="text" name="user_id" value="{{ old('name', $users->user_id) }}" class="form-control" id="user_id" aria-describedby="passwordHelp" placeholder="current">
                        </div>
                        <div class="form-group mb-4">
                            <label for="role">role</label>
                            <input type="text" name="role" value="{{ old('name', $users->role) }}" class="form-control" id="role" aria-describedby="passwordHelp" placeholder="current">
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">password</label>
                            <input type="text" name="password" value="{{ old('name', $users->password) }}" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="current">
                        </div>


                        <div class="row justify-content-left mt-4">
                            <div class="col-lg-12">
                                <button class="btn btn-primary animate-down-2 mr-2 text-success" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
