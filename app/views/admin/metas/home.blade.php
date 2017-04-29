@extends('masterpage.master')
@section('contenido')

<div class="col-md-12" class="col-sm-12">
	
	<div class="page-header" style=" padding-bottom: 10px;">
		<h1><img src="/img/School-icon-72px.png"  class="img-circle">   Metas <small>Admin</small></h1>
	</div>
	<div class="panel panel-default">
	  	<div class="panel-heading">
		    <h3 class="panel-title">Metas</h3>
		 </div>
		 <div class="panel-body">
		 	<div class="col-md-2 col-sm-2">
		 		<div class="col-md-12 col-sm-12">
		 			<div class="btn-group-vertical" role="group" aria-label="...">
		 				<ul class="nav nav-pills">
		 					<li role="presentation">
		 						<a href="#"><img src="/img/ver.png"  class="img-circle"></a>
		 					</li>
		 					<li role="presentation">
		 						<a href="#"><img src="/img/metas/student-icon-48px.png"  class="img-circle"></a>
		 					</li>
		 					<li role="presentation">
		 						<a href="#">
		 							<img src="/img/metas/student-icon-48px.png"  class="img-circle" />
		 						</a>
		 					</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-10 col-sm-10">
				<form class="form-horizontal">
					<div class="col-md-12 col-sm-12">
						<div class="panel panel-body">
							<div class="col-md-6 col-sm-6">
								<div class="col-md-12 col-sm-12">
									<label class="control-label">Numero de Meta</label>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="col-md-12 col-sm-12">
									<input type="text" class="form-control" placeholder="Meta">
								</div>	
							</div>
						</div>
					</div>
				</form>
			</div>
		 </div>
	</div>
</div>
@stop