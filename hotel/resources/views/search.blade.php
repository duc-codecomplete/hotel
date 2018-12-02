@extends('layouts/frontend')

@section('content')
<main class="main">

<!-- /main slider -->
<article>
  <h1 class="hide">Luxstay</h1>
  <section class="container lastest-deal">
    <div class="heading-box col-xs-12 text-center">
      <h3 class="homepage-title-section">KẾT QUẢ TÌM KIẾM</h3>
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
 
  
</article>

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