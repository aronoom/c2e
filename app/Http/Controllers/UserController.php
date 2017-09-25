<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdatePasswordRequest;
use App\Http\Requests\User\UserUpdateRequest;

use App\Repositories\UserRepository;
use App\Type_utilisateur;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    protected $userRepository;

    protected $nbrPerPage = 12;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function sendEmailReminder($login, $pass)
    {
        $user = User::where('email', $login);

        Mail::send('user.email', ['user' => $user, 'login' => $login, 'password' => $pass], function ($m) use ($user) {
            $m->from('aronomeniaina@gmail.com', 'c2e');
            $m->to($user->email, $user->name)->subject('Login c2e');
        });
    }

    public function index()
    {
        $users = User::orderBy('score', 'desc')->paginate($this->nbrPerPage);
        foreach ($users as $user){
            $tutoArray = [];
            foreach ($user->tutoriels as $tuto){
                $existe = false;
                foreach ($tutoArray as $tutoA){
                    if($tuto->badge == $tutoA->badge) $existe = true;
                }
                if(!$existe) array_push($tutoArray, $tuto);
            }
            $user->tutoriels = $tutoArray;
        }
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function bienvenue()
    {
        return view('user.bienvenue');
    }

    public function store(UserCreateRequest $request)
    {
        $this->setAdmin($request);
        //$password = str_random(7);
        $password = 'c2e1234';
        $inputs = array_merge($request->all(),['image' => 'images_users/default.svg']);
        $inputs = array_merge($inputs,['type_utilisateur_id'=>Type_utilisateur::where('terme','simple')->first()->id]);
        $inputs = array_merge($inputs,compact('password'));
        $this->userRepository->store($inputs);
        //$this->sendEmailReminder($inputs['email'], $password);

        return redirect()->route('user.bienvenue');
    }

    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        $roles = Type_utilisateur::all();
        Session::put('user', $id);
        $tuto_valides = [];
        $tuto_nonValides = [];
        foreach ($user->tutoriels as $tuto){
            if($tuto->validation != null)
                array_push($tuto_valides, $tuto);
            else array_push($tuto_nonValides, $tuto);
        }
        if(!Auth::guest() && Auth::user() == User::find($id) && Auth::user()->pass_changed == 0)
            return redirect()->route('user.password');
        return view('user.show',  compact('user', 'roles', 'tuto_valides', 'tuto_nonValides'));
    }

    public function edit($id)
    {
        $user = $this->userRepository->getById($id);

        return view('user.edit',  compact('user'));
    }

    public function updateRole(Request $request, $id){
        $this->setAdmin($request);
        $this->userRepository->update($id, $request->all());
        $user = User::find($id);
        $roles = Type_utilisateur::all();
        return redirect()->route('user.show', compact('user','roles'))->withOk("Le role a été modifié.");
    }

    public function updatePhotoUser(Request $request, $id){
        $this->setAdmin($request);
        $inputs = array_merge($request->all(),['image' => $this->userRepository->save_image($request->all()['image_fichier'], $id)]);
        $inputs = array_merge($inputs,['image_fichier' => null]);
        $this->userRepository->update($id, $inputs);
        $user = User::find($id);
        $roles = Type_utilisateur::all();
        return redirect()->route('user.show', compact('user', 'roles'))->withOk("La photo a été modifié.");
    }

    public function update(Request $request, $id)
    {
        $this->setAdmin($request);
        $this->userRepository->update($id, $request->all());
        $user = User::find($id);
        $roles = Type_utilisateur::all();
        return redirect()->route('user.show', compact('user','roles'))->withOk("L'utilisateur a été modifié.");
    }

    public function editPassword(){
        return view('user.password');
    }

    public function updatePassword(UserUpdatePasswordRequest $request){
        if(Hash::check($request->get('old_password'), Auth::user()->password)){
            $inputs = array_merge($request->all(), ['pass_changed' => 1]);
            $this->userRepository->update(Auth::user()->id, $inputs);
            return redirect()->route('user.show',['user'=>Auth::user()])->withOk('Mot de passe changer avec succes.');
        }
        return redirect()->route('user.password')->withError('L\'ancien mot de passe est incorrecte.');
    }
    public function destroy($id)
    {
        $this->userRepository->destroy($id);
        return redirect()->route('user.index');
    }

    private function setAdmin($request)
    {
        if(!$request->has('admin'))
        {
            $request->merge(['admin' => 0]);
        }       
    }
}