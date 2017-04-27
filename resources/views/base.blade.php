<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @include('cssBase.css')
</head>
<body>
	@include('menu.top_menu')
	<div class="container">
		@yield("contenu")
	</div>
</body>
	@include('jsBase.js')
	@yield('javascript')
</html>