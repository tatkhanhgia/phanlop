@extends('admin_layout')
@section('admin_content')
    <!-- DatePicker--> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!--test-->
    <script src="https://bossanova.uk/jspreadsheet/v3/jexcel.js"></script>
    <script src="https://jsuites.net/v3/jsuites.js"></script>
    <link rel="stylesheet" href="https://bossanova.uk/jspreadsheet/v3/jexcel.css" type="text/css" />
    <link rel="stylesheet" href="https://jsuites.net/v3/jsuites.css" type="text/css" />
    <!-- //DatePicker -->
<div class="table-agile-info">
    <a href="{{URL::to('pages/7/')}}"><button type="submit" class="btn btn-warning" id="add_position"><i class="fas fa-arrow-circle-left">Quay lại</i></button></a>
</div>
<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Hóa Đơn Bán Hàng
		</header>

		<div class="panel-body" style="display: block;">
			<div class="form">            
				<form class="cmxform form-horizontal " id="signupForm" method="post" action="{{URL::to('pages/7/add_save')}}" novalidate="novalidate">
					{{ csrf_field() }}
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Mã hóa đơn</label>
						<div class="col-lg-6">
							<input class=" form-control" id="id" name="id" type="text" value="<?php echo $arrayMate[0][0]?>" readonly="readonly">
						</div>
					</div>
                    <div class="form-group ">
						<label for="username" class="control-label col-lg-3">Mã nhân viên</label>
						<div class="col-lg-6">
							<input class=" form-control" id="staffid" name="staffid" type="text" value="<?php echo Session::get('admin_id')?>" readonly="readonly">
						</div>
					</div>
					<div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Ngày</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" type="text" id="datepicker" name="datepicker" readonly="readonly">
						</div>
					</div>
                    <div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Tổng tiền</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" type="text" id="total" name="total" value ="0" readonly="readonly">
						</div>
					</div>
                <div class="table-agile-info" style="margin-top: 10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Chi tiết
                         </div>
                    <!-- <div class="panel-body" id="testting"></div> -->
                    <div class="panel-body">            
                        <table id="table_receipt" class="display" style="width:100%">
					        <thead>
						    <th>Mã Sản phẩm</th>
                            <th>Sản phẩm</th>
                            <th>Gía </th>
						    <th>Số lượng</th>
						    <th>Thành tiền</th>
					        </thead>
                        <?php $count = 1; $count2=13;?>
                        <tbody>	
                         @foreach($arrayMate as $row)
					        							                    
						    <tr>
                            <td>{{$row[0]}}</td> <!--id-->
							<td>{{$row[1]}}</td> <!--tên sp-->
                            <td>{{$row[3]}}</td> <!--giá sp -->
                            @if($row[4] == 1)
							<td><label><input class=" form-control" type="text" id="<?php echo $count; ?>" name="<?php echo $count;?>" value ="0" pattern="[0-9.]*" required onchange="onupdate(<?php echo $count;$count++;?>)"></label></td>
							<td><label><input class=" form-control" type="text" id="<?php echo $count2; ?>" name="<?php echo $count2;$count2++;?>" value ="0" pattern="[0-9.]*" required readonly= "readonly"></label></td>
                            @else
                            <td><label><input class=" form-control" type="text" id="<?php echo $count; ?>" name="<?php echo $count;?>" value ="0" pattern="[0-9.]*" required onchange="onupdate(<?php echo $count;$count++;?>)" readonly= "readonly"></label></td>
							<td><label><input class=" form-control" type="text" id="<?php echo $count2; ?>" name="<?php echo $count2;$count2++;?>" value ="0" pattern="[0-9.]*" required readonly= "readonly"></label></td>
                            @endif
						    </tr>
                        @endforeach						
					    </tbody>
			</table>
        </div>
    </div>
    </div>
					<div class="form-group">
						<div class="col-lg-offset-3 col-lg-6">
							<button class="btn btn-primary" type="submit">Lưu</button>
							<a href="{{URL::to('pages/7/')}}"><button class="btn btn-default" type="button">Hủy</button></a>
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
      dateFormat:"yy-mm-dd",
      autoclose: true, 
      todayHighlight: true
    });
    $("#datepicker").datepicker("setDate",'now');
  } );
function onupdate(id){
    var a = id +12;
    var soluong = document.getElementById(id).value;
    var b = [
        29000,29000,29000,
        39000,39000,39000,
        19000,19000,19000,
        49000,49000,49000
    ];
    var c = soluong*b[id-1];
    document.getElementById(a).value = c;
    var tongtien_total = document.getElementById('total').value;
    tongtien_total = parseInt(c,10) + parseInt(tongtien_total,10);
    document.getElementById('total').value = tongtien_total;
}
//     var data1 = [
//     [ '1', 'Cà phê đen',        0, 29000,'=C1*D1'],
//     [ '2', 'Cà phê sữa',        0, 29000,'=C2*D2'],
//     [ '3', 'Bạc xỉu',           0, 29000,'=C3*D3'],
//     [ '4', 'Trà olong sen',     0, 39000,'=C4*D4'],
//     [ '5', 'Trà sữa đào',       0, 39000,'=C5*D5'],
//     [ '6', 'Trà đào sả',        0, 39000,'=C6*D6'],
//     [ '7', 'Bánh Tiramisu',    0,  19000,'=C7*D7'],
//     [ '8', 'Bánh mouse Đào',   0,  19000,'=C8*D8'],
//     [ '9', 'Bánh mouse Chanh dây',0,19000, '=C9*D9'],
//     [ '10', 'Đá xay matcha',     0, 49000,'=C10*D10'],
//     [ '11', 'Đá xay socola',     0, 49000,'=C11*D11'],
//     [ '12', 'Cookie&Cream',      0, 49000,'=C12*D12'],
//     [ '13', 'Tổng tiền ',            0, 0,'=E1+E2+E3+E4+E5+E6+E7+E8+E9+E10+E11+E12']
//     ];
//     var table1 = jexcel(document.getElementById('testting'), {
//     data:data1,
//     columns: [
//         {
//             title: 'Mã Sản phẩm',
//             type: 'text',            
//             width:'100px',
//         },
//         {
//             title: 'Sản phẩm',
//             type: 'text',            
//             width:'250px',
//         },
//         {
//             title: 'Số lượng',
//             type: 'number',
//             width:'150px',
//         },
//         {
//             title: 'Gía',
//             type: 'number',
//             width:'150px',
//         },
//         {
//             title: 'Tổng',
//             type: 'number',
//             width:'150px',
//         },
//     ],
//     rowResize: true,
//     columnDrag: true,    
// });   
</script>

@endsection