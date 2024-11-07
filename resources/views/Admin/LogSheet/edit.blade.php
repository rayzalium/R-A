@extends('Admin.layout.layout')
@section('adminContent')


<div class="main-content section bg-primary text-dark section-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">

            <form  action="{{ route('LogSheet.update', $logSheet->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card bg-primary shadow-soft border-light text-center py-4">
                    <div class="card-body">
                        <div class="row justify-content-left mt-1">
                            <span class="h5">{{ $logSheet->name_of_plane  }}</span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="name_of_plane">Plane Name</label>
                            <input type="text" name="name_of_plane" value="{{ $logSheet->name_of_plane  }} " class="form-control" id="name_of_plane" aria-describedby="nameHelp" placeholder="name">
                        </div>
                        <div class="form-group mb-4">
                            <label for="no_of_flight"> Flight NO.</label>
                            <input type="text" name="no_of_flight" value="{{ $logSheet->no_of_flight  }} " class="form-control" id="no_of_flight" aria-describedby="comIDHelp" placeholder="serial">
                        </div>

                        <div class="form-group mb-4">
                            <label for="srart_date"> From</label>
                            <input type="text" name="srart_date" value="{{ $logSheet->srart_date  }} " class="form-control" id="srart_date" aria-describedby="passwordHelp" placeholder="max">
                        </div>
                        <div class="form-group mb-4">
                            <label for="end_date"> To</label>
                            <input type="text" name="end_date" value="{{ $logSheet->end_date  }} " class="form-control" id="end_date" aria-describedby="passwordHelp" placeholder="max">
                        </div>
                        <div class="form-group mb-4">
                            <label for="take_of_time"> Takeoff Time</label>
                            <input type="text" name="take_of_time" value="{{ $logSheet->take_of_time  }} " class="form-control" id="take_of_time" aria-describedby="passwordHelp" placeholder="max">
                        </div>
                        <div class="form-group mb-4">
                            <label for="landing_time"> Landing Time</label>
                            <input type="text" name="landing_time" value="{{ $logSheet->landing_time  }} " class="form-control" id="landing_time" aria-describedby="passwordHelp" placeholder="max">
                        </div>
                        <div class="form-group mb-4">
                            <label for="deprature"> deprature</label>
                            <input type="text" name="deprature" value="{{ $logSheet->deprature  }} " class="form-control" id="deprature" aria-describedby="passwordHelp" placeholder="max">
                        </div>
                        <div class="form-group mb-4">
                            <label for="arrival"> Arrival</label>
                            <input type="text" name="arrival" value="{{ $logSheet->arrival  }} " class="form-control" id="arrival" aria-describedby="passwordHelp" placeholder="max">
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
