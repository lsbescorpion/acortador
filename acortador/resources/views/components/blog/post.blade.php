<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{$blog->titulo}}
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta property="og:title" content="{{$blog->titulo}}" />
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="{{asset('blog/categoria/').$blog->categoria->categoria.'/'.$blog->slug}}" />
  <meta property="og:image" content="{{asset('').'systemblog/'.$blog->foto}}" />
  <meta property="og:description" content="{{substr($blog->bloque_plano, 0, 100)}}..." />
  <meta property="og:site_name" content="Acortador" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('assets/css/material-kit.min.css?v=2.2.0')}}" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
	@include('components.partials.navbar')
	<div class="page-header header-filter" data-parallax="true" style="background-image: url(&quot;{{asset('').'systemblog/'.$blog->foto}}&quot;);">
	    <div class="container">
		    <div class="row">
		        <div class="col-md-10 ml-auto mr-auto text-center">
		          	<h1 class="title">{{$blog->titulo}}</h1>
		        </div>
	    	</div>
	    </div>
	</div>
	<div class="main main-raised">
    	<div class="container">
      		<div class="section section-text">
        		<div class="row">
          			<div class="col-md-8 ml-auto mr-auto">
          				<h3 class="title">{{$blog->titulo}}</h3>
          				{!! $blog->bloque1 !!}
          				{!! $blog->bloque2 !!}
          				@if($blog->video != null && $blog->video != '')
          				@php $video = strpos($blog->video, 'v='); @endphp
          				@if(is_numeric($video))
          				@php $fin = substr($blog->video, $video + 2); @endphp
          				@php $applen = strrpos($fin, "&"); @endphp
          				@if(is_numeric($applen))
          				@php 
          					$cant = explode("&", $fin);
          					$fin = $cant[0];
          				@endphp
          				@endif
						<iframe src="https://www.youtube.com/embed/{{$fin}}" width="100%" height="350" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						@endif
          				@endif
          			</div>
          		</div>
          	</div>
        </div>
    </div>
    <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="title text-center">Historias Similares</h2>
          <br>
          <div class="row">
          	@foreach($categorias as $cat)
            <div class="col-md-4">
              <div class="card card-blog">
                <div class="card-header card-header-image">
                  <a href="{{route('getBlog', ['categoria' => $cat->categoria->categoria, 'id' => $cat->slug])}}">
                    <img class="img img-raised" src="{{asset('').'systemblog/'.$cat->foto}}">
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="category text-info">{{$cat->categoria->categori}}</h6>
                  <h4 class="card-title">
                    <a href="{{route('getBlog', ['categoria' => $cat->categoria->categoria, 'id' => $cat->slug])}}">{{$cat->titulo}}</a>
                  </h4>
                  <p class="card-description">
                    {{substr($cat->bloque_plano, 0, 100)}}...<a href="{{route('getBlog', ['categoria' => $cat->categoria->categoria, 'id' => $cat->slug])}}"> Continuar </a>
                  </p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
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
</body>

</html>