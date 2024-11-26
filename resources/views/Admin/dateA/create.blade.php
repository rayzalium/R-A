@extends('Admin.layout.layout')
@section('adminContent')


<div class="main-content section bg-primary text-dark section-lg {{ auth()->check() && auth()->user()->role === 0 ? 'with-sidebar' : 'no-sidebar' }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">

            <form  action="{{ route('dateA.store')}}" method="POST">
                @csrf
                <div class="card bg-primary shadow-soft border-light text-center py-4">
                    <div class="card-body">

                        <div class="form-group mb-4">
                            <label for="exampleInputName">Name</label>
                            <input type="text" name="name"  class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="name">
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputComID"> Serial</label>
                            <input type="text" name="serial"   class="form-control" id="exampleInputComID" aria-describedby="comIDHelp" placeholder="serial">
                        </div>
                        <label class="h6" for="exampleInputDate2">Start Date</label>
                        <div class="form-group">
                            <div class="input-group input-group-border">
                                <div class="input-group-prepend"><span class="input-group-text"><span class="far fa-calendar-alt"></span></span></div>
                                <input class="form-control datepicker" name="start" id="exampleInputDate2" placeholder="Start date" type="text">
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="h6" for="exampleInputDate2">End Date</label>
                    <div class="form-group">
                        <div class="input-group input-group-border">
                            <div class="input-group-prepend"><span class="input-group-text"><span class="far fa-calendar-alt"></span></span></div>
                            <input class="form-control datepicker" name="max" id="exampleInputDate2" placeholder="Start date" type="text">
                        </div>
                    </div>
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
