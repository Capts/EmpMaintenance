@extends('layouts.app')

@section('content')


<div class="container pt-4">
    <div class="login-box">
      <div class="login-logo">
        <a href="/login"><b>Employee</b> Maintenance</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body p-5">
          <p class="login-box-msg">Sign in to start your session</p>

          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="form-group">

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="example@email.com" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                    <span class=" invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">

                <div class="col-md-12">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>
                </div>
            </div>
           

            <div class="form-group">
                <div class="col-md-12">
                <a href="/register" class="p-2"> Create an account</a>
                    <button type="submit" class="btn btn-primary float-right">
                        Login
                    </button>
                </div>
            </div>
          </form>
          
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>

    <div class="login-box text-center" style="color:silver">
        <small>Created by: Kevin Broncano 2019</small>
    </div>
</div>

@endsection
