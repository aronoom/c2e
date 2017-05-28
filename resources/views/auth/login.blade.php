@extends('base')

@section('title')
    Authentification
@endsection

@section('style')
    {{ Html::style('css/form.css') }}
@endsection

@section('contenu')
    <h3>Authentification</h3>

    <form class="form-auth" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" placeholder="rakoto@gmail.com" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                    <small>{{ $errors->first('email') }}</small>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Mots de passe</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" placeholder="passwd132" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                    <small>{{ $errors->first('password') }}</small>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <input type="checkbox" style="display: inline; width: 40px" name="remember"> Remember Me<br/>

            <a class="link" href="{{ url('/password/reset') }}">Mot de passe oublié?</a>
        </div>

        <div class="content-btn">
                <button type="submit" class="btn btn-primary btn-fixed pull-right">
                    Login
                </button>
        </div>
    </form>
@endsection