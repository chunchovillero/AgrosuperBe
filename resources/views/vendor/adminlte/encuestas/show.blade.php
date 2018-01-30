@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-12">

			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">
						Encuesta
					</h3>



				</div>
				<div class="box-body">
					@if (Session::has('message'))
					<div class="alert alert-success">{{ Session::get('message') }}</div>
					@endif


					@if (Session::has('info'))
					<div class="alert alert-danger">{{ Session::get('info') }}</div>
					@endif

				</div>

				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Preguntas de la encuesta {{$datos->nombre}}</h3>

								<div class="box-tools">
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive no-padding">
								<table class="table table-hover">
									<tbody><tr>
										<th>Nombre</th>
										<th>Tipo</th>
										<th>Eliminar</th>
									</tr>
									@foreach($datos->video as $v)
									<tr>
										<td>{{ $v->nombre }}</td>
										<td>{{ $v->tipo }}</td>
										<td>
											<form action="{{route('preguntas.eliminar', ['pregunta'=>$v->id,'pregunta'=>$datos->id])}}" method="post">
												{{ csrf_field() }}
												<input type="hidden" name="_method" value="DELETE">
												<button class="btn btn-danger">Eliminar</button>
											</form>
										</td>
									</tr>
									@endforeach

								</tbody></table>
							</div>
							<h3 class="box-title">
								Agregar Video
							</h3>

							<form role="form" enctype="multipart/form-data"  action="{{route('videos.addvideo', $datos->id)}}" method="post">
								{{ csrf_field() }}
								<div class="box-body">
									<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
										<label for="nombre">Nombre</label> 
										@if($errors->has('nombre'))
										<span class="help-block">{{ $errors->first('nombre') }}</span>
										@endif
										<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre">
									</div>

									<div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
										<label for="nombre">Tipo</label> 
										@if($errors->has('tipo'))
										<span class="help-block">{{ $errors->first('video') }}</span>
										@endif
										<select class="form-control" name="tipo" id="tipo">

											<option value="area">Area</option>
											<option value="si-no">Si - No</option>
											<option value="area">Area</option>
											<option value="area">Area</option>
											
										</select>				                </div>

									</div>
									<!-- /.box-body -->

									<div class="box-footer">
										<button type="submit" class="btn btn-primary">Crear Tipo</button>
									</div>
								</form>
							</div>
							<!-- /.box -->
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
	@endsection
