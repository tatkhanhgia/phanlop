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
			In giấy chứng nhận
		</header>

		<div class="panel-body" style="display: block;">
			<div class="form">            
				<form class="cmxform form-horizontal " id="signupForm" method="post" action="{{URL::to('/giaychungnhan_in')}}" novalidate="novalidate">
					{{ csrf_field() }}					
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">SBD</label>
						<div class="col-lg-6">
							<input class=" form-control" id="sbd" name="sbd" type="text" >
						</div>
					</div>
                    <div class="form-group ">
						<label for="username" class="control-label col-lg-3">Khóa thi</label>
						<div class="col-lg-6">
							<input class=" form-control" id="khoathi" name="khoathi" type="text" >
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