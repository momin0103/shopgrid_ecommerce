<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;
    private $users;
    private $emailUser;
    private $email;

    public function add()
    {
        return view('admin.user.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email'
        ]);

        $this->user = new User();
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = bcrypt($request->password);
        $this->user->save();

        return redirect()->back()->with('message', 'New user info create successfully.');
    }

    public function manage()
    {
        $this->users = User::all();
        return view('admin.user.manage', ['users' => $this->users]);
    }

    public function edit($id)
    {
        $this->user = User::find($id);
        return view('admin.user.edit', ['user' => $this->user]);
    }

    public function update(Request $request, $id)
    {
        $this->user = User::find($id);
        $this->emailUser = User::where('email', $request->email)->first();
        if ($this->emailUser)
        {
            if ($this->user->id != $this->emailUser->id)
            {
                return redirect()->back()->with('message', 'Sorry..this email already exist. Please try another one.');
            }
        }
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        if ($request->password)
        {
            $this->user->password = bcrypt($request->password);
        }
        $this->user->save();
        return redirect('/manage-admin-user')->with('message', 'User info update successfully.');
    }


}
