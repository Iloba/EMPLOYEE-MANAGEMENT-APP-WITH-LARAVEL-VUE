@extends('layouts.main')

@section('content')
    <div class="">
        <h1 class="h3 mb-0 text-gray-800">Users</h1> 
    </div> <br>
    <div class="card mt-5 mx-auto"> 
        <div class="card-header">
         <div>
            <a class="btn btn-info float-right mb-4" href="{{route('users.create')}}">Create</a>
         </div>

            <div class="">
                <form action="{{route('users.index')}}" method="POST">
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
                                <th>USER ID</th>
                                <th>Username</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Email</th>
                                <th>Manage</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a class="text-info m-3" href="{{route('users.edit', $user)}}"><i class="fa fa-edit"></i></a>

                                    <a onclick="
                                        event.preventDefault();
                                        if(confirm('are you sure you wanna delete??')){
                                            document.getElementById('{{'form-delete'.$user->id}}').submit();
                                        }
                                    
                                    
                                    " class="text-danger m-1" href="{{route('users.destroy', $user)}}"><i class="fa fa-trash"></i></a>

                                    <form action="{{route('users.destroy', $user)}}" method="POST" id="{{'form-delete'.$user->id}}">
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