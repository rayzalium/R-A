@extends('cycleA.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">

          <p class="card-text">  <span><a href="{{ route('cycleA.index')}}"> back</a> </span>     Part name : {{ $cycleA->name  }}  </p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">

    @csrf
    @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">  {{ $cycleA->name  }}</label>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">  {{ $cycleA->serial  }}</label>
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">  {{ $cycleA->current  }} </label>
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">  {{ $cycleA->max  }}</label>
          </div>






</div>





@endsection
