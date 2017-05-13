@extends('base')
@section('title')
Gestion Tutoriel
@endsection
@section('contenu')
    <br>
    <div class="container">
    	<div class="row justify-content-md-center">
    		<div class="col-4">
    			<img class="img-membre" src="../{!! $tutoriel->user->image !!}" alt="">
    		</div>
    	</div>
    <div class="row">Titre:{!! $tutoriel->nom !!}</div>
--------------------------------------------------------------------------------
    <div class="row tutoriel">{!! $tutoriel->introduction !!}</div>
	<div class="row tutoriel">
		<ul>
		@php($numero_section = 1)
		@php($numero_chapitre = 1)
		@foreach ($tutoriel->chapitres as $chapitre)
				<li style="display:block;">{!! link_to_route('chapitre.show',$numero_chapitre.$chapitre->nom, [$chapitre->id], ['class' => '']) !!}</li>
				<ul>
						@foreach ($chapitre->sections as $section)
							<li>{{ $numero_section }}.{!! $section->titre !!}</li>
							@php($numero_section++)
						@endforeach
				
				</ul>
				@php($numero_chapitre++) 
		@endforeach
			</ul>
	</div>
	@include('commentaire_tutoriel.create')
	</div>
@stop