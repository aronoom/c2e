@extends('base')
@section('title')
Gestion Chapitre
@endsection
@section('contenu')
    <br>
    <div class="col-sm-12">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<b>Nom</b>
	   <div class="row">{!! $chapitre->nom !!}</div>
	   <b>Description</b>
	   <div class="row">{!! $chapitre->description !!}</div>
		<b>Liste des sections</b>
		@php($numero_section = 1)
		@foreach ($chapitre->sections as $section)
			<div class="row"><br/>section {{ $numero_section }}:{!! $section->titre !!}
							{{-- {!! link_to_route('tutoriel.show', 'Continuer l\'écriture du chapitre', [$tutoriel->id], ['class' => '']) !!} --}}
							@php($numero_section++)
			</div>
		@endforeach
		<div class="row"><b>Ajoute de section </b></div>
		@include('section.create')
	</div>
		@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
	@endsection

@stop