@extends('template')

@section('content')
<div class="container-fluid">
						<h4 class="page-title">Dashboard</h4>
						<div class="row">

                        <div class="col-md-3">
								<div class="card card-stats card-warning">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-users"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Total HR</p>
													<h4 class="card-title">{{$totalHR}}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


                            <div class="col-md-3">
								<div class="card card-stats card-warning">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-users"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Total Candidate</p>
													<h4 class="card-title">{{$totalCandidate}}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


                            <div class="col-md-3">
								<div class="card card-stats card-warning">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-users"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Scheduled</p>
													<h4 class="card-title">{{$totalInterview}}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


                            <div class="col-md-3">
								<div class="card card-stats card-warning">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-users"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Attend Interview</p>
													<h4 class="card-title">{{$AttendCount}}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


						

							



				</div>
				</div>
				</div>
@endsection