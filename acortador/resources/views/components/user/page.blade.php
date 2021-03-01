@extends('app')

@section('content')
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">
				Listado de usuarios
				<span class="d-block text-muted pt-2 font-size-sm">Listado, registrar, actualizar, eliminar cualquier usuario</span>
			</h3>
		</div>
		<div class="card-toolbar">
			<a href="{{route('createUser')}}" class="btn btn-primary font-weight-bolder">
				<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
			    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			        <rect x="0" y="0" width="24" height="24"/>
			        <circle fill="#000000" cx="9" cy="15" r="6"/>
			        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
			    </g>
			</svg><!--end::Svg Icon--></span>	Nuevo Usuario
			</a>
		</div>
	</div>
	<div class="card-body">
		<div class="mb-7">
			<div class="row align-items-center">
				<div class="col-lg-10 col-xl-10">
					<div class="row align-items-center">
						<div class="col-md-3 my-2 my-md-0">
							<div class="input-icon">
								<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
								<span><i class="flaticon2-search-1 text-muted"></i></span>
							</div>
						</div>

						<div class="col-md-3 my-2 my-md-0">
							<div class="d-flex align-items-center">
								<label class="mr-3 mb-0 d-none d-md-block">Estado:</label>
								<select class="form-control" id="estado">
									<option value="">All</option>
									<option value="1">Activo</option>
									<option value="2">Bloqueado</option>
								</select>
							</div>
						</div>
						<div class="col-md-3 my-2 my-md-0">
							<div class="d-flex align-items-center">
								<label class="mr-3 mb-0 d-none d-md-block">Role:</label>
								<select class="form-control" id="roles">
									<option value="">All</option>
									<option value="Administrador">Administrador</option>
									<option value="Moderador">Moderador</option>
									<option value="Usuarios">Usuario</option>
								</select>
							</div>
						</div>
		            </div>
				</div>
				<div class="col-lg-2 col-xl-2 mt-5 mt-lg-0">

				</div>
			</div>
		</div>
		<!--begin: Datatable-->
		<div class="table-responsive">
			<table class="datatable table table-head-custom table-head-bg table-borderless table-vertical-center" id="kt_datatable">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Perfil_FB</th>
						<th>Rol</th>
						<th>Activo</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{$user->nombre_apellidos}},{{$user->correo}},{{$user->foto}}</td>
						<td>{{$user->perfil_fb}}</td>
						<td>{{$user->roles[0]->name}}</td>
						<td>{{$user->activo}}</td>
						<td>{{$user->id}} {{$user->roles[0]->name}} {{Auth::user()->roles[0]->name}} {{$user->activo}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!--end: Datatable-->
	</div>
</div>
<form id="formdelete" method="POST">@csrf</form>

<form id="form_post" method="POST">
@csrf
<input type="hidden" name="user_id" id="user_id">
</form>
@endsection
@section('script')
<script type="text/javascript">
jQuery(document).ready(function() {
	$(document).on('click', '.edit-user', function() {
		$('#user_id').val($(this).attr('dato'));
		$('#form_post').attr('action', "{{route('editUser')}}");
		$('#form_post').attr('method', "GET");
		$('#form_post').submit();
	});
	$(document).on('click', '.enable-user', function() {
		$('#user_id').val($(this).attr('dato'));
		$('#form_post').attr('action', "{{route('activeUser')}}");
		$('#form_post').attr('method', "POST");
		$('#form_post').submit();
	});
	$(document).on('click', '.disable-user', function() {
		$('#user_id').val($(this).attr('dato'));
		$('#form_post').attr('action', "{{route('blockUser')}}");
		$('#form_post').attr('method', "POST");
		$('#form_post').submit();
	});
	$(document).on('click', '.delete-user', function() {
		$('#user_id').val($(this).attr('dato'));
		$('#form_post').attr('action', "{{route('deleteUser')}}");
		$('#form_post').attr('method', "POST");
		$('#form_post').submit();
	});
	$('[data-toggle="tooltip"]').tooltip()
	$('#roles, #estado').selectpicker();
	var datatable = $('#kt_datatable').KTDatatable({
		data: {
			saveState: {cookie: false},
		},
		layout: {
               scroll: false,
               footer: false,
           },
        sortable: true,
        pagination: true,
		search: {
			input: $('#kt_datatable_search_query'),
			key: 'generalSearch'
		},
		columns: [
			{
				field: 'Nombre',
				title: 'Nombre y Apellidos',
				sortable: 'asc',
                textAlign: 'left',
                autoHide: false,
                width: 300,
				template: function(row) {
					var arr = row.Nombre.split(",");
					var img = (arr[2] == '' || arr[2] == null ? "{{asset('board/media/users/blank.png')}}" : "{{asset('storage')}}"+"/"+arr[2]);
					var user_img = 'background-image:url(' + "'" + img + "'" + ')';
					var output = '<div class="d-flex align-items-center">\
								<div class="symbol symbol-40 flex-shrink-0">\
									<div class="symbol-label" style="' + user_img + '"></div>\
								</div>\
								<div class="ml-2">\
									<div class="text-dark-75 font-weight-bold line-height-sm">' + arr[0] + '</div>\
									<a href="#" class="font-size-sm text-dark-50 text-hover-primary">' +
									arr[1] + '</a>\
								</div>\
							</div>';
					return output;
				},
			},
			{
				field: 'Perfil_FB',
				title: 'Perfil FB',
				sortable: 'asc',
                textAlign: 'left',
                overflow: 'visible',
                width: 600,
				// callback function support for column rendering
				template: function(row) {
					return '<i class="socicon-facebook mr-3"></i>' + row.Perfil_FB;
				},
			},
			{
				field: 'Rol',
				sortable: 'asc',
                textAlign: 'left',
                overflow: 'visible',
                width: 100,
				template: function(row) {
					return '<span class="label label-lg label-light-primary label-inline">'+row.Rol+'</span>';
				},
			},
			{
				field: 'Activo',
				title: 'Activo',
				sortable: 'asc',
                textAlign: 'left',
                overflow: 'visible',
                width: 100,
				template: function(row) {
					var activo = ''
					if(row.Activo == 1)
						activo = '<span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
						        <rect x="0" y="0" width="24" height="24"/>\
						        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>\
						        <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"/>\
						    </g>\
						</svg></span>';
					else
						activo = '<span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
						        <rect x="0" y="0" width="24" height="24"/>\
						        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>\
						        <path d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z" fill="#000000"/>\
						    </g>\
						</svg></span>';
					return activo;
				},
			},
			{
				field: 'Accion',
                title: 'Acción',
               	sortable: false,
               	overflow: 'visible',
               	width: 150,
               	template: function(row) {
	               	var arr = row.Accion.split(" ");
	               	if(arr[0] == 1)
	               		return '';
	               	else {
	               		var acciones = '';
               			acciones = acciones + '\
	                  	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3 edit-user" dato="'+arr[0]+'" data-toogle="tooltip" data-original-title="Editar Usuario" title="Editar Usuario">\
		                       <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
							        <rect x="0" y="0" width="24" height="24"/>\
							        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
							        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
							    </g>\
							</svg></span>\
						</a>';
						if(arr[3] == 1) {
							acciones = acciones + '\
	                  		<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3 disable-user" dato="'+arr[0]+'" data-toogle="tooltip" title="Bloquear Usuario" data-original-title="Bloquear Usuario">\
		                        <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
								    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
								        <rect x="0" y="0" width="24" height="24"/>\
								        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>\
								        <path d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z" fill="#000000"/>\
								    </g>\
								</svg></span>\
							</a>';
						}
						else {
							acciones = acciones + '\
	                  		<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3 enable-user" dato="'+arr[0]+'" data-toogle="tooltip" title="Activar Usuario" data-original-title="Activar Usuario">\
		                        <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
								    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
								        <mask fill="white">\
								            <use xlink:href="#path-1"/>\
								        </mask>\
								        <g/>\
								        <path d="M15.6274517,4.55882251 L14.4693753,6.2959371 C13.9280401,5.51296885 13.0239252,5 12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L14,10 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C13.4280904,3 14.7163444,3.59871093 15.6274517,4.55882251 Z" fill="#000000"/>\
								    </g>\
								</svg></span>\
							</a>';
						}
						acciones = acciones + '\
	                  	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3 delete-user" dato="'+arr[0]+'" data-toogle="tooltip" title="Eliminar Usuario" data-original-title="Eliminar Usuario">\
		                    <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
							        <rect x="0" y="0" width="24" height="24"/>\
							        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
							        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
							    </g>\
							</svg>\
						</a>';
						return acciones;
               		}
               	},
           	}
		],
	});

    $('#estado').on('change', function() {
        datatable.search($(this).val().toLowerCase(), 'Activo');
    });
    $('#roles').on('change', function() {
        datatable.search($(this).val().toLowerCase(), 'Rol');
    });
});
</script>
@endsection
@section('pagina')
Listado Usuarios
@endsection