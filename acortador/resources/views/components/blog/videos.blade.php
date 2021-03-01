@extends('welcome')
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 ml-auto mr-auto">
            <h2 class="title">Entradas de Videos</h2>
            @foreach($blogs as $blog)
            <div class="card card-plain card-blog">
                <div class="row">
                    <div class="col-md-4">
                      <div class="card-header card-header-image">
                        <a href="{{route('getBlog', ['categoria' => $blog->categoria->categoria, 'id' => $blog->slug])}}">
                          <img class="img img-raised" src="{{asset('').'systemblog/'.$blog->foto}}">
                        <div class="colored-shadow" style="background-image: url(&quot;{{asset('').'systemblog/'.$blog->foto}}&quot;); opacity: 1;"></div>
                        </a>
                    </div>
                    </div>
                    <div class="col-md-8">
                      <h6 class="card-category text-info">{{$blog->categoria->categoria}}</h6>
                      <h3 class="card-title">
                          <a href="{{route('getBlog', ['categoria' => $blog->categoria->categoria, 'id' => $blog->slug])}}" marked="1">{{$blog->titulo}}</a>
                      </h3>
                      <p class="card-description">
                          {{substr($blog->bloque_plano, 0, 200)}}…
                          <a href="{{route('getBlog', ['categoria' => $blog->categoria->categoria, 'id' => $blog->slug])}}" marked="1"> Continuar </a>
                      </p>
                      <p class="author">
                          por
                          <span marked="1">
                            <b>{{$blog->users->nombre_apellidos}}</b>
                          </span>, {{\Carbon\Carbon::parse($blog->fecha)->locale('es')->diffForHumans()}}
                      </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection