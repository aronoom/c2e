{{-- extends('layouts.app')  --}}
@extends('base')

@section('contenu')

    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default" style="border-bottom:1px solid #aaa;">
                <div class="panel-heading" style="border-top:1px solid #aaa;">Les Stars</div>
             {{--    @if (!Auth::guest())
                    <img width="100" height="100" class="img-responsive rounded-circle" src="{!! Auth::user()->image!!}" alt="">
                @endif --}}
          
                <div class="panel-body">
                    <div class="row" style="padding-bottom: 10px;">
                    @foreach ($user_stars as $user)
                        <div class="col-sm-2  offset-1" style="border:1px solid #aaa;height: 200px;">
                      <img width="100" height="100" class="img-responsive rounded-circle" src="{{ $user->image }}" alt="">
                      <br>
                      {{ $user->name }}      
                      {!! link_to_route('user.show', 'Voir', [$user->id], ['class' => '']) !!}

                     </div>
                    @endforeach

                    </div>
                </div>
            </div>
            <div class="row">
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
        </div>
        Tutoriel
        <div>
            @foreach ($tutoriels as $tutoriel)
                {{ $tutoriel->nom }}<br>
                {!! substr($tutoriel->description, 0,300) !!} {{ strlen($tutoriel->description) > 300? ".....":" " }}
                {!! link_to_route('tutoriel.show', 'Voir', [$tutoriel->id], ['class' => '']) !!}

            @endforeach
        </div>
    </div>
@endsection
