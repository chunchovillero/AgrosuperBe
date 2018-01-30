@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Editar Tipo</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					
					<form role="form" enctype="multipart/form-data" action="{{ route('paginas.update', $pagina->id) }}" method="post">
						{{ csrf_field() }}
						{{ method_field('PUT')}}
		              <div class="box-body">
		                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
		                  <label for="exampleInputEmail1">Nombre</label> 
		                  @if($errors->has('nombre'))
							<span class="help-block">{{ $errors->first('nombre') }}</span>
		                  @endif

		                  <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $pagina->nombre}}" placeholder="Ingrese nombre">
		                </div>


		                <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
		                  <label for="tipo">Tipo</label> 
		                  @if($errors->has('nombre'))
							<span class="help-block">{{ $errors->first('tipo') }}</span>
		                  @endif
		                  
		                  <select class="form-control" name="tipo" id="tipo">
							  @foreach ($tipos as $tipo)
							  	<option value="{{ $tipo->id }}" {{($pagina->tipo_id ===$tipo->id) ? 'selected' : ''}} >{{ $tipo->nombre}}</option>
							  @endforeach
							  
						</select>

						<div class="form-group {{ $errors->has('imagen') ? 'has-error' : '' }}">
		                  <label for="nombre">Imagen</label> 
		                  @if($errors->has('nombre'))
							<span class="help-block">{{ $errors->first('imagen') }}</span>
		                  @endif
		                  <input type="file" class="form-control" name="imagen" id="imagen" >
		                </div>

		                 <div class="form-group {{ $errors->has('posicion') ? 'has-error' : '' }}">
		                  <label for="posicion">Posición</label> 
		                  @if($errors->has('posicion'))
							<span class="help-block">{{ $errors->first('posicion') }}</span>
		                  @endif
		                  <input type="text" class="form-control" name="posicion" id="posicion" value="{{ $pagina->posicion}}" placeholder="Ingrese posición">
		                </div>

		                </div>
		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		                <button type="submit" class="btn btn-primary">Editar Pagina</button>
		              </div>
		            </form>

					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
