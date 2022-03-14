<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomRegistrationController extends Controller
{
    /**
     * Show the Custom Registration form in the front end
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        if(Auth::check()){
            return redirect()->route('stories.index')
                ->with('status', 'You cannot register while logged in');
        } return view('source.users.register');
    }


    /**
     * Save a user from the Custom Registration form in the front end.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Http\Requests\UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function save(UserRequest $request)
    {

        if ($request->hasFile('avatar')) {

            $request->validated();
            $fileName =  $request->file('avatar')->getClientOriginalName();

            $user = new User([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
                'password' => Hash::make($request->input('password')),
                'description' => $request->input('description'),
                //'file_name' => $request->file('avatar')->getClientOriginalName()
                "file_name" => $request->file('avatar')->storeAs('images/avatars', $fileName)
            ]);
            $user->save();
            Auth::login($user);
            
            return redirect()->route('stories.index')
                ->with('status', 'Your user account has been created');
        } else {
            return redirect()->route('login')
                ->with('status', 'The profile photo was not uploaded');
        }
    }
}
