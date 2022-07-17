<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(User $user)
    {

        $this->model = $user;

    }

    public function index(Request $request)
    {
        $users = $this->model->getUsers(
            $request->search ?? ''
        );
        return view('users.index',compact('users'));
    }

    public function show($id)
    {
        if(!$user = User::find($id))
            return redirect()->route('users.index');
        $title = 'Usuário'.$user->name;
        return view('users.show', compact('user','title'));
    }

    public function create()
    {

        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        /*$user = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = password_hash($request->password, PASSWORD_ARGON2I);
        $user->save();*/

        $data = $request->all();
        $data['password']   = bcrypt($request->password);

        if($request->image){
            $file = $request['image'];
            $path = $file->store('profile','public');
            $data['image'] = $path;
        }

        $this->model->create($data);

        //return redirect()->route("users.index");

        $request->session()->flash('create','Usuário cadastrado com sucesso!');

        return redirect()->route('users.index')->with('create','Usuário cadastrado com sucesso!');
    }

    public function edit($id)
    {
        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');
        return view('users.edit',compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');
        $data = $request->only('name','email');
        if($request->password)
            $data['password']=bcrypt($request->password);

        $data['is_admin'] = $request->admin?1:0;

        $user->update($data);

        return redirect()->route("users.index")->with('edit','Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');
        $user->delete();
        //return redirect()->route('users.index');
        return redirect()->route("users.index")->with('destroy','Usuário Deletado com sucesso!');
    }

    public function admin()
    {
        return view('admin.index');
    }

}
