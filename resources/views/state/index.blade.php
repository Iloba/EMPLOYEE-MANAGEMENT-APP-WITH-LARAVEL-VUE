@extends('layouts.main')

@section('content')
    <div class="">
        <h1 class="h3 mb-0 text-gray-800">States</h1> 
    </div> <br>
    <div class="card mt-5 mx-auto"> 
        <div class="card-header">
         <div>
            <a class="btn btn-info float-right mb-4" href="{{route('states.create')}}">Add</a>
         </div>

            <div class="">
                <form action="{{route('states.index')}}" method="POST">
                    @csrf
                    @method('GET')
                    
                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="search" id="inlineFormInputGroup" placeholder="Search">
                        <div class="input-group-prepend">
                            <button type="submit" class="input-group-text btn btn-info"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
         
        <div class="card-body">
           
            <div>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-stripe p-2">
                    <thead class="text-dark">
                            <tr>
                                <th>ID</th>
                                <th>Country Id</th>
                                <th>Name</th>
                                
                                <th>Manage</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($states as $state)
                            <tr>
                                <td>{{$state->id}}</td>
                                <td>{{$state->country->country_code}}</td>
                                <td>{{$state->name}}</td>
                               
                                <td>
                                    <a class="text-info m-3" href="{{route('states.edit', $state)}}"><i class="fa fa-edit"></i></a>

                                    <a onclick="
                                        event.preventDefault();
                                        if(confirm('are you sure you wanna delete??')){
                                            document.getElementById('{{'form-delete'.$state->id}}').submit();
                                        }
                                    
                                    
                                    " class="text-danger m-1" href="{{route('states.destroy', $state)}}"><i class="fa fa-trash"></i></a>

                                    <form action="{{route('states.destroy', $state)}}" method="POST" id="{{'form-delete'.$state->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
@endsection