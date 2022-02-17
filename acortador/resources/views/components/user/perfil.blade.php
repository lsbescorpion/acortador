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
                <a  href="{{route('personalIn')}}" class="navi-link py-4 active">
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
                <a href="{{route('infoPago')}}" class="navi-link py-4 ">
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
					<h3 class="card-label font-weight-bolder text-dark">Información Personal</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Modifique su información personal</span>
                </div>
				<div class="card-toolbar">
					<button type="submit" class="btn btn-success font-weight-bold mr-2">Guardar Cambios</button>
					<button type="reset" class="btn btn-secondary font-weight-bold">Cancelar</button>
				</div>
			</div>
			<!--end::Header-->
			<form class="form" id="personali_form" action="{{action('UsersController@savePersonalIn')}}" enctype="multipart/form-data" method="POST">
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
						<label class="col-xl-3 col-lg-3 col-form-label text-right">Avatar</label>
						<div class="col-lg-9 col-xl-6">
							<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('')}}board/media/users/blank.png)">
                                <div class="image-input-wrapper" style="{{$user->foto != "" && $user->foto != null ? 'background-image: url('."'".route("showAvatar", ["fileName" => $user->foto])."')" : ''}}"></div>

                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg"/>
        							<input type="hidden" name="profile_avatar_remove"/>
                                </label>

        						<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                            <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 col-form-label text-right">Nombre y Apellidos</label>
						<div class="col-md-9">
                            <div class="input-group input-group-solid mb-2">
                                <input name="name" id="name" class="form-control form-control-lg form-control-solid" type="text" value="{{$user->nombre_apellidos}}" required/>
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
                        <div class="col-md-3 col-form-label text-right"></div>
                        <div class="invalid-feedback-name col-md-9" style="width: 100%;margin-top: 0.25rem;font-size: 12px;color: #F64E60;"></div>
					</div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Perfil de Facebook</label>
                        <div class="col-md-9">
                            <div class="input-group input-group-solid mb-2">
                                <input name="perfil_fb" id="perfil_fb" class="form-control form-control-lg form-control-solid" type="text" value="{{$user->perfil_fb}}" required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-facebook"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-form-label text-right"></div>
                        <div class="invalid-feedback-perfil col-md-9" style="width: 100%;margin-top: 0.25rem;font-size: 12px;color: #F64E60;"></div>
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
Información Personal
@endsection

@section('script')
<script type="text/javascript">   
$(document).on('click','.btn-success',function(){
    $('.invalid-feedback-name').text('');
    $('.invalid-feedback-perfil').text('');
    if($('#name').val() == '' || $('#name').val() == null) {
        $('.invalid-feedback-name').text('El nombre es requerido');
        return false;
    }
    else
    if($('#perfil_fb').val() == '' || $('#perfil_fb').val() == null) {
        $('.invalid-feedback-perfil').text('El perfil es requerido');
        return false;
    }
	$('#personali_form').submit();
});

var avatar = new KTImageInput('kt_profile_avatar');
</script>
@endsection