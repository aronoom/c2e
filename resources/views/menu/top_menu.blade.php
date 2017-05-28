<div class="bar menu ">
    <div class="container">
        <img class="pull-left img-logo" src="{!! asset('image/entete/logo.png') !!}">
        <div class="pull-right">
            <ul class="menu-list menu-max">
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('badget.index') }}">Badget</a></li>
                <li><a href="#">Annonce</a></li>
                <li><a href="{{ route('tutoriel.index') }}">Tutoriel</a></li>
                <li><a href="{{ route('user.index') }}">Membre</a></li>
                <li><a href="{{ route('forum.index') }}">Discussion</a></li>
            </ul>
            <div class="menu-user">
                @if(Auth::guest())
                    <img class="img-user" src=" {!! asset('images_users/Luc6AarabW.jpg') !!}">
                    <ul class="list-menu-guest">
                        <li><a href=" {{ url('/login') }}" class="link-dark"> Se connecter</a></li>
                    </ul>
                @else
                    <img class="img-user" src="{!! asset(Auth::user()->image) !!}">
                    <ul class="list-menu-guest">
                        <li><a href="#" class="link-dark">Profil</a></li>
                        <li><a href=" {{ url('/logout') }}" class="link-dark"> Se déconnecter</a></li>
                    </ul>
                @endif
            </div>
            <div class="menu-min">
                {{--<img class="menu-icon" src="{!! asset('image/entete/menu.ico.png') !!}"/>--}}
                <span class="menu-icon"></span>
                <ul class="list-menu-link">
                    <li></li>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('badget.index') }}">Badget</a></li>
                    <li><a href="#">Annonce</a></li>
                    <li><a href="{{ route('tutoriel.index') }}">Tutoriel</a></li>
                    <li><a href="{{ route('user.index') }}">Membre</a></li>
                    <li><a href="{{ route('forum.index') }}">Discussion</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="bar def">
    <div class="container">
        <span class="def-logo">Club d'Entraide des Etudiants</span>
    </div>
</div>
<div class="bar recherche">
    <div class="container">
        <div class="pull-left">
            <span class="def-logo-recherche">Club d'Entraide des Etudiants</span>
        </div>
        <div>
            <input class="input-search" type="text" id="test"/>
            <img class="img-loupe" src="{!! asset('image/entete/loupe.png') !!}"/>
        </div>
    </div>

</div>
{{Html::script('js/jquery-3.1.1.min.js')}}
{{Html::script('js/animation.js')}}