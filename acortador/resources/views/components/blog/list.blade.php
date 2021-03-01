@extends('app')

@section('content')
<div id="listado">
	@if(count($blogs) == 0)
	<div class="card card-custom gutter-b">
        <div class="card-body">
			<div class="alert alert-custom alert-default mb-0" role="alert">
				<div class="alert-icon">
					<span class="svg-icon svg-icon-warning svg-icon-xl"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Tools\Road-Cone.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24"/>
							<path d="M14.8520384,9 L15.7780576,12 L8.22196243,12 L9.14797495,9 L14.8520384,9 Z M13.9260192,6 L10.0739875,6 L10.7050601,3.95551581 C10.8804029,3.38745846 11.4054966,3 12,3 C12.5945036,3 13.1195978,3.38745798 13.2949418,3.95551522 L13.9260192,6 Z M16.7040768,15 L17.9387691,19 L6.06126654,19 L7.2959499,15 L16.7040768,15 Z" fill="#000000"/>
							<rect fill="#000000" opacity="0.3" x="3" y="20" width="18" height="2" rx="1"/>
						</g>
					</svg><!--end::Svg Icon--></span>
				</div>
				<div class="alert-text">
					No existen noticias creadas
				</div>
			</div>
        </div>
	</div>
	@endif
	@foreach($blogs as $blog)
    <div class="card card-custom gutter-b item-blog">
        <div class="card-body" style="padding: 1.5rem 1.5rem;">
            <!--begin::Top-->
            <div class="d-flex">
                <!--begin::Pic-->
                <div class="flex-shrink-0 mr-7">
                    <div class="symbol symbol-50 symbol-lg-120">
                        <img alt="Pic" src="{{asset('').'systemblog/'.$blog->foto}}">
                    </div>
                </div>
                <!--end::Pic-->

                <!--begin: Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                        <!--begin::User-->
                        <div class="mr-3">
                            <div class="d-flex align-items-center mr-3">
                                <div class="d-flex align-items-center text-dark font-size-h5 font-weight-bold mr-3">
                                    {{$blog->titulo}}
                                </div>
                                <span class="label label-light-success label-inline font-weight-bolder mr-1">{{$blog->categoria->categoria}}</span>
                            </div>

                            <!--begin::Contacts-->
                            <div class="d-flex flex-wrap my-2">
                                <div class="text-muted font-weight-bold mr-20 mb-lg-0 mb-2">
									<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Timer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <rect x="0" y="0" width="24" height="24"/>
									        <path d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z" fill="#000000" opacity="0.3"/>
									        <path d="M13,5.06189375 C12.6724058,5.02104333 12.3386603,5 12,5 C11.6613397,5 11.3275942,5.02104333 11,5.06189375 L11,4 L10,4 C9.44771525,4 9,3.55228475 9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 C15,3.55228475 14.5522847,4 14,4 L13,4 L13,5.06189375 Z" fill="#000000"/>
									        <path d="M16.7099142,6.53272645 L17.5355339,5.70710678 C17.9260582,5.31658249 18.5592232,5.31658249 18.9497475,5.70710678 C19.3402718,6.09763107 19.3402718,6.73079605 18.9497475,7.12132034 L18.1671361,7.90393167 C17.7407802,7.38854954 17.251061,6.92750259 16.7099142,6.53272645 Z" fill="#000000"/>
									        <path d="M11.9630156,7.5 L12.0369844,7.5 C12.2982526,7.5 12.5154733,7.70115317 12.5355117,7.96165175 L12.9585886,13.4616518 C12.9797677,13.7369807 12.7737386,13.9773481 12.4984096,13.9985272 C12.4856504,13.9995087 12.4728582,14 12.4600614,14 L11.5399386,14 C11.2637963,14 11.0399386,13.7761424 11.0399386,13.5 C11.0399386,13.4872031 11.0404299,13.4744109 11.0414114,13.4616518 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
									    </g>
									</svg><!--end::Svg Icon--></span>{{$blog->fecha}}
	                            </div>
                                <div class="text-muted font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1" style="position: absolute; margin-left: auto; margin-top: -2px; margin-left: -25px;"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>{{$blog->users->nombre_apellidos}}
                                </div>
                            </div>
                            <!--end::Contacts-->
                        </div>
                        <!--begin::User-->

                        <!--begin::Actions-->
                        <div class="my-lg-0 my-1">
                            <a href="#" class="btn btn-icon btn-primary btn-sm mr-2 btn-edit" date="{{$blog->id}}" data-toggle="tooltip" title="" data-placement="top" data-original-title="Editar Noticia">
                            	<i class="flaticon-edit-1"></i>
                            </a>

                            <a href="#" class="btn btn-icon btn-primary btn-sm btn-delete" date="{{$blog->id}}" data-toggle="tooltip" title="" data-placement="top" data-original-title="Eliminar Noticia">
                            	<i class="flaticon-delete"></i>
                            </a>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Title-->

                    <div class="d-flex align-items-center flex-wrap justify-content-between">
                    <!--begin::Description-->
	                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                            {{substr($blog->bloque_plano, 0, 150)}}
                            <br>
                            {{(strlen(substr($blog->bloque_plano, 150, 150)) > 0 ? substr($blog->bloque_plano, 150, 150) : '')}}
                            <br>
                            {{(strlen(substr($blog->bloque_plano, 300, 150)) > 0 ? substr($blog->bloque_plano, 150, 150).'...' : '')}}
	                    </div>
	                    <!--end::Description-->
	                </div>

                </div>
                <!--end::Info-->
            </div>
            <!--end::Top-->
            <div class="separator separator-solid my-7"></div>
            <!--begin::Bottom-->
            <div class="d-flex align-items-center flex-wrap mt-5">
	            <div class="d-flex align-items-center mr-20 my-1">
	                <span class="mr-4">
	                    <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"></rect>
						        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
						        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
						        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
						        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
						    </g>
						</svg><!--end::Svg Icon--></span>
	                </span>
	                <div class="d-flex flex-column text-dark-75">
	                    <span class="font-weight-bolder font-size-sm">Visitas</span>
	                    <span class="font-weight-bolder font-size-h5">{{$blog->visitas}}</span>
	                </div>
	            </div>
                <!--end: Item-->
            </div>

            <!--end::Bottom-->
        </div>
    </div>
    @endforeach
</div>
<div class="card card-custom">
    <div class="card-body py-7">
        <!--begin::Pagination-->
        <div id="tablePaging" class="d-flex justify-content-between align-items-center flex-wrap">
        </div>
        <!--end:: Pagination-->
    </div>
</div>
<form id="formd_post" method="POST">
@csrf
<input type="hidden" name="url_id" id="url_id">
</form>

<div id="filter" class="offcanvas offcanvas-right p-10">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-15" kt-hidden-height="46" style="">
        <h4 class="font-weight-bold m-0">Filtrar Noticias</h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="filter_close">
            <i dato="filter" class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <div class="offcanvas-content">
        <div class="offcanvas-wrapper mb-5 scroll-pull scroll ps ps--active-y">
            <div class="scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 600px;">
                <div class="form-group">
                    <label class="">Contenido</label>
                    <input type="text" name="contenido" id="contenido" class="form-control form-control-solid" placeholder="Contenido"/>
                    <span class="form-text text-muted">Título o descripción de la noticia.</span>
                </div>
                <div class="form-group">
                    <label class="">Categoria</label>
                    <select class="form-control form-control-solid select2" name="categoria_search" id="categoria_search" multiple>
                        <option value="1">Salud</option>
                        <option value="2">Entretenimiento</option>
                        <option value="3">Curiosidades</option>
                        <option value="4">Video</option>
                        <option value="5">Tecnología</option>
                        <option value="6">Manualidades</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="">Fecha de creada</label>
                    <input type="text" class="form-control" placeholder="Fecha de creada" id="fechaa"/>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.blog.sticky')
@endsection
@section('script')
<script src="{{ asset('js/pagination.js') }}"></script>
<script type="text/javascript">
$('#categoria').select2({
    placeholder: "Seleccione la Categoría"
});
$('#categoria_search').select2({
    placeholder: "Seleccione la Categoría"
});
$('#fechaa').datepicker({
    orientation: "top left",
    todayHighlight: true,
    autoclose: true,
    clearBtn: true
}).on('changeDate', function(e) {
    var arr_cat = [];
    $("#categoria_search option:selected").each(function() {
        arr_cat.push($(this).val());
    });
    var search = $('#contenido').val();
    var fechaa = $(this).val();
    SearchUrls(search, arr_cat, fechaa);
});
var Templates = function() {
    var _body;
    var _element;
    var _offcanvasObject;
    
    var _init = function(icon,close) {
        _offcanvasObject = new KTOffcanvas(_element, {
            overlay: false,
            baseClass: 'offcanvas',
            placement: 'right',
            closeBy: close,
            toggleBy: icon
        });

        var header = KTUtil.find(_element, '.offcanvas-header');
        var content = KTUtil.find(_element, '.offcanvas-content');
        var wrapper = KTUtil.find(_element, '.offcanvas-wrapper');
        var footer = KTUtil.find(_element, '.offcanvas-footer');

        KTUtil.scrollInit(wrapper, {
            disableForMobile: true,
            resetHeightOnDestroy: false,
            handleWindowResize: false,
            height: function() {
                var height = parseInt(KTUtil.getViewPort().height);

                if (header) {
                    height = height - parseInt(KTUtil.actualHeight(header));
                    height = height - parseInt(KTUtil.css(header, 'marginTop'));
                    height = height - parseInt(KTUtil.css(header, 'marginBottom'));
                }

                if (content) {
                    height = height - parseInt(KTUtil.css(content, 'marginTop'));
                    height = height - parseInt(KTUtil.css(content, 'marginBottom'));
                }

                if (wrapper) {
                    height = height - parseInt(KTUtil.css(wrapper, 'marginTop'));
                    height = height - parseInt(KTUtil.css(wrapper, 'marginBottom'));
                }

                if (footer) {
                    height = height - parseInt(KTUtil.actualHeight(footer));
                    height = height - parseInt(KTUtil.css(footer, 'marginTop'));
                    height = height - parseInt(KTUtil.css(footer, 'marginBottom'));
                }

                height = height - parseInt(KTUtil.css(_element, 'paddingTop'));
                height = height - parseInt(KTUtil.css(_element, 'paddingBottom'));

                height = height - 2;

                return height;
            }
        });

        if (typeof offcanvas !== 'undefined' && offcanvas.length === 0) {
            offcanvas.on('hide', function() {
                var expires = new Date(new Date().getTime() + 60 * 60 * 1000); // expire in 60 minutes from now
                KTCookie.setCookie('kt_demo_panel_shown', 1, {expires: expires});
            });
        }
    }

    return {
        init: function(id,icon,close) {
            _element = KTUtil.getById(id);
            if (!_element) {
                return;
            }

            _init(icon,close);

        }
    };
}();

if (typeof module !== 'undefined') {
    module.exports = Templates;
}
$('#categoria_search').on('select2:select', function (e) {
    var arr_cat = [];
    $("#categoria_search option:selected").each(function() {
        arr_cat.push($(this).val());
    });
    var search = $('#contenido').val();
    var fechaa = $('#fechaa').val();
    SearchUrls(search, arr_cat, fechaa);
});
$('#categoria_search').on('select2:unselect', function (e) {
    var arr_cat = [];
    $("#categoria_search option:selected").each(function() {
        arr_cat.push($(this).val());
    });
    var search = $('#contenido').val();
    var fechaa = $('#fechaa').val();
    SearchUrls(search, arr_cat, fechaa);
});
$(document).on('keyup', '#contenido', function(e) {
    var arr_cat = [];
    $("#categoria_search option:selected").each(function() {
        arr_cat.push($(this).val());
    });
    var search = $(this).val();
    var fechaa = $('#fechaa').val();
    SearchUrls(search, arr_cat, fechaa);
});
var asset = {!! json_encode(asset('')) !!};
function SearchUrls(search, categoria, fechaa) {
    var loading = new KTDialog({
        'type': 'loader',
        'placement': 'top center',
        'message': 'Loading ...'
    });
    loading.show();
    $.ajax({
        type:'post',
        url: "{{route('searchBlogs')}}",
        data:{search: search, categoria: categoria, fechaa: fechaa},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(data){
            $('#listado').html('');
            var html = '';
            if(data.length == 0) {
                html = html + '<div class="card card-custom gutter-b">\
                    <div class="card-body">\
                        <div class="alert alert-custom alert-default mb-0" role="alert">\
                            <div class="alert-icon">\
                                <span class="svg-icon svg-icon-warning svg-icon-xl"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M14.8520384,9 L15.7780576,12 L8.22196243,12 L9.14797495,9 L14.8520384,9 Z M13.9260192,6 L10.0739875,6 L10.7050601,3.95551581 C10.8804029,3.38745846 11.4054966,3 12,3 C12.5945036,3 13.1195978,3.38745798 13.2949418,3.95551522 L13.9260192,6 Z M16.7040768,15 L17.9387691,19 L6.06126654,19 L7.2959499,15 L16.7040768,15 Z" fill="#000000"/>\
                                        <rect fill="#000000" opacity="0.3" x="3" y="20" width="18" height="2" rx="1"/>\
                                    </g>\
                                </svg></span>\
                            </div>\
                            <div class="alert-text">\
                                No existen noticias para estos criterios de búsqueda\
                            </div>\
                        </div>\
                    </div>\
                </div>';
                $('#listado').append(html);
            }
            else {
                for(var i = 0; i < data.length; i++) {
                    html = '<div class="card card-custom gutter-b item-blog">\
                        <div class="card-body" style="padding: 1.5rem 1.5rem;">\
                            <div class="d-flex">\
                                <div class="flex-shrink-0 mr-7">\
                                    <div class="symbol symbol-50 symbol-lg-120">\
                                        <img alt="Pic" src="'+ asset + 'systemblog/' + data[i].foto + '">\
                                    </div>\
                                </div>\
                                <div class="flex-grow-1">\
                                    <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">\
                                        <div class="mr-3">\
                                            <div class="d-flex align-items-center mr-3">\
                                                <div class="d-flex align-items-center text-dark font-size-h5 font-weight-bold mr-3">';
                                                    html = html + data[i].titulo;
                                                html = html + '</div>\
                                                <span class="label label-light-success label-inline font-weight-bolder mr-1">'+data[i].categoria.categoria+'</span>\
                                            </div>\
                                            <div class="d-flex flex-wrap my-2">\
                                                <div class="text-muted font-weight-bold mr-20 mb-lg-0 mb-2">\
                                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                            <rect x="0" y="0" width="24" height="24"/>\
                                                            <path d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z" fill="#000000" opacity="0.3"/>\
                                                            <path d="M13,5.06189375 C12.6724058,5.02104333 12.3386603,5 12,5 C11.6613397,5 11.3275942,5.02104333 11,5.06189375 L11,4 L10,4 C9.44771525,4 9,3.55228475 9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 C15,3.55228475 14.5522847,4 14,4 L13,4 L13,5.06189375 Z" fill="#000000"/>\
                                                            <path d="M16.7099142,6.53272645 L17.5355339,5.70710678 C17.9260582,5.31658249 18.5592232,5.31658249 18.9497475,5.70710678 C19.3402718,6.09763107 19.3402718,6.73079605 18.9497475,7.12132034 L18.1671361,7.90393167 C17.7407802,7.38854954 17.251061,6.92750259 16.7099142,6.53272645 Z" fill="#000000"/>\
                                                            <path d="M11.9630156,7.5 L12.0369844,7.5 C12.2982526,7.5 12.5154733,7.70115317 12.5355117,7.96165175 L12.9585886,13.4616518 C12.9797677,13.7369807 12.7737386,13.9773481 12.4984096,13.9985272 C12.4856504,13.9995087 12.4728582,14 12.4600614,14 L11.5399386,14 C11.2637963,14 11.0399386,13.7761424 11.0399386,13.5 C11.0399386,13.4872031 11.0404299,13.4744109 11.0414114,13.4616518 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>\
                                                        </g>\
                                                    </svg></span>'+data[i].fecha;
                                                html = html + '</div>\
                                                <div class="text-muted font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">\
                                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1" style="position: absolute; margin-left: auto; margin-top: -2px; margin-left: -25px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                            <polygon points="0 0 24 0 24 24 0 24"/>\
                                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
                                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>\
                                                        </g>\
                                                    </svg></span>'+data[i].users.nombre_apellidos;
                                                html = html + '</div>\
                                            </div>\
                                        </div>\
                                        <div class="my-lg-0 my-1">\
                                            <a href="#" class="btn btn-icon btn-primary btn-sm mr-2 btn-edit" date="'+data[i].id+'" data-toggle="tooltip" title="" data-placement="top" data-original-title="Editar Noticia">\
                                                <i class="flaticon-edit-1"></i>\
                                            </a>\
                                            <a href="#" class="btn btn-icon btn-primary btn-sm btn-delete" date="'+data[i].id+'" data-toggle="tooltip" title="" data-placement="top" data-original-title="Eliminar Noticia">\
                                                <i class="flaticon-delete"></i>\
                                            </a>\
                                        </div>\
                                    </div>\
                                    <div class="d-flex align-items-center flex-wrap justify-content-between">\
                                        <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">';
                                            html = html + data[i].bloque_plano.substr(0, 150);
                                            html = html + '<br>';
                                            var sub1 = data[i].bloque_plano.substr(150, 150);
                                            html = html + (sub1.length > 0 ? sub1 : '');
                                            html = html + '<br>';
                                            var sub2 = data[i].bloque_plano.substr(300, 150);
                                            html = html + (sub2.length > 0 ? sub2+'...' : '');
                                        html = html + '</div>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="separator separator-solid my-7"></div>\
                            <div class="d-flex align-items-center flex-wrap mt-5">\
                                <div class="d-flex align-items-center mr-20 my-1">\
                                    <span class="mr-4">\
                                        <span class="svg-icon svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                <rect x="0" y="0" width="24" height="24"></rect>\
                                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>\
                                                <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>\
                                                <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>\
                                                <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>\
                                            </g>\
                                        </svg></span>\
                                    </span>\
                                    <div class="d-flex flex-column text-dark-75">\
                                        <span class="font-weight-bolder font-size-sm">Visitas</span>\
                                        <span class="font-weight-bolder font-size-h5">'+data[i].visitas+'</span>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>';
                    $('#listado').append(html);
                }
            }
            loading.hide();
            window.tp = new Pagination('#tablePaging', {
                itemsCount: data.length,
                pageSize: 10,
                pageRange: [10, 20, 30, -1],
                currentPage: 1,
                onPageSizeChange: function (ps) {

                },
                onPageChange: function (paging) {
                    var cantidad = 0;
                    var start = paging.pageSize * (paging.currentPage - 1),
                    end = start + paging.pageSize,
                    $rows = $(document).find('.item-blog');
                    $rows.hide();
                    for (var i = start; i < end; i++) {
                        if($rows.eq(i).length != 0)
                            cantidad = cantidad + 1;
                        $rows.eq(i).show();
                    }
                    $('.cantidad').text(cantidad);
                }
            });
        },
        error:function(data){
        }
    });
}
$(document).on('click', '.btn-edit', function() {
    $('#url_id').val($(this).attr('date'))
    $('#formd_post').attr('action', "{{route('editNoticia')}}");
    $('#formd_post').submit();
});
$(document).on('click', '.btn-delete', function() {
    $('#url_id').val($(this).attr('date'))
    $('#formd_post').attr('action', "{{route('deleteNoticia')}}");
    $('#formd_post').submit();
});
jQuery(document).ready(function() {
    var blogs = {!! json_encode($blogs) !!};
    Templates.init('filter','filter_icon', 'filter_close');
    window.tp = new Pagination('#tablePaging', {
        itemsCount: blogs.length,
        pageSize: 10,
        pageRange: [10, 20, 30, -1],
        currentPage: 1,
        onPageSizeChange: function (ps) {

        },
        onPageChange: function (paging) {
            var cantidad = 0;
            var start = paging.pageSize * (paging.currentPage - 1),
            end = start + paging.pageSize,
            $rows = $(document).find('.item-blog');
            $rows.hide();
            for (var i = start; i < end; i++) {
                if($rows.eq(i).length != 0)
                    cantidad = cantidad + 1;
                $rows.eq(i).show();
            }
            $('.cantidad').text(cantidad);
        }
    });
});
</script>
@endsection
@section('pagina')
Listado Noticias
@endsection