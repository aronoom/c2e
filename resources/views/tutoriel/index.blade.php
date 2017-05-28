@extends('base')
@section('title') Tutoriels @endsection

@section('style')
	{{ Html::style('css/tutoriel.css') }}
@endsection

@section('banniere')
	<div class="container">
		<div class="tuto-info" >
			La rédaction d'un tutoriel vous permet d'avoir un badge.<br/>
			{!! link_to_route('tutoriel.create', 'Rédiger un tutoriel', [], ['class' => 'tuto-btn ']) !!}
		</div>
	</div>
@endsection

@section('contenu')
	@if(session()->has('ok'))
		<div class="alert-success">{!! session('ok') !!}</div>
	@endif

	<h3>
		<a href="#aprecies" class="ancre" id="tuto"></a>Les tutoriels
	</h3>
	@foreach ($tutoriels as $tutoriel)
		<div class="section-tuto-content">
			<div class="panel-tuto">
				<img class="img-tuto" src="{!! asset('image/tuto/c.png') !!}" alt="">
				<div class="container-tuto-info">
					<div class="tuto-titre">
						<img class="img-tuto-mini" src="{!! asset('image/badge/php.png') !!}"/>
						{{ link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => 'link-voir-tuto']) }}<br/>
						<span class="nom-auteur"> Par {{ $tutoriel->user->name. ' ' .$tutoriel->user->prenom }},</span>
					</div>
					<ul class="list-tag">
						<li>langage c</li>
						<li>code</li>
					</ul>
					<div class="tuto-description">
						<p class="paragraphe">
							{{$tutoriel->description}}
						</p>
						{{ link_to_route('tutoriel.show', 'VOIR EN DETAIL', [$tutoriel->id], ['class' => 'link link-tuto']) }}
					</div>
				</div>
			</div>
		</div>
	@endforeach
	{!! $links !!}
@stop

@section('navigation')
	<ul>
		<li>
			<a href="#aprecies">Les tutoriels</a>
			<ul>
				@foreach($tutoriels as $tutoriel)
					<li>{{ link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => '']) }}</li>
				@endforeach
			</ul>
		</li>
	</ul>
@endsection