@extends('Admin.layout.layout')
@section('adminContent')
<div class="main-content">
    <div class="section">
        <div class="container">
            <div class="row justify-content-left">
                <div class="col-lg-12">
                    <span class="h5">Cycle A</span>
                </div>

                                <div class="row justify-content-left">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <a class="btn btn-primary" type="button" href="{{route('cycleA.create')}}"> ADD</button></a>
                                            <a class="btn btn-primary" type="button" href="{{route('cycleA.trash')}}"> Trash</button></a>
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
                            <th class="border-0" scope="col" >Name</th>
                            <th class="border-0" scope="col" >Serial No.</th>
                            <th class="border-0" scope="col" >Current cycle</th>
                            <th class="border-0" scope="col" >Max cycle</th>
                            <th class="border-0" scope="col" id="females" >Action</th>


                        </tr>
                    </thead>

                    <tbody>
                        @php
                           $i =0;
                        @endphp
                        @foreach ($cycleA as $cycle)
                        <tr>
                            <th scope="row">{{++ $i}}</th>
                            <td>{{$cycle->name}}</td>
                            <td>{{$cycle->serial}}</td>
                            <td>{{$cycle->current}}</td>
                            <td>{{$cycle->max}}</td>
                            <td>
                                <div class="container">
                                    <div class="row">
                                      <div class="col-sm">
                                        <a class="btn btn-primary" type="button" href="{{route('cycleA.edit',$cycle->id)}}"><i class="fas fa-solid fa-pen"></i></a>                                          </div>

                                      <div class="col-sm">
                                        <a class="btn btn-primary ml-2" type="button" href="{{route('cycleA.show',$cycle->id)}}"><i class="fas fa-light fa-eye"></i></a>
                                      </div>
                                      <div class="col-sm">
                                        <a class="btn btn-primary ml-2" type="button" href="{{route('soft.delete',$cycle->id)}}"><i class="fas fa-solid fa-trash"></i></a>
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