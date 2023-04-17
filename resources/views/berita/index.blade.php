@extends('layouts.main')

@section('container')

    
    
    <div class="card col-md-6">
    <div class="card-header">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="card-body">
    <form action="{{ route('berita.update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
            <input type="hidden" id="id" name="id" value="{{ $data['id'] }}">
                <div class="form-group">
                    <label for="link" class="form-control-label @error('link') is-invalid @enderror">Link</label>
                    <input class="form-control" type="text" value="{{ $data['link'] }}" id="link" name="link">
                    @if ($errors->has('link'))
                        <span class="text-danger">{{ $errors->first('link') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
    </div>
    </div>

    
       

    
@endsection 