@extends('admin_layout')
@section('admin_content')
    <!-- DatePicker--> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!-- //DatePicker -->
<div class="table-agile-info">
    <a href="{{URL::to('pages/4/')}}"><button type="submit" class="btn btn-warning" id="add_position"><i class="fas fa-arrow-circle-left">Quay lại</i></button></a>
</div>
<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Chi tiết tiêu thụ
		</header>

		<div class="panel-body" style="display: block;">
			<div class="form">            
				<form class="cmxform form-horizontal " id="signupForm" method="post" action="{{URL::to('pages/4/add_consume_save')}}" novalidate="novalidate">
					{{ csrf_field() }}
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Mã sản phẩm</label>
						<div class="col-lg-6">
							<input class=" form-control" id="id" name="id" type="text" value="<?php echo $arrayMate[0]?>" readonly="readonly">
						</div>
					</div>
                    <div class="form-group ">
						<label for="username" class="control-label col-lg-3">Tên sản phẩm</label>
						<div class="col-lg-6">
							<input class=" form-control" id="name" name="name" type="text" value="<?php echo $arrayMate[1]?>" readonly="readonly">
						</div>
					</div>
                    <div class="form-group ">
						<label for="username" class="control-label col-lg-3">Loại sản phẩm</label>
						<div class="col-lg-6">
						@if($arrayMate[2] == 1)
							<input class=" form-control" id="name" name="name" type="text" value="Cà phê" readonly="readonly">
						@elseif($arrayMate[2] == 2)
							<input class=" form-control" id="name" name="name" type="text" value="Trà" readonly="readonly">
						@elseif($arrayMate[2] == 3)
							<input class=" form-control" id="name" name="name" type="text" value="Bánh ngọt" readonly="readonly">
						@elseif($arrayMate[2] == 4)
							<input class=" form-control" id="name" name="name" type="text" value="Đá xay" readonly="readonly">
						@endif
						</div>
					</div>
					<div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Gía bán</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" type="text" id="saleprice" name="saleprice" value="<?php echo $arrayMate[3]?>" readonly="readonly">
						</div>
					</div>
					<div class="panel-body">
					<table id="table_account_manage" class="display" style="width:100%"> 
						<thead>
                    		<tr>                        		
                        		<th>Tên nguyên liệu</th>                        		                        		
                        		<th>Số lượng tiêu thụ</th>
								<th>Đơn vị tính</th>
                   			 </tr>
                		</thead>
					<tbody>
					<?php  $count = 0;?>
					@foreach($arrayMate[5] as $row)
					<tr>						
						<td>
							<input class=" form-control" type="text" id="noname" name="noname" value="<?php echo $row[2]?>" readonly="readonly">
						</td>
						<td>
							<input class=" form-control" type="text" id="{{$count}}" name="{{$count}}" value="0">
						</td>
						<?php  $count++; ?>
					</tr>	
					@endforeach      
					</tbody>
					</table>   
					</div>
					<div class="form-group">
						<div class="col-lg-offset-3 col-lg-6">
							<button class="btn btn-primary" type="submit">Lưu</button>
							<a href="{{URL::to('pages/4/')}}"><button class="btn btn-default" type="button">Hủy</button></a>
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
    $("#datepicker").datepicker("setDate",'now');
  }) 
</script>

@endsection