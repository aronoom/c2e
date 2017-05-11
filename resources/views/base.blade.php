<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {{ Html::style('css/base.css')}}
    {{ Html::style('css/entete.css') }}
    @yield('style')
</head>
<body>
	@include('menu.top_menu')
    @yield("contenu")
</body>
	@include('jsBase.js')
	@yield('javascript')
</html>