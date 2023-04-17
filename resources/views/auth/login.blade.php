@extends('layouts.mainlogin')

@section('content')

<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-dark text-gradient"></h3>
                  <div class="logo d-flex justify-content-center">
                    <a href="/login"><img src="https://lotto21group.com/img/l21-logo-1.png" alt=""></a>
                  </div>
                  @if(session()->has('success'))
                      <div class="alert alert-danger text-white mt-2 text-center" role="alert">
                          {{ session('success') }}
                      </div>
                  @endif
                  <!-- <p class="mb-0 text-white text-center"><b>Sign In</b></p> -->
                </div>
                <div class="card-body login-card">
                  <form action="{{ route('login.post') }}" method="post">
                    @csrf
                        <label class="text-white">Dashbarod</label>
                        <div class="mb-3">
                          <select class="form-select" name="jenisdashboard" id="jenisdashboard">
                            <!-- <option value = "100">Pilih BO</option> -->
                            <option value="APP">APP</option>
                            <option value="WEB">WEB</option>
                          </select>
                        </div>
                    <label class="text-white">Username</label>
                    <div class="mb-3">
                      <input type="username" class="form-control @error('username') is-invalid @enderror" 
                      name="username" id="username" placeholder="Username" aria-label="Username">
                        @if ($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <label class="text-white">Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" 
                      name="password" id="password" placeholder="Password" aria-label="Password">
                         @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label text-white" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-danger w-100 mt-4 mb-0" value="Login">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    <!-- <a href="javascript:;" class="text-info text-gradient font-weight-bold">Sign up</a> -->
                  </p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
  </main>

  @endsection