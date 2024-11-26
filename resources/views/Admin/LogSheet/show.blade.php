@extends('Admin.layout.layout')
@section('adminContent')


<div class="main-content section bg-primary text-dark section-lg {{ auth()->check() && auth()->user()->role === 0 ? 'with-sidebar' : 'no-sidebar' }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                @csrf
                @method('PUT')
                <div class="card bg-primary shadow-soft border-light text-center py-4">
                    <div class="card-body">
                        <div class="row justify-content-left mt-1">
                            <span class="h5">{{ $logSheet->name_of_plane  }}</span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputName" class="form-control" id="exampleInputComID">{{ $logSheet->name_of_plane  }}</label>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputComID" class="form-control" id="exampleInputComID"> {{ $logSheet->no_of_flight  }}</label>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputPassword" class="form-control" id="exampleInputComID">{{ $logSheet->srart_date  }}</label>
                        </div>

                        <div class="form-group mb-4">
                            <label for="exampleInputPassword" class="form-control" id="exampleInputComID"> {{ $logSheet->end_date  }}</label>
                        </div>
                        <div class="form-group mb-4">
                        <label class="h6" for="exampleInputTime"> {{ $logSheet->take_of_time  }}</label>
                 <div class="input-group input-group-border">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><span class="far fa-clock"></span></span>
                    </div>

                 </div>
                </div>


                <div class="form-group mb-4">
                        <label class="h6" for="exampleInputTime"> {{ $logSheet->landing_time  }}</label>
                 <div class="input-group input-group-border">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><span class="far fa-clock"></span></span>
                    </div>
                </div>
             </div>

             <div class="row justify-content-left mt-1">
                <span class="h5">{{ $logSheet->deprature  }}</span>
            </div>

            <div class="row justify-content-left mt-1">
                <span class="h5">{{ $logSheet->arrival  }}</span>
            </div>












                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
