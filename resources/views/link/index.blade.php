@extends('layouts.main')

@section('container')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            @if(session()->has('success'))
                <div class="alert alert-success text-white" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-3">
                    <a class="btn bg-gradient-success" href="/form-link/new">Tambah</a>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-3">
                    <form action="/link">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-7 align-middle text-center">No</th>
                            <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-7 ps-2">Linkname</th>
                            <th class="text-center text-uppercase text-white text-xxs font-weight-bolder opacity-7" >Action</th>
                            <th class="text-white opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($data as $d)
                        <tr>
                            <td class="align-middle text-center">
                                <span class="text-white text-xs font-weight-bold"> {{ $loop->iteration }} </span>
                            </td>
                            <td>
                                <span class="text-white text-xs font-weight-bold"> {{ $d['link'] }} </span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <a class="badge badge-sm bg-gradient-warning" href="form-link/{{ $d['id'] }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <a href="delete-link/{{ $d['id'] }}" class="badge badge-sm bg-gradient-danger border-0" onclick="return confirm('Apakah anda yakin ingin menghapus file ini ?')">
                                    <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </a>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-end">
    {{ $data->links() }}
</div>

@endsection