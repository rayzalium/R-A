@extends('Admin.cycleA.layout')

@section('content')

<div class="jumbotron">

 <p>Trash </p>
  <a class="btn btn-primary btn-lg" href="{{route('LogSheet.index')}}" role="button">Home</a>
</div>




<div class="container">
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col" >Plane Name </th>
        <th scope="col" >Flight No.</th>
        <th scope="col" >From</th>
        <th scope="col" >To</th>
        <th scope="col" >Takeoff Time</th>
        <th scope="col" >Landing Time</th>
        <th scope="col" >deprature</th>
        <th scope="col" >Arrival</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @php
           $i =0;
        @endphp
        @foreach ($LogSheet as $item)
        <tr>
            <th scope="row">{{++ $i}}</th>
            <td>{{$item->name_of_plane}}</td>
                            <td>{{$item->no_of_flight}}</td>
                            <td>{{$item->srart_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td>{{$item->take_of_time}}</td>
                            <td>{{$item->landing_time}}</td>
                            <td>{{$item->deprature}}</td>
                            <td>{{$item->arrival}}</td>
            <td>
                <div class="container">
                    <div class="row">

                      <div class="col-sm">
                        <a class="btn btn-primary" href="{{route('LogSheet.back.trash',$item->id)}}">Back</a>
                      </div>
                      <div class="col-sm">
                        <a class="btn btn-danger" href="{{route('LogSheet.delete.trash',$item->id)}}">Delete</a>
                      </div>

                     </div>
                 </div>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>

</div>
@endsection
