@extends('app')

@section('content')
<div class="row">
	<div class="col-xl-2">
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
		        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{$estadisticas['vmensual']}}</span>
		        <div class="row justify-content-between">
		        	<span class="font-weight-bold text-muted font-size-lg">Visitas Mes</span>
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
    <div class="col-xl-2">
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
		        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{$estadisticas['vdiarias']}}</span>
		        <div class="row justify-content-between">
		        	<span class="font-weight-bold text-muted font-size-lg">Visitas Día</span>
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
    <div class="col-xl-2">
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
		        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{$estadisticas['gmensual']}}</span>
		        <div class="row justify-content-between">
		        	<span class="font-weight-bold text-muted font-size-lg">Ganancias Mes</span>
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
    <div class="col-xl-2">
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
		        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{$estadisticas['gdiarias']}}</span>
		        <div class="row justify-content-between">
		        	<span class="font-weight-bold text-muted font-size-lg">Ganancias Día</span>
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
    <div class="col-xl-2">
		<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('board/media/svg/shapes/abstract-4.svg')}})">
		    <div class="card-body">
		    	<span class="symbol  symbol-50 symbol-light-primary mr-2">
                	<span class="symbol-label">
				        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-line1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
						        <path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
						    </g>
						</svg><!--end::Svg Icon--></span>
					</span>
				</span>
		        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{$estadisticas['cpm']->cpm}}</span>
		        <div class="row justify-content-between">
		        	<span class="font-weight-bold text-muted font-size-lg">RPM en el Día</span>
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
    <div class="col-xl-2">
		<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('board/media/svg/shapes/abstract-4.svg')}})">
		    <div class="card-body">
		    	<span class="symbol  symbol-50 symbol-light-primary mr-2">
                	<span class="symbol-label">
				        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-line1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
						        <path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
						    </g>
						</svg><!--end::Svg Icon--></span>
					</span>
				</span>
		        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{$estadisticas['cpm']->cpm}}</span>
		        <div class="row justify-content-between">
		        	<span class="font-weight-bold text-muted font-size-lg">RPM en el Día</span>
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
		                <span class="text-dark-75 font-weight-bolder font-size-h3">{{$estadisticas['vmensual']}}</span>
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
<div class="card card-custom mb-10">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">
				Listado de usuarios
				<span class="d-block text-muted pt-2 font-size-sm">Listado de usuarios por ganancias en el mes</span>
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
						<th>Correo</th>
						<th>Perfil_FB</th>
						<th>Rol</th>
						<th>Activo</th>
						<th>Ganancias_Brutas</th>
						<th>Pagar</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{$user->nombre_apellidos}},{{$user->correo}},{{$user->foto}}</td>
						<td>{{$user->correo}}</td>
						<td>{{$user->perfil_fb}}</td>
						<td>{{$user->roles[0]->name}}</td>
						<td>{{$user->activo}}</td>
						<td>{{$user->gan}}</td>
						<td>{{($user->gan == null || $user->gan == '' ? 0 : $user->gan)}},{{$user->roles[0]->name}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!--end: Datatable-->
	</div>
</div>
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">
				Listado de urls
				<span class="d-block text-muted pt-2 font-size-sm">Listado de url por ganancias generales</span>
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
								<input type="text" class="form-control" placeholder="Search..." id="search_query_url" />
								<span><i class="flaticon2-search-1 text-muted"></i></span>
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
			<table class="datatable table table-head-custom table-head-bg table-borderless table-vertical-center" id="datatable_url">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Acortada</th>
						<th>Real</th>
						<th>Usuario</th>
						<th>Visitas</th>
						<th>Ganancias</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($urls as $url)
					<tr>
						<td>{{$url->fecha}}</td>
						<td>{{$url->url_acortada}},{{$url->categoria->categoria}}</td>
						<td>{{$url->url_real}}</td>
						<td>{{$url->users->nombre_apellidos}}</td>
						<td>{{$url->visitas}}</td>
						<td>{{($url->gan == null || $url->gan == '' ? 0 : $url->gan)}}</td>
						<td>{{$url->id}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!--end: Datatable-->
	</div>
</div>
<form id="formdelete" action="{{action('UsersController@deleteUrl')}}" method="POST">
@csrf
<input type="hidden" name="url_id" id="url_id">
</form>
@include('components.user.sticky')
@endsection
@section('script')
<script type="text/javascript">
jQuery(document).ready(function() {
	var datatable_url = $('#datatable_url').KTDatatable({
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
			input: $('#search_query_url'),
			key: 'generalSearch'
		},
		columns: [
			{
				field: 'Fecha',
				title: 'Fecha',
                textAlign: 'left',
                autoHide: false,
                width: 120,
			},
			{
				field: 'Acortada',
				title: 'Acortada',
                textAlign: 'left',
                width: 300,
				template: function(row) {
					var arr = row.Acortada.split(',');
					return '/publica/' + arr[1] + '/' + arr[0];
				},
			},
			{
				field: 'Real',
                textAlign: 'left',
                width: 300,
			},
			{
				field: 'Usuario',
				title: 'Usuario',
                textAlign: 'left',
                width: 170,
			},
			{
				field: 'Visitas',
				title: 'Visitas',
                textAlign: 'left',
                width: 80,
			},
			{
				field: 'Ganancias',
				title: 'Ganancias',
				sortable: 'desc',
                textAlign: 'left',
                width: 100,
			},
			{
				field: 'Opciones',
                title: 'Opciones',
               	sortable: false,
               	textAlign: 'center',
               	width: 100,
               	template: function(row) {
	               		var acciones = '';
						acciones = acciones + '\
	                  	<a href="#" class="btn btn-icon btn-hover-primary btn-sm mr-3 delete-url" dato="'+row.Opciones+'" data-toogle="tooltip" title="Eliminar Url" data-original-title="Eliminar Url">\
		                    <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
							        <rect x="0" y="0" width="24" height="24"/>\
							        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
							        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
							    </g>\
							</svg>\
						</a>';
						return acciones;
               	},
           	}
		],
	});
	$(document).on('click', '.delete-url', function() {
		$('#url_id').val($(this).attr('dato'));
		$('#formdelete').submit();
	});
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
                width: 250,
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
				field: 'Correo',
				title: 'Correo',
				sortable: 'asc',
                textAlign: 'left',
                overflow: 'visible',
                width: 300,
			},
			{
				field: 'Perfil_FB',
				title: 'Perfil FB',
                textAlign: 'left',
                overflow: 'visible',
                width: 450,
				// callback function support for column rendering
				template: function(row) {
					return '<i class="socicon-facebook mr-3"></i>' + row.Perfil_FB;
				},
			},
			{
				field: 'Rol',
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
                textAlign: 'center',
                overflow: 'visible',
                width: 60,
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
				field: 'Ganancias_Brutas',
                title: 'Ganancias Brutas',
               	overflow: 'visible',
               	textAlign: 'left',
               	width: 160,
               	template: function(row) {
					return (row.Ganancias_Brutas == null || row.Ganancias_Brutas == '' ? 0 : row.Ganancias_Brutas);
				},
           	},
           	{
				field: 'Pagar',
                title: 'A Pagar',
               	sortable: false,
               	overflow: 'visible',
               	textAlign: 'left',
               	width: 50,
               	template: function(row) {
               		var arr = row.Pagar.split(',');
               		var gan = (arr[0] == null || arr[0] == '' ? 0 : arr[0]);
					return (arr[1] == 'Administrador' ? arr[0] : (arr[1] == 'Moderador' ? (arr[0]*60/100).toFixed(2) : (arr[0]*50/100).toFixed(2)));
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
Estadisticas Administrativas
@endsection