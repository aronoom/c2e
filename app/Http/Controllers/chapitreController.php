<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ChapitreRepository;
use Illuminate\Support\Facades\Session;
use App\Chapitre;
class ChapitreController extends Controller
{
    protected $chapitreRepository;
    public function __construct(ChapitreRepository $chapitreRepository)
    {
        $this->chapitreRepository  = $chapitreRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = array_merge($request->all(),['tutoriel_id' => Session::get('tutoriel')]);                
       // $inputs = array_merge($inputs,['image' => $this->tutorielRepository->save_image($request->all()['image_fichier'])]);
    
        $this->chapitreRepository->store($inputs);
        $tutoriel = Session::get('tutoriel');
        return redirect()->route('tutoriel.edit_tutoriel',compact('tutoriel'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapitre = Chapitre::find($id);
        return view('chapitre.show',compact('chapitre'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //show for edite 
    public function edit_chapitre($id)
    {
        Session::put('chapitre',$id);        
        $chapitre = $this->chapitreRepository->getById($id);
        return view('chapitre.edit_chapitre',compact('chapitre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
