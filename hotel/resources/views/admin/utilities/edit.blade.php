@extends('layouts.admin')
@section('content')
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Sửa tiện ích</h3>
            <div class="tile-body">
              <form class="row" action="{{route('admin.utilities.edit',['id'=> $utility->id])}}" method="post">
              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
              	
                <div class="form-group col-md-3">
                  <label class="control-label">Tên tiện ích</label>
                  <input class="form-control" name="name" value="{{$utility->name}}">
                </div>
               
                <div class="form-group col-md-4 align-self-end">
                  <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-plus"></i>Cập nhật</button>
                  <a href="/admin/districts"><button class="btn btn-danger">Quay lại</button></a>
                </div>
              </form>
            </div>
          </div>
        </div>
@endsection