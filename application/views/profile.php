<style>
table td { color:#000;}
</style>
<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="index.html">Home</a></li>
						<li class="active">Profile</li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->


			<!-- main-container start -->
			<!-- ================ -->
			<div class="main-container dark-translucent-bg">
				<div class="container">
					<h1>Profile</h1>



				    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
				    <script type="text/javascript">
				      google.charts.load('current', {'packages':['bar']});
				      google.charts.setOnLoadCallback(drawChart);

				      function drawChart() {
				        var data = google.visualization.arrayToDataTable(<?=json_encode($finalFormat)?>);

				        var options = {
				          chart: {
				            title: 'Monthly Visitor',
				            subtitle: 'by month',
				          },
				          bars: 'horizontal' // Required for Material Bar Charts.
				        };

				        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

				        chart.draw(data, google.charts.Bar.convertOptions(options));
				      }
				    </script>

				    <div id="barchart_material" style="width: 900px; height: 500px;"></div>



					<table class="table table-bordered table-striped">
						<thead>
							<tr><th>ID</th><th>Name</th><th>Email</th><th></th></tr>
						</thead>
						<tbody>
							<?php
							if(!empty($contactList)) {
								foreach($contactList as $v) {
						?>
								<tr>
									<td><?=$v['id']?></td>
									<td><?=$v['name']?></td>
									<td><?=$v['email']?></td>
									<td><a href="<?=base_url('contact/edit/'.$v['id'])?>" class="btn btn-info">Edit</a>

										<a href="<?=base_url('contact/delete/'.$v['id'])?>" class="btn btn-info">Delete</a>

									</td>
								</tr>
						<?php			
								}
							}
							?>
						</tbody>
					</table>


					<?=$pagination?>

					<!--<nav aria-label="Page navigation">
					  <ul class="pagination">
					  	<?php
					  	if($page != 1) {
					  	?>
					    <li>
					      <a href="<?=base_url('profile/'.($page-1))?>" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <?php
						}
						?>
					    <?php
						for($i=1; $i <= $total_page; $i++) {

							if($i == $page) {
						?>
						<li class="active"><a href="#"><?=$i?></a></li>
						<?php

							} else {
						?>
						<li><a href="<?=base_url('profile/'.$i)?>"><?=$i?></a></li>
						<?php
							}
						}
						?>
						<?php
					  	if($page != $total_page) {
					  	?>
					    <li>
					      <a href="<?=base_url('profile/'.($page+1))?>" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					    <?php
						}
						?>
					  </ul>
					</nav>-->

					

				</div>
			</div>