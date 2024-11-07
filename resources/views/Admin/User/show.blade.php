@extends('Admin.layout.layout')
@section('adminContent')


<div class="main-content section bg-primary text-dark section-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                @csrf
                @method('PUT')
                <div class="card bg-primary shadow-soft border-light text-center py-4">
                    <div class="card-body">
                        <div class="row justify-content-left mt-1">
                            <span class="h5">{{ $User->name  }}</span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="name" class="form-control" id="name">{{ $User->name  }}</label>
                        </div>
                        <div class="form-group mb-4">
                            <label for="email" class="form-control" id="email"> {{ $User->email  }}</label>
                        </div>
                        <div class="form-group mb-4">
                            <label for="user_id" class="form-control" id="user_id">{{ $User->user_id  }}</label>
                        </div>

                        <div class="form-group mb-4">
                            <label for="role" class="form-control" id="role"> {{ $User->role  }}</label>
                        </div>

                        <div class="form-group mb-4">
                            <label for="password" class="form-control" id="password"> {{ $User->password  }}</label>
                        </div>




                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
