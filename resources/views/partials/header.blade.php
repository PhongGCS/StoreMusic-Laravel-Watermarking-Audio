@php
use Illuminate\Support\Facades\Auth;
@endphp
<nav class="navbar navbar-default nav__bar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('index_page') }}">OnlyC Music Shop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right nav__bar_right">
        @if (!Auth:: check())
        <li><a href="#" data-toggle="modal" data-target="#login_Modal">Login</a></li>
        <li><a href="#" data-toggle="modal" data-target="#signup_Modal">Sign up</a></li>
        @else
        <li><a href="{{ route('buy_song') }}">Song Table</a></li>
        <li><a href="{{ route('get_Revert') }}">Revert Song Signature</a></li>
        <li><a href="#" data-target="#login_Modal">Hello {{ Auth::user()->name }} </a></li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>