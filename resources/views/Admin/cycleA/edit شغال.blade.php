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
<form action="{{ route('cycleA.update', $cycleA->id)}}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">  Name</label>
          <input type="text" name="name" value="{{ $cycleA->name  }} " class="form-control"  placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">  serial</label>
            <input type="text" name="serial" value="{{ $cycleA->serial  }} "  class="form-control"  placeholder="serial">
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">  current </label>
            <input type="text" name="current" value="{{ $cycleA->current  }} "  class="form-control"  placeholder="current">
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">  max</label>
            <input type="text" name="max" value="{{ $cycleA->max  }} "  class="form-control"  placeholder="max">
          </div>



        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>

        </div>



    </form>
</div>





@endsection
