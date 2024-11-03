@extends('Admin.cycleB.layout')

@section('content')
<div class="jumbotron">

  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>

  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="{{route('cycleB.create')}}" role="button">Create</a>
  <a class="btn btn-primary btn-lg" href="{{route('cycleB.trash')}}" role="button">trash</a>

</div>


<div class="container">
    @if ( $message = Session::get('success'))
    <div class="alert alert-primary" role="alert">
        {{$message}}
      </div>
    @endif

</div>

<div class="container">
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Part Name</th>
        <th scope="col">Serial NO</th>
        <th scope="col">current cycle</th>
        <th scope="col">max cycle</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @php
           $i =0;
        @endphp
        @foreach ($cycleB as $item)
        <tr>
            <th scope="row">{{++ $i}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->serial}}</td>
            <td>{{$item->current}}</td>
            <td>{{$item->max}}</td>
            <td>
                <div class="container">
                    <div class="row">
                      <div class="col-sm">
                        <a  class="btn btn-success" href="{{route('cycleB.edit',$item->id)}}">Edit</a>
                      </div>
                      <div class="col-sm">
                        <a class="btn btn-primary" href="{{route('cycleB.show',$item->id)}}">Show</a>
                      </div>
                      <div class="col-sm">
                        <a  class="btn btn-warning" href="{{route('softcb.delete',$item->id)}}">Soft delete</a>
                      </div>
                      {{--
 <div class="col-sm">
                        <form action="{{route('cycleB.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger"> Delete</button>
                        </form>
                      </div>

                      --}}

                    </div>
                 </div>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
{!! $cycleB->links() !!}
</div>



