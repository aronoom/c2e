<?php

namespace App\Http\Controllers;

use App\Repositories\ChapitreRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\SectionRepository;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    protected $sectionRepository;
    protected  $chapitreRepository;

    public function __construct(ChapitreRepository $chapitreRepository,SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
        $this->chapitreRepository = $chapitreRepository;

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
    public function create($chap_id)
    {
        Session::put('chapitre',$chap_id);
        $chapitre = $this->chapitreRepository->getById($chap_id);
        return view('section.create',compact('chapitre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = array_merge($request->all(),['chapitre_id' => Session::get('chapitre')]);                
       // $inputs = array_merge($inputs,['image' => $this->tutorielRepository->save_image($request->all()['image_fichier'])]);
    
        $this->sectionRepository->store($inputs);
        $chapitre = Session::get('chapitre');
        return redirect()->route('chapitre.edit_chapitre',compact('chapitre'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
