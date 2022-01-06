@extends('admin_layout')
@section('admin_content')
<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Thống kê sản phẩm bán được
		</header>
		<div class="floatcharts_w3layouts_left">
				<div class="floatcharts_w3layouts_top">
					<div class="floatcharts_w3layouts_bottom">
						<div id="graph6"></div>
						<script>
						// Use Morris.Bar
						Morris.Bar({
						  element: 'graph6',
						  data: [
						  <?php 
						  		foreach ($arrayMate as $value){
						  			echo "{x:'";
						  			echo $value[0];
						  			echo "', y:";
						  			echo $value[1];
						  			echo "},";
						  			// echo "{x: 'A', y: 1},";
						  		}	
						  ?>
						  ],
						  xkey: 'x',
						  ykeys: ['y'],
						  labels: ['Số lượng'],
						  barColors: function (row, series, type) {
							if (type === 'bar') {
							  var red = Math.ceil(255 * row.y / this.ymax);
							  return 'rgb(' + red + ',0,0)';
							}
							else {
							  return '#000';
							}
						  }
						});
						</script>

					</div>
				</div>
			</div>
	</section>
	<section class="panel">
		<header class="panel-heading">
			Thống kê số phòng theo trình độ
		</header>
		<div class="floatcharts_w3layouts_left">
				<div class="floatcharts_w3layouts_top">
					<div class="floatcharts_w3layouts_bottom">
						<div id="graph7"></div>
						<script>
						// Use Morris.Bar
						Morris.Bar({
						  element: 'graph7',
						  data: [
						  <?php 
						  		foreach ($arrayMate1 as $value){
						  			echo "{x:'Trình độ ";
						  			echo $value[0];
						  			echo "', y:";
						  			echo $value[1];
						  			echo "},";
						  			// echo "{x: 'A', y: 1},";
						  		}	
						  ?>
						  ],
						  xkey: 'x',
						  ykeys: ['y'],
						  labels: ['Số phòng'],
						  barColors: function (row, series, type) {
							if (type === 'bar') {
							  var red = Math.ceil(255 * row.y / this.ymax);
							  return 'rgb(' + red + ',0,0)';
							}
							else {
							  return '#000';
							}
						  }
						});
						</script>

					</div>
				</div>
			</div>
	</section>
	<section class="panel">
		<header class="panel-heading">
			Thống kê thí sinh theo trình độ 
		</header>
		<div class="floatcharts_w3layouts_left">
				<div class="floatcharts_w3layouts_top">
					<div class="floatcharts_w3layouts_bottom">
						<div id="graph8"></div>
						<script>
						// Use Morris.Bar
						Morris.Bar({
						  element: 'graph8',
						  data: [
						  <?php
						  		foreach ($arrayMate2 as $value){
						  			echo "{x:'";
						  			echo $value[0];
						  			echo "', y:";
						  			echo $value[1];
						  			echo "},";
						  			// echo "{x: 'A', y: 1},";
						  		}	
						  ?>
						  ],
						  xkey: 'x',
						  ykeys: ['y'],
						  labels: ['Số lượng'],
						  barColors: function (row, series, type) {
							if (type === 'bar') {
							  var red = Math.ceil(255 * row.y / this.ymax);
							  return 'rgb(' + red + ',0,0)';
							}
							else {
							  return '#000';
							}
						  }
						});
						</script>

					</div>
				</div>
			</div>
	</section>
</div>
@endsection