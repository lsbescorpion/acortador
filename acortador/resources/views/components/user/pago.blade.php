@extends('app')

@section('content')
<div class="d-flex flex-row">
	<!--begin::Aside-->
	<div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
		<!--begin::Profile Card-->
<div class="card card-custom card-stretch">
    <!--begin::Body-->
    <div class="card-body pt-4">
        <!--begin::User-->
        <div class="d-flex align-items-center">
            <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                <div class="symbol-label" style="{{$user->foto != "" && $user->foto != null ? 'background-image: url('."'".asset("storage")."/".$user->foto."')" : 'background-image: url('.asset('board/media/users/blank.png').')'}}"></div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div>
                <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                    {{$user->nombre_apellidos}}
                </a>
                <div class="text-muted">
                    {{Auth::user()->roles[0]->name}}
                </div>
            </div>
        </div>
        <!--end::User-->

        <!--begin::Contact-->
        <div class="py-9">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="font-weight-bold mr-2">Email:</span>
                <a href="#" class="text-muted text-hover-primary">{{$user->correo}}</a>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="font-weight-bold mr-2">Telefono:</span>
                <span class="text-muted">{{($user->perfil != null ? $user->perfil->telefono : '')}}</span>
            </div>
        </div>
        <!--end::Contact-->

        <!--begin::Nav-->
        <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
            <div class="navi-item mb-2">
                <a  href="{{route('personalIn')}}" class="navi-link py-4">
                    <span class="navi-icon mr-2">
                        <span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>                    </span>
                    <span class="navi-text font-size-lg">
                        Información Personal
                    </span>
                </a>
            </div>
            <div class="navi-item mb-2">
                <a href="{{route('infoPago')}}" class="navi-link py-4 active">
                    <span class="navi-icon mr-2">
                        <span class="svg-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Credit-card.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
        <rect fill="#000000" x="2" y="8" width="20" height="3"/>
        <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
    </g>
</svg><!--end::Svg Icon--></span>                    </span>
                    <span  class="navi-text font-size-lg">
                        Información de Pago
                    </span>
                </a>
            </div>
            <div class="navi-item mb-2">
                <a href="{{route('passwordUser')}}" class="navi-link py-4 ">
                    <span class="navi-icon mr-2">
                        <span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
        <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"/>
        <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>                    </span>
                    <span  class="navi-text font-size-lg">
                        Cambiar Contraseña
                    </span>
                </a>
            </div>
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Body-->
</div>
<!--end::Profile Card-->
	</div>
	<!--end::Aside-->
	<!--begin::Content-->
	<div class="flex-row-fluid ml-lg-8">
		<!--begin::Card-->
		<div class="card card-custom card-stretch">
			<!--begin::Header-->
			
			<div class="card-header py-3">
				<div class="card-title align-items-start flex-column">
					<h3 class="card-label font-weight-bolder text-dark">Información Personal de Pago</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Modifique la información personal de la persona que cobrara</span>
                </div>
				<div class="card-toolbar">
					<button type="submit" class="btn btn-success font-weight-bold mr-2">Guardar Cambios</button>
					<button type="reset" class="btn btn-secondary font-weight-bold">Cancelar</button>
				</div>
			</div>
			<!--end::Header-->
			<form class="form" id="pago_form" action="{{action('UsersController@updatePago')}}" method="POST">
			@csrf
			<!--begin::Form-->
				<!--begin::Body-->
				<div class="card-body">
					<div class="row">
						<label class="col-xl-3"></label>
						<div class="col-lg-9 col-xl-6">
							<h5 class="font-weight-bold mb-6">Información del cliente</h5>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 col-form-label text-right">Nombre y Apellidos</label>
						<div class="col-md-9">
                            <div class="input-group input-group-solid mb-2">
                                <input name="name" id="name" class="form-control form-control-lg form-control-solid" placeholder="Nombre y Apellidos" type="text" value="{{($user->perfil != null ? $user->perfil->name : '')}}" required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Files\User-folder.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </span>
                                </div>
                            </div>
						</div>
                        @error('name')
                        <div class="col-md-3 col-form-label text-right"></div>
                        <div class="text-danger col-md-9" style="width: 100%;margin-top: 0.25rem;font-size: 12px;color: #F64E60;">{{ $message }}</div>
                        @enderror
					</div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">CI</label>
                        <div class="col-md-9">
                            <div class="input-group input-group-solid mb-2">
                                <input name="ci" id="ci" class="form-control form-control-lg form-control-solid" placeholder="Identificador" type="text" value="{{($user->perfil != null ? $user->perfil->ci : '')}}" required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Key.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <polygon fill="#000000" opacity="0.3" transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158) " points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476"/>
                                                <path d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z" fill="#000000" transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281) "/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @error('ci')
                        <div class="col-md-3 col-form-label text-right"></div>
                        <div class="text-danger col-md-9" style="width: 100%;margin-top: 0.25rem;font-size: 12px;color: #F64E60;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Dirección</label>
                        <div class="col-md-9">
                            <div class="input-group input-group-solid mb-2">
                                <input name="direccion" id="direccion" class="form-control form-control-lg form-control-solid" placeholder="Dirección" type="text" value="{{($user->perfil != null ? $user->perfil->direccion : '')}}" required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Map\Marker2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @error('direccion')
                        <div class="col-md-3 col-form-label text-right"></div>
                        <div class="text-danger col-md-9" style="width: 100%;margin-top: 0.25rem;font-size: 12px;color: #F64E60;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Método de Pago y Tipo de Moneda</label>
                        <div class="col-md-9">
                            <select title="Método de Pago y Tipo de Moneda" class="form-control form-control-lg form-control-solid selectpicker" name="metodo" id="metodo" data-style="form-control-lg form-control-solid text-muted" required>
                                <optgroup label="Tarjetas MLC">
                                    <option value="1">Tarjeta BPA MLC</option>
                                    <option value="2">Tarjeta BANDEC MLC</option>
                                    <option value="3">Tarjeta AIS MLC</option>
                                    <option value="4">Tarjeta Metropolitano MLC</option>
                                </optgroup>
                                <optgroup label="Tarjetas CUP">
                                    <option value="5">Tarjeta BPA CUP</option>
                                    <option value="6">Tarjeta BANDEC CUP</option>
                                    <option value="7">Tarjeta AIS CUP</option>
                                    <option value="8">Tarjeta Metropolitano CUP</option>
                                </optgroup>
                                <option value="9">Paypal</option>
                            </select>
                        </div>
                        @error('metodo')
                        <div class="col-md-3 col-form-label text-right"></div>
                        <div class="text-danger col-md-9" style="width: 100%;margin-top: 0.25rem;font-size: 12px;color: #F64E60;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">No Tarjeta</label>
                        <div class="col-md-9">
                            <div class="input-group input-group-solid mb-2">
                                <input name="tarjeta" id="tarjeta" class="form-control form-control-lg form-control-solid" placeholder="Número de Tarjeta" type="text" value="{{($user->perfil != null ? $user->perfil->tarjeta : '')}}" required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Credit-card.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                                <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                                <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @error('tarjeta')
                        <div class="col-md-3 col-form-label text-right"></div>
                        <div class="text-danger col-md-9" style="width: 100%;margin-top: 0.25rem;font-size: 12px;color: #F64E60;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Teléfono</label>
                        <div class="col-md-9">
                            <div class="input-group input-group-solid mb-2">
                                <input name="telefono" id="telefono" class="form-control form-control-lg form-control-solid" placeholder="Teléfono" type="text" value="{{($user->perfil != null ? $user->perfil->telefono : '')}}" required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\Phone.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M7.13888889,4 L7.13888889,19 L16.8611111,19 L16.8611111,4 L7.13888889,4 Z M7.83333333,1 L16.1666667,1 C17.5729473,1 18.25,1.98121694 18.25,3.5 L18.25,20.5 C18.25,22.0187831 17.5729473,23 16.1666667,23 L7.83333333,23 C6.42705272,23 5.75,22.0187831 5.75,20.5 L5.75,3.5 C5.75,1.98121694 6.42705272,1 7.83333333,1 Z" fill="#000000" fill-rule="nonzero"/>
                                                <polygon fill="#000000" opacity="0.3" points="7 4 7 19 17 19 17 4"/>
                                                <circle fill="#000000" cx="12" cy="21" r="1"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Correo Paypal</label>
                        <div class="col-md-9">
                            <div class="input-group input-group-solid mb-2">
                                <input name="paypal" id="paypal" class="form-control form-control-lg form-control-solid" placeholder="Correo Paypal" type="email" value="{{($user->perfil != null ? $user->perfil->paypal : '')}}" required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Mail.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</form>
				<!--end::Body-->
			<!--end::Form-->
		</div>
	</div>
	<!--end::Content-->
</div>
@endsection

@section('pagina')
Información de Pago
@endsection

@section('script')
<script type="text/javascript">
var user = {!! $user !!};
$('#metodo').selectpicker();
if(user.perfil != null) {
    $('#metodo').val(user.perfil.banco);
    $('#metodo').selectpicker('refresh');
}
$(document).on('click','.btn-success',function(){
    $('#pago_form').submit();
});
</script>
@endsection