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
    <form action="{{ route('notifikasi.update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
            <input type="hidden" id="id" name="id" value="{{ $data['id'] }}">
                <div class="form-group">
                    <label for="title" class="form-control-label @error('title') is-invalid @enderror">Title</label>
                    <input class="form-control" type="text" value="{{ $data['title'] }}" id="title" name="title">
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>

            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="content" class="form-control-label @error('username') is-invalid @enderror">Content</label>
                    <textarea class="form-control" type="text" id="content" name="content" rows="3">{{ $data['content'] }}</textarea>
                    @if ($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                </div>
            </div>
            
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
    </div>
    </div>

    
       

    
@endsection 