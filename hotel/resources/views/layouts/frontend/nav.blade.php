<style>
  .navbar{
    border-radius: 0px;
    margin-bottom: 0px;
  }
  .navbar p{
    color: white;
  }
  .navbar b{
    color: white;
  }
  li>i{
    color: white;
  }

  .custom{
    color: white;
  }
  nav{
    position: fixed;
  }

  .nav>li>a:hover, .nav>li>a:focus{
    background-color: #232323;
  }
  .nav .open>a, .nav .open>a:hover, .nav .open>a:focus{
    background-color: #232323;
  }
</style>
<nav class="navbar navbar-dark no-border" style="background: #232323">
  <div class="col-xs-12">
    <div class="navbar-header">
      <figure id="logo" class="navbar-brand">
        <a href="/">
          <img width="179" height="42" src="{{ asset('frontend/images/logo.png') }}" alt="Luxstay" class="img-responsive">
        </a>
      </figure>
    </div>
    <div class="">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/">
            <p class=""><i class="fa fa-home"></i> Trang chủ</p>
            <span class="sr-only">(current)</span></a>
        </li>  

        <li><a href="/contact">
            <p class=""><i class="fa fa-envelope"></i> Liên hệ</p>
            <span class="sr-only">(current)</span></a>
        </li>    

          @if(Auth::check())
        <li>
            <a href="/users/create"><p class="send-request-post m-b-0">
            <i class="fa fa-edit"></i> Trở thành chủ khách sạn</p>
            <span class="sr-only">(current)</span></a>
        </li>
        <li>
            <a href="/save"><p class="send-request-post m-b-0">
            <i class="fa fa-share"></i> Khách sạn yêu thích 
            <span class="badge badge-danger">1</span></p>
            <span class="sr-only">(current)</span></a>
        </li>

          @else
        <li>
            <a href="/login"><p class="send-request-post m-b-0">
            <i class="fa fa-edit"></i> Trở thành chủ khách sạn</p>
            <span class="sr-only">(current)</span></a>
        </li>
          @endif
        <li>
            <a href="tel:18006586" class="header-support">
            <i class="fa fa-phone custom"></i>
            <b>18006586 (miễn phí) </b></a>
        </li>
        
          @if(!Auth::check())
        <li>
            <a href="{{ route('register') }}">
            <i class="fa fa-sign-out-alt"></i> Đăng ký
            <span class="sr-only">(current)</span></a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> Đăng nhập
            <span class="sr-only">(current)</span></a>
        </li>
            @else
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">&nbsp;
            <span class="custom"><i class="fa fa-user"></i> Xin chào! <span style="font-weight: bold">{{Auth::user()->name}} </span></span>
            <span class="caret"></span> </a>
                <ul id="lst_language_switcher" class="dropdown-menu">
                  @if(Auth::user()->role==0)
                    <li><a href=""><i class="fa fa-building"></i> Quản lý khách sạn</a></li>
                    <li><a href=""><i class="fa fa-edit"></i> Profile</a></li>
                  @else
                    <li><a href="/admin"><i class="fa fa-building"></i> Quản lý Admin</a></li>
                  @endif
                  <li class="divider"></li>
                  <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i> Thoát
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                  </li>
                </ul>
        </li>
            @endif
      </ul>
    </div>           
  </div>          
</nav>