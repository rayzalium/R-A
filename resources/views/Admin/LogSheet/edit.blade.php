@extends('Admin.layout.layout')
@section('adminContent')


<div  class="main-content section bg-primary text-dark section-lg {{ auth()->check() && auth()->user()->role === 0 ? 'with-sidebar' : 'no-sidebar' }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">

            <form id="update-logsheet-form" action="{{ route('LogSheet.update', $logSheet->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card bg-primary shadow-soft border-light text-center py-4">
                    <div class="card-body">
                        <div class="row justify-content-left mt-1">
                            <span class="h5">{{ $logSheet->name_of_plane  }}</span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="name_of_plane">Plane Name</label>
                            <input type="text" name="name_of_plane" value="{{ old('name_of_plane', $logSheet->name_of_plane) }}" required class="form-control" id="name_of_plane" aria-describedby="nameHelp" placeholder="name">
                        </div>
                        <div class="form-group mb-4">
                            <label for="no_of_flight"> Flight NO.</label>
                            <input type="text" name="no_of_flight" value="{{ old('no_of_flight', $logSheet->no_of_flight) }}" required class="form-control" id="no_of_flight" aria-describedby="comIDHelp" placeholder="serial">
                        </div>

                        <div class="form-group mb-4">
                            <label for="srart_date"> From</label>
                            <input type="date" name="srart_date" value="{{ old('srart_date', $logSheet->srart_date) }}" required class="form-control" id="srart_date" aria-describedby="passwordHelp" placeholder="max">
                        </div>
                        <div class="form-group mb-4">
                            <label for="end_date"> To</label>
                            <input type="date" name="end_date" value="{{ old('end_date', $logSheet->end_date) }}" required class="form-control" id="end_date" aria-describedby="passwordHelp" placeholder="max">
                        </div>
                        <div class="form-group mb-4">
                            <label for="take_of_time"> Takeoff Time</label>
                            <div class="input-group input-group-border">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="far fa-clock"></span></span>
                                </div>
                            <input type="time" name="take_of_time" value="{{ old('take_of_time', \Carbon\Carbon::parse($logSheet->take_of_time)->format('H:i')) }}" required class="form-control timepicker" id="take_of_time" aria-describedby="passwordHelp" placeholder="max">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="landing_time"> Landing Time</label>
                            <div class="input-group input-group-border">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="far fa-clock"></span></span>
                                </div>
                            <input type="time" name="landing_time" value="{{ old('landing_time', \Carbon\Carbon::parse($logSheet->landing_time)->format('H:i')) }}" required class="form-control timepicker" id="landing_time" aria-describedby="passwordHelp" placeholder="max">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="deprature"> deprature</label>
                            <input type="text" name="deprature"value="{{ old('deprature', $logSheet->deprature) }}" required class="form-control" id="deprature" aria-describedby="passwordHelp" placeholder="max">
                        </div>
                        <div class="form-group mb-4">
                            <label for="arrival"> Arrival</label>
                            <input type="text" name="arrival" value="{{ old('arrival', $logSheet->arrival) }}" required class="form-control" id="arrival" aria-describedby="passwordHelp" placeholder="max">
                        </div>



                        <div class="row justify-content-left mt-4">
                            <div class="col-lg-12">
                                <button class="btn btn-primary animate-down-2 mr-2 text-success"  type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div id="success-message" class="alert alert-success" style="display: none;">Logsheet updated successfully!</div>
<div id="error-message" class="alert alert-danger" style="display: none;"></div>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
   document.querySelector('#landing_time').addEventListener('change', function () {
    const time = this.value; // E.g., "14:56"
    console.log(`Selected time in 24-hour format: ${time}`);
          });


</script>


@endsection
