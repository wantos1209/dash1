@extends('layouts.main')

@section('container')

    <div class="card col-md-3">
        <div class="card-header">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @elseif(session()->has('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ session('fail') }}
                </div>
            @endif
        </div>
    <div class="card-body">
        <form action="{{ route('changepassword.update') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                   
                    <div class="form-group">
                        <label for="current_password" class="form-control-label @error('current_password') is-invalid @enderror">Password</label>
                        <input class="form-control" type="password" id="current_password" name="current_password">
                        @if ($errors->has('current_password'))
                            <span class="text-danger">{{ $errors->first('current_password') }}</span>
                        @endif
                    </div>

                </div>
                <div class="col-md-12">
                   <div class="form-group">
                        <label for="password" class="form-control-label @error('password') is-invalid @enderror">Password Baru</label>
                        <input class="form-control" type="password" id="password" name="password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                   <div class="form-group">
                        <label for="password_confirmation" class="form-control-label @error('password_confirmation') is-invalid @enderror">Konfirmasi Password</label>
                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                </div>
                
            </div>
            <div class="col-md-12 d-flex justify-content-end">
                <div style="margin-right: 10px">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                <div>
                    <a href="/dashboard" class="btn btn-dark">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    </div>
    
@endsection