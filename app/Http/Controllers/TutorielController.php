<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\TutorielRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Niveau;
use App\Tutoriel;

class TutorielController extends Controller
{
    protected $nbr_page = 3;
    protected $tutorielRepository;
    public function  __construct(TutorielRepository $tutorielRepository)
    {
        $this->tutorielRepository = $tutorielRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutoriels = $this->tutorielRepository->getPaginate($this->nbr_page);
        $links     = $tutoriels->setPath('')->render();
        return view('tutoriel.index',compact('tutoriels','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if (Auth::guard(null)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }else
          {
          
            $niveaus   = Niveau::lists('niveau','id');        
            return view('tutoriel.create',compact('niveaus'));
          }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = array_merge($request->all(),['user_id' => Auth::user()->id]);                
       // $inputs = array_merge($inputs,['image' => $this->tutorielRepository->save_image($request->all()['image_fichier'])]);
    
        $this->tutorielRepository->store($inputs);
        return redirect()->route('tutoriel.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tutoriel = $this->tutorielRepository->getById($id);
        return view('tutoriel.show',compact('tutoriel'));
    }

/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_tutoriel($id)
    {
        if(!Auth::guard(null)->guest() && Auth::user()->id == Tutoriel::find($id)->user_id)
        {
            Session::put('tutoriel',$id);
            $tutoriel = $this->tutorielRepository->getById($id);
            return view('tutoriel.edit_tutoriel',compact('tutoriel'));

        }else
        {
            //envoi d erreur
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::guard(null)->guest() && Auth::user()->id == Tutoriel::find($id)->user_id)
        {
            $tutoriel = $this->tutorielRepository->getById($id);
            $niveaus   = Niveau::lists('niveau','id');        
            return view('tutoriel.edit',compact('tutoriel','niveaus'));

        }else
        {
            //envoi d erreur
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->tutorielRepository->update($id, $request->all());   
        return redirect('tutoriel')->withOk("L'tutoriel " . $request->input('nom    ') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
