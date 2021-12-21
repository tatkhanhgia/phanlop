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
							{x: '2011 Q1', y: 0},
							{x: '2011 Q2', y: 1},
							{x: '2011 Q3', y: 2},
							{x: '2011 Q4', y: 3},
							{x: '2012 Q1', y: 4},
							{x: '2012 Q2', y: 5},
							{x: '2012 Q3', y: 6},
							{x: '2012 Q4', y: 7},
							{x: '2013 Q1', y: 8}
						  ],
						  xkey: 'x',
						  ykeys: ['y'],
						  labels: ['Y'],
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