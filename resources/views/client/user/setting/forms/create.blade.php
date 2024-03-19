

                            						<!-- ROW-1 OPEN -->
						<div class="row">
							<div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-body">
										<div class="text-center">
											<div class="userprofile">
												<div class="userpic  brround"> 
													@if($user->image == null)
														<img src="{{asset('storage/avatar-default.svg')}}"  alt="" class="userpicimg">
													@else
														<img src="{{asset($user->image)}}"  alt="" class="userpicimg"> 
													@endif
												</div>
												<h3 class="username text-dark mb-2">{{$user->name}} {{$user->lastname}}</h3>
												<p class="mb-1 text-muted">Administrator, USA</p>
												<div class="text-center mb-4">
													<span><i class="fa fa-star text-warning"></i></span>
													<span><i class="fa fa-star text-warning"></i></span>
													<span><i class="fa fa-star text-warning"></i></span>
													<span><i class="fa fa-star-half-o text-warning"></i></span>
													<span><i class="fa fa-star-o text-warning"></i></span>
												</div>
												<div class="socials text-center mt-3">
													<a href="" class="btn btn-circle btn-primary ">
													<i class="fab fa-facebook-square"></i></a> <a href="" class="btn btn-circle btn-danger ">
													<i class="fab fa-google"></i></a> <a href="" class="btn btn-circle btn-info ">
													<i class="fab fa-twitter"></i></a> <a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>

								
								
								<div class="card">
									<div class="card-header">
										<div class="card-title">Edit Password</div>
									</div>
									<div class="card-body">
										<div class="d-flex mb-3">
											@if($user->image == null)
											<img alt="User Avatar" class="rounded-circle avatar-lg mr-2" src="{{asset('storage/avatar-default.svg')}}">
											@else
											<img alt="User Avatar" class="rounded-circle avatar-lg mr-2" src="{{asset($user->image)}}">
											@endif
											
											<div class="ml-auto mt-xl-2 mt-lg-0 ml-lg-2">
												{{-- CAMBIO DE AVATAR --}}
												<span data-placement="top" data-toggle="tooltip" title="Editar Perfil" class='pr-2'>
													<button type="button" class="btn btn-primary " data-toggle="modal"
														data-target="#edit-perfil"><i class="fe fe-camera"> </i>Editar</button>
												</span>

												@if($user->image != null)
												<span data-placement="top" data-toggle="tooltip" title="Eliminar Perfil" class='pr-2'>
													<button type="button" class="btn btn-danger " data-toggle="modal"
														data-target="#delete-perfil"><i class="fe fe-camera-off"> </i>Eliminar</button>
												</span>
												@endif
												{{-- CAMBIO DE AVATAR --}}

											</div>
										</div>

										{{-- CAMBIO DE PASSWORD --}}
										{!!Form::model($user,['route'=>['user.setting.change.password',$user->uuid],'method'=>'PUT' , 'files'=>True])!!}
										<div class="form-group">
											<label class="form-label">Contraseña Actual</label>
											<input type="password" class="form-control" value="password" name="password_actual">
										</div>
										<div class="form-group">
											<label class="form-label">Nueva Contraseña</label>
											<input type="password" class="form-control" value="password" name="password">
										</div>
										<div class="form-group">
											<label class="form-label">Confirmar Contraseña</label>
											<input type="password" class="form-control" value="password" name="password_confirmation">
										</div>
									</div>
										<div class="card-footer text-right">
											<button type="submit" class="btn btn-primary">Actualizar</button>
											{{-- <a href="#" class="btn btn-danger">Cancle</a> --}}
										</div>
									{!!Form::close()!!}
									{{-- CAMBIO DE PASSWORD --}}

								</div>
								



								{{-- <div class="card panel-theme">
									<div class="card-header">
										<div class="float-left">
											<h3 class="card-title">Contact</h3>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="card-body no-padding">
										<ul class="list-group no-margin">
											<li class="list-group-item"><i class="fa fa-envelope mr-4"></i> support@demo.com</li>
											<li class="list-group-item"><i class="fa fa-globe mr-4"></i> www.abcd.com</li>
											<li class="list-group-item"><i class="fa fa-phone mr-4"></i> +125 5826 3658 </li>
										</ul>
									</div>
								</div> --}}
							</div>
							
							
							
							<div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Edit Profile</h3>
									</div>
									<div class="card-body">
										{{-- INFORMACION DEL USUARIO --}}
										{!!Form::model($user,['route'=>['user.setting.change.info',$user->uuid],'method'=>'PUT' , 'files'=>True])!!}
											
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="exampleInputname">Nombre</label>
													<input type="text" class="form-control" id="exampleInputname" placeholder="Nombre" name="name" value="{{$user->name}}">
												</div>
											</div>
											<div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="exampleInputname1">Apellido</label>
													<input type="text" class="form-control" id="exampleInputname1" placeholder="Apellido" name="lastname" value="{{$user->lastname}}">
												</div>
											</div>

											<div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="exampleInputname1">DNI</label>
													<input type="text" class="form-control" id="exampleInputname1" placeholder="dni" name="dni" value="{{$user->dni}}">
												</div>
											</div>

											<div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="exampleInputname1">Direccion</label>
													<input type="text" class="form-control" id="exampleInputname1" placeholder="direccion" name="address" value="{{$user->address}}">
												</div>
											</div>

											<div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="exampleInputname1">Telefono</label>
													<input type="text" class="form-control" id="exampleInputname1" placeholder="Telefono" name="phone" value="{{$user->phone}}">
												</div>
											</div>

											
										</div>
										
									</div>
									<div class="card-footer">
										<button type="submit" class="btn btn-primary">Actualizar</button>
										
									</div>
									{!!Form::close()!!}
									
								</div>
							</div>
							
							{{-- INFORMACION DEL USUARIO --}}


						</div>
						<!-- ROW-1 CLOSED -->

						<!-- ROW-2 OPEN -->
						{{-- <div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header ">
										<h3 class="card-title ">Projects</h3>
										<div class="card-options">
											<button id="add__new__list" type="button" class="btn btn-md btn-primary " data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Add a new Project</button>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
											<thead>
												<tr>
													<th scope="col">ID</th>
													<th scope="col">Project Name</th>
													<th scope="col">Backend</th>
													<th scope="col">Deadline</th>
													<th scope="col">Team Members</th>
													<th scope="col">Edit Project Details </th>
													<th scope="col">list info</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>At vero eos et accusamus et iusto odio</td>
													<td>PHP</td>
													<td>15/11/2018</td>
													<td>15 Members</td>
													<td>
														<a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
														<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
													</td>
													<td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>
												</tr>
												<tr>
													<td>2</td>
													<td>voluptatum deleniti atque corrupti quos</td>
													<td>Angular js</td>
													<td>25/11/2018</td>
													<td>12 Members</td>
													<td>
														<a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
														<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
													</td>
													<td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>
												</tr>
												<tr>
													<td>3</td>
													<td>dignissimos ducimus qui blanditiis praesentium </td>
													<td>Java</td>
													<td>5/12/2018</td>
													<td>20 Members</td>
													<td>
														<a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
														<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
													</td>
													<td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>
												</tr>
												<tr>
													<td>4</td>
													<td>deleniti atque corrupti quos dolores  </td>
													<td>Phython</td>
													<td>14/12/2018</td>
													<td>10 Members</td>
													<td>
														<a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
														<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
													</td>
													<td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>
												</tr>
												<tr>
													<td>5</td>
													<td>et quas molestias excepturi sint occaecati</td>
													<td>Phython</td>
													<td>4/12/2018</td>
													<td>17 Members</td>
													<td>
														<a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
														<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
													</td>
													<td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div> --}}
						<!-- ROW-2 CLOSED -->

