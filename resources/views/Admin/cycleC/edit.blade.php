@extends('Admin.layout.layout')
@section('adminContent')


<div class="main-content section bg-primary text-dark section-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">

            <form  action="{{ route('cycleC.update', $cycleC->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card bg-primary shadow-soft border-light text-center py-4">
                    <div class="card-body">
                        <div class="row justify-content-left mt-1">
                            <span class="h5">{{ $cycleC->name  }}</span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputName">Name</label>
                            <input type="text" name="name" value="{{ $cycleC->name  }} " class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="name">
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputComID"> Serial</label>
                            <input type="text" name="serial" value="{{ $cycleC->serial  }} " class="form-control" id="exampleInputComID" aria-describedby="comIDHelp" placeholder="serial">
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputPassword">Current</label>
                            <input type="text" name="current" value="{{ $cycleC->current  }} " class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp" placeholder="current">
                        </div>

                        <div class="form-group mb-4">
                            <label for="exampleInputPassword"> Max</label>
                            <input type="text" name=" max" value="{{ $cycleC->max  }} " class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp" placeholder="max">
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
