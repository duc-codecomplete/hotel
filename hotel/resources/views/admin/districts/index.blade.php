@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-10">
      <h1>Danh sách quận huyện</h1>
    </div>

    <div class="col-md-2">
      <a href="{{ route('admin.districts.create') }}" class="btn btn-primary ">Tạo mới</a>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!-- end of .row -->

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>#</th>
          <th>Tên quận huyện</th>
          <th>Tùy chọn</th>
        </thead>

        <tbody>
          <?php $i=1 ?>
          @foreach ($districts as $district)
            
            <tr>
              <th>{{ $i }}</th>
              <td>{{ $district->name }}</td>
              <td>
               <a href="/admin/districts/edit/{{$district->id}}"><button class="btn btn-warning btn-sm">Sửa</button></a>
               <a href="/admin/districts/delete/{{$district->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?');"><button class="btn btn-danger btn-sm">Xóa</button></a>
              </td>
            </tr>
        <?php $i++ ?>
          @endforeach

        </tbody>
      </table>

     
    </div>
  </div>
@endsection