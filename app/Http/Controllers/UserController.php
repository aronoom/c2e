<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;

use App\Repositories\UserRepository;

use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userRepository;

    protected $nbrPerPage = 2;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getPaginate($this->nbrPerPage);
        $links = $users->setPath('')->render();
        return view('user.index', compact('users', 'links'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserCreateRequest $request)
    {
        $this->setAdmin($request);
        $inputs = array_merge($request->all(),['image' => $this->userRepository->save_image($request->all()['image_fichier'])]);
        $user = $this->userRepository->store($inputs);

        return redirect('user')->withOk("L'utilisateur " . $user->name . " a été créé.");
    }

    public function show($id)
    {
        $user = $this->userRepository->getById($id);

        return view('user.show',  compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userRepository->getById($id);

        return view('user.edit',  compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $this->setAdmin($request);

        $this->userRepository->update($id, $request->all());
        
        return redirect('user')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }

    public function destroy($id)
    {
        $this->userRepository->destroy($id);
        return redirect()->back();
    }

    private function setAdmin($request)
    {
        if(!$request->has('admin'))
        {
            $request->merge(['admin' => 0]);
        }       
    }

}