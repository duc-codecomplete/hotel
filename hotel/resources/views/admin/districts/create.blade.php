@extends('layouts.admin')
@section('content')
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Tạo quận huyện</h3>
            <div class="tile-body">
              <form class="row" action="{{route('admin.districts.create')}}" method="post">
              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group col-md-3">
                  <label class="control-label">Tên quận huyện</label>
                  <input class="form-control" name="name" placeholder="Nhập tên quận huyện">
                </div>
               
                <div class="form-group col-md-4 align-self-end">
                  <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-plus"></i>Tạo mới</button>
                </div>
              </form>
            </div>
          </div>
        </div>
@endsection