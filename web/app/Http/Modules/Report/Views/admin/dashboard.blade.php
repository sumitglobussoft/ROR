@extends('Admin/Layouts/adminlayout')

@section('title', 'Dashboard')

@section('content')
    <!--modular admin dashboard-->
<!-- Start Main Container -->
		<div class="main-container">
			<div class="page-header no-breadcrumb font-header">Dashboard</div>

			<div class="content-wrap">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-sm-3">
								<div class="panel">
									<div class="panel-body p-20">
										<div class="text-dark h4 no-m font-header">3,189</div>
										<div class="font-12">Total New Member</div>
										<div class="sparkbar m-t-5"></div>
									</div>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-sm-3">
								<div class="panel">
									<div class="panel-body p-20">
										<div class="text-dark h4 no-m font-header">1,172</div>
										<div class="font-12">Total Sales</div>
										<div class="sparkline m-t-5"></div>
									</div>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-sm-3">
								<div class="panel">
									<div class="panel-body p-20">
										<div class="text-dark h4 no-m font-header">3,189</div>
										<div class="font-12">Total New Member</div>
										<div class="sparkbar m-t-5"></div>
									</div>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-sm-3">
								<div class="panel">
									<div class="panel-body p-20">
										<div class="text-dark h4 no-m font-header">1,172</div>
										<div class="font-12">Total Sales</div>
										<div class="sparkline m-t-5"></div>
									</div>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
						<div class="row">
							<div class="col-sm-6">
								<div class="panel">
									<div class="panel-body p-20 text-center">
										<div class="text-dark h3 no-m font-header">712</div>
										<div class="font-12 m-t-5">New Items</div>
									</div>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
								<div class="panel bg-main">
									<div class="panel-body p-20 text-center">
										<div class="h3 no-m font-header">1,199</div>
										<div class="font-12 m-t-5">Comments</div>
									</div>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<div class="row">
					<div class="col-lg-12">
						<div class="panel">
							<div class="panel-heading font-header">
								Recent Activities
								<ul class="panel-toolbar list-unstyled">
									<li class="dropdown collapse-option">
										<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
										<ul class="dropdown-menu dropdown-animated fade-effect">
											<li><a href="#" class="text-muted refresh-widget"><i class="icon-spinner9"></i></a></li>
											<li><a href="#collapsedPanel3" class="expand-widget" data-toggle="collapse" aria-expanded="true"><i class="icon-circle-up"></i></a></li>
											<li><a href="#" class="fullscreen-widget"><i class="icon-enlarge"></i></a></li>
											<li><a><i class="icon-cross"></i></a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div id="collapsedPanel3" class="collapse in">
								<div class="panel-body no-p-t">
									<ul class="activity-widget list-unstyled no-m">
										<li>
											<a href="#">
												<div class="activity-type"><i class="icon-coin-dollar"></i></div>
												<div class="activity-detail">
													<div class="text-dark font-12">Benjamin Dean</div>
													<div class="font-11">just purchased your item</div>
												</div>
												<div class="activity-time font-11 text-muted">12 hrs ago</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="activity-type bg-purple"><i class="icon-files-empty"></i></div>
												<div class="activity-detail">
													<div class="text-dark font-12">Sofia Lynch</div>
													<div class="font-11">shared files on to do list</div>
												</div>
												<div class="activity-time font-11 text-muted">yesterday</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="activity-type bg-orange"><i class="icon-cloud-upload"></i></div>
												<div class="activity-detail">
													<div class="text-dark font-12">Victoria Hale</div>
													<div class="font-11">uploaded project.zip to a server</div>
												</div>
												<div class="activity-time font-11 text-muted">2 days ago</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="activity-type bg-success"><i class="icon-user-plus"></i></div>
												<div class="activity-detail">
													<div class="text-dark font-12">John Knowles</div>
													<div class="font-11">invited Sofia Lynch to join a secret group</div>
												</div>
												<div class="activity-time font-11 text-muted">3 days ago</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="activity-type"><i class="icon-coin-dollar"></i></div>
												<div class="activity-detail">
													<div class="text-dark font-12">Lucas Nicholls</div>
													<div class="font-11">just purchased your item</div>
												</div>
												<div class="activity-time font-11 text-muted">1 week ago</div>
											</a>
										</li>
									</ul>
									<hr class="m-t-10 m-b-5">
									<div class="text-right"><a href="#" class="font-10">View All</a></div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.content-wrap -->
		</div>
		<!-- End Main Container -->

		<!-- Start Footer -->
		<footer class="footer">
			&copy; 2016. <b>RoR Admin</b>.
		</footer>
		<!-- End Footer -->

		<!-- Start Modal -->
		<div class="modal modal-scale fade" id="showEventModal">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title font-header text-dark">All Event</h4>
					</div>
					<div class="modal-body">

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-main">Add</button>
						<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		<!-- End Modal -->  
<!--<!DOCTYPE html>

<head>
<title></title>
</head>

<body>

<form action="" method="post" enctype="multipart/form-data">
<label for="file"><span>Filename:</span></label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>-->
@endsection


