@extends('layouts.frontend')
@section('content')
  <script src="frontend/assets/js/fileinput/fileinput.js" type="text/javascript"></script>  
  <script src="frontend/assets/js/selectize.js" type="text/javascript"></script>  
<hr>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1 class="entry-title entry-prop">Trở thành chủ khách sạn</h1>
      <hr>
      <div class="panel">
        <div class="panel-heading">Thông tin bắt buộc*</div>
        <div class="panel-body">
                <div class="gap"></div>
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                @if(session('success'))
                <div class="alert bg-success">
                  <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                  <span class="text-semibold">Done!</span>  {{session('success')}}
                </div>
                @endif          
                <form action="{{ route ('users.create') }}" method="POST" enctype="multipart/form-data" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                     <label for="usr">Tên khách sạn:</label>
                     <input type="text" class="form-control" name="name">
                  </div>                      
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="usr">Giá phòng( vnđ ):</label>
                          <input type="number" name="price" class="form-control" placeholder="Nhập giá phòng..." >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="usr">Địa chỉ:</label>
                          <input name="address" class="form-control" placeholder="Nhập địa chỉ...">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="usr">Quận/ Huyện:</label>
                        <select class=" pull-right" data-live-search="true" name="district_id">
                          @foreach($districts =App\District::all() as $district)
                          <option value="{{ $district->id }}">{{ $district->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>            
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="usr">SĐT Liên hệ:</label>
                        <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại...">
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label>Các tiện ích có trong phòng trọ:</label>
                    <select id="select-state" name="utilities[]" multiple class="demo-default" placeholder="Chọn các tiện ích phòng trọ">
                     @foreach($utilities =App\Utility::all() as $utility)
                          <option value="{{ $utility->name }}">{{ $utility->name }}</option>
                     @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="comment">Mô tả ngắn:</label>
                    <textarea class="form-control" rows="5" name="description" style=" resize: none;"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="comment">Thêm hình ảnh:</label>
                    <div class="file-loading">
                      <input type="file" class="file form-control" name="images[]" multiple data-preview-file-type="any" data-upload-url="#">
                    </div>
                  </div>          
                  <button class="btn btn-success" type="submit">Tạo mới</button>
                </form>       
        </div>
     </div>
    </div>
    <div class="col-md-4">
      
     <div id="km-detail">
      <div class="fs-dtslt">Thông tin người đăng</div>
      <div style="padding: 5px;">
      <div class="row">
            <div class="col-md-4 text-center">
              <img src="{{asset('frontend/images/no-avatar.jpg')}}" class="img-circle" alt="Cinque Terre" width="100" height="100"> 
            </div>
           <div class="col-md-8">
              <h4></h4>
              <strong> {{ Auth::user()->name }}</strong><br>
              <i class="far fa-clock"></i> Ngày tham gia: {{ Auth::user()->created_at }}  
           </div> 
      </div>
      </div>
    </div>
  </div> 
 </div> 
</div>
<script type="text/javascript" src="frontend/assets/toast/toastr.min.js"></script>
<script>
  
    $(function() {
    $('select').selectize(options);
    });
    $('#select-state').selectize({
    maxItems: null
    });
</script>
<script type="text/javascript">
$('#file-5').fileinput({
      theme: 'fa',
      language: 'vi',
      showUpload: false,
      allowedFileExtensions: ['jpg', 'png', 'gif']
      });
</script>

@endsection