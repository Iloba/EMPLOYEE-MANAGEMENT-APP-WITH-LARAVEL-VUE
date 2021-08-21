@extends('layouts.main')

@section('content')
    <div class="">
        <h1 class="h3 mb-0 text-gray-800">Update State</h1> 
    </div> <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts.messages')
                <div class="card">
                    <div class="card-header">
                        {{ __('Update State') }}
                        
                        <a class="btn btn-info btn-sm float-right" href="{{route('states.index')}}">Back</a>

                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('states.update', $state->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>
    
                                <div class="col-md-6">
                                   
                                    <select name="country_id" id="" class="form-control">
                                        <option selected value="--Select--">--Select--</option>
                                        @foreach ($countries  as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                       
                                    </select>
                                    @error('country_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Country Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $state->name) }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update State') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                      
                    <div class="card-body">
                        <button  onclick="

                            event.preventDefault();
                            if(confirm('{{'Are you sure you want to delete '.$state->name}}')){
                                document.getElementById('{{'form-delete-'.$state->id}}').submit();
                            }
                        
                        "
                        
                    class="btn btn-danger">Delete {{$state->name}}
                    </button>
                        <form action="{{route('countries.destroy', $state->id)}}" method="POST" id="{{'form-delete-'.$state->id}}">
                            @csrf
                            @method('DELETE')
                       
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection