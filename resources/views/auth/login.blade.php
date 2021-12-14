@extends('auth.authmaster')
@section('title', 'login page')

@section('content')
    <div class="card-body">
      <p class="login-box-msg">Login untuk masuk website</p>
      @if (session()->has('loginError'))
        <div class="alert alert-danger">
            {{ session('loginError') }}
        </div>
     @endif

      <form action="/login" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Masukkan Email Anda">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="social-auth-links text-center mt-2 mb-3">
            <button type="submit" class="btn btn-danger btn-block">Login</button>
        </div>
      </form>
      <p class="mb-0">
        <a href="/register" class="text-center">Register user baru</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection
