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
						<h3 class="box-title">Crear Galeria</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					
					<form role="form" action="{{route('galerias.store')}}" method="post">
						{{ csrf_field() }}
		              <div class="box-body">
		                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
		                  <label for="exampleInputEmail1">Nombre</label> 
		                  @if($errors->has('nombre'))
							<span class="help-block">{{ $errors->first('nombre') }}</span>
		                  @endif

		                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre">
		                </div>
		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		                <button type="submit" class="btn btn-primary">Crear Galeria</button>
		              </div>
		            </form>

					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
