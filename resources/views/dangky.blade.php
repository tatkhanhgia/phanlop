@extends('admin_layout')
@section('admin_content')
    <!-- DatePicker--> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!-- //DatePicker -->
<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Thêm Thí Sinh mới
		</header>

		<div class="panel-body" style="display: block;">
			<div class="form">            
				<form class="cmxform form-horizontal " id="signupForm" method="post" action="{{URL::to('dangky/add')}}" novalidate="novalidate">
					{{ csrf_field() }}
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Trình độ</label>
						<div class="col-lg-6">
							<select name="trinhdo" id="trinhdo">
								<option>Chọn trình độ</option>
								<option value="1">A2</option>
								<option value="2">B1</option>                                
							</select>
						</div>
					</div>
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Họ</label>
						<div class="col-lg-6">
							<input class=" form-control" id="ho" name="ho" type="text" >
						</div>
					</div>
                    <div class="form-group ">
						<label for="username" class="control-label col-lg-3">Tên</label>
						<div class="col-lg-6">
							<input class=" form-control" id="ten" name="ten" type="text" >
						</div>
					</div>
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Giới tính(1/nam - 0/nữ)</label>
						<div class="col-lg-6">
							<input class=" form-control" id="gioitinh" name="gioitinh" type="text" pattern="[0-1]{1}" required>
						</div>
					</div>
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Ngày sinh</label>
						<div class="col-lg-6">
							<input class=" form-control" id="ngaysinh" name="ngaysinh" type="text" >
						</div>
					</div>
					<div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Nơi sinh</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" type="text" id="noisinh" name="noisinh" >
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">CMND</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" type="text" id="cmnd" name="cmnd" >
						</div>
					</div>
                    <div class="form-group ">
						<label for="username" class="control-label col-lg-3">Ngày cấp</label>
						<div class="col-lg-6">
							<input class=" form-control" id="ngaycap" name="ngaycap" type="text" >
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Nơi cấp</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" type="text" id="noicap" name="noicap" >
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">SDT</label>
						<div class="col-lg-6 col-sm-9">
                            <input class="form-control" type="tel" id="sdt" name="sdt" pattern="[0-9]{10}" required> 
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Email</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" id="email" name="email" type="text">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-3 col-lg-6">
							<button class="btn btn-primary" type="submit">Lưu</button>							
						</div>
					</div>
				</form>
			</div>
		</div>
        
	</section>
</div>
<script>
  $( function() {
    $( "#ngaysinh" ).datepicker(
        {
      changeMonth: true,
      changeYear: true,
      showAnim:"clip",
      dateFormat:"yy-mm-dd"
    }   
    );
  } );
  $( function() {
    $( "#ngaycap" ).datepicker(
        {
      changeMonth: true,
      changeYear: true,
      showAnim:"clip",
      dateFormat:"yy-mm-dd"
    }   
    );
  } );
</script>

@endsection