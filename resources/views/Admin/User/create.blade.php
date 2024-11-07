@extends('Admin.layout.layout')
@section('adminContent')


<div class="main-content section bg-primary text-dark section-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">

            <form  action="{{ route('users.store')}}" method="POST">
                @csrf
                <div class="card bg-primary shadow-soft border-light text-center py-4">
                    <div class="card-body">

                        <div class="form-group mb-4">
                            <label for="name">Name</label>
                            <input type="text" name="name"  class="form-control" id="name" aria-describedby="nameHelp" placeholder="name">
                        </div>
                        <div class="form-group mb-4">
                            <label for="email"> email</label>
                            <input type="text" name="email"   class="form-control" id="email" aria-describedby="comIDHelp" placeholder="email">
                        </div>
                        <div class="form-group mb-4">
                            <label for="user_id">user_id</label>
                            <input type="text" name="user_id"  class="form-control" id="user_id" aria-describedby="passwordHelp" placeholder="user_id">
                        </div>

                        <div class="form-group mb-4">
                            <label for="role"> role</label>
                            <input type="text" name="role"  class="form-control" id="role" aria-describedby="passwordHelp" placeholder="role">
                        </div>
                        <div class="form-group mb-4">
                            <label for="password"> password</label>
                            <input type="text" name="password"  class="form-control" id="password" aria-describedby="passwordHelp" placeholder="password">
                        </div>



                        <div class="row justify-content-left mt-4">
                            <div class="col-lg-12">
                                <button class="btn btn-primary animate-down-2 mr-2 text-success" type="submit">Save</button>
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
