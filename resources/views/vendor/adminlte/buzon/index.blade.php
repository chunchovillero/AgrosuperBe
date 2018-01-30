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
							Resultados de Buzon
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
				              <h3 class="box-title">Resultado de Buzon</h3>

				              <div class="box-tools">
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body table-responsive no-padding">
				              <table class="table table-hover">
				                <tbody><tr>
				                  <th>Fecha</th>
				                  <th>Nombre</th>
				                  <th>Cargo</th>
				                  <th>Teléfono</th>
				                  <th>Sugerencia</th>
				       
				                 </tr>
				                 @foreach($buzones as $buzon)
				                <tr>
				                  <td>{{ $buzon->created_at }}</td>
				                  <td>{{ $buzon->nombre }}</td>
				                  <td>{{ $buzon->cargo }}</td>
				                  <td>{{ $buzon->telefono }}</td>
				                  <td>{{ $buzon->respuesta }}</td>
				                
				                </tr>
				                @endforeach
				                
				              </tbody></table>
				            </div>
{{ $buzones->links()}}
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
