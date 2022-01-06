@extends('admin_layout')
@section('admin_content')
    <!-- DatePicker--> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!-- //DatePicker -->
<div class="table-agile-info">
    <a href="{{URL::to('timkiem')}}"><button type="submit" class="btn btn-warning" id="add_position"><i class="fas fa-arrow-circle-left">Quay lại</i></button></a>
</div>
<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Chi tiết thí sinh
		</header>
        @foreach($array as $row)
		<div class="panel-body" style="display: block;">
			<div class="form">            
				<form class="cmxform form-horizontal " id="signupForm" method="post" action="{{URL::to('dangky/add')}}" novalidate="novalidate">
					{{ csrf_field() }}
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">SBD</label>
						<div class="col-lg-6">
							<input class=" form-control" id="sbd" name="sbd" value = "{{$row[0]}}" type="text" >
						</div>
					</div>
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Họ</label>
						<div class="col-lg-6">
							<input class=" form-control" id="ho" name="ho" type="text" value = "{{$row[1]}}">
						</div>
					</div>
                    <div class="form-group ">
						<label for="username" class="control-label col-lg-3">Tên</label>
						<div class="col-lg-6">
							<input class=" form-control" id="ten" name="ten" type="text" value = "{{$row[2]}}">
						</div>
					</div>
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Giới tính(1/nam - 0/nữ)</label>
						<div class="col-lg-6">
							<input class=" form-control" id="gioitinh" name="gioitinh" type="text" value = "{{$row[3]}}">
						</div>
					</div>
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Ngày sinh</label>
						<div class="col-lg-6">
							<input class=" form-control" id="ngaysinh" name="ngaysinh" type="text" value = "{{$row[4]}}">
						</div>
					</div>
					<div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Nơi sinh</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" type="text" id="noisinh" name="noisinh" value = "{{$row[5]}}">
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">CMND</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" type="text" id="cmnd" name="cmnd" value = "{{$row[6]}}">
						</div>
					</div>
                    <div class="form-group ">
						<label for="username" class="control-label col-lg-3">Ngày cấp</label>
						<div class="col-lg-6">
							<input class=" form-control" id="ngaycap" name="ngaycap" type="text" value = "{{$row[7]}}">
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Nơi cấp</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" type="text" id="noicap" name="noicap" value = "{{$row[8]}}">
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">SDT</label>
						<div class="col-lg-6 col-sm-9">
                            <input class="form-control" type="tel" id="sdt" name="sdt" value = "{{$row[9]}}"> 
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Email</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" id="email" name="email" type="text" value = "{{$row[10]}}">
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Phòng thi</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" id="email" name="email" type="text" value = "{{$row[11]}}">
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Khóa thi</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" id="email" name="email" type="text" value = "{{$row[12]}}">
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Điểm Nghe</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" id="email" name="email" type="text" value = "{{$row[13]}}">
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Điểm Nói</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" id="email" name="email" type="text" value = "{{$row[14]}}">
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Điểm Đọc</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" id="email" name="email" type="text" value = "{{$row[15]}}">
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Điểm Viết</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" id="email" name="email" type="text" value = "{{$row[16]}}">
						</div>
					</div>
				</form>
			</div>
		</div>
        @endforeach
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