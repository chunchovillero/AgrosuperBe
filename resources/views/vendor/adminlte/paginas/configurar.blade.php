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
						<h3 class="box-title">Configurar página {{ $pagina->nombre }}"</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>

					{{$pagina->tipo->nombre}}

					@if($pagina->tipo->nombre=="Iframe")

					<form role="form" action="{{route('paginas.configurarstore',$pagina->id)}}" method="post">
						{{ csrf_field() }}
		              <div class="box-body">
		                <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
		                  <label for="url">Ingrese Url del iframe</label> 
		                  @if($errors->has('url'))
							<span class="help-block">{{ $errors->first('url') }}</span>
		                  @endif
		                  <input type="text" class="form-control" name="url" id="url" value="@isset($configuracion->url){{ $configuracion->url}}@endisset" placeholder="Ingrese Url de iframe">
		                </div>
				      </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		                <button type="submit" class="btn btn-primary">Configurar Página</button>
		              </div>
		            </form>
		            @endif


		            @if($pagina->tipo->nombre=="Videos")
					<form role="form" action="{{route('paginas.configurarstore',$pagina->id)}}" method="post">
						{{ csrf_field() }}
		              <div class="box-body">
		                <div class="form-group {{ $errors->has('galeria') ? 'has-error' : '' }}">
		                  <label for="url">Selecione una galeria</label> 
		                  @if($errors->has('url'))
							<span class="help-block">{{ $errors->first('galeria') }}</span>
		                  @endif
		                  <select class="form-control" name="galeria" id="galeria">
							  @foreach ($galerias as $galeria)
							  	<option value="{{ $galeria->id }}" 
							  		@isset($configuracion->galeria ) 
							  			@if($configuracion->galeria==$galeria->id)
							  				selected
							  			@endif	
							  		@endisset>{{ $galeria->nombre}}</option>
							  @endforeach
							  
						</select>
		                </div>
				      </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		                <button type="submit" class="btn btn-primary">Configurar Página</button>
		              </div>
		            </form>
		            @endif


					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
