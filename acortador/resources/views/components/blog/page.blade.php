@extends('welcome')
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 ml-auto mr-auto">
            <h2 class="title">Ultimas entradas</h2>
            @foreach($last3 as $last)
            <div class="card card-plain card-blog">
                <div class="row">
                  	<div class="col-md-4">
                    	<div class="card-header card-header-image">
                    		<a href="{{route('getBlog', ['categoria' => $last->categoria->categoria, 'id' => $last->slug])}}">
	                      		<img class="img img-raised" src="{{asset('').'systemblog/'.$last->foto}}">
	                    		<div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$last->foto}}&quot;); opacity: 1;"></div>
	                    	</a>
                		</div>
                  	</div>
                  	<div class="col-md-8">
                    	<h6 class="card-category text-info">{{$last->categoria->categoria}}</h6>
                    	<h3 class="card-title">
                      		<a href="{{route('getBlog', ['categoria' => $last->categoria->categoria, 'id' => $last->slug])}}" marked="1">{{$last->titulo}}</a>
                    	</h3>
                    	<p class="card-description">
                      		{{substr($last->bloque_plano, 0, 200)}}…
                      		<a href="{{route('getBlog', ['categoria' => $last->categoria->categoria, 'id' => $last->slug])}}" marked="1"> Continuar </a>
                    	</p>
                    	<p class="author">
                      		por
                      		<label marked="1">
                        		<b>{{$last->users->nombre_apellidos}}</b>
                      		</label>, {{\Carbon\Carbon::parse($last->fecha)->locale('es')->diffForHumans()}}
                    	</p>
                  	</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
	<div class="row">
		<div class="col-md-10 ml-auto mr-auto">
			<h2 class="title">Salud</h2>
			<div class="card card-plain card-blog">
				<div class="row">
					<div class="col-md-5">
	                    <div class="card-header card-header-image">
	                      	<a href="{{route('getBlog', ['categoria' => $salud[0]->categoria->categoria, 'id' => $salud[0]->slug])}}" marked="1">
	                        	<img class="img" src="{{asset('').'systemblog/'.$salud[0]->foto}}">
	                      	</a>
	                    <div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$salud[0]->foto}}&quot;); opacity: 1;"></div></div>
	                </div>
	                <div class="col-md-7">
	                    <h6 class="card-category text-info">{{$salud[0]->categoria->categoria}}</h6>
	                    <h3 class="card-title">
	                      	<a href="{{route('getBlog', ['categoria' => $salud[0]->categoria->categoria, 'id' => $salud[0]->slug])}}" marked="1">{{$salud[0]->titulo}}</a>
	                    </h3>
	                    <p class="card-description">
	                      	{{substr($salud[0]->bloque_plano, 0, 200)}}…
	                      	<a href="{{route('getBlog', ['categoria' => $salud[0]->categoria->categoria, 'id' => $salud[0]->slug])}}" marked="1"> Continuar </a>
	                    </p>
	                    <p class="author">
	                      	por
	                      	<span marked="1">
	                        	<b>{{$salud[0]->users->nombre_apellidos}}</b>
	                      	</span>, {{\Carbon\Carbon::parse($salud[0]->fecha)->locale('es')->diffForHumans()}}
	                    </p>
	                </div>
	            </div>
	        </div>
	        <div class="card card-plain card-blog">
	            <div class="row">
	                <div class="col-md-7">
	                    <h6 class="card-category text-info">
	                      	{{$salud[1]->categoria->categoria}}
	                    </h6>
	                    <h3 class="card-title">
	                      	<a href="{{route('getBlog', ['categoria' => $salud[1]->categoria->categoria, 'id' => $salud[1]->slug])}}" marked="1">{{$salud[1]->titulo}}</a>
	                    </h3>
	                    <p class="card-description">
	                      	{{substr($salud[1]->bloque_plano, 0, 200)}}…
	                      	<a href="{{route('getBlog', ['categoria' => $salud[1]->categoria->categoria, 'id' => $salud[1]->slug])}}" marked="1"> Continuar </a>
	                    </p>
	                    <p class="author">
	                      	por
	                      	<span marked="1">
	                        	<b>{{$salud[1]->users->nombre_apellidos}}</b>
	                      	</span>, {{\Carbon\Carbon::parse($salud[1]->fecha)->locale('es')->diffForHumans()}}
	                    </p>
	                </div>
	                <div class="col-md-5">
	                    <div class="card-header card-header-image">
	                    	<a href="{{route('getBlog', ['categoria' => $salud[1]->categoria->categoria, 'id' => $salud[1]->slug])}}">
	                      	<img class="img img-raised" src="{{asset('').'systemblog/'.$salud[1]->foto}}">
	                    	<div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$salud[1]->foto}}&quot;); opacity: 1;"></div>
	                    	</a>
	                	</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-10 ml-auto mr-auto">
	        <div class="row">
	        	@for($i = 2; $i < count($salud); $i++)
	            <div class="col-md-4">
	                <div class="card card-plain card-blog">
	                    <div class="card-header card-header-image">
	                      	<a href="{{route('getBlog', ['categoria' => $salud[$i]->categoria->categoria, 'id' => $salud[$i]->slug])}}" marked="1">
	                        	<img class="img img-raised" src="{{asset('').'systemblog/'.$salud[$i]->foto}}">
	                      	</a>
	                    	<div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$salud[$i]->foto}}&quot;); opacity: 1;"></div>
	                	</div>
	                    <div class="card-body">
	                      	<h6 class="card-category text-info">{{$salud[$i]->categoria->categoria}}</h6>
	                      	<h4 class="card-title">
	                        	<a href="{{route('getBlog', ['categoria' => $salud[$i]->categoria->categoria, 'id' => $salud[$i]->slug])}}" marked="1">{{$salud[$i]->titulo}}</a>
	                      	</h4>
	                      	<p class="card-description">
	                        	{{substr($salud[$i]->bloque_plano, 0, 200)}}…
	                        	<a href="{{route('getBlog', ['categoria' => $salud[$i]->categoria->categoria, 'id' => $salud[$i]->slug])}}" marked="1"> Continuar </a>
	                      	</p>
	                      	<p class="author">
		                      	por
		                      	<span marked="1">
		                        	<b>{{$salud[$i]->users->nombre_apellidos}}</b>
		                      	</span>
		                    </p>
	                    </div>
	                </div>
	            </div>
	            @endfor
	        </div>
	    </div>
	</div>

	<div class="row">
		<div class="col-md-10 ml-auto mr-auto">
			<h2 class="title">Curiosidades</h2>
			<div class="card card-plain card-blog">
				<div class="row">
					<div class="col-md-5">
	                    <div class="card-header card-header-image">
	                      	<a href="{{route('getBlog', ['categoria' => $curiosidades[0]->categoria->categoria, 'id' => $curiosidades[0]->slug])}}" marked="1">
	                        	<img class="img" src="{{asset('').'systemblog/'.$curiosidades[0]->foto}}">
	                      	</a>
	                    <div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$curiosidades[0]->foto}}&quot;); opacity: 1;"></div></div>
	                </div>
	                <div class="col-md-7">
	                    <h6 class="card-category text-info">{{$curiosidades[0]->categoria->categoria}}</h6>
	                    <h3 class="card-title">
	                      	<a href="{{route('getBlog', ['categoria' => $curiosidades[0]->categoria->categoria, 'id' => $curiosidades[0]->slug])}}" marked="1">{{$curiosidades[0]->titulo}}</a>
	                    </h3>
	                    <p class="card-description">
	                      	{{substr($curiosidades[0]->bloque_plano, 0, 200)}}…
	                      	<a href="{{route('getBlog', ['categoria' => $curiosidades[0]->categoria->categoria, 'id' => $curiosidades[0]->slug])}}" marked="1"> Continuar </a>
	                    </p>
	                    <p class="author">
	                      	por
	                      	<span marked="1">
	                        	<b>{{$curiosidades[0]->users->nombre_apellidos}}</b>
	                      	</span>, {{\Carbon\Carbon::parse($curiosidades[0]->fecha)->locale('es')->diffForHumans()}}
	                    </p>
	                </div>
	            </div>
	        </div>
	        <div class="card card-plain card-blog">
	            <div class="row">
	                <div class="col-md-7">
	                    <h6 class="card-category text-info">
	                      	{{$curiosidades[1]->categoria->categoria}}
	                    </h6>
	                    <h3 class="card-title">
	                      	<a href="{{route('getBlog', ['categoria' => $curiosidades[1]->categoria->categoria, 'id' => $curiosidades[1]->slug])}}" marked="1">{{$curiosidades[1]->titulo}}</a>
	                    </h3>
	                    <p class="card-description">
	                      	{{substr($curiosidades[1]->bloque_plano, 0, 200)}}…
	                      	<a href="{{route('getBlog', ['categoria' => $curiosidades[1]->categoria->categoria, 'id' => $curiosidades[1]->slug])}}" marked="1"> Continuar </a>
	                    </p>
	                    <p class="author">
	                      	por
	                      	<span marked="1">
	                        	<b>{{$curiosidades[1]->users->nombre_apellidos}}</b>
	                      	</span>, {{\Carbon\Carbon::parse($curiosidades[1]->fecha)->locale('es')->diffForHumans()}}
	                    </p>
	                </div>
	                <div class="col-md-5">
	                    <div class="card-header card-header-image">
	                    	<a href="{{route('getBlog', ['categoria' => $curiosidades[1]->categoria->categoria, 'id' => $curiosidades[1]->slug])}}">
	                      		<img class="img img-raised" src="{{asset('').'systemblog/'.$curiosidades[1]->foto}}">
	                    		<div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$curiosidades[1]->foto}}&quot;); opacity: 1;"></div>
	                		</a>
	                	</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-10 ml-auto mr-auto">
	        <div class="row">
	        	@for($i = 2; $i < count($curiosidades); $i++)
	            <div class="col-md-4">
	                <div class="card card-plain card-blog">
	                    <div class="card-header card-header-image">
	                      	<a href="{{route('getBlog', ['categoria' => $curiosidades[$i]->categoria->categoria, 'id' => $curiosidades[$i]->slug])}}" marked="1">
	                        	<img class="img img-raised" src="{{asset('').'systemblog/'.$curiosidades[$i]->foto}}">
	                      	</a>
	                    	<div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$curiosidades[$i]->foto}}&quot;); opacity: 1;"></div>
	                	</div>
	                    <div class="card-body">
	                      	<h6 class="card-category text-info">{{$curiosidades[$i]->categoria->categoria}}</h6>
	                      	<h4 class="card-title">
	                        	<a href="{{route('getBlog', ['categoria' => $curiosidades[$i]->categoria->categoria, 'id' => $curiosidades[$i]->slug])}}" marked="1">{{$curiosidades[$i]->titulo}}</a>
	                      	</h4>
	                      	<p class="card-description">
	                        	{{substr($curiosidades[$i]->bloque_plano, 0, 200)}}…
	                        	<a href="{{route('getBlog', ['categoria' => $curiosidades[$i]->categoria->categoria, 'id' => $curiosidades[$i]->slug])}}" marked="1"> Continuar </a>
	                      	</p>
	                      	<p class="author">
		                      	por
		                      	<span marked="1">
		                        	<b>{{$curiosidades[$i]->users->nombre_apellidos}}</b>
		                      	</span>
		                    </p>
	                    </div>
	                </div>
	            </div>
	            @endfor
	        </div>
	    </div>
	</div>

	<div class="row">
		<div class="col-md-10 ml-auto mr-auto">
			<h2 class="title">Manualidades</h2>
			<div class="card card-plain card-blog">
				<div class="row">
					<div class="col-md-5">
	                    <div class="card-header card-header-image">
	                      	<a href="{{route('getBlog', ['categoria' => $manuales[0]->categoria->categoria, 'id' => $manuales[0]->slug])}}" marked="1">
	                        	<img class="img" src="{{asset('').'systemblog/'.$manuales[0]->foto}}">
	                      	</a>
	                    <div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$manuales[0]->foto}}&quot;); opacity: 1;"></div></div>
	                </div>
	                <div class="col-md-7">
	                    <h6 class="card-category text-info">{{$manuales[0]->categoria->categoria}}</h6>
	                    <h3 class="card-title">
	                      	<a href="{{route('getBlog', ['categoria' => $manuales[0]->categoria->categoria, 'id' => $manuales[0]->slug])}}" marked="1">{{$manuales[0]->titulo}}</a>
	                    </h3>
	                    <p class="card-description">
	                      	{{substr($manuales[0]->bloque_plano, 0, 200)}}…
	                      	<a href="{{route('getBlog', ['categoria' => $manuales[0]->categoria->categoria, 'id' => $manuales[0]->slug])}}" marked="1"> Continuar </a>
	                    </p>
	                    <p class="author">
	                      	por
	                      	<span marked="1">
	                        	<b>{{$manuales[0]->users->nombre_apellidos}}</b>
	                      	</span>, {{\Carbon\Carbon::parse($manuales[0]->fecha)->locale('es')->diffForHumans()}}
	                    </p>
	                </div>
	            </div>
	        </div>
	        <div class="card card-plain card-blog">
	            <div class="row">
	                <div class="col-md-7">
	                    <h6 class="card-category text-info">
	                      	{{$manuales[1]->categoria->categoria}}
	                    </h6>
	                    <h3 class="card-title">
	                      	<a href="{{route('getBlog', ['categoria' => $manuales[1]->categoria->categoria, 'id' => $manuales[1]->slug])}}" marked="1">{{$manuales[1]->titulo}}</a>
	                    </h3>
	                    <p class="card-description">
	                      	{{substr($manuales[1]->bloque_plano, 0, 200)}}…
	                      	<a href="{{route('getBlog', ['categoria' => $manuales[1]->categoria->categoria, 'id' => $manuales[1]->slug])}}" marked="1"> Continuar </a>
	                    </p>
	                    <p class="author">
	                      	por
	                      	<span marked="1">
	                        	<b>{{$manuales[1]->users->nombre_apellidos}}</b>
	                      	</span>, {{\Carbon\Carbon::parse($manuales[1]->fecha)->locale('es')->diffForHumans()}}
	                    </p>
	                </div>
	                <div class="col-md-5">
	                    <div class="card-header card-header-image">
	                    	<a href="{{route('getBlog', ['categoria' => $manuales[1]->categoria->categoria, 'id' => $manuales[1]->slug])}}">
	                      	<img class="img img-raised" src="{{asset('').'systemblog/'.$manuales[1]->foto}}">
	                    <div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$manuales[1]->foto}}&quot;); opacity: 1;"></div></a></div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-10 ml-auto mr-auto">
	        <div class="row">
	        	@for($i = 2; $i < count($manuales); $i++)
	            <div class="col-md-4">
	                <div class="card card-plain card-blog">
	                    <div class="card-header card-header-image">
	                      	<a href="{{route('getBlog', ['categoria' => $manuales[$i]->categoria->categoria, 'id' => $manuales[$i]->slug])}}" marked="1">
	                        	<img class="img img-raised" src="{{asset('').'systemblog/'.$manuales[$i]->foto}}">
	                      	</a>
	                    	<div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$manuales[$i]->foto}}&quot;); opacity: 1;"></div>
	                	</div>
	                    <div class="card-body">
	                      	<h6 class="card-category text-info">{{$manuales[$i]->categoria->categoria}}</h6>
	                      	<h4 class="card-title">
	                        	<a href="{{route('getBlog', ['categoria' => $manuales[$i]->categoria->categoria, 'id' => $manuales[$i]->slug])}}" marked="1">{{$manuales[$i]->titulo}}</a>
	                      	</h4>
	                      	<p class="card-description">
	                        	{{substr($manuales[$i]->bloque_plano, 0, 200)}}…
	                        	<a href="{{route('getBlog', ['categoria' => $manuales[$i]->categoria->categoria, 'id' => $manuales[$i]->slug])}}" marked="1"> Continuar </a>
	                      	</p>
	                      	<p class="author">
		                      	por
		                      	<span marked="1">
		                        	<b>{{$manuales[$i]->users->nombre_apellidos}}</b>
		                      	</span>
		                    </p>
	                    </div>
	                </div>
	            </div>
	            @endfor
	        </div>
	    </div>
	</div>

	<div class="row">
		<div class="col-md-10 ml-auto mr-auto">
			<h2 class="title">Entretenimientos</h2>
			<div class="card card-plain card-blog">
				<div class="row">
					<div class="col-md-5">
	                    <div class="card-header card-header-image">
	                      	<a href="{{route('getBlog', ['categoria' => $entres[0]->categoria->categoria, 'id' => $entres[0]->slug])}}" marked="1">
	                        	<img class="img" src="{{asset('').'systemblog/'.$entres[0]->foto}}">
	                      	</a>
	                    <div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$entres[0]->foto}}&quot;); opacity: 1;"></div></div>
	                </div>
	                <div class="col-md-7">
	                    <h6 class="card-category text-info">{{$entres[0]->categoria->categoria}}</h6>
	                    <h3 class="card-title">
	                      	<a href="{{route('getBlog', ['categoria' => $entres[0]->categoria->categoria, 'id' => $entres[0]->slug])}}" marked="1">{{$entres[0]->titulo}}</a>
	                    </h3>
	                    <p class="card-description">
	                      	{{substr($entres[0]->bloque_plano, 0, 200)}}…
	                      	<a href="{{route('getBlog', ['categoria' => $entres[0]->categoria->categoria, 'id' => $entres[0]->slug])}}" marked="1"> Continuar </a>
	                    </p>
	                    <p class="author">
	                      	por
	                      	<span marked="1">
	                        	<b>{{$entres[0]->users->nombre_apellidos}}</b>
	                      	</span>, {{\Carbon\Carbon::parse($entres[0]->fecha)->locale('es')->diffForHumans()}}
	                    </p>
	                </div>
	            </div>
	        </div>
	        <div class="card card-plain card-blog">
	            <div class="row">
	                <div class="col-md-7">
	                    <h6 class="card-category text-info">
	                      	{{$entres[1]->categoria->categoria}}
	                    </h6>
	                    <h3 class="card-title">
	                      	<a href="{{route('getBlog', ['categoria' => $entres[1]->categoria->categoria, 'id' => $entres[1]->slug])}}" marked="1">{{$entres[1]->titulo}}</a>
	                    </h3>
	                    <p class="card-description">
	                      	{{substr($entres[1]->bloque_plano, 0, 200)}}…
	                      	<a href="{{route('getBlog', ['categoria' => $entres[1]->categoria->categoria, 'id' => $entres[1]->slug])}}" marked="1"> Continuar </a>
	                    </p>
	                    <p class="author">
	                      	por
	                      	<span marked="1">
	                        	<b>{{$entres[1]->users->nombre_apellidos}}</b>
	                      	</span>, {{\Carbon\Carbon::parse($entres[1]->fecha)->locale('es')->diffForHumans()}}
	                    </p>
	                </div>
	                <div class="col-md-5">
	                    <div class="card-header card-header-image"><a href="{{route('getBlog', ['categoria' => $entres[1]->categoria->categoria, 'id' => $entres[1]->slug])}}">
	                      	<img class="img img-raised" src="{{asset('').'systemblog/'.$entres[1]->foto}}">
	                    <div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$entres[1]->foto}}&quot;); opacity: 1;"></div></a></div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-10 ml-auto mr-auto">
	        <div class="row">
	        	@for($i = 2; $i < count($entres); $i++)
	            <div class="col-md-4">
	                <div class="card card-plain card-blog">
	                    <div class="card-header card-header-image">
	                      	<a href="{{route('getBlog', ['categoria' => $entres[$i]->categoria->categoria, 'id' => $entres[$i]->slug])}}" marked="1">
	                        	<img class="img img-raised" src="{{asset('').'systemblog/'.$entres[$i]->foto}}">
	                      	</a>
	                    	<div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$entres[$i]->foto}}&quot;); opacity: 1;"></div>
	                	</div>
	                    <div class="card-body">
	                      	<h6 class="card-category text-info">{{$entres[$i]->categoria->categoria}}</h6>
	                      	<h4 class="card-title">
	                        	<a href="{{route('getBlog', ['categoria' => $entres[$i]->categoria->categoria, 'id' => $entres[$i]->slug])}}" marked="1">{{$entres[$i]->titulo}}</a>
	                      	</h4>
	                      	<p class="card-description">
	                        	{{substr($entres[$i]->bloque_plano, 0, 200)}}…
	                        	<a href="{{route('getBlog', ['categoria' => $entres[$i]->categoria->categoria, 'id' => $entres[$i]->slug])}}" marked="1"> Continuar </a>
	                      	</p>
	                      	<p class="author">
		                      	por
		                      	<span marked="1">
		                        	<b>{{$entres[$i]->users->nombre_apellidos}}</b>
		                      	</span>
		                    </p>
	                    </div>
	                </div>
	            </div>
	            @endfor
	        </div>
	    </div>
	</div>

	<div class="row">
		<div class="col-md-10 ml-auto mr-auto">
			<h2 class="title">Videos</h2>
			<div class="card card-plain card-blog">
				<div class="row">
					<div class="col-md-5">
	                    <div class="card-header card-header-image">
	                      	<a href="{{route('getBlog', ['categoria' => $videos[0]->categoria->categoria, 'id' => $videos[0]->slug])}}" marked="1">
	                        	<img class="img" src="{{asset('').'systemblog/'.$videos[0]->foto}}">
	                      	</a>
	                    <div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$videos[0]->foto}}&quot;); opacity: 1;"></div></div>
	                </div>
	                <div class="col-md-7">
	                    <h6 class="card-category text-info">{{$videos[0]->categoria->categoria}}</h6>
	                    <h3 class="card-title">
	                      	<a href="{{route('getBlog', ['categoria' => $videos[0]->categoria->categoria, 'id' => $videos[0]->slug])}}" marked="1">{{$videos[0]->titulo}}</a>
	                    </h3>
	                    <p class="card-description">
	                      	{{substr($videos[0]->bloque_plano, 0, 200)}}…
	                      	<a href="{{route('getBlog', ['categoria' => $videos[0]->categoria->categoria, 'id' => $videos[0]->slug])}}" marked="1"> Continuar </a>
	                    </p>
	                    <p class="author">
	                      	por
	                      	<span marked="1">
	                        	<b>{{$videos[0]->users->nombre_apellidos}}</b>
	                      	</span>, {{\Carbon\Carbon::parse($videos[0]->fecha)->locale('es')->diffForHumans()}}
	                    </p>
	                </div>
	            </div>
	        </div>
	        <div class="card card-plain card-blog">
	            <div class="row">
	                <div class="col-md-7">
	                    <h6 class="card-category text-info">
	                      	{{$videos[1]->categoria->categoria}}
	                    </h6>
	                    <h3 class="card-title">
	                      	<a href="{{route('getBlog', ['categoria' => $videos[1]->categoria->categoria, 'id' => $videos[1]->slug])}}" marked="1">{{$videos[1]->titulo}}</a>
	                    </h3>
	                    <p class="card-description">
	                      	{{substr($videos[1]->bloque_plano, 0, 200)}}…
	                      	<a href="{{route('getBlog', ['categoria' => $videos[1]->categoria->categoria, 'id' => $videos[1]->slug])}}" marked="1"> Continuar </a>
	                    </p>
	                    <p class="author">
	                      	por
	                      	<span marked="1">
	                        	<b>{{$videos[1]->users->nombre_apellidos}}</b>
	                      	</span>, {{\Carbon\Carbon::parse($videos[1]->fecha)->locale('es')->diffForHumans()}}
	                    </p>
	                </div>
	                <div class="col-md-5">
	                    <div class="card-header card-header-image">
	                    	<a href="{{route('getBlog', ['categoria' => $videos[1]->categoria->categoria, 'id' => $videos[1]->slug])}}">
	                      	<img class="img img-raised" src="{{asset('').'systemblog/'.$videos[1]->foto}}">
	                    <div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$videos[1]->foto}}&quot;); opacity: 1;"></div></a></div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-10 ml-auto mr-auto">
	        <div class="row">
	        	@for($i = 2; $i < count($videos); $i++)
	            <div class="col-md-4">
	                <div class="card card-plain card-blog">
	                    <div class="card-header card-header-image">
	                      	<a href="{{route('getBlog', ['categoria' => $videos[$i]->categoria->categoria, 'id' => $videos[$i]->slug])}}" marked="1">
	                        	<img class="img img-raised" src="{{asset('').'systemblog/'.$videos[$i]->foto}}">
	                      	</a>
	                    	<div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$videos[$i]->foto}}&quot;); opacity: 1;"></div>
	                	</div>
	                    <div class="card-body">
	                      	<h6 class="card-category text-info">{{$videos[$i]->categoria->categoria}}</h6>
	                      	<h4 class="card-title">
	                        	<a href="{{route('getBlog', ['categoria' => $videos[$i]->categoria->categoria, 'id' => $videos[$i]->slug])}}" marked="1">{{$videos[$i]->titulo}}</a>
	                      	</h4>
	                      	<p class="card-description">
	                        	{{substr($videos[$i]->bloque_plano, 0, 200)}}…
	                        	<a href="{{route('getBlog', ['categoria' => $videos[$i]->categoria->categoria, 'id' => $videos[$i]->slug])}}" marked="1"> Continuar </a>
	                      	</p>
	                      	<p class="author">
		                      	por
		                      	<span marked="1">
		                        	<b>{{$videos[$i]->users->nombre_apellidos}}</b>
		                      	</span>
		                    </p>
	                    </div>
	                </div>
	            </div>
	            @endfor
	        </div>
	    </div>
	</div>

	<div class="row">
		<div class="col-md-10 ml-auto mr-auto">
			<h2 class="title">Tecnología</h2>
			<div class="card card-plain card-blog">
				<div class="row">
					<div class="col-md-5">
	                    <div class="card-header card-header-image">
	                      	<a href="{{route('getBlog', ['categoria' => $tecnos[0]->categoria->categoria, 'id' => $tecnos[0]->slug])}}" marked="1">
	                        	<img class="img" src="{{asset('').'systemblog/'.$tecnos[0]->foto}}">
	                      	</a>
	                    <div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$tecnos[0]->foto}}&quot;); opacity: 1;"></div></div>
	                </div>
	                <div class="col-md-7">
	                    <h6 class="card-category text-info">{{$tecnos[0]->categoria->categoria}}</h6>
	                    <h3 class="card-title">
	                      	<a href="{{route('getBlog', ['categoria' => $tecnos[0]->categoria->categoria, 'id' => $tecnos[0]->slug])}}" marked="1">{{$tecnos[0]->titulo}}</a>
	                    </h3>
	                    <p class="card-description">
	                      	{{substr($tecnos[0]->bloque_plano, 0, 200)}}…
	                      	<a href="{{route('getBlog', ['categoria' => $tecnos[0]->categoria->categoria, 'id' => $tecnos[0]->slug])}}" marked="1"> Continuar </a>
	                    </p>
	                    <p class="author">
	                      	por
	                      	<span marked="1">
	                        	<b>{{$tecnos[0]->users->nombre_apellidos}}</b>
	                      	</span>, {{\Carbon\Carbon::parse($tecnos[0]->fecha)->locale('es')->diffForHumans()}}
	                    </p>
	                </div>
	            </div>
	        </div>
	        <div class="card card-plain card-blog">
	            <div class="row">
	                <div class="col-md-7">
	                    <h6 class="card-category text-info">
	                      	{{$tecnos[1]->categoria->categoria}}
	                    </h6>
	                    <h3 class="card-title">
	                      	<a href="{{route('getBlog', ['categoria' => $tecnos[1]->categoria->categoria, 'id' => $tecnos[1]->slug])}}" marked="1">{{$tecnos[1]->titulo}}</a>
	                    </h3>
	                    <p class="card-description">
	                      	{{substr($tecnos[1]->bloque_plano, 0, 200)}}…
	                      	<a href="{{route('getBlog', ['categoria' => $tecnos[1]->categoria->categoria, 'id' => $tecnos[1]->slug])}}" marked="1"> Continuar </a>
	                    </p>
	                    <p class="author">
	                      	por
	                      	<span marked="1">
	                        	<b>{{$tecnos[1]->users->nombre_apellidos}}</b>
	                      	</span>, {{\Carbon\Carbon::parse($tecnos[1]->fecha)->locale('es')->diffForHumans()}}
	                    </p>
	                </div>
	                <div class="col-md-5">
	                    <div class="card-header card-header-image">
	                    	<a href="{{route('getBlog', ['categoria' => $tecnos[1]->categoria->categoria, 'id' => $tecnos[1]->slug])}}">
	                      	<img class="img img-raised" src="{{asset('').'systemblog/'.$tecnos[1]->foto}}">
	                    <div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$tecnos[1]->foto}}&quot;); opacity: 1;"></div></a></div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-10 ml-auto mr-auto">
	        <div class="row">
	        	@for($i = 2; $i < count($tecnos); $i++)
	            <div class="col-md-4">
	                <div class="card card-plain card-blog">
	                    <div class="card-header card-header-image">
	                      	<a href="{{route('getBlog', ['categoria' => $tecnos[$i]->categoria->categoria, 'id' => $tecnos[$i]->slug])}}" marked="1">
	                        	<img class="img img-raised" src="{{asset('').'systemblog/'.$tecnos[$i]->foto}}">
	                      	</a>
	                    	<div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$tecnos[$i]->foto}}&quot;); opacity: 1;"></div>
	                	</div>
	                    <div class="card-body">
	                      	<h6 class="card-category text-info">{{$tecnos[$i]->categoria->categoria}}</h6>
	                      	<h4 class="card-title">
	                        	<a href="{{route('getBlog', ['categoria' => $tecnos[$i]->categoria->categoria, 'id' => $tecnos[$i]->slug])}}" marked="1">{{$tecnos[$i]->titulo}}</a>
	                      	</h4>
	                      	<p class="card-description">
	                        	{{substr($tecnos[$i]->bloque_plano, 0, 200)}}…
	                        	<a href="{{route('getBlog', ['categoria' => $tecnos[$i]->categoria->categoria, 'id' => $tecnos[$i]->slug])}}" marked="1"> Continuar </a>
	                      	</p>
	                      	<p class="author">
		                      	por
		                      	<span marked="1">
		                        	<b>{{$tecnos[$i]->users->nombre_apellidos}}</b>
		                      	</span>
		                    </p>
	                    </div>
	                </div>
	            </div>
	            @endfor
	        </div>
	    </div>
	</div>

</div>
@endsection