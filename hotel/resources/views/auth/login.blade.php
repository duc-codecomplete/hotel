@extends('layouts.frontend')

@section('content')

<main id="site-content" role="main">

    <div class="page-container-responsive page-container-auth row-space-top-4 row-space-8">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-center">
                <div class="panel no-border no-box-shadow">
                    <div class="panel-body">


                        <span class="" style="color: blue"><i class="fa fa-sign-in"></i>VUI LÒNG ĐĂNG NHẬP</span>

                      @if (session('warning'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('warning') }}
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                

                        <div class="signup-or-separator">
                            <span class="h6 signup-or-separator--text"></span>
                            <hr>
                        </div>

                        <form method="POST" action="{{ route('login') }}"  class="signup-form login-form">
                            @csrf

                            
                            <div class="control-group form-group">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Địa chỉ email">
                            </div>

                            <div class="control-group row-space-2 form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Mật khẩu">
                            </div>
                            
                            <div class="checkbox pull-left checkbox-danger">
                                <input type="checkbox" id="remember_me" name="remember_me" value="1">
                                <label for="remember_me" class="checkbox checkbox-danger">Ghi nhớ tài khoản?</label>
                            </div>

                            <div class="pull-right m-t-20 m-b-10">
                                <a href="{{ route('password.request') }}"
                                class="forgot-password pull-right">Quên mật khẩu?</a>
                            </div>

                            <input class="btn btn-danger btn-block btn-large" type="submit" value="Đăng nhập">

                        </form>
                    </div>
                    <div class="panel-body">
                        <div class="pull-left">
                            Chưa có tài khoản? 
                        </div>
                        <span class="btn btn-danger link-to-signup-in-login">
                            <a href="/register">Đăng ký</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- /home page -->
<!-- Modal Mobile -->
<style>
.padding_image{
    padding: 5px 0px;
}
</style>
<div class="modal left fade" id="menu_mobile_left" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="slideout-menu-log-reg">
          <i class="lst-icon-user-28"></i>
          <a href="https://www.luxstay.com/vi/signup_login">
              Đăng k&yacute;<span class="sr-only">(current)</span>
          </a> &nbsp; | &nbsp;
          <a href="https://www.luxstay.com/vi/login">
              Đăng nhập<span class="sr-only">(current)</span>
          </a>
      </div>
  </div>

  <div class="modal-body">
    <ul>
      <li><a href="https://www.luxstay.com/vi">Trang chủ</a></li>
      <li><a href="https://www.luxstay.com/vi/hosts">Trở th&agrave;nh chủ nh&agrave;</a></li>
  </ul>
  <div class="slideout-menu-sl">
      <div class="select-container">
        <select class="language-selector" name="language"><option value="en">English</option><option value="vi" selected="selected">Tiếng Việt</option></select>
        <i class="lst-icon-angle-down" aria-hidden="true"></i>
    </div>
</div>
<div class="slideout-menu-sl">
  <div class="select-container">
    <select class="currency-selector" autocomplete="off" name="currency"><option value="USD">USD</option><option value="VND" selected="selected">VND</option></select>
    <i class="lst-icon-angle-down" aria-hidden="true"></i></div>
</div>
</div>
</div>

</div>
<!-- modal-content -->
</div>
<!-- modal-dialog -->
<div class="modal-outside"></div>
<!-- modal -->



<script>
    $(document).ready(function () {
      $('.remove_invite_event').click(function (e) {
        //e.preventDefault()
        $.ajax({
          url: "https://www.luxstay.com/vi/remove_invite_event",
          method: 'GET',
          dataType: 'json',
          success: function (resp) {
            if (resp == 1) {
              $('#invite_event').hide()
          }
      }
  })
    })
  });
</script>

</body>
</html>
@endsection
