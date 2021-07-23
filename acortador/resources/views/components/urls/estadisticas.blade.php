@extends('app')

@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header h-auto border-0">
        <div class="card-title py-5">
            <h3 class="card-label">
                <span class="d-block text-dark font-weight-bolder">Estadísticas Url</span>
                <span class="d-block text-muted mt-2 font-size-sm">Visitas - Ganancias</span>
            </h3>
        </div>
        <div class="card-toolbar">
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 d-flex flex-column">
                <!--begin::Block-->
                <div class="bg-light-warning p-8 rounded-xl flex-grow-1">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <div class="symbol symbol-circle symbol-white symbol-30 flex-shrink-0 mr-3">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-md"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Dollar.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/>
                                        <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span></div>
                        </div>
                        <div>
                            <div class="font-size-sm font-weight-bold">$ {{$gtotal}}</div>
                            <div class="font-size-sm text-muted">Ganancias totales</div>
                        </div>
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <div class="symbol symbol-circle symbol-white symbol-30 flex-shrink-0 mr-3">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                                        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                    </g>
                                </svg><!--end::Svg Icon--></span></div>
                        </div>
                        <div>
                            <div class="font-size-sm font-weight-bold">{{$url->visitas}}</div>
                            <div class="font-size-sm text-muted">Visitas totales</div>
                        </div>
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <div class="symbol symbol-circle symbol-white symbol-30 flex-shrink-0 mr-3">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-md"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Timer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z" fill="#000000" opacity="0.3"></path>
                                        <path d="M13,5.06189375 C12.6724058,5.02104333 12.3386603,5 12,5 C11.6613397,5 11.3275942,5.02104333 11,5.06189375 L11,4 L10,4 C9.44771525,4 9,3.55228475 9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 C15,3.55228475 14.5522847,4 14,4 L13,4 L13,5.06189375 Z" fill="#000000"></path>
                                        <path d="M16.7099142,6.53272645 L17.5355339,5.70710678 C17.9260582,5.31658249 18.5592232,5.31658249 18.9497475,5.70710678 C19.3402718,6.09763107 19.3402718,6.73079605 18.9497475,7.12132034 L18.1671361,7.90393167 C17.7407802,7.38854954 17.251061,6.92750259 16.7099142,6.53272645 Z" fill="#000000"></path>
                                        <path d="M11.9630156,7.5 L12.0369844,7.5 C12.2982526,7.5 12.5154733,7.70115317 12.5355117,7.96165175 L12.9585886,13.4616518 C12.9797677,13.7369807 12.7737386,13.9773481 12.4984096,13.9985272 C12.4856504,13.9995087 12.4728582,14 12.4600614,14 L11.5399386,14 C11.2637963,14 11.0399386,13.7761424 11.0399386,13.5 C11.0399386,13.4872031 11.0404299,13.4744109 11.0414114,13.4616518 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"></path>
                                    </g>
                                </svg><!--end::Svg Icon--></span></div>
                        </div>
                        <div>
                            <div class="font-size-sm font-weight-bold">{{$url->fecha}}</div>
                            <div class="font-size-sm text-muted">Fecha acortada</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-5">
                        <div class="symbol symbol-circle symbol-white symbol-30 flex-shrink-0 mr-3">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-md"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span></div>
                        </div>
                        <div>
                            <div class="font-size-sm font-weight-bold">{{$url->categoria->categoria}}</div>
                            <div class="font-size-sm text-muted">Categoría</div>
                        </div>
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Block-->
            </div>
            <div class="col-md-5">
                <div id="chart_ganancias" class="card-rounded-bottom" data-color="primary" style="min-height: 200px;">
                </div>                
            </div>
            <div class="col-md-5">
                <div id="chart_visitas" class="card-rounded-bottom" data-color="primary" style="min-height: 200px;">
                </div>                
            </div>
        </div>
    </div>
    <!--end::Body-->
</div>
<div class="card">
    <!--begin::Header-->
    <div class="card-header h-auto border-0">
        <div class="card-title py-5">
            <h3 class="card-label">
                <span class="d-block text-dark font-weight-bolder">Estadísticas Url</span>
                <span class="d-block text-muted mt-2 font-size-sm">Visitas - Paises</span>
            </h3>
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body">
        <div class="col-md-8 ml-auto mr-auto mb-4 text-center">
            <div id="paises" style="min-height: 650px;"></div>
            <div class="row">
                <div class="col-md-6 text-left"><label>País</label></div>
                <div class="col-md-1 text-left"><label>Visitas</label></div>
                <div class="col-md-5 text-left"><label>Porciento</label></div>
            </div>
            <div class="row">
                @foreach($url->visitasp as $vp)
                <div class="col-md-6 text-left fla">
                    <span class="flag-icon flag-icon-{{strtoupper($vp->iso_2)}} flag-icon-squared mr-2"></span>{{$vp->nombre}}
                </div>
                <div class="col-md-1 text-left">{{$vp->visitasp}}</div>
                <div class="col-md-5 text-left" style="margin-top: 5px;">
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar progress-bar-danger align-middle" role="progressbar" style="width: {{round((($vp->visitasp * 100) / $url->visitas), 0).'%'}}">{{round((($vp->visitasp * 100) / $url->visitas), 0)}}%</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/d3.min.js') }}"></script>
<script src="{{ asset('js/topojson.min.js') }}"></script>
<script src="{{ asset('js/datamaps.all.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    var ganancias = {!! json_encode($chartganancias['ganancias']) !!};
    var ganancias_dia = {!! json_encode($chartganancias['dia']) !!};
    var max = {!! json_encode($maxg) !!};
    var element = document.getElementById("chart_ganancias");
    var visitas = {!! json_encode($chartdias['visitas']) !!};
    var visitas_dia = {!! json_encode($chartdias['dia']) !!};
    var max = {!! json_encode($max) !!};
    var elementd = document.getElementById("chart_visitas");
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

    if (!elementd) {
        return;
    }
    var optionsd = {
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
                    return val
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
    var chartd = new ApexCharts(elementd, optionsd);
    chartd.render();

    var series = [];
    var url = {!! json_encode($url) !!};
    for(var i = 0; i < url.visitasp.length; i++) {
        series.push([url.visitasp[i].iso_3, url.visitasp[i].visitasp]);
    };
    setTimeout(() => {
        var dataset = {};
        var onlyValues = series.map(function(obj){ return obj[1]; });
        var minValue = Math.min.apply(null, onlyValues),
            maxValue = Math.max.apply(null, onlyValues);
        var paletteScale = d3.scale.linear()
            .domain([minValue,maxValue])
            .range(["#EFEFFF","#02386F"]); // blue color
        series.forEach(function(item){ //
            var iso = item[0],
                value = item[1];
            dataset[iso] = { numberOfThings: value, fillColor: paletteScale(value) };
        });
        new Datamap({
            element: document.getElementById('paises'),
            projection: 'mercator', // big world map
            fills: { defaultFill: '#F5F5F5' },
            data: dataset,
            geographyConfig: {
                borderColor: '#DEDEDE',
                highlightBorderWidth: 2,
                highlightFillColor: function(geo) {
                    return geo['fillColor'] || '#F5F5F5';
                },
                highlightBorderColor: '#B7B7B7',
                popupTemplate: function(geo, data) {
                    if (!data) { return ; }
                    return ['<div class="hoverinfo">',
                        '<strong>', geo.properties.name, '</strong>',
                        '<br>Visitas: <strong>', data.numberOfThings, '</strong>',
                        '</div>'].join('');
                }
            }
        });
    }, 2000);
});
</script>
@endsection
@section('pagina')
Estadisticas de la Url
@endsection