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
                  <th>Phê duyệt</th>
                  <th>Tùy chọn</th>
                </tr>
              </thead>
              <tbody>
                @foreach($hotels as $hotel)
                <tr>
                  <td>{{$hotel->id}}</td>
                  
                  <td><a href="phongtro/{{$hotel->name}}" target="_blank">{{$hotel->name}}</a></td>
                  <td>{{$hotel->district->name}}</td>
                  
                  <td>{{$hotel->phone}}</td>
                  <td>
                   <a href="/admin/hotels/approve/{{$hotel->id}}/1"><button class="btn btn-warning btn-sm">Chấp nhận</button></a>
               <a href="/admin/hotels/approve/{{$hotel->id}}/2"><button class="btn btn-danger btn-sm">Bỏ qua</button></a>
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