@extends('layouts.admin')
@section('content')

    <div class="row">
      <div class="col-12">
        <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Danh sách các khách sạn <span class="badge badge-primary">5</span></h5>
            </div>

            <div class="panel-body">
              Các <code>Khách sạn</code> được liệt kê tại đây. <strong>Dữ liệu đang cập nhật.</strong>
            </div>
        
            <table class="table">
              <thead>
                <tr class="bg-blue">
                  <th>ID</th>
                  
                  <th>Tên khách sạn</th>
                  <th>Quận huyện</th>
                  <th>Hotline</th>
                  <th>Trạng thái</th>
                  <th>Tùy chọn</th>
                </tr>
              </thead>
              <tbody>
                @foreach($hotels as $hotel)
                <tr>
                  <td>{{$hotel->id}}</td>
                  
                  <td>{{$hotel->name}}</td>
                  <td>{{$hotel->district->name}}</td>
                  
                  <td>{{$hotel->phone}}</td>
                  <td>
                    @if($hotel->approve == 1)
                      <span class="btn btn-success btn-sm">Chấp nhận</span>
                      @else
                      <span class="btn btn-danger btn-sm">Không chấp nhận</span>
                    @endif
                  </td>
                  <td>
                    <a href="/admin/hotels/edit/{{$hotel->id}}"><button class="btn btn-warning btn-sm">Xem</button></a>
               <a href="/admin/hotels/delete/{{$hotel->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?');"><button class="btn btn-danger btn-sm">Xóa</button></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
   
@endsection