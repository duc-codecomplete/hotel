@extends('layouts/frontend')

@section('content')
<main class="main">

  <!-- main slider -->
  <div id="main-slider" class="clearboth">
    <div class="lst-fade lst-main-slider hide">

      <div class="lst-slide lazyload" style="background-image: url(<?php echo "frontend/images/image_slide_1523517429.png";?>)">
        <div class="slide-content">
          <div class="slide-caption container hidden-sm hidden-xs">
            <p class="lst-home-title">Chia sẻ càng nhiều, nhận lại càng nhiều!</p>
            <p class="lst-home-subtitle">Mời bạn bè của mình trải nghiệm Luxstay.</p>
            <a class="discovery" href="https://www.luxstay.com/vi/invite">Giới thiệu ngay</a>
          </div>
        </div>
      </div>
    </div>
    <div class="booking-container">
      <div class="booking-bg oneline-searchbox container p-0 searchbar-form">
        <div class="bg-search">
          <div class="container booking-container-category">
            <form method="GET" action="/search" accept-charset="UTF-8" class="booking-form-category" style="margin-left:300px">
              <div class="booking-category-bg oneline-searchbox clearfix row gutter-10">
                {{-- <div class="col-sm-12 col-md-4">
                  <input  class="form-control oneline-guests guest-search active lst-search-location" name="name" placeholder="Nhập vào tên khách sạn">
                </div> --}}
                <div class="col-xs-6 col-sm-3 col-md-2">
                  <select name="district_id" class="form-control">
                    <option value="0">---Chọn khu vực---</option>
                    @foreach($districts as $district)
                    <option value="{{$district->id}}">{{$district->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-2">
                 <select name="price" class="form-control">
                  <option value="0">---Chọn giá tiền---</option>
                  <option value="1">Từ 500.000 đến 1.000.000</option>
                  <option value="2">Từ 1.000.000 đến 1.500.000</option>
                  <option value="3">Từ 1.500.000 đến 2.000.000</option>
                  <option value="4">Từ 2.000.000 trở lên</option>
                </select>
              </div>
              <div class="col-xs-6 col-sm-3 col-md-2 search-icon-position">
                <button type="submit" class="btn btn-danger btn-block search-button oneline-search-button">
                  <b>Tìm kiếm</b>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /main slider -->
<article>
  <h1 class="hide">Luxstay</h1>
  <section class="container lastest-deal">
    <div class="heading-box col-xs-12 text-center">
      <h3 class="homepage-title-section">ĐƯỢC QUAN TÂM NHIỀU NHẤT</h3>
    </div>
    <div class="owl-carousel owl-theme room-item finest-homstay">
      @foreach($hotels as $hotel)
      <?php $img_thumb = json_decode($hotel->image,true);?>
      <figure>
        <a href="/hotels/{{$hotel->id}}" class="thumb">
          <img class="lazyload" alt="Golf View Villa" src="frontend/images/{{$img_thumb[0]}}">
          <span class="view-more3">Xem tiếp</span>
        </a>
        <figcaption class="title">

          <a href="/hotels/{{$hotel->id}}" style="font-weight: bold;color:blue " >{{$hotel->name}}</a>
          <p><i class="far fa-money-bill-alt"></i> {{number_format($hotel->price)}}<u>đ</u>/đêm</p>          
          <div class="row">
            <div class="col-md-6">
              Lượt xem : {{$hotel->count_view}}
            </div>
            <div class="col-md-6">
              <i class="fa fa-phone"></i> : {{$hotel->phone}}
            </div>
          </div>
          <div class="desc">
            <a class="item-category" href = "" ><i class="fa fa-map-marker-alt"></i> {{$hotel->address}}</a>
          </div>
        </figcaption>
      </figure>
      @endforeach
    </div>
  </section>
  <!--END LATEST HOLIDAY DEALS-->
  <!--BEGIN LATEST HOLIDAY DEALS-->
  <section class="container lastest-deal">
    <div class="heading-box col-xs-12 text-center">
      <h3 class="homepage-title-section">ĐÁNH GIÁ CAO NHẤT</h3>
    </div>
    <div class="owl-carousel owl-theme room-item finest-homstay">
      @foreach($hotels as $hotel)
      <?php $img_thumb = json_decode($hotel->image,true);?>
      <figure>
        <a href="/hotels/{{$hotel->id}}" class="thumb">
          <img class="lazyload" alt="Golf View Villa" src="frontend/images/{{$img_thumb[0]}}">
          <span class="view-more3">Xem tiếp</span>
        </a>
        <figcaption class="title">

          <a href="/hotels/{{$hotel->id}}" style="font-weight: bold;color:blue " >{{$hotel->name}}</a>
          <p><i class="far fa-money-bill-alt"></i> {{number_format($hotel->price)}}₫/đêm</p>          
          <div class="row">
            <div class="col-md-6">
              Lượt xem : {{$hotel->count_view}}
            </div>
            <div class="col-md-6">
              <i class="fa fa-phone"></i> : {{$hotel->phone}}
            </div>
          </div>
          <div class="desc">
            <a class="item-category" href = "" ><i class="fa fa-map-marker-alt"></i> {{$hotel->address}}</a>
          </div>
        </figcaption>
      </figure>
      @endforeach
    </div>
  </section>
  <!--END LATEST HOLIDAY DEALS-->

  <!-- BEGIN accommodation BY DESTINATIONS -->
  <section class="container ">
    <div class="heading-box col-xs-12 text-center">
      <h3 class="homepage-title-section">CÁC KHÁCH SẠN HÀNG ĐẦU</h3>
    </div>
    <ul id="list-locations">
      <li class="row">
        @foreach($best_hotel as $hotel)
         <?php $img_thumb = json_decode($hotel->image,true);?>
        <div class="col-xs-6 col-sm-3 m-b-15">
          <a href="">
            <figure>
              <div class="overlay-bg">
                <img class="lazyload" src="frontend/images/{{$img_thumb[0]}}">
              </div>
              <div class="details-overlay">
                <div class="detail text-center">
                  <h3><strong>{{$hotel->name}}</strong></h3>
                  <p class="price-from"></p>
                </div>
                <div class="more-detail text-center hidden-xs">
                  <div class="view-more"><a href="/hotels/{{$hotel->id}}">Xem thêm</a></div>
                </div>
              </div>
            </figure>
          </a>
        </div>
        @endforeach
      </li>
    </ul>
  </section>
  <!-- END accommodation BY DESTINATIONS -->
</article>
<section class="container lastest-deal">
  <div class="heading-box col-xs-12 text-center">
    <h3 class="homepage-title-section">KHÁM PHÁ CÙNGNG LUXSTAY</h3>
  </div>
  <div class="owl-carousel owl-theme room-item">
    <figure>
      <a href="https://blog.luxstay.net/tong-hop-cac-can-homestay-sieu-lung-linh-tren-luxstay/" target="_blank">
        <div class="thumb"
        style="background-size: cover; background-position: center; background-image:url(https://blog.luxstay.net/wp-content/uploads/2017/03/IMG_7811-300x200.jpg)">
        <div class="mask"><span class="view-more3">Xem tiếp</span>
        </div>
      </div>
    </a>
    <a href="" class="title-news">Tổng Hợp Các Căn Homestay Siêu Lung Linh Trên Luxstay</a>
    <a href="" class="tag">Điểm Đến Hàng Đầu</a>
  </figure>
  <figure>
    <a href="">
      <div class="thumb"
      style="background-size: cover; background-position: center; background-image:url(https://blog.luxstay.net/wp-content/uploads/2017/02/12728763_1240887252594128_7557731683168955149_n-300x202.jpg)">
      <div class="mask"><span class="view-more3">Xem tiếp</span>
      </div>
    </div>
  </a>
  <a href="" class="title-news" >4 Căn Homestay Siêu Cute Đang Làm Mưa Làm Gió Tại Hà Nội</a>
  <a href="" class="tag">Khám Phá Việt Nam</a>
</figure>
<figure>
  <a href="">
    <div class="thumb"
    style="background-size: cover; background-position: center; background-image:url(https://blog.luxstay.net/wp-content/uploads/2017/02/FDLR-4-300x169.jpg)">
    <div class="mask"><span class="view-more3">Xem tiếp</span>
    </div>
  </div>
</a>
<a href="" class="title-news" >Kinh Nghiệm Đi Du Lịch Đại Lải Vĩnh Phúc</a>
<a href="" class="tag">Điểm Đến Hàng Đầu</a>
</figure>
</div>
</section>
</main>
<style>
.padding_image{
  padding: 5px 0px;
}
</style>
@if(session('empty'))
<script>
  alert('Dữ liệu không hợp lệ');
</script>
@endif  
@endsection