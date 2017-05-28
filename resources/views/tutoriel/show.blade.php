@extends('base')

@section('title')
	{!! $tutoriel->nom !!}
@endsection

@section('style')
	{{ Html::style('css/modal.css') }}
	{{ Html::style('css/form.css') }}
	{{ Html::style('css/accueil.css') }}
	{{ Html::style('css/navigation.css') }}
	{{ Html::style('css/show_tutoriel.css') }}
@endsection

@section('contenu')
	@if(session()->has('ok'))
		<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif
	<h3>{!! $tutoriel->nom !!}</h3>
	<div class="btn-group">
		{!! Form::open(['method' => 'DELETE', 'route' => ['tutoriel.destroy', $tutoriel->id]]) !!}
			{!! link_to_route('chapitre.create', 'Ajouter une chapitre', ['tuto_id' => $tutoriel->id], ['class' => 'btn btn-success']) !!}
			{!! link_to_route('tutoriel.edit', 'Modifier', [$tutoriel->id], ['class' => 'btn btn-warming']) !!}
			{!! Form::submit('Supprimer', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer ce chapitre ?\')']) !!}
		{!! Form::close() !!}
	</div>
	<div class="alert-info">
		<img class="img-auteur" src="../{{ $tutoriel->user->image }}" alt="">
		<span class="nom-auteur">Rédiger par {{ $tutoriel->user->name. ' ' .$tutoriel->user->prenom }}, le {{ date_format($tutoriel->created_at, 'd/m/y') }}</span>
		<p class="tuto-desc">
			{{ $tutoriel->description }}
		</p>
	</div>
	<h4><a href="#intro" class="ancre" id="tuto">#</a> Introduction</h4>
	<div class="paragraphe">
		{!! $tutoriel->introduction !!}
	</div>
	<div class="content-tuto">
		@php($numero_section = 1)
		@php($numero_chapitre = 1)
		@foreach ($tutoriel->chapitres as $chapitre)
			<h4>
				<a href="#{{ $chapitre->nom }}" class="ancre" id="tuto">#</a>
				{{ $chapitre->nom }}
				<div class="btn-group">
					{!! Form::open(['method' => 'DELETE', 'route' => ['chapitre.destroy', $chapitre->id]]) !!}
					{!! link_to_route('section.create', 'Ajouter une section',['chapitre_id' => $chapitre->id],['class' => 'btn-sm btn-success']) !!}
					{!! link_to_route('chapitre.edit', 'Modifier',['chapitre' => $chapitre->id],['class' => 'btn-sm btn-warming']) !!}
					{!! Form::submit('Supprimer', ['class' => 'btn-sm btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
					{!! Form::close() !!}
				</div>
			</h4>
				{!!  $chapitre->description !!}

			<ul>
				@foreach ($chapitre->sections as $section)
					<li>{{ $numero_section }}.{!! $section->titre !!}</li>
					@php($numero_section++)
				@endforeach

			</ul>
			@php($numero_chapitre++)
		@endforeach
	</div>

@endsection

@section('navigation')
	<ul>
		<li>
			<a href="#intro">Introduction</a>
		</li>
		@foreach($tutoriel->chapitres as $chapitre)
			<li>
				<a href="#{{ $chapitre->nom }}">{{ $chapitre->nom }}</a>
				<ul>
					@foreach($chapitre->sections as $section)
						<li><a href="#{{ $section->nom }}">{{ $section->nom }}</a> </li>
					@endforeach
				</ul>
			</li>
		@endforeach
	</ul>
@endsection

{{--
<div class="modal">
	<div class="modal-panel">
		<div class="modal-header">Comfirmation</div>
		<div class="modal-content">Voulez-vous vraiment supprimés ?</div>
		<div class="modal-footer">
			<input class="modal-btn-primary" type="submit" value="Oui">
			<input class="modal-btn" type="button" value="Non"/>
		</div>
	</div>
</div>--}}

@section('javascript')
	{{Html::script('js/modal.js')}}
@endsection