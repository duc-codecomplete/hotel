@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-10">
      <h1>Danh sách tiện ích</h1>
    </div>

    <div class="col-md-2">
      <a href="{{ route('admin.utilities.create') }}" class="btn btn-primary ">Tạo mới</a>
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
          <th>Tên tiện tích</th>
          <th>Tùy chọn</th>
        </thead>

        <tbody>
          <?php $i=1 ?>
          @foreach ($utilities as $utility)
            
            <tr>
              <th>{{ $i }}</th>
              <td>{{ $utility->name }}</td>
              <td>
               <a href="/admin/utilities/edit/{{$utility->id}}"><button class="btn btn-warning btn-sm">Sửa</button></a>
               <a href="/admin/utilities/delete/{{$utility->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?');"><button class="btn btn-danger btn-sm">Xóa</button></a>
              </td>
            </tr>
        <?php $i++ ?>
          @endforeach

        </tbody>
      </table>

     
    </div>
  </div>
@endsection