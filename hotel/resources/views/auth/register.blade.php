@extends('layouts.frontend')

@section('content')

<main id="site-content" role="main">

    <div class="page-container-responsive page-container-auth row-space-top-4 row-space-8">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-center">
                <div class="panel no-border no-box-shadow">

                    <div class="alert alert-with-icon alert-error alert-header panel-header hidden-element notice" id="notice">
                        <i class="icon alert-icon icon-alert-alt"></i>

                    </div>
                    <div class="panel-padding panel-body">

                        <div class="social-buttons">

                           <span class="" style="color: blue"><i class="fa fa-sign-in"></i>ĐĂNG KÝ VỚI CHÚNG TÔI</span>

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



                        <form method="POST" action="{{ route('register') }}" class="signup-form">
                        @csrf

                            <div class="signup-form-fields">

                                <input id="from" name="from" type="hidden" value="email_signup">

                                <div class="control-group form-group " id="inputFirst">


                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required placeholder="Tên *">

                                </div>

                                

                                <div class="control-group form-group " id="inputEmail">

                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Địa chỉ email *">


                                </div>


                                <div class="control-group form-group " id="inputPassword">


                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Mật khẩu *">

                                    <div data-hook="password-strength" class="password-strength hide"></div>
                                </div>

                                <div class="control-group form-group " id="inputPasswordConfirmation">

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận lại mật khẩu">


                                </div>





                                <div class="form-group">
                                    <input type="hidden" name="redirect_url" value=""/>
                                    <input class="btn btn-danger btn-block lst-large" type="submit" value="Đăng ký">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-body box-signup-footer">
                        <span>Đ&atilde; l&agrave; Luxstay th&agrave;nh vi&ecirc;n?</span>
                        <a href="https://www.luxstay.com/vi/login?" class="modal-link link-to-login-in-signup"
                        data-modal-href="/login_modal?" data-modal-type="login">
                        Đăng nhập
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

</main>






@endsection
