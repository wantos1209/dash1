<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ ucfirst("$menu") }}</li>
        </ol>
        <h6 class="font-weight-bolder mb-0  text-white">{{ ucfirst("$menu") }}</h6>
      </nav>
      <div class="dropdown">
        <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-user me-sm-1 text-white" aria-hidden="true"></i> {{ auth()->user()->username }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="/changepassword"><i class="fas fa-share-square"></i> Change Passowrd</a></li>
          <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-reply-all"></i> Logout</a></li>
        </ul>
      </div>
    </div>
</nav>