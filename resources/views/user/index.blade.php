@extends('base')
@section('title')
Gestion Utilisateur
@endsection
@section('style')
    {{ Html::style('css/membre.css') }}
@endsection
@section('contenu')
    <div class="container">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		
			

			<div class="section">
                <h3><a href="#membre" class="ancre" id="membre">#</a>Listes des Utilisateurs</h3>
                @foreach ($users as $user)
                    <div class="section-membre-content">
                        <div class="panel-membre">
                            <img class="img-membre" src="{{ $user->image }}" alt="">
                            <div class="container-membre-info">
                                <span class="label-nom">{{ $user->name }}</span><br/>
                                <span class="label-nom">Kotozafy</span><br/>
                                <span class="label-domaine">Génie logiciel et Base de Donnée</span>
                                <div class="list-badge">
                                    <img src="{!! asset('image/badge/php.png') !!}" alt="php">
                                    <img src="{!! asset('image/badge/qt.png') !!}" alt="Qt">
                                </div>
                            </div>
                        </div>
                        <div class="panel-link-membre">
                           {!! link_to_route('user.show', 'Plus de détail', [$user->id], ['class' => 'link-detail-membre']) !!}
                           {!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => '']) !!}
                           {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
						   {!! Form::submit('Supprimer', ['class' => '', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
						   	{!! Form::close() !!} 
                        </div>
                    </div>
                @endforeach
            </div>

	{{-- 				@foreach ($users as $user)
						
					{!! $user->id !!}
					{!! $user->name !!}
					{!! link_to_route('user.show', 'Voir', [$user->id], ['class' => 'link-detail-membre']) !!}
					{!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => '']) !!}
					{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
					{!! Form::submit('Supprimer', ['class' => '', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
								{!! Form::close() !!}
					@endforeach --}}
	  		
		{!! link_to_route('user.create', 'Ajouter un utilisateur', [], ['class' => '']) !!}
		{!! $links !!}
	</div>
@stop