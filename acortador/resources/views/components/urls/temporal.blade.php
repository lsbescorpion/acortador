<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Temporal
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="canonical" href="">
  <meta property="og:url" content="{{$url->url_real}}">
  <meta property="og:locale" content="es_ES" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="{{$url->titulo}}" />
  <meta property="og:description" content="{{$url->descripcion}}" />
  <meta property="og:image" content="{{$url->foto_real}}" />
  <meta property="og:image:width" content="740" />
  <meta property="og:image:height" content="370" />
  <meta name="title" content="{{$url->titulo}}" />
  <meta name="description" content="{{$url->descripcion}}" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('assets/css/material-kit.min.css?v=2.2.0')}}" rel="stylesheet" />
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-169044892-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-169044892-1');
  </script>
</head>

<body class="signup-page sidebar-collapse">
    @include('components.partials.navbar')
    <div class="page-header header-filter" filter-color="purple" style="background-size: cover; background-position: top center;">
        <div class="container" style="margin-top: -50px;">
            <div class="row">
                <div class="col-md-12 ml-auto mr-auto">
                    <div class="card card-signup">
                        <div class="card-body">
                            <div class="col-md-12 mb-2" id="M656852ScriptRootC1131960">
                            </div>
                            <script src="https://jsc.mgid.com/e/l/elchago.com.1131960.js" async></script>
                            <div class="col-md-12 mb-3" id="adsense1">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <!-- arriba -->
                                <ins class="adsbygoogle"
                                   style="display:inline-block;width:300px;height:250px"
                                   data-ad-client="ca-pub-1646364465251426"
                                   data-ad-slot="8465768443"></ins>
                                <script>
                                     (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-md-7">
                                        <img src="{{$url->foto_real}}" alt="Image" class="img-raised rounded img-fluid">
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card-title text-left mb-2">{{$url->descripcion}}</div>
                                        <div id="clock" class="card-title text-center mb-2">
                                            <a href="#" id="btn-submit" class="btn btn-primary card-title"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="adsense2">
                              <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- abajo -->
                              <ins class="adsbygoogle"
                                   style="display:inline-block;width:300px;height:250px"
                                   data-ad-client="ca-pub-1646364465251426"
                                   data-ad-slot="7891053370"></ins>
                              <script>
                                   (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>
                            </div>
                            <div class="col-md-12 mb-2" id="M656852ScriptRootC1095691">
                            </div>
                            <script src="https://jsc.mgid.com/e/l/elchago.com.1095691.js" async></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="redirect"></div>
    <script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
      <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
      <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{asset('assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
      <!--  Google Maps Plugin    -->
      <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/material-kit.min.js?v=2.2.0')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.countdown.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function()
    {
        var fiveSeconds = new Date().getTime() + 15000;
        var url = {!! json_encode($url) !!};
        $('#clock').countdown(fiveSeconds, function(event) {
            $('#btn-submit').text("Generando enlace, espere "+event.strftime('%S')+" segundos");
            $('#btn-submit').attr('disabled', true);
        }).on('finish.countdown', function(event) {
            $('#btn-submit').text("Ir a la Noticia");
            $('#btn-submit').attr('disabled', false);
            $('#btn-submit').attr('href', url.url_real);
        });
        var minuto = new Date().getTime() + 90000;
        $('#redirect').countdown(minuto, function(event) {
        }).on('finish.countdown', function(event) {
            window.location = url.url_real;
        });
    });
    </script>
</body>

</html>

