<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ForumRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Forum;
use App\Type;
class ForumController extends Controller
{

    protected $nbr_page =3;
    protected $forumRepository;
    public function __construct(ForumRepository $forumRepository)
    {
        $this->forumRepository = $forumRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = $this->forumRepository->getPaginate($this->nbr_page);
        $links  = $forums->setPath('')->render();
        return view('forum.index', compact('forums', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types   = Type::all();
        return view('forum.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => Auth::user()->id]);
        $forum = $this->forumRepository->store($inputs);
        $forum->types()->sync($request->get('Types'));
        $user = User::find($forum->user_id);
        $user->score = $user->score+1;
        $user->save();
        return redirect('forum')->withOk("Le forum " . $forum->sujet . " a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
 
        $forum = $this->forumRepository->getById($id);
        Session::put('forum',$id);
        return view('forum.show',  compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forum = Forum::find($id);
        return view('forum.edit',compact('forum'));
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
        $this->forumRepository->update($id, $request->all());   
        return redirect('forum')->withOk("L'forum " . $request->input('nom    ') . " a été modifié.");
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
