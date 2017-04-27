@extends('base')
@section('title')
Gestion Tutoriel
@endsection
@section('contenu')
    <br>
    <div class="col-sm-offset-4 col-sm-4">
    	<div class="row justify-content-md-center">
    		<div class="col-4">
    			<img class="col-12" src="../{!! $tutoriel->user->image !!}" alt="">
    	</div>
    	</div>
    <div class="row">Titre:{!! $tutoriel->nom !!}</div>
--------------------------------------------------------------------------------
    <div class="row">{!! $tutoriel->description !!}</div>
	<div class="row">
		<ul>
		@foreach ($tutoriel->chapitres as $chapitre)
				<li style="display:block;">{!! $chapitre->numero !!}.{!! $chapitre->nom !!}</li>
				<ul>
						@foreach ($chapitre->sections as $section)
							<li>{!! $section->numero !!}.{!! $section->titre !!}</li>
						@endforeach
				
				</ul>
		@endforeach
			</ul>
	</div>
	</div>
@stop