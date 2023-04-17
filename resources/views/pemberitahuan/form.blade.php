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
        <form action="{{ route('pemberitahuan.create') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    @if($jenis == 2)
                        <input type="hidden" id="id" name="id" value="{{ $data['id'] }}">
                    @endif
                    <div class="form-group">
                        <label for="title" class="form-control-label @error('title') is-invalid @enderror">Title</label>
                        <input class="form-control" type="text" value="{{ ($jenis == 2) ? $data['title'] : '' }}" id="title" name="title">
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-control-label @error('content') is-invalid @enderror">Content</label>
                        <textarea class="form-control" id="content"  name="content" rows="3">{{ ($jenis == 2) ? $data['content'] : '' }}</textarea>
                        @if ($errors->has('content'))
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                </div>
                
            </div>
            <div class="col-md-12 d-flex justify-content-end">
                <div style="margin-right: 10px">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                <div>
                    <a href="/pemberitahuan" class="btn btn-dark">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    </div>

@endsection 