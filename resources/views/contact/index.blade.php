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
    <form action="{{ route('contact.update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
            <input type="hidden" id="id" name="id" value="{{ $data['id'] }}">
                <div class="form-group">
                    <label for="telegram" class="form-control-label @error('telegram') is-invalid @enderror">Telegram</label>
                    <input class="form-control" type="text" value="{{ $data['telegram'] }}" id="telegram" name="telegram">
                    @if ($errors->has('telegram'))
                        <span class="text-danger">{{ $errors->first('telegram') }}</span>
                    @endif
                </div>

            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="whatsapp" class="form-control-label @error('username') is-invalid @enderror">Whatsapp</label>
                    <input class="form-control" type="text" value="{{ $data['whatsapp'] }}" id="whatsapp" name="whatsapp">
                    @if ($errors->has('whatsapp'))
                        <span class="text-danger">{{ $errors->first('whatsapp') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="line" class="form-control-label @error('username') is-invalid @enderror">Line</label>
                    <input class="form-control" type="text" value="{{ $data['line'] }}" id="line" name="line">
                    @if ($errors->has('line'))
                        <span class="text-danger">{{ $errors->first('line') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="livechat" class="form-control-label @error('username') is-invalid @enderror">Livechat</label>
                    <input class="form-control" type="text" value="{{ $data['livechat'] }}" id="livechat" name="livechat">
                    @if ($errors->has('livechat'))
                        <span class="text-danger">{{ $errors->first('livechat') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="facebook" class="form-control-label @error('username') is-invalid @enderror">Facebook</label>
                    <input class="form-control" type="text" value="{{ $data['facebook'] }}" id="facebook" name="facebook">
                    @if ($errors->has('facebook'))
                        <span class="text-danger">{{ $errors->first('facebook') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="penilaian" class="form-control-label @error('username') is-invalid @enderror">Penilaian</label>
                    <input class="form-control" type="text" value="{{ $data['penilaian'] }}" id="penilaian" name="penilaian">
                    @if ($errors->has('penilaian'))
                        <span class="text-danger">{{ $errors->first('penilaian') }}</span>
                    @endif
                </div>
            </div>
            
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
    </div>
    </div>

    
       

    
@endsection 