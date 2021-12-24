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
			Chi tiết hóa đơn
		</header>
		<div class="panel-body" style="display: block;">
			<div class="form">            
				<form class="cmxform form-horizontal " id="signupForm" method="post" action="{{URL::to('pages/5/add_detail_save')}}"  >
					{{ csrf_field() }}
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Mã đơn nhập</label>
						<div class="col-lg-6">
							<input class=" form-control" id="id" name="id" type="text" value="<?php echo $arrayMate[0]?>" readonly="readonly">
						</div>
					</div>
                    <div class="form-group ">
						<label for="username" class="control-label col-lg-3">Mã nhà cung cấp</label>
						<div class="col-lg-6">
						<input class=" form-control" id="producer_id" name="producer_id" type="text" value="<?php echo $arrayMate[1]?>" readonly="readonly">
						</div>
					</div>
					<div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Ngày nhập</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" type="text" id="datepicker" name="datepicker" value="<?php echo $arrayMate[2]?>" readonly="readonly">
						</div>
					</div>
					<table id="table_import" class="display" style="width:100%">
					<thead>
						<th>Nguyên liệu</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
					</thead>
					<tbody>
					@if($arrayMate[1]==1)					
                    <!--<div class="form-group " id = "thaiphien" style="display:block">						-->
						<tr>
							<td><label >Cà phê gói</label></td>
							<td><label ><input class=" form-control" type="text" id="1" name="1" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="20" name="20" pattern="[0-9.]*" required></label></td>
						</tr>
						<tr>
							<td><label >Trà olong gói</label></td>
							<td><label ><input class=" form-control" type="text" id="2" name="2" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="21" name="21" pattern="[0-9.]*" required></label></td>
						</tr>
						<tr>
							<td><label >Trà đào gói</label></td>
							<td><label><input class=" form-control" type="text" id="3" name="3" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="22" name="22" pattern="[0-9.]*" required></label></td>
						</tr>
						<tr>
							<td><label >Sen hộp</label></td>
							<td><label><input class=" form-control" type="text" id="4" name="4" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="23" name="23" pattern="[0-9.]*" required></label></td>
						</tr>
						<tr>
							<td><label >Đào hộp</label></td>
							<td><label><input class=" form-control" type="text" id="5" name="5" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="24" name="24" pattern="[0-9.]*" required></label></td>
						</tr>
						<tr>
							<td><label >Syrup Đào</label></td>
							<td><label><input class=" form-control" type="text" id="6" name="6" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="25" name="25" pattern="[0-9.]*" required></label></td>
						</tr>
						<tr>
							<td><label >Syrup Sả</label></td>
							<td><label><input class=" form-control" type="text" id="7" name="7" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="26" name="26" pattern="[0-9.]*" required></label></td>
						</tr>
						<tr>
							<td><label >Bột trà xanh</label></td>
							<td><label><input class=" form-control" type="text" id="8" name="8" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="27" name="27" pattern="[0-9.]*" required></label></td>
						</tr>
						<tr>
							<td><label >Bột chocolate</label></td>
							<td><label><input class=" form-control" type="text" id="9" name="9" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="28" name="28" pattern="[0-9.]*" required></label></td>
						</tr>							
					<!--</div>-->
					
					@elseif($arrayMate[1] ==2)																	
						<tr>					
							<td><label>Sữa kem béo</label></td>
							<td><label><input class=" form-control" type="text" id="10" name="10" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="29" name="29" pattern="[0-9.]*" required></label></td>
						</tr>
						<tr>
							<td><label>Bánh oreo</label></td>
							<td><label><input class=" form-control" type="text" id="11" name="11" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="30" name="30" pattern="[0-9.]*" required></label></td>
						</tr>	
						<tr>
							<td><label>Đường cát</label></td>
							<td><label><input class=" form-control" type="text" id="12" name="12" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="31" name="31" pattern="[0-9.]*" required></label></td>
						</tr>
						<tr>
							<td><label>Sữa đặc</label></td>
							<td><label><input class=" form-control" type="text" id="15" name="15" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="34" name="34" pattern="[0-9.]*" required></label></td>
						</tr>	
						<tr>
							<td><label>Sữa tươi</label></td>
							<td><label><input class=" form-control" type="text" id="16" name="16" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="35" name="35" pattern="[0-9.]*" required></label></td>					
						</tr>
					@elseif($arrayMate[1] ==3)					
					<tr>					
							<td><label>Ly</label></td>
							<td><label><input class=" form-control" type="text" id="13" name="13" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="32" name="32" pattern="[0-9.]*" required></label></td>
						</tr>
						<tr>
							<td><label>Nắp</label></td>
							<td><label><input class=" form-control" type="text" id="14" name="14" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="33" name="33" pattern="[0-9.]*" required></label></td>
						</tr>	
						<tr>
							<td><label>Bánh mouse Tiramisu</label></td>
							<td><label><input class=" form-control" type="text" id="17" name="17" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="36" name="36" pattern="[0-9.]*" required></label></td>
						</tr>
						<tr>
							<td><label>Bánh mouse Đào</label></td>
							<td><label><input class=" form-control" type="text" id="18" name="18" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="37" name="37" pattern="[0-9.]*" required></label></td>
						</tr>	
						<tr>
							<td><label>Bánh mouse Chanh dây</label></td>
							<td><label><input class=" form-control" type="text" id="19" name="19" pattern="[0-9.]*" required></label></td>
							<td><label ><input class=" form-control" type="text" id="38" name="38" pattern="[0-9.]*" required></label></td>					
						</tr>
					@endif
					</tbody>
					</table>                    				
					<div class="form-group">
						<div class="col-lg-offset-3 col-lg-6">
							<button class="btn btn-primary" type="submit" >Lưu</button>
							<a href="{{URL::to('pages/5/delete_all')}}"><button class="btn btn-default" type="button">Hủy</button></a>
						</div>
					</div>
				</form>
			</div>

		</div>
        
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
  function empty(e) {
	switch (e) {
		case "":
		case 0:
		case "0":
		case null:
		case false:
		case typeof this == "undefined":
		return true;
		default:
		return false;
	}
}
  function validateForm(){	
	  	var i = 1;
		  window.alert("Hello");
		for(;i<20;i++)
		{
			var a = document.getElementById(i).value;
			if(empty(a)){
				window.alert("Vui lòng nhập số đầy đủ!!Không có thì nhập số 0");
				return false;
			}
		}
		window.location.href =  {{URL::to('pages/5/add_detail_save')}};		
  }
</script>

@endsection