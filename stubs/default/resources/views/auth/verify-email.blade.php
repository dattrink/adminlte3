<x-guest-layout>
<div class="login-box">
    <div class="login-logo">
      <a href="javascript:void(0)"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <div class="mb-4 text-sm text-gray-600">
          Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        @if (session('status') == 'verification-link-sent')
          <div class="mb-4 font-medium text-sm text-green-600">
              A new verification link has been sent to the email address you provided during registration.
          </div>
        @endif

        <form action="{{ route('verification.send') }}" method="post">
          @csrf

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Resend Verification Email</button>
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