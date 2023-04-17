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
    <form action="{{ route('setting.update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
            <input type="hidden" id="id" name="id" value="{{ $data['id'] }}">
                <div class="form-group">
                    <label for="home" class="form-control-label @error('home') is-invalid @enderror">Home</label>
                    <input class="form-control" type="text" value="{{ $data['home'] }}" id="home" name="home">
                    @if ($errors->has('home'))
                        <span class="text-danger">{{ $errors->first('home') }}</span>
                    @endif
                </div>

            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="syair" class="form-control-label @error('username') is-invalid @enderror">Syair</label>
                    <input class="form-control" type="text" value="{{ $data['syair'] }}" id="syair" name="syair">
                    @if ($errors->has('syair'))
                        <span class="text-danger">{{ $errors->first('syair') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="hadiah" class="form-control-label @error('username') is-invalid @enderror">Hadiah</label>
                    <input class="form-control" type="text" value="{{ $data['hadiah'] }}" id="hadiah" name="hadiah">
                    @if ($errors->has('hadiah'))
                        <span class="text-danger">{{ $errors->first('hadiah') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="jadwal" class="form-control-label @error('username') is-invalid @enderror">Jadwal</label>
                    <input class="form-control" type="text" value="{{ $data['jadwal'] }}" id="jadwal" name="jadwal">
                    @if ($errors->has('jadwal'))
                        <span class="text-danger">{{ $errors->first('jadwal') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="promo" class="form-control-label @error('username') is-invalid @enderror">Promo</label>
                    <input class="form-control" type="text" value="{{ $data['promo'] }}" id="promo" name="promo">
                    @if ($errors->has('promo'))
                        <span class="text-danger">{{ $errors->first('promo') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="content" class="form-control-label @error('username') is-invalid @enderror">Content</label>
                    <input class="form-control" type="text" value="{{ $data['content'] }}" id="content" name="content">
                    @if ($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif

                    <!-- <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor> -->


                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="rtp" class="form-control-label">RTP</label>
                    <input class="form-control" type="text" value="{{ $data['rtp'] }}" id="rtp" name="rtp">
                    @if ($errors->has('rtp'))
                        <span class="text-danger">{{ $errors->first('rtp') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
    </div>
    </div>

    
       

    
@endsection 