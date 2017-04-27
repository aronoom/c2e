@extends('base')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Fiche d'Catégorie</div>
			<div class="panel-body"> 
				<p>Nom du catégorie : {{ $type->nom }}</p>
				<p>Déscription : {{ $type->description }}</p>
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop