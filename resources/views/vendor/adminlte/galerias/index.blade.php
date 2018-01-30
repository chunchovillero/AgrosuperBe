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
							Galerias
						</h3>
						<a href="{{ route('galerias.create')}}" class="btn btn-primary pull-right">Nuevo</a>

						
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
				              <h3 class="box-title">Listado de Galerias</h3>

				              <div class="box-tools">
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body table-responsive no-padding">
				              <table class="table table-hover">
				                <tbody><tr>
				                  <th>Nombre</th>
				                  <th>Añadir Video</th>
				                  <th>Editar</th>
				                  <th>Eliminar</th>
				                 </tr>
				                 @foreach($galerias as $galeria)
				                <tr>
				                  <td>{{ $galeria->nombre }}</td>
				                  <td><a href="{{route('galerias.show',$galeria->id) }}" class="btn btn-info">Añadir Video</a></td>
				                  <td><a href="{{route('galerias.edit',$galeria->id) }}" class="btn btn-primary">Editar</a></td>
				                  <td>
									<form action="{{route('galerias.destroy', $galeria->id)}}" method="post">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="DELETE">
										<button class="btn btn-danger">Eliminar</button>
									</form>
				                  </td>
				                </tr>
				                @endforeach
				                
				              </tbody></table>
				            </div>

				            {{ $galerias->links()}}
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
