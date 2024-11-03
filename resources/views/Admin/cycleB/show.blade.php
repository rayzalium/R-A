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
                            <span class="h5">{{ $cycleB->name  }}</span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputName" class="form-control" id="exampleInputComID">{{ $cycleB->name  }}</label>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputComID" class="form-control" id="exampleInputComID"> {{ $cycleB->serial  }}</label>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputPassword" class="form-control" id="exampleInputComID">{{ $cycleB->current  }}</label>
                        </div>

                        <div class="form-group mb-4">
                            <label for="exampleInputPassword" class="form-control" id="exampleInputComID"> {{ $cycleB->max  }}</label>
                        </div>




                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
