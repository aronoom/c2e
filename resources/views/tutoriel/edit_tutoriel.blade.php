@extends('base')
@section('title')
Gestion tutoriel
@endsection
@section('contenu')
    <br>
    <div class="col-sm-12">
    @if (!Auth::guest() && Auth::user()->id == $tutoriel->user_id)
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<b>Nom</b>
	   <div class="row">{!! $tutoriel->nom !!}</div>
	   <b>Description</b>
	   <div class="row">{!! $tutoriel->description !!}</div>
		<b>Liste des chapitres</b>
		@foreach ($tutoriel->chapitres as $chapitre)
			<div class="row"><b>chapitre {!! $chapitre->numero !!}</b> :<b>{!! $chapitre->nom!!}</b>
							{!! link_to_route('chapitre.edit_chapitre', 'Continuer l\'écriture du chapitre', [$chapitre->id], ['class' => '']) !!}

			</div>
		@endforeach
		<div class="row"><b>Ajoute de chapitre </b></div>
		@include('chapitre.create')
	</div>
		@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
	@endsection
    @else
        Erreur car ce tutoriel vous appartient pas :)
    @endif

@stop