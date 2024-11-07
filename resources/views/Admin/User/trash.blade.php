@extends('Admin.cycleA.layout')

@section('content')

<div class="jumbotron">

 <p>Trash </p>
  <a class="btn btn-primary btn-lg" href="{{route('User.index')}}" role="button">Home</a>
</div>




<div class="container">
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th  scope="col" >ID</th>
        <th  scope="col" >Name </th>
        <th  scope="col" >email</th>
        <th  scope="col" >user_id</th>
        <th  scope="col" >role</th>
        <th  scope="col" >password</th>
    </tr>
    </thead>
    <tbody>
        @php
           $i =0;
        @endphp
        @foreach ($User as $item)
        <tr>
            <th scope="row">{{++ $i}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->user_id}}</td>
            <td>{{$item->role}}</td>
            <td>{{$item->password}}</td>>
            <td>
                <div class="container">
                    <div class="row">

                      <div class="col-sm">
                        <a class="btn btn-primary" href="{{route('User.back.trash',$item->id)}}">Back</a>
                      </div>
                      <div class="col-sm">
                        <a class="btn btn-danger" href="{{route('User.delete.trash',$item->id)}}">Delete</a>
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
