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
							Resultados de Evaluaciones
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
				              <h3 class="box-title">Resultado de Evaluaciones</h3>

				              <div class="box-tools">
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body table-responsive no-padding">
				              <table class="table table-hover">
				                <tbody><tr>
				                  <th>Fecha</th>
				                  <th>Respuesta 1</th>
				                  <th>Respuesta 2</th>
				                  <th>Respuesta 3</th>
				                  <th>Respuesta 4</th>
				                  <th>Respuesta 5</th>
				                  <th>Respuesta 6</th>
				                  <th>Respuesta 7</th>
				                 </tr>
				                 @foreach($encuestas as $encuesta)
				                <tr>
				                  <td>{{ $encuesta->created_at }}</td>
				                  <td>{{ $encuesta->respuesta1 }}</td>
				                  <td>{{ $encuesta->respuesta2 }}</td>
				                  <td>{{ $encuesta->respuesta3 }}</td>
				                  <td>{{ $encuesta->respuesta4 }}</td>
				                  <td>{{ $encuesta->respuesta5 }}</td>
				                  <td>{{ $encuesta->respuesta6 }}</td>
				                  <td>{{ $encuesta->respuesta7 }}</td>
				                
				                </tr>
				                @endforeach
				                
				              </tbody></table>
				            </div>
							{{ $encuestas->links()}}
				            <!-- /.box-body -->
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
