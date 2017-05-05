@extends('base')
@section('title')
Gestion Tutoriel
@endsection
@section('contenu')
    <br>
    <div class="col-sm-12">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des Tutoriels</h3>
			</div>
					@foreach ($tutoriels as $tutoriel)
						{!! $tutoriel->id !!}
							{!! $tutoriel->nom !!}
							<img src="{!! $tutoriel->image !!}" class="img-fluid col-10" alt="">
						<div class="description">	
							{!! $tutoriel->description !!}
							{!! link_to_route('tutoriel.show', 'Voir', [$tutoriel->id], ['class' => '']) !!}
                 
                                                        @if (!Auth::guest() && Auth::user()->id == $tutoriel->user_id)
                                                            {!! link_to_route('tutoriel.edit', 'Modifier les Informations du tutoriel', [$tutoriel->id], ['class' => '']) !!}
                                                            {!! link_to_route('tutoriel.edit_tutoriel', 'Continuer l\'écriture du  tutoriel', [$tutoriel->id], ['class' => '']) !!}
                                                        @endif
								{!! Form::open(['method' => 'DELETE', 'route' => ['tutoriel.destroy', $tutoriel->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => '', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
								{!! Form::close() !!}
						</div>
					@endforeach
	  			
		</div>
		{!! link_to_route('tutoriel.create', 'Ajouter un utilisateur', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
@stop