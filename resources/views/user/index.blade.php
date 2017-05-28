@extends('base')

@section('title') Membres @endsection

@section('style')
    {{ Html::style('css/membre.css') }}
@endsection

@section('contenu')
    @if(session()->has('ok'))
        <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
    @endif



        <div class="section">
            <h3>
                Les membres
                {!! link_to_route('user.create', 'Creer un utilisateur', [], ['class' => 'btn btn-primary pull-right']) !!}
            </h3>
            @foreach ($users as $user)
                <div class="panel-membre">
                    <img class="img-membre" src="{{ $user->image }}" alt="">
                    <div class="info-membre">
                        <div class="info">
                            {!! link_to_route('user.show', $user->name." ". $user->prenom , [$user->id], ['class' => 'link']) !!}<br/>
                            <span class="label-domaine">Génie logiciel et Base de Donnée</span>
                        </div>
                        <div class="list-badge">
                            <img src="{!! asset('image/badge/php.png') !!}" alt="php">
                            <img src="{!! asset('image/badge/qt.png') !!}" alt="Qt">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@stop

@section('navigation')
    <ul>
        <li>
            <a href="#aprecies">Les membres</a>
            <ul>
                @foreach($users as $user)
                    <li>{!! link_to_route('user.show', $user->name." ". $user->prenom , [$user->id], ['class' => '']) !!}<br/></li>
                @endforeach
            </ul>
        </li>
    </ul>
@endsection