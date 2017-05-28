@extends('base')
@section('title')
Forum
@endsection
@section('contenu')
	@if(session()->has('ok'))
		<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif

	<h3 class="panel-title">
		Forum
		{!! link_to_route('forum.create', 'Créer un nouveau sujet', [], ['class' => 'btn btn-primary pull-right']) !!}
	</h3>
	<input type="text" class="textarea"/>

	@foreach ($forums as $forum)

	<div class="row">
		{!! $forum->sujet !!}
	</div>
	<div class="row">
		<div class="col-9">{!! $forum->description !!}</div>
	</div>
	{!! link_to_route('forum.show', 'Voir', [$forum->id], ['class' => '']) !!}
	{!! link_to_route('forum.edit', 'Modifier', [$forum->id], ['class' => '']) !!}
	{!! Form::open(['method' => 'DELETE', 'route' => ['forum.destroy', $forum->id]]) !!}
		{!! Form::submit('Supprimer', ['class' => '', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
	{!! Form::close() !!}
	@endforeach

	{!! $links !!}
	@section('javascript')
		<script>
			@include('tinyMCE.config_all_of_tinyMCE')
		</script>
	@endsection
@stop