@extends('base')
@section('title')
	c2e | tuto
@endsection

@section('style')
	{{ Html::style('css/tutoriel.css') }}
	{{ Html::style('css/form.css')}}
@endsection

@section('contenu')
	<div class="container">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif

		<h3>
			<a href="#tuto" class="ancre" id="tuto"></a>Les tutoriels
			{!! link_to_route('tutoriel.create', 'Créer un tutoriel', [], ['class' => 'btn btn-primary pull-right']) !!}
		</h3>
		@foreach ($tutoriels as $tutoriel)
			<div class="section-tuto-content">
				<div class="panel-tuto">
					<img class="img-tuto" src="{!! asset('image/tuto/c.png') !!}" alt="">
					<div class="container-tuto-info">
						<h4>
							<img class="img-tuto-mini" src="{!! asset('image/badge/php.png') !!}"/>
							{{ link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => 'link-voir-tuto']) }}
						</h4>
						<p class="tuto-description">
							{!! substr($tutoriel->description, 0,200) !!} {{ strlen($tutoriel->description) > 200? ".....":" " }}
						</p>
						<div>
							<span class="auteur-tuto"><span class="nom-auteur"> RAMANITRA Aro Nomeniaina</span>,</span>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		{!! $links !!}
	</div>
@stop