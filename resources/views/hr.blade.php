@extends('template')

@section('content')
<div class="container-fluid">
						<h4 class="page-title">HR</h4>
						<div class="row">


                       <a href="{{url('hr/add')}}"> <button type="button" class="btn btn-primary">Add HR</button></a>
           
					  

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

					  


						

                        
                        
                            <div class="col-md-12">
                                <div class="row">
                               
								<div class="card-body">
										<table class="table table-head-bg-success table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">#</th>
													<th scope="col">Full Name</th>
													<th scope="col">Phone No</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
											@foreach($data as $list)
												<tr>
								

													<td>{{$list->id}}</td>
													<td>{{$list->name}}</td>
													<td>{{$list->email}}</td>
													<td><a href="{{url('hr/edit/'.$list->id)}}"><i style="font-size:25px;" class="la la-edit"></i> </a> 
                                                    || <a href="{{url('hr/delete/'.$list->id)}}"> <i style="font-size:25px;" class="la la-bitbucket"></i>  </a></td>
												
													
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