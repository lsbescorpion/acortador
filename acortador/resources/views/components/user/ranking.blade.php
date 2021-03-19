@extends('app')

@section('content')
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">
				Ranking de Usuario
				<span class="d-block text-muted pt-2 font-size-sm">Listado de usuarios ordenados por visitas en el mes</span>
			</h3>
		</div>
		<div class="card-toolbar">

		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                <thead>
                    <tr class="text-left text-uppercase">
                        <th class="pl-7"><span class="text-dark-75">Usuario</span></th>
                        <th>Visitas</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($users as $user)
                    <tr>
                        <td class="pl-0 py-8 col-md-8">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50 symbol-light mr-4">
                                    <span class="symbol-label">
                                        <img src="{{$user->foto != "" && $user->foto != null ? 'background-image: url('."'".route("showAvatar", ["fileName" => $user->foto])."')" : asset('board/media/svg/humans/custom-1.svg')}}" class="h-75 align-self-end" alt="">
                                    </span>
                                </div>
                                <div>
                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$user->nombre_apellidos}}</a>
                                    <span class="text-muted font-weight-bold d-block"></span>
                                </div>
                            </div>
                        </td>
                        <td class="col-md-4">
                            <span class="text-muted font-weight-bold">
                                {{$user->visitasd}}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
</script>
@endsection
@section('pagina')
Ranking de Usuarios
@endsection