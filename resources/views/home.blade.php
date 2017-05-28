{{-- extends('layouts.app')  --}}
@extends('base')

@section('title')
    Accueil
@endsection

@section('style')
    {{ Html::style('css/banniere.css') }}
    {{ Html::style('css/membre.css') }}
    {{ Html::style('css/tutoriel.css') }}
    {{ Html::style('css/accueil.css') }}
    {{ Html::style('css/footer.css') }}
@endsection

@section('banniere')
    @include('accueil.banniere')
@endsection

@section('contenu')
    <div class="section" style="height:300px">
        <h3><a href="#annonce" class="ancre" id="annonce">#</a> Annonce récente</h3>
    </div>


    <div class="section">
        <h3><a href="#tuto" class="ancre" id="tuto">#</a> Tutoriel récent</h3>
        @foreach ($tutoriels as $tutoriel)
            <div class="section-tuto-content">
                <div class="panel-tuto">
                    <img class="img-tuto" src="{!! asset('image/tuto/c.png') !!}" alt="">
                    <div class="container-tuto-info">
                        <div class="tuto-titre">
                            <img class="img-tuto-mini" src="{!! asset('image/badge/php.png') !!}"/>
                            {{ link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => 'link-voir-tuto']) }}<br/>
                            <span class="nom-auteur"> Par {{ $tutoriel->user->name. ' ' .$tutoriel->user->prenom }},</span>
                        </div>
                        <ul class="list-tag">
                            <li>langage c</li>
                            <li>code</li>
                        </ul>
                        <div class="tuto-description">
                            <p class="paragraphe">
                                {{$tutoriel->description}}
                            </p>
                            {{ link_to_route('tutoriel.show', 'Voir en détail', [$tutoriel->id], ['class' => 'link link-tuto pull-right']) }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <a href="{{ route('tutoriel.index') }}" class="link-tous">Tous les tutoriels</a>
    </div>


    <div class="section">
        <h3><a href="#membre" class="ancre" id="membre">#</a> Membre actif</h3>
        @foreach ($user_stars as $user)
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
        <a href="{{ route('user.index') }}" class="link-tous">Tous les membres</a>
    </div>

    <script>
        $(function () {
            var offsetPixels = 425;
            $(window).scroll(function () {
                if($(window).scrollTop() > offsetPixels){
                    $('.navigation').css({
                            'position': 'fixed',
                            'top': '30px'
                        }
                    )
                }else {
                    $('.navigation').css('position','static');
                }
            });
        })
    </script>
@endsection

@section("navigation")
    @include('accueil.navigation')
@endsection

@section('footer')
    @include('accueil.footer')
@endsection
