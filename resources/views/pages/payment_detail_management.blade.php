@extends('admin_layout')
@section('admin_content')
    <!-- DatePicker--> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!-- //DatePicker -->
<div class="table-agile-info">
    <a href="{{URL::to('pages/6/')}}"><button type="submit" class="btn btn-warning" id="add_position"><i class="fas fa-arrow-circle-left">Quay lại</i></button></a>
</div>
<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Thay đổi thông tin phiếu chi
		</header>
        @foreach($arrayMate as $arraycolumn)
		<div class="panel-body" style="display: block;">
			<div class="form">            
				<form class="cmxform form-horizontal " id="signupForm" method="post" action="{{URL::to('pages/6/detail_save')}}" novalidate="novalidate">
					{{ csrf_field() }}
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Mã phiếu chi</label>
						<div class="col-lg-6">
							<input class=" form-control" id="id" name="id" type="text" value="<?php echo $arraycolumn[0]?>" readonly="readonly">
						</div>
					</div>
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Mã phiếu nhập kho</label>
						<div class="col-lg-6">
							<input class=" form-control" id="idimport" name="idimport" type="text" value="<?php echo $arraycolumn[1]?>" readonly="readonly">
						</div>
					</div>
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Mã nhân viên</label>
						<div class="col-lg-6">
							<input class=" form-control" id="staff" name="staff" type="text" value="<?php echo $arraycolumn[2]?>">
						</div>
					</div>
					<div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Tổng tiền</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" type="text" id="total" name="total" value="<?php echo $arraycolumn[3]?>">
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Ngày lập phiếu</label>
						<div class="col-lg-6 col-sm-9">
                            <input class="form-control" type="text" id="datepicker" name="datepicker" value="<?php echo $arraycolumn[4]?>"> 
						</div>
					</div>                    
					<div class="form-group">
						<div class="col-lg-offset-3 col-lg-6">
							<button class="btn btn-primary" type="submit">Lưu</button>
							<a href="{{URL::to('pages/6/')}}"><button class="btn btn-default" type="button">Hủy</button></a>
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
    $( "#datepicker" ).datepicker(
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