@extends('layouts.main')

@section('container')

    <div class="card col-md-6">
        <div class="card-header">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @else
            
            @endif
        </div>
    <div class="card-body">
        <form action="{{ route('user.create') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    @if($jenis == 2)
                        <input type="hidden" id="id" name="id" value="{{ $data['id'] }}">
                    @endif
                    <div class="form-group">
                        <label for="username" class="form-control-label @error('username') is-invalid @enderror">username</label>
                        <input class="form-control" type="text" value="{{ ($jenis == 2) ? $data['username'] : '' }}" id="username" name="username">
                        @if ($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password" class="form-control-label @error('username') is-invalid @enderror">password</label>
                        <input class="form-control" type="password" id="password" name="password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label for="status" class="form-control-label @error('status') is-invalid @enderror">Status</label>
                        <select class="form-select" aria-label="Default select example" name="status" id="status">
                            <option value="1">Admin</option>
                            <option value="77">Superadmin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-end">
                <div style="margin-right: 10px">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                <div>
                    <a href="/user" class="btn btn-dark">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    </div>

@endsection 