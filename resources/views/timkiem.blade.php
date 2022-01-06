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
			Tìm kiếm thông tin thí sinh
		</header>

		<div class="panel-body" style="display: block;">
			<div class="form">            
				<form class="cmxform form-horizontal " id="signupForm" method="post" action="{{URL::to('timkiem/find')}}" novalidate="novalidate">
					{{ csrf_field() }}
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Họ</label>
						<div class="col-lg-6">
							<input class=" form-control" id="ho" name="ho" type="text" value="null">
						</div>
					</div>
                    <div class="form-group ">
						<label for="username" class="control-label col-lg-3">Tên</label>
						<div class="col-lg-6">
							<input class=" form-control" id="ten" name="ten" type="text" value="null">
						</div>
					</div>					                                   
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">SDT</label>
						<div class="col-lg-6 col-sm-9">
                            <input class="form-control" type="text" id="sdt" name="sdt"  pattern="[0-9]{10}" required=""> 
						</div>
					</div>
                   
					<div class="form-group">
						<div class="col-lg-offset-3 col-lg-6">
							<button class="btn btn-primary" type="submit">Tìm</button>							
						</div>
					</div>
				</form>
			</div>
		</div>
        
	</section>
</div>

@endsection