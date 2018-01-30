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
							Paginas
						</h3>
						<a href="{{ route('paginas.create')}}" class="btn btn-primary pull-right">Nueva</a>

						
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
				              <h3 class="box-title">Listado de Páginas</h3>

				              <div class="box-tools">
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body table-responsive no-padding">
				              <table class="table table-hover">
				                <tbody><tr>
				                  <th>Nombre</th>
				                  <th>Tipo</th>
				                  <th>Imagen</th>
				                  <th>Posicion</th>
				                  <th>Configuracion</th>
				                  <th>Editar</th>
				                  <th>Eliminar</th>
				                 </tr>
				                 @foreach($paginas as $pagina)
				                <tr>
				                  <td>{{ $pagina->nombre }}</td>
				                  <td>{{ $pagina->tipo->nombre }}</td>
				                  <td><img width="50" src="./uploads/{{ $pagina->imagen }}" alt=""></td>
				                  <td>{{ $pagina->posicion }}</td>
				                  <td><a href="{{route('paginas.configurar',$pagina->id) }}" class="btn btn-info">Configurar</a></td>
				                  <td><a href="{{route('paginas.edit',$pagina->id) }}" class="btn btn-primary">Editar</a></td>
				                  <td>
									<form action="{{route('paginas.destroy', $pagina->id)}}" method="post">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="DELETE">
										<button class="btn btn-danger">Eliminar</button>
									</form>
				                  </td>
				                </tr>
				                @endforeach
				                
				              </tbody></table>
				            </div>

				            {{ $paginas->links()}}
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
