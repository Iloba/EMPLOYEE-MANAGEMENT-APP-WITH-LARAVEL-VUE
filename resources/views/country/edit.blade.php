@extends('layouts.main')

@section('content')
    <div class="">
        <h1 class="h3 mb-0 text-gray-800">Users</h1> 
    </div> <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Update Country') }}
                        
                        <a class="btn btn-info btn-sm float-right" href="{{route('countries.index')}}">Back</a>

                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('countries.update', $country->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>
    
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('country_code', $country->country_code) }}" required autocomplete="country_code" autofocus>
    
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
                                    <input id="lastname" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $country->name) }}" required autocomplete="name" autofocus>
    
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
                                        {{ __('Update Country') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection