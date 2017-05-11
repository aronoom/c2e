@extends('base')
@section('title')
Gestion Utilisateur
@endsection
@section('contenu')
    <br>
    <div class="col-sm-offset-4 col-sm-4">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des Badgets</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($badgets as $badget)
						<tr>
							<td><img width="60px" height="60px" src='{!! $badget->image !!}'/></td>
							<td class="text-primary"><strong>{!! $badget->nom !!}</strong></td>
							<td>{!! link_to_route('badget.show', 'Voir', [$badget->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>{!! link_to_route('badget.edit', 'Modifier', [$badget->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $badget->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>
		{!! link_to_route('badget.create', 'Ajouter Badget', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
@stop