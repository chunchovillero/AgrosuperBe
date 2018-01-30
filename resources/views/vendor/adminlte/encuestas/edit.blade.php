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
						<h3 class="box-title">Editar Encuesta</h3>
					</div>
					
					<form role="form" action="{{ route('encuestas.update', $encuesta->id) }}" method="post">
						{{ csrf_field() }}
						{{ method_field('PUT')}}
		              <div class="box-body">
		                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
		                  <label for="nombre">Nombre</label> 
		                  @if($errors->has('nombre'))
							<span class="help-block">{{ $errors->first('nombre') }}</span>
		                  @endif

		                  <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $encuesta->nombre}}" placeholder="Ingrese nombre">
		                </div>


		                
		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		                <button type="submit" class="btn btn-primary">Editar Encuesta</button>
		              </div>
		            </form>

					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
