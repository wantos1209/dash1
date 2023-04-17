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
        <form action="{{ route('link.create') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    @if($jenis == 2)
                        <input type="hidden" id="id" name="id" value="{{ $data['id'] }}">
                    @endif
                    <div class="form-group">
                        <label for="link" class="form-control-label @error('link') is-invalid @enderror">Link</label>
                        <input class="form-control" type="text" value="{{ ($jenis == 2) ? $data['link'] : '' }}" id="link" name="link">
                        @if ($errors->has('link'))
                            <span class="text-danger">{{ $errors->first('link') }}</span>
                        @endif
                    </div>
                </div>
                
            </div>
            <div class="col-md-12 d-flex justify-content-end">
                <div style="margin-right: 10px">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                <div>
                    <a href="/link" class="btn btn-dark">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    </div>

@endsection 