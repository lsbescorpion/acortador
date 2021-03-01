@extends('app')

@section('content')
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">
				Listado de Pagos Menuales
				<span class="d-block text-muted pt-2 font-size-sm">Listado de todos los pagos efectuados y pendientes</span>
			</h3>
		</div>
		<div class="card-toolbar">

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
								<label class="mr-3 mb-0 d-none d-md-block">Mes:</label>
								<select class="form-control" id="mes">
									<option value="">All</option>
									<option value="enero">Enero</option>
									<option value="febrero">Febrero</option>
									<option value="marzo">Marzo</option>
									<option value="abril">Abril</option>
									<option value="mayo">Mayo</option>
									<option value="junio">Junio</option>
									<option value="julio">Julio</option>
									<option value="agosto">Agosto</option>
									<option value="septiembre">Septiembre</option>
									<option value="octubre">Octubre</option>
									<option value="noviembre">Noviembre</option>
									<option value="diciembre">Diciembre</option>
								</select>
							</div>
						</div>
						<div class="col-md-3 my-2 my-md-0">
							<div class="d-flex align-items-center">
								<label class="mr-3 mb-0 d-none d-md-block">Año:</label>
								@php
								$annof = \Carbon\Carbon::now()->format('Y');
								@endphp
								<select class="form-control" id="anno">
									<option value="">All</option>
									@if($annomin != null && $annomin != '' && $annomin != 0)
									@for($i = $annomin; $i <= $annof; $i++)
									<option value="{{$i}}">{{$i}}</option>
									@endfor
									@endif
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
		@php 
		setlocale(LC_ALL, 'es_ES.utf8');
		\Carbon\Carbon::setLocale('es');
		\Carbon\CarbonInterval::setLocale('es');
		@endphp
		<div class="table-responsive">
			<table class="datatable table table-head-custom table-head-bg table-borderless table-vertical-center" id="kt_datatable">
				<thead>
					<tr>
						<th>Ganancia</th>
						<th>Mes</th>
						<th>Año</th>
						<th>Pagado</th>
					</tr>
				</thead>
				<tbody>
					@foreach($mensuales as $mensual)
					<tr>
						<td>{{$mensual->ganancia}}</td>
						<td>{{\Carbon\Carbon::parse(date('Y', time())."-".$mensual->mes."-01")->formatLocalized('%B')}}</td>
						<td>{{$mensual->anno}}</td>
						<td>{{$mensual->pagado}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!--end: Datatable-->
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
jQuery(document).ready(function() {
	$('#anno, #mes').selectpicker();
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
				field: 'Ganancia',
				title: 'Ganancia',
                textAlign: 'left',
                
			},
			{
				field: 'Mes',
				title: 'Mes',
                textAlign: 'left',
				autoHide: false
			},
			{
				field: 'Año',
                textAlign: 'left',
                overflow: 'visible',
                
			},
			{
				field: 'Pagado',
				title: 'Pagado',
                textAlign: 'left',
                overflow: 'visible',
				autoHide: false,
				template: function(row) {
					var activo = ''
					if(row.Pagado == 1)
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
			}
		],
	});

    $('#anno').on('change', function() {
        datatable.search($(this).val().toLowerCase(), 'Año');
    });
    $('#mes').on('change', function() {
        datatable.search($(this).val().toLowerCase(), 'Mes');
    });
});
</script>
@endsection
@section('pagina')
Listado Pagos Mensuales
@endsection