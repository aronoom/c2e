@extends('base')

@section('style')
	{{ Html::style('css/form.css') }}
	{{ Html::style('css/profil.css') }}
	@endsection

@section('title')
	Profil
	@endsection

@section('contenu')
		{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
		<h3>
			Profil
			<div class="profil-edition">
				{!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => 'btn btn-warming']) !!}
				{!! Form::submit('Supprimer', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
			</div>
		</h3>
		{!! Form::close() !!}

		<div class="profil-content bg-info">
			<span class="profil-label label-photo"> Photo :<br/></span> <img class="profil-photo" src="{{asset($user->image)}}"/><br/><br/>
			<span class="profil-label">Nom et prenom(s):</span> {{ $user->name." ".$user->prenom }} <br/><br/>
			<span class="profil-label">Date de naissance :</span> <br/><br/>
			<span class="profil-label">Adresse mail :</span> {{ $user->email }} <br/><br/>
			<span class="profil-label">Adresse postale:</span> {{ $user->adresse }} <br/><br/>
			<span class="profil-label">Etudiant / Travail à :</span><br><br/>
			<span class="profil-label">Domaine d'etude (ou de travail)  :</span>
		</div>
		@if($user->admin == 1)
			Administrateur
		@endif

		<h3>Tutoriels rédigés</h3>
@stop