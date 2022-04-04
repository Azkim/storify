<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Http\Requests\StoryRequest;
use Illuminate\Support\Facades\DB;

class StoriesController extends Controller
{

    /**
     * This constructor holds the policy for all methods 
     *
     * @return $this->authorizeResource(Model::class, 'model name');
     */

    public function __construct()
    {
        $this->authorizeResource(Story::class, 'story');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::enableQueryLog();

        $results = DB::table('users')
            ->join('stories', 'users.id', '=', 'stories.user_id')
            ->orderBy('stories.id', 'desc')
            ->paginate(20);

        //dd(DB::getQueryLog());
        return view('source.stories.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('source.stories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {

        $validated_submitted_data = $request->validated();

        auth()->user()->stories()->create($validated_submitted_data);

        return redirect()->route('stories.index')
            ->with('status', 'The story has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {

        $all_users = DB::table('users')->where('id', $story->user_id)->first();

        $name_of_user = $all_users->name;

        return view('source.stories.show', compact('story', 'name_of_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        //$this->authorize('update', $story);

        return view('source.stories.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoryRequest  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(StoryRequest $request, Story $story)
    {
        $validated_submitted_data = $request->validated();

        $story->update($validated_submitted_data);

        return redirect()->route('stories.show', [$story])
            ->with('status', 'The story has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        //$this->authorize('delete', $story);

        $story->delete();
        return redirect()->route('stories.index')
            ->with('status', 'The story has been deleted.');
    }
}
