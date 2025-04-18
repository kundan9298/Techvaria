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
													<h4 class="card-title">{{$completeInterview}}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


						
							<h5>Pipeline View</h5>


							
                        
                            <div class="col-md-12">
                                <div class="row">
                               
								<div class="card-body">
										<table class="table table-head-bg-success table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">Domain Name</th>
													<th scope="col">Screening</th>
													<th scope="col">Submissions</th>
													<th scope="col">Interview</th>
													<th scope="col">Offered</th>
													<th scope="col">Hired</th>
												</tr>
											</thead>
											<tbody>

											@foreach ($jobStats as $job)
            <tr>
                <td>
					@foreach($departmentName as $list)
					@if($job->job_name == $list->id)
					{{$list->name}}
					@endif
					@endforeach
				</td>
                <td>{{ $job->screening_count }}</td>
                <td>{{ $job->submission_count }}</td>

				<td>
					@foreach($AttendCount as $list)
					@if($job->job_name == $list->job_name)
					{{$list->total}}
					@endif
					@endforeach
				</td>

                <!-- <td>{{ $AttendCount }}</td> -->
                <td>{{ $job->offered_count }}</td>
                <td>{{ $job->hire_count }}</td>
            </tr>
        @endforeach
											</tbody>
										</table>

                                </div>

                            </div>


				</div>
				</div>
				</div>
@endsection