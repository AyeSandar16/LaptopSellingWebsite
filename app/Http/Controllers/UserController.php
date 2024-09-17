<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(3);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        return view('users.create',['users'=>$users])->with('success','Successfully Created!!');
    }
    public function createUser(array $data)
    {
        return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role'=>'user',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
        ['name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users' ,
        'password' => 'nullable|min:8',
        ]
        );


        $data = $request->all();
        $this->createUser($data);

        return redirect("login")->withSuccess('Great! You have Successfully Registered!!');
    }
    public function show(User $user)
    {
        return view('users.show', ['user'=>$user]);
    }


    public function edit($id) {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }


public function update(Request $request, User $user)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'current_password' => 'nullable|min:8',
        'password' => 'nullable|min:8',
    ]);

    // Check if the current password is provided and correct
    if ($request->filled('current_password') && !Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Current Password is not matched!']);
    }

    // Update the user attributes
    $user->name = $data['name'];
    $user->email = $data['email'];

    // Update the password if provided
    if ($request->filled('password')) {
        $user->password = Hash::make($data['password']);
    }

    // Save the updated user
    $user->save();

    // Redirect with success message
    return redirect()->route('users.index')->with('success', 'Great! You have successfully updated the user!');
}


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','Successfully Delete!!');
    }
}
