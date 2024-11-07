@extends('Admin.layout.layout')
@section('adminContent')
<div class="main-content">
    <div class="section">
        <div class="container">
            <div class="row justify-content-left">
                <div class="col-lg-12">
                    <span class="h5">Users</span>
                </div>

                                <div class="row justify-content-left">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <a class="btn btn-primary" type="button" href="{{route('register')}}"> ADD</button></a>

                                        </div>
                                        <!--Buttons-->

                            </div>

                        </div>

                    </div>

                </div>

                <div class="container" style="color: black">
                    @if ( $message = Session::get('success'))

                    <div class="alert alert-primary" role="alert">

                        <i class="fa-solid fa-circle-exclamation"></i>
                        {{$message}}
                      </div>
                    @endif

                </div>
                <div class="mb-5">

                    <div class="container">
                    <table class="table shadow-soft rounded">
                    <thead >
                        <tr>
                            <th class="border-0" scope="col" >ID</th>
                            <th class="border-0" scope="col" >Name </th>
                            <th class="border-0" scope="col" >email</th>
                            <th class="border-0" scope="col" >user_id</th>
                            <th class="border-0" scope="col" >role</th>
                            <th class="border-0" scope="col" >password</th>



                        </tr>
                    </thead>

                    <tbody>
                        @php
                           $i =0;
                        @endphp
                        @foreach ($users as $item)
                        <tr>
                            <th scope="row">{{++ $i}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->user_id}}</td>
                            <td>{{$item->role}}</td>
                            <td>{{$item->password}}</td>

                            <td>
                                <div class="container">
                                    <div class="row">
                                      <div class="col-sm">
                                        <a class="btn btn-primary" type="button" href="{{route('User.edit',$item->id)}}"><i class="fas fa-solid fa-pen"></i></a>                                          </div>
                                        <!--Buttons
                                      <div class="col-sm">
                                        <a class="btn btn-primary ml-2" type="button" href=""><i class="fas fa-light fa-eye"></i></a>
                                      </div>  -->
                                      <div class="col-sm">
                                        <a class="btn btn-primary ml-2" type="button" href="{{route('softu.delete',$item->id)}}"><i class="fas fa-solid fa-trash"></i></a>
                                      </div>

                                      {{--
                 <div class="col-sm">
                                        <form action="{{route('cycleA.destroy',$item->id)}}" method="POST">
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

                </div>
                </div>
                </div>
                </div>

@endsection
