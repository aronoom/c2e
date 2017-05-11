{{-- extends('layouts.app')  --}}
@extends('base')

@section('style')
    {{ Html::style('css/banniere.css') }}
    {{ Html::style('css/navigation.css') }}
    {{ Html::style('css/membre.css') }}
    {{ Html::style('css/tutoriel.css') }}
    {{ Html::style('css/accueil.css') }}
@endsection

@section('contenu')
    @include('accueil.banniere')

    <div class="container">
         {{--    @if (!Auth::guest())
                <img width="100" height="100" class="img-responsive rounded-circle" src="{!! Auth::user()->image!!}" alt="">
            @endif --}}
        {{--<div class="row">
            Forum
            <div class="row">
                <ul>
                @foreach ($forums as $forum)
                    <li>
                        <ul>
                            <li>{{ $forum->sujet }}</li>
                            <li>{{ $forum->user->name }}</li>
                            <li>{{ $forum->created_at }}</li>
                            <li>
                        {!! link_to_route('forum.show', 'Voir', [$forum->id], ['class' => '']) !!}
                            </li>
                        </ul>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        --}}


        <div class="article">
            <div class="section" style="height:300px">
                <h3><a href="#annonce" class="ancre" id="annonce">#</a> Annonce récente</h3>
                <div class="section-content">
                </div>
            </div>


            <div class="section">
                <h3><a href="#tuto" class="ancre" id="tuto">#</a> Tutoriel récent</h3>
                @foreach ($tutoriels as $tutoriel)
                    <div class="section-tuto-content">
                        <div class="panel-tuto">
                            <img class="img-tuto" src="{!! asset('image/tuto/c.png') !!}" alt="">
                            <div class="container-tuto-info">
                                <h4>
                                    <img class="img-tuto-mini" src="{!! asset('image/badge/php.png') !!}"/>
                                    {{ link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => 'link-voir-tuto']) }}
                                </h4>
                                <p class="tuto-description">
                                    {!! substr($tutoriel->description, 0,200) !!} {{ strlen($tutoriel->description) > 200? ".....":" " }}
                                </p>
                                <div>
                                    <span class="auteur-tuto"><span class="nom-auteur"> RAMANITRA Aro Nomeniaina</span>,</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <a href="#" class="link-tous">Tous les tutoriels</a>
            </div>


            <div class="section">
                <h3><a href="#membre" class="ancre" id="membre">#</a> Membre actif</h3>
                @foreach ($user_stars as $user)
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
                        </div>
                    </div>
                @endforeach
                <a href="#" class="link-tous">Tous les membres</a>
            </div>
        </div>
        <div class="navigation">
            @include('accueil.navigation')
        </div>
    </div>
@endsection
