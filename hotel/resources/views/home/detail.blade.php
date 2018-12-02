@extends('layouts.frontend')
@section('content')
<script src="{{asset('frontend/js/OneSignalSDK.js')}}" async=""></script>
<link rel="stylesheet" href="{{asset('frontend/css/float_pc.css')}}" >
<link rel="stylesheet" href="{{asset('frontend/css/photoswipe.min.css')}}">
<link media="all" type="text/css" rel="stylesheet" href="{{asset('frontend/css/single2.css')}}">
<?php $images =  json_decode($hotel->image,true);?>
<main id="site-content" class="lst-room-detail" data-ng-controller="rooms_detail">
  <div id="single-slider-container">
      <div id="single-slider" class="hide lst-photo-gallery">

        @foreach($images as $image)
        <a class="grabable lst-room-slide-wrapper lst-photo-item" href="<?php echo "/frontend/images/".$image; ?>"
          data-size="1200x800"
          data-med-size="1200x800"
          data-med="<?php echo "/frontend/images/".$image; ?>">

          <div class="lst-gallery-item lazyload hidden-xxs"
          data-sizes="auto"
          style="background:url(''); height:420px; width:630px"
          data-bgset="<?php echo "/frontend/images/".$image; ?>"></div>

          <img class="lazyload visible-xxs hidden-xs hidden-sm hidden-md hidden-lg"
          src="<?php echo "/frontend/images/".$image; ?>"
          data-src="<?php echo "/frontend/images/".$image; ?>"
          height="200"
          width="300"
          alt=""/>
        </a>
        @endforeach
      </div>
      <div class="container slider-control-container hidden-xxs">
          <button class="slider-control prev slick-arrow pull-left" style="display: inline-block;">
            <i class="fa fa-chevron-left"></i>
          </button>
          <button class="slider-control next slick-arrow pull-right" style="display: inline-block;">
            <i class="fa fa-chevron-right"></i>
          </button>
          </div>
      </div>
        <!-- category page -->
      <div id="lst_main_single">
          <div class="container" id="lst_main_content">
            <div class="row">
              <div class="col-md-9">                          
                <div class="lst-info-head">
                  <div class="single-heading-title display-flex-center content-space-between">
                    <div class="single-host-avatar "><h1>{{$hotel->name}}</h1></div>
                    <div class="single-host-avatar text-center">
                      <a href="https://www.luxstay.com/vi/users/21006">
                        <img src="https://secure.gravatar.com/avatar/cc6f292dc02a576be6d314f52fb892fd?s=50&amp;r=g&amp;d=identicon" class="img-avatar-50 border-radius-50" alt="Golf Tamdao">
                        <h2 class="single-host-name color-666 font-size-14 margin-0">Golf Tamdao</h2>
                      </a>
                    </div>
                  </div>
                  <div class="details-apartment">
                    <div class="apartment-address">
                      <a class="pull-left" id="room_in_map" href="javascript:void(0)" data-toggle="modal"
                      data-target="#modal_map_detail">
                      <i class="fa fa-map-marker-alt"></i> {{$hotel->address}}
                      </a>
                    </div>
                    <div class="other-actions hide-sm text-center">
                       <div class="social-share-widget space-top-3 p3-share-widget"></div>
                    </div>
                  </div>
                  <div class="more-details">
                    <ul class="row">
                      <?php $utilities = json_decode($hotel->utilities,true); ?>
                      @foreach($utilities as $utility)
                      <li><p><i class="fa fa-check"></i>{{$utility}}</p></li>
                      @endforeach
                    </ul>
                  </div>

                </div>
              </div>
              <div class="col-md-3">
                <div id="km-detail">
                    
                    <div class="fs-dtslt">
                        Thông tin người đăng
                    </div>
                    <div style="padding: 5px;">
                       <div class="row">
                          <div class="col-md-4 text-center">
                              <img alt="Cinque Terre" class="img-circle" height="100" src="/images/no-avatar.jpg" width="100">
                          </div>
                          <div class="col-md-8">
                              <strong>
                              {{ $hotel->user->name }}
                              </strong>
                              <br>
                              <i class="far fa-clock">
                              </i>
                              Ngày tham gia: 17-02-2018
                              </br>
                              </br>
                              <a href="" class="btn btn-primary">Facebook</a>&nbsp;&nbsp;<a href="" class="btn btn-danger">Nhắn tin</a>
                          </div>
                        </div>
                     </div>
                  </div>
                <div id="lst_affix_booking2" class="nav nav-pills nav-stacked ps-container ps-theme-default" style="margin-top: initial">
                  <div class="bg-sidebar check-booking-sb">
                    <div class="book-it-prize row">
                      <div class="col-sm-8">
                      {{number_format($hotel->price)}} ₫
                      <br>
                    </div>
                    <div class="col-sm-4">&frasl; đ&ecirc;m</div>
                  </div>
                  <form accept-charset="UTF-8" action="" id="book_it_form" method="GET">
                      <div class="pkg booking-day">
                        <div class="col-left">
                          <div class="form-lbl">
                            <p>Ngày đến</p>
                          </div>
                          <div class="form-input" id="parent-sb-start-date">
                            <input name="checkin" class="search-checkin" type="date">
                          </div>
                        </div>
                        <div class="col-right">
                          <div class="form-lbl">
                            <p>Ngày đi</p>
                          </div>
                          <div class="form-input" id="parent-sb-end-date">
                            <input name="checkout" class="search-checkin" type="date" >
                          </div>
                        </div>
                      </div>

                      <div class="form-lbl"><p>Họ và tên</p></div>
                      <div class=""><input type="text"></div>
                      <br>
                      <div class="form-lbl"><p>Số điện thoại</p> </div>
                      <div class=""><input type="number"></div>
                      <br>
                      <div class="form-lbl"><p>Số người</p></div>
                      <div class=""><input type="number">  </div>
                      <table id="subtotal-container" class="table price_table m-0 js-subtotal-container">
                        <tbody>
                        </tbody>
                      </table>
                      <div class="form-submit">
                        <div class="send-request-active">
                          <button type="submit" class="js-book-it-btn-container avoid-click-all">
                            <strong>Gửi yêu cầu đặt phòng</strong>
                          </button>
                        </div>
                      </div>
                  </form>

              </div>
          </div>
      </div>
  </div>
  <div class="row">
     <section class="col-xs-12 col-sm-12 col-md-9 single-left-block">
      <div class="more-information" id="mota">
        <h2 class="underline-title"><strong>Mô tả chi tiết</strong>
        </h2>
        <div id="box_more_info" class="room-content">
          <p>{{$hotel->description}}</p>
        </div>
      </div>
      
      <div class="more-information" id="lst_box_another">
        <h2 class="underline-title"><strong>Đánh giá</strong></h2>
        <div id="lst_another_detail">
          <form action=""></form>
        </div>
      </div>
      <div class="more-information" id="trainghiem">
        <h2 class="underline-title"><strong>Bình luận</strong>
          <div>
            <form action="{{route('user.comment',['id'=> $hotel->id])}}" method="post">
              @csrf
              <br>
              <textarea name="body" class="form-control" cols="30" rows="6" required=""></textarea>              
              <br>
              <button type="submit" class="btn btn-success">Bình luận</button>
            </form>
            <br>
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  <h2 class="page-header">Phản hồi</h2>
                  <section class="comment-list">
                    <!-- First Comment -->
                    @foreach($comments as $comment)
                    <article class="row">
                      <div class="col-md-2 col-sm-2 hidden-xs">
                        <figure class="thumbnail">
                          <img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
                          <figcaption class="text-center"></figcaption>
                        </figure>
                      </div>
                      <div class="col-md-10 col-sm-10">
                        <div class="panel panel-default arrow left">
                          <div class="panel-body">
                            <header class="text-left">
                              <i class="fa fa-clock-o"></i> <h6>{{$comment->created_at}}</h6>
                            </header>
                            <div class="comment-post">
                              <p>
                               <h3>{{$comment->body}}</h3>
                             </p>
                           </div>
                         </div>
                       </div>
                     </div>
                   </article>
                   <!-- Second Comment Reply -->
                   @endforeach
                 </section>
               </div>
             </div>
           </div>
         </div>
       </h2>
     </div>
     </section>
  </div>
</main>
<style>
.padding_image{
  padding: 5px 0px;
}
</style>

  <script src="{{ asset('frontend/js/angular.min.js') }}"></script>
  <script src="{{ asset('frontend/js/angular-sanitize.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.autocomplete.min.js') }}"></script>
  <script src="{{ asset('frontend/js/ls.bgset.min.js') }}"></script>
  <script src="{{ asset('frontend/js/lazysizes.min.js') }}"></script>
  <script src="{{ asset('frontend/js/slideout.min.js') }}"></script>
  <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
  <script src="{{ asset('frontend/js/readmore.min.js') }}"></script>




  <script>
    var app = angular.module('App', ['ngSanitize']);
    var APP_URL = '';
    var USER_ID = 
    $.datepicker.setDefaults($.datepicker.regional["vi"])
  </script>
  <script src="{{ asset('frontend/js/rooms.js') }}"></script>
  @endsection

  

                