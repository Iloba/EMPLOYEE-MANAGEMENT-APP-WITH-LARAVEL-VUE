@extends('layouts.main')

@section('content')
    <div class="">
        <h1 class="h3 mb-5 text-gray-800">Create Department</h1> 
    </div> <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    @include('layouts.messages')
                <div class="card">
                    <div class="card-header">
                        {{ __('Add Department') }}
                        
                        <a class="btn btn-info btn-sm float-right" href="{{route('departments.index')}}">Back</a>

                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('departments.store') }}">
                            @csrf
                           
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
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
                                        {{ __('Create Department') }}
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