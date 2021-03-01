@extends('app')

@section('content')
<div class="row">
	<div class="col-xl-3">
		<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('board/media/svg/shapes/abstract-4.svg')}})">
		    <div class="card-body">
		    	<span class="symbol  symbol-50 symbol-light-primary mr-2">
                	<span class="symbol-label">
				        <span class="svg-icon svg-icon-3x svg-icon-primary"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
						        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
						    </g>
						</svg></span>
					</span>
				</span>
		        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{$estadisticas['visitas']}}</span>
		        <div class="row justify-content-between">
		        	<span class="font-weight-bold text-muted font-size-lg">Visitas Totales</span>
		        	<span class="font-weight-bold text-muted font-size-lg text-right">
		        		<span class="svg-icon" style="position: absolute; margin-top: -1px; margin-left: -20px;"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Clock.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"/>
						        <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
						    </g>
						</svg><!--end::Svg Icon--></span>
		        		{{$estadisticas['fvdiarias']}}
		        	</span>
		        </div>
		    </div>
		</div>
    </div>
    <div class="col-xl-3">
		<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('board/media/svg/shapes/abstract-4.svg')}})">
		    <div class="card-body">
		    	<span class="symbol  symbol-50 symbol-light-primary mr-2">
                	<span class="symbol-label">
				        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Dollar.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/>
						        <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/>
						        <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000"/>
						    </g>
						</svg><!--end::Svg Icon--></span>
					</span>
				</span>
		        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">${{$estadisticas['gmensual']}}</span>
		        <div class="row justify-content-between">
		        	<span class="font-weight-bold text-muted font-size-lg">Ganancias Totales Mes</span>
		        	<span class="font-weight-bold text-muted font-size-lg text-right">
		        		<span class="svg-icon" style="position: absolute; margin-top: -1px; margin-left: -20px;"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Clock.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"/>
						        <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
						    </g>
						</svg><!--end::Svg Icon--></span>
		        		{{$estadisticas['fvdiarias']}}
		        	</span>
		        </div>
		    </div>
		</div>
    </div>
    <div class="col-xl-3">
		<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('board/media/svg/shapes/abstract-4.svg')}})">
		    <div class="card-body">
		    	<span class="symbol  symbol-50 symbol-light-primary mr-2">
                	<span class="symbol-label">
				        <span class="svg-icon svg-icon-3x svg-icon-primary"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
						        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
						    </g>
						</svg></span>
					</span>
				</span>
		        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{$estadisticas['vdiarias'] != null ? $estadisticas['vdiarias'] : 0}}</span>
		        <div class="row justify-content-between">
		        	<span class="font-weight-bold text-muted font-size-lg">Visitas en el Día</span>
		        	<span class="font-weight-bold text-muted font-size-lg text-right">
		        		<span class="svg-icon" style="position: absolute; margin-top: -1px; margin-left: -20px;"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Clock.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"/>
						        <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
						    </g>
						</svg><!--end::Svg Icon--></span>
		        		{{$estadisticas['fvdiarias']}}
		        	</span>
		        </div>
		    </div>
		</div>
    </div>
    <div class="col-xl-3">
		<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('board/media/svg/shapes/abstract-4.svg')}})">
		    <div class="card-body">
		    	<span class="symbol  symbol-50 symbol-light-primary mr-2">
                	<span class="symbol-label">
				        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Dollar.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/>
						        <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/>
						        <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000"/>
						    </g>
						</svg><!--end::Svg Icon--></span>
					</span>
				</span>
		        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">${{$estadisticas['gdiarias']}}</span>
		        <div class="row justify-content-between">
		        	<span class="font-weight-bold text-muted font-size-lg">Ganancias en el Día</span>
		        	<span class="font-weight-bold text-muted font-size-lg text-right">
		        		<span class="svg-icon" style="position: absolute; margin-top: -1px; margin-left: -20px;"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Clock.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"/>
						        <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
						    </g>
						</svg><!--end::Svg Icon--></span>
		        		{{$estadisticas['fvdiarias']}}
		        	</span>
		        </div>
		    </div>
		</div>
    </div>
    <div class="col-xl-6">
		<div class="card card-custom card-stretch gutter-b">
		    <div class="card-body p-0" style="position: relative;">
		        <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
		            <span class="symbol  symbol-50 symbol-light-primary mr-2">
		                <span class="symbol-label">
		                    <span class="svg-icon svg-icon-3x svg-icon-primary"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Dollar.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <rect x="0" y="0" width="24" height="24"/>
							        <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/>
							        <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/>
							        <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000"/>
							    </g>
							</svg><!--end::Svg Icon--></span>
						</span>
		            </span>
		            <div class="d-flex flex-column text-right">
		                <span class="text-dark-75 font-weight-bolder font-size-h3">{{$estadisticas['gmensual']}}</span>
		                <span class="text-muted font-weight-bold mt-2">Ganancias en el Mes</span>
		            </div>
		        </div>
		        <div id="chart_ganancias" class="card-rounded-bottom" data-color="primary" style="height: 200px; min-height: 200px;">
		    	</div>
		    	<div class="resize-triggers">
		    		<div class="expand-trigger">
		    			<div style="width: 414px; height: 258px;"></div>
		    		</div>
		    		<div class="contract-trigger"></div>
		    	</div>
		    </div>
		</div>
    </div>
    <div class="col-xl-6">
		<div class="card card-custom card-stretch gutter-b">
		    <div class="card-body p-0" style="position: relative;">
		        <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
		            <span class="symbol  symbol-50 symbol-light-primary mr-2">
		                <span class="symbol-label">
		                    <span class="svg-icon svg-icon-3x svg-icon-primary"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <rect x="0" y="0" width="24" height="24"/>
							        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
							        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
							    </g>
							</svg></span>
						</span>
		            </span>
		            <div class="d-flex flex-column text-right">
		                <span class="text-dark-75 font-weight-bolder font-size-h3">{{$estadisticas['visitas_total']}}</span>
		                <span class="text-muted font-weight-bold mt-2">Visitas en el Mes</span>
		            </div>
		        </div>
		        <div id="chart_visitas" class="card-rounded-bottom" data-color="primary" style="height: 200px; min-height: 200px;">
		    	</div>
		    	<div class="resize-triggers">
		    		<div class="expand-trigger">
		    			<div style="width: 414px; height: 258px;"></div>
		    		</div>
		    		<div class="contract-trigger"></div>
		    	</div>
		    </div>
		</div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
jQuery(document).ready(function() {
	var ganancias = {!! json_encode($estadisticas['chartganancias']['ganancias']) !!};
	var ganancias_dia = {!! json_encode($estadisticas['chartganancias']['dia']) !!};
	var max = {!! json_encode($estadisticas['max']) !!};
	var element = document.getElementById("chart_ganancias");
	var height = parseInt(KTUtil.css(element, 'height'));
	var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'primary';
	if (!element) {
		return;
	}
	var options = {
		series: [{
			name: 'Ganancias',
                data: ganancias
            }],
		chart: {
			type: 'area',
			height: height,
			toolbar: {
				show: false
			},
			zoom: {
				enabled: false
			},
			sparkline: {
				enabled: true
			}
		},
		plotOptions: {},
		legend: {
			show: false
		},
		dataLabels: {
			enabled: true,
		},
		fill: {
			type: 'solid',
			opacity: 1
		},
		stroke: {
			curve: 'smooth',
			show: true,
			width: 3,
			colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
		},
		xaxis: {
			categories: ganancias_dia,
			axisBorder: {
				show: false,
			},
			axisTicks: {
				show: false
			},
			labels: {
				show: false,
				style: {
					colors: KTApp.getSettings()['colors']['gray']['gray-500'],
					fontSize: '12px',
					fontFamily: KTApp.getSettings()['font-family']
				}
			},
			crosshairs: {
				show: false,
				position: 'front',
				stroke: {
					color: KTApp.getSettings()['colors']['gray']['gray-300'],
					width: 1,
					dashArray: 3
				}
			},
			tooltip: {
				enabled: false,
				formatter: undefined,
				offsetY: 0,
				style: {
					fontSize: '12px',
					fontFamily: KTApp.getSettings()['font-family']
				}
			}
		},
		yaxis: {
			min: 0,
			max: (max == 0 ? 1 : max),
			labels: {
				show: false,
				style: {
					colors: KTApp.getSettings()['colors']['gray']['gray-500'],
					fontSize: '12px',
					fontFamily: KTApp.getSettings()['font-family']
				}
			}
		},
		states: {
			normal: {
				filter: {
					type: 'none',
					value: 0
				}
			},
			hover: {
				filter: {
					type: 'none',
					value: 0
				}
			},
			active: {
				allowMultipleDataPointsSelection: false,
				filter: {
					type: 'none',
					value: 0
				}
			}
		},
		tooltip: {
			style: {
				fontSize: '12px',
				fontFamily: KTApp.getSettings()['font-family']
			},
			y: {
				formatter: function(val) {
					return "$" + val
				}
			}
		},
		colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
		markers: {
			colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
			strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
			strokeWidth: 3
		}
	};
	var chart = new ApexCharts(element, options);
	chart.render();

	var visitas = {!! json_encode($estadisticas['chartdias']['visitas']) !!};
	var visitas_dia = {!! json_encode($estadisticas['chartdias']['dia']) !!};
	var maxg = {!! json_encode($estadisticas['maxg']) !!};
	var element1 = document.getElementById("chart_visitas");
	if (!element1) {
		return;
	}
	var options1 = {
		series: [{
			name: 'Visitas',
                data: visitas
            }],
		chart: {
			type: 'area',
			height: height,
			toolbar: {
				show: false
			},
			zoom: {
				enabled: false
			},
			sparkline: {
				enabled: true
			}
		},
		plotOptions: {},
		legend: {
			show: false
		},
		dataLabels: {
			enabled: true,
		},
		fill: {
			type: 'solid',
			opacity: 1
		},
		stroke: {
			curve: 'smooth',
			show: true,
			width: 3,
			colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
		},
		xaxis: {
			categories: visitas_dia,
			axisBorder: {
				show: false,
			},
			axisTicks: {
				show: false
			},
			labels: {
				show: false,
				style: {
					colors: KTApp.getSettings()['colors']['gray']['gray-500'],
					fontSize: '12px',
					fontFamily: KTApp.getSettings()['font-family']
				}
			},
			crosshairs: {
				show: false,
				position: 'front',
				stroke: {
					color: KTApp.getSettings()['colors']['gray']['gray-300'],
					width: 1,
					dashArray: 3
				}
			},
			tooltip: {
				enabled: false,
				formatter: undefined,
				offsetY: 0,
				style: {
					fontSize: '12px',
					fontFamily: KTApp.getSettings()['font-family']
				}
			}
		},
		yaxis: {
			min: 0,
			max: (maxg == 0 ? 1 : maxg),
			labels: {
				show: false,
				style: {
					colors: KTApp.getSettings()['colors']['gray']['gray-500'],
					fontSize: '12px',
					fontFamily: KTApp.getSettings()['font-family']
				}
			}
		},
		states: {
			normal: {
				filter: {
					type: 'none',
					value: 0
				}
			},
			hover: {
				filter: {
					type: 'none',
					value: 0
				}
			},
			active: {
				allowMultipleDataPointsSelection: false,
				filter: {
					type: 'none',
					value: 0
				}
			}
		},
		tooltip: {
			style: {
				fontSize: '12px',
				fontFamily: KTApp.getSettings()['font-family']
			},
			y: {
				formatter: function(val) {
					return "$" + val
				}
			}
		},
		colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
		markers: {
			colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
			strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
			strokeWidth: 3
		}
	};
	var chart1 = new ApexCharts(element1, options1);
	chart1.render();
});
</script>
@endsection
@section('pagina')
Dashboard
@endsection