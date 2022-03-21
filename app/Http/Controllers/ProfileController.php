<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }  
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = User::paginate(20);

        return view('source.users.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('source.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Http\Requests\UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
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
                'file_name' => $request->file('avatar')->storeAs('images/avatars', $fileName)
            ]);
            $user->save();

            return redirect()->route('users.index')
                ->with('status', 'The user has been created');
        } else {
            return redirect()->route('users.create')
                ->with('status', 'The profile photo was not uploaded');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('source.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('source.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|min:8|max:255|unique:users,email,'.$user->id,
            'password' => ['required', 'string', 'min:8'],
            'description' => 'required',
            'avatar' => ['required','mimes:jpg,png'],
            'role' => 'required',
        ]);
 
        if ($validator->fails()) {
            return redirect('users')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $validated_submitted_data = $validator->validated();

        $fileName = $request->file('avatar')->getClientOriginalName();
        $user->file_name = $request->file('avatar')->storeAs('images/avatars', $fileName);

        $user->update($validated_submitted_data);

        return redirect()->route('users.index', [$user])
             ->with('status', 'The user has been updated.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('status', 'The user has been deleted.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function articles(User $user)
    {
        $results = DB::table('users')
            ->join('stories', 'users.id', '=', 'stories.user_id')
            ->where('user_id', $user->id)
            ->orderBy('stories.id', 'desc')
            ->paginate(20);

        return view('source.users.articles', compact('results'));
    }
}
