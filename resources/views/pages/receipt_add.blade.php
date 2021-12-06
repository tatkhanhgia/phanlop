@extends('admin_layout')
@section('admin_content')
    <!-- DatePicker--> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
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
							<input class=" form-control" id="id" name="id" type="text" value="<?php echo $arrayMate?>" readonly="readonly">
						</div>
					</div>
                    <div class="form-group ">
						<label for="username" class="control-label col-lg-3">Mã nhân viên</label>
						<div class="col-lg-6">
							<input class=" form-control" id="id" name="id" type="text" value="<?php echo Session::get('admin_id')?>" readonly="readonly">
						</div>
					</div>
					<div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Ngày</label>
						<div class="col-lg-6 col-sm-9">
                            <input class=" form-control" type="text" id="datepicker" name="datepicker" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-3 col-lg-6">
							<button class="btn btn-primary" type="submit">Lưu</button>
							<a href="{{URL::to('pages/8/')}}"><button class="btn btn-default" type="button">Hủy</button></a>
						</div>
					</div>
                    <div class="form-group">
						<div class="col-lg-offset-3 col-lg-6">
                            <label for="agree" class="control-label col-lg-3 col-sm-3">Hóa đơn</label>
                            <table id="bill" class="display" style="width:100%">
                                <tbody>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</t>
                                        <th>Số lượng</th>   
                                        <th>Thành tiền</th>                     
                                    </tr>  
                                        <th><input type="hidden" id="1"></th>
                                        <th><input type="hidden" id="2"></th>
                                        <th><input type="hidden" id="3" value="29.000"></th>
                                        <th><input type="hidden" id="4"></th>                                             
                                </tbody>
                            </table>                            
						</div>
					</div>
                    <div class="form-group ">
						<label for="username" class="control-label col-lg-3">Tổng tiền</label>
						<div class="col-lg-6">
							<input class=" form-control" id="total" name="total" type="text" readonly="readonly">
						</div>
					</div>
				</form>
			</div>
		</div>
        <div class="table-agile-info" style="margin-top: 10px">
    <div class="panel panel-default">
        <div class="panel-heading">
            Chi tiết
        </div>
        <div class="panel-body">
            <table id="table_account_manage" class="display" style="width:100%">
                <tbody>
                    <tr>
                        <td><button  class="btn btn-warning" id="1" onclick="click1()"><i class="fas fa-arrow-circle-left">Cà phê đen</i></button></td>
                        <td><button  class="btn btn-warning" id="2" onclick="click2()"><i class="fas fa-arrow-circle-left">Cà phê sữa</i></button></td>
                        <td><button  class="btn btn-warning" id="3" onclick="click3()"><i class="fas fa-arrow-circle-left">Bạc xỉu</i></button></td>                        
                    </tr>
                    <tr>
                        <td><button  class="btn btn-warning" id="4" onclick="click4()"><i class="fas fa-arrow-circle-left">Trà sen vàng</i></button></td>
                        <td><button class="btn btn-warning" id="5"  onclick="click5()"><i class="fas fa-arrow-circle-left">Trà đào sả</i></button></td>
                        <td><button  class="btn btn-warning" id="6" onclick="click6()"><i class="fas fa-arrow-circle-left">Trà đào sữa</i></button></td>                        
                    </tr>
                    <tr>
                        <td><button  class="btn btn-warning" id="7" onclick="click7()"><i class="fas fa-arrow-circle-left">Bánh tiramisu</i></button></td>
                        <td><button  class="btn btn-warning" id="8" onclick="click8()"><i class="fas fa-arrow-circle-left">Bánh mouse Đào</i></button></td>
                        <td><button  class="btn btn-warning" id="9" onclick="click9()"><i class="fas fa-arrow-circle-left">Bánh mouse Chanh dây</i></button></td>                        
                    </tr>
                    <tr>
                        <td><button  class="btn btn-warning" id="10" onclick="click10()"><i class="fas fa-arrow-circle-left">Trà xanh đá xay</i></button></td>
                        <td><button  class="btn btn-warning" id="11" onclick="click11()"><i class="fas fa-arrow-circle-left">Socola đá xay</i></button></td>
                        <td><button  class="btn btn-warning" id="12" onclick="click12()"><i class="fas fa-arrow-circle-left">Cookie&Cream</i></button></td>                        
                    </tr>                
                </tbody>
            </table>
        </div>
    </div>
</div>
	</section>
</div>
<script>
    <?php $array = array(); $count = 0 ?>
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
  
  function click1(){
        var table = document.getElementById("bill");
        var rowLength = table.rows.length;
        var flag = 0;
        // //loops through rows    
        // for (i = 0; i < rowLength; i++){
            
        //     //gets cells of current row
        //     var oCells = table.rows.item(i).cells;
        //     var cellVal = oCells.item(0).innerHTML;
        //     if(cellVal == 1){                                  
        //         //loops through each cell in current row                                        
        //         var cellVal2 = oCells.item(3).innerHTML; 
        //         var soluong = oCells.item(2).innerHTML;
        //         var totalsoluong = soluong + 1;
        //         var total = cellVal + 29.000;
        //         cellVal2.innerHTML = total;     
        //         soluong.innerHTML = totalsoluong;               
        //         flag = 1;
        //     }
        // }
        if(flag == 0){
            var input = document.createElement("input");
            input.setAttribute('type', 'text');
            input.setAttribute('id', '1');
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = 1;
            cell2.innerHTML = "Cà phê đen";
            cell3.innerHTML = 1;
            cell4.innerHTML = 29;  
            <?php $array[$count] = array(1,1); $count = $count + 1;?>
        }
    }
    function click2(){
        var table = document.getElementById("bill");
        var rowLength = table.rows.length;
        var flag = 0;
        // //loops through rows    
        // for (i = 0; i < rowLength; i++){
            
        //     //gets cells of current row
        //     var oCells = table.rows.item(i).cells;
        //     var cellVal = oCells.item(0).innerHTML;
        //     if(cellVal == 1){                                  
        //         //loops through each cell in current row                                        
        //         var cellVal2 = oCells.item(3).innerHTML; 
        //         var soluong = oCells.item(2).innerHTML;
        //         var totalsoluong = soluong + 1;
        //         var total = cellVal + 29.000;
        //         cellVal2.innerHTML = total;     
        //         soluong.innerHTML = totalsoluong;               
        //         flag = 1;
        //     }
        // }
        if(flag == 0){
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = 2;
            cell2.innerHTML = "Cà phê sữa";
            cell3.innerHTML = 1;
            cell4.innerHTML = 29.000;  
        }
    }
    function click3(){
        var table = document.getElementById("bill");
        var rowLength = table.rows.length;
        var flag = 0;
        // //loops through rows    
        // for (i = 0; i < rowLength; i++){
            
        //     //gets cells of current row
        //     var oCells = table.rows.item(i).cells;
        //     var cellVal = oCells.item(0).innerHTML;
        //     if(cellVal == 1){                                  
        //         //loops through each cell in current row                                        
        //         var cellVal2 = oCells.item(3).innerHTML; 
        //         var soluong = oCells.item(2).innerHTML;
        //         var totalsoluong = soluong + 1;
        //         var total = cellVal + 29.000;
        //         cellVal2.innerHTML = total;     
        //         soluong.innerHTML = totalsoluong;               
        //         flag = 1;
        //     }
        // }
        if(flag == 0){
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = 3;
            cell2.innerHTML = "Bạc xỉu";
            cell3.innerHTML = 1;
            cell4.innerHTML = 29.000;  
        }
    }
    function click4(){
        var table = document.getElementById("bill");
        var rowLength = table.rows.length;
        var flag = 0;
        // //loops through rows    
        // for (i = 0; i < rowLength; i++){
            
        //     //gets cells of current row
        //     var oCells = table.rows.item(i).cells;
        //     var cellVal = oCells.item(0).innerHTML;
        //     if(cellVal == 1){                                  
        //         //loops through each cell in current row                                        
        //         var cellVal2 = oCells.item(3).innerHTML; 
        //         var soluong = oCells.item(2).innerHTML;
        //         var totalsoluong = soluong + 1;
        //         var total = cellVal + 29.000;
        //         cellVal2.innerHTML = total;     
        //         soluong.innerHTML = totalsoluong;               
        //         flag = 1;
        //     }
        // }
        if(flag == 0){
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = 4;
            cell2.innerHTML = "Trà sen vàng";
            cell3.innerHTML = 1;
            cell4.innerHTML = 39.000;  
        }
    }
    function click5(){
        var table = document.getElementById("bill");
        var rowLength = table.rows.length;
        var flag = 0;
        // //loops through rows    
        // for (i = 0; i < rowLength; i++){
            
        //     //gets cells of current row
        //     var oCells = table.rows.item(i).cells;
        //     var cellVal = oCells.item(0).innerHTML;
        //     if(cellVal == 1){                                  
        //         //loops through each cell in current row                                        
        //         var cellVal2 = oCells.item(3).innerHTML; 
        //         var soluong = oCells.item(2).innerHTML;
        //         var totalsoluong = soluong + 1;
        //         var total = cellVal + 29.000;
        //         cellVal2.innerHTML = total;     
        //         soluong.innerHTML = totalsoluong;               
        //         flag = 1;
        //     }
        // }
        if(flag == 0){
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = 5;
            cell2.innerHTML = "Trà đào sả";
            cell3.innerHTML = 1;
            cell4.innerHTML = 39.000;  
        }
    }
    function click6(){
        var table = document.getElementById("bill");
        var rowLength = table.rows.length;
        var flag = 0;
        // //loops through rows    
        // for (i = 0; i < rowLength; i++){
            
        //     //gets cells of current row
        //     var oCells = table.rows.item(i).cells;
        //     var cellVal = oCells.item(0).innerHTML;
        //     if(cellVal == 1){                                  
        //         //loops through each cell in current row                                        
        //         var cellVal2 = oCells.item(3).innerHTML; 
        //         var soluong = oCells.item(2).innerHTML;
        //         var totalsoluong = soluong + 1;
        //         var total = cellVal + 29.000;
        //         cellVal2.innerHTML = total;     
        //         soluong.innerHTML = totalsoluong;               
        //         flag = 1;
        //     }
        // }
        if(flag == 0){
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = 6;
            cell2.innerHTML = "Trà đào sữa";
            cell3.innerHTML = 1;
            cell4.innerHTML = 39.000;  
        }
    }
    function click7(){
        var table = document.getElementById("bill");
        var rowLength = table.rows.length;
        var flag = 0;
        // //loops through rows    
        // for (i = 0; i < rowLength; i++){
            
        //     //gets cells of current row
        //     var oCells = table.rows.item(i).cells;
        //     var cellVal = oCells.item(0).innerHTML;
        //     if(cellVal == 1){                                  
        //         //loops through each cell in current row                                        
        //         var cellVal2 = oCells.item(3).innerHTML; 
        //         var soluong = oCells.item(2).innerHTML;
        //         var totalsoluong = soluong + 1;
        //         var total = cellVal + 29.000;
        //         cellVal2.innerHTML = total;     
        //         soluong.innerHTML = totalsoluong;               
        //         flag = 1;
        //     }
        // }
        if(flag == 0){
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = 7;
            cell2.innerHTML = "Bánh tiramisu";
            cell3.innerHTML = 1;
            cell4.innerHTML = 19.000;  
        }
    }
    function click8(){
        var table = document.getElementById("bill");
        var rowLength = table.rows.length;
        var flag = 0;
        // //loops through rows    
        // for (i = 0; i < rowLength; i++){
            
        //     //gets cells of current row
        //     var oCells = table.rows.item(i).cells;
        //     var cellVal = oCells.item(0).innerHTML;
        //     if(cellVal == 1){                                  
        //         //loops through each cell in current row                                        
        //         var cellVal2 = oCells.item(3).innerHTML; 
        //         var soluong = oCells.item(2).innerHTML;
        //         var totalsoluong = soluong + 1;
        //         var total = cellVal + 29.000;
        //         cellVal2.innerHTML = total;     
        //         soluong.innerHTML = totalsoluong;               
        //         flag = 1;
        //     }
        // }
        if(flag == 0){
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = 8;
            cell2.innerHTML = "Bánh mouse Đào";
            cell3.innerHTML = 1;
            cell4.innerHTML = 19.000;  
        }
    }
    function click9(){
        var table = document.getElementById("bill");
        var rowLength = table.rows.length;
        var flag = 0;
        // //loops through rows    
        // for (i = 0; i < rowLength; i++){
            
        //     //gets cells of current row
        //     var oCells = table.rows.item(i).cells;
        //     var cellVal = oCells.item(0).innerHTML;
        //     if(cellVal == 1){                                  
        //         //loops through each cell in current row                                        
        //         var cellVal2 = oCells.item(3).innerHTML; 
        //         var soluong = oCells.item(2).innerHTML;
        //         var totalsoluong = soluong + 1;
        //         var total = cellVal + 29.000;
        //         cellVal2.innerHTML = total;     
        //         soluong.innerHTML = totalsoluong;               
        //         flag = 1;
        //     }
        // }
        if(flag == 0){
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = 9;
            cell2.innerHTML = "Bánh mouse Chanh Dây";
            cell3.innerHTML = 1;
            cell4.innerHTML = 19.000;  
        }
    }
    function click10(){
        var table = document.getElementById("bill");
        var rowLength = table.rows.length;
        var flag = 0;
        // //loops through rows    
        // for (i = 0; i < rowLength; i++){
            
        //     //gets cells of current row
        //     var oCells = table.rows.item(i).cells;
        //     var cellVal = oCells.item(0).innerHTML;
        //     if(cellVal == 1){                                  
        //         //loops through each cell in current row                                        
        //         var cellVal2 = oCells.item(3).innerHTML; 
        //         var soluong = oCells.item(2).innerHTML;
        //         var totalsoluong = soluong + 1;
        //         var total = cellVal + 29.000;
        //         cellVal2.innerHTML = total;     
        //         soluong.innerHTML = totalsoluong;               
        //         flag = 1;
        //     }
        // }
        if(flag == 0){
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = 10;
            cell2.innerHTML = "Trà xanh đá xay";
            cell3.innerHTML = 1;
            cell4.innerHTML = 49.000;  
        }
    }
    function click11(){
        var table = document.getElementById("bill");
        var rowLength = table.rows.length;
        var flag = 0;
        // //loops through rows    
        // for (i = 0; i < rowLength; i++){
            
        //     //gets cells of current row
        //     var oCells = table.rows.item(i).cells;
        //     var cellVal = oCells.item(0).innerHTML;
        //     if(cellVal == 1){                                  
        //         //loops through each cell in current row                                        
        //         var cellVal2 = oCells.item(3).innerHTML; 
        //         var soluong = oCells.item(2).innerHTML;
        //         var totalsoluong = soluong + 1;
        //         var total = cellVal + 29.000;
        //         cellVal2.innerHTML = total;     
        //         soluong.innerHTML = totalsoluong;               
        //         flag = 1;
        //     }
        // }
        if(flag == 0){
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = 11;
            cell2.innerHTML = "Socola đá xay";
            cell3.innerHTML = 1;
            cell4.innerHTML = 49.000;  
        }
    }
    function click12(){
        var table = document.getElementById("bill");
        var rowLength = table.rows.length;
        var flag = 0;
        // //loops through rows    
        // for (i = 0; i < rowLength; i++){
            
        //     //gets cells of current row
        //     var oCells = table.rows.item(i).cells;
        //     var cellVal = oCells.item(0).innerHTML;
        //     if(cellVal == 1){                                  
        //         //loops through each cell in current row                                        
        //         var cellVal2 = oCells.item(3).innerHTML; 
        //         var soluong = oCells.item(2).innerHTML;
        //         var totalsoluong = soluong + 1;
        //         var total = cellVal + 29.000;
        //         cellVal2.innerHTML = total;     
        //         soluong.innerHTML = totalsoluong;               
        //         flag = 1;
        //     }
        // }
        if(flag == 0){
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = 1;
            cell2.innerHTML = "Cookie&Cream";
            cell3.innerHTML = 1;
            cell4.innerHTML = 49.000;  
        }
    }
</script>

@endsection