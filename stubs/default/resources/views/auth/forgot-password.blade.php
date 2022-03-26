<x-guest-layout>
<div class="login-box">
    <div class="login-logo">
      <a href="javascript:void(0)"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
  
        <x-session-status class="mb-4" :status="session('status')" />

        <form action="{{ route('password.email') }}" method="post">
          @csrf

          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Yêu cầu đổi mật khẩu</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <p class="mt-3 mb-1">
          <a href="{{ route('login') }}">Đăng nhập</a>
        </p>
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">Đăng ký thành viên mới</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
</x-guest-layout>