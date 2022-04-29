<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Http\Requests\StoryRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        DB::enableQueryLog();

        $results = DB::table('users')
            ->join('stories', 'users.id', '=', 'stories.user_id')
            ->orderBy('stories.id', 'desc')
            //->whereBetween('stories.created_at', [$request->input('start_date'), $request->input('end_date')])
            ->where( //single field filter
                function ($query) use ($request) {

                    if ($request->missing(['type', 'term', 'start_date', 'end_date']) && $request->has('status')) {
                        return $query->where('status', $request->input('status'));
                    } elseif ($request->missing(['status', 'term', 'start_date', 'end_date']) && $request->has('type')) {
                        return $query->where('type', $request->input('type'));
                    } elseif ($request->missing(['type', 'status', 'start_date', 'end_date']) && $request->has('term')) {
                        return $query
                            ->where('name', 'like', "%" . $request->input('term') . "%")
                            ->orWhere('title', 'like', "%" . $request->input('term') . "%");
                    } elseif ($request->missing(['type', 'status']) && $request->has(['start_date', 'end_date'])) {
                        return $query->whereBetween('stories.created_at', [$request->input('start_date'), $request->input('end_date')]);
                    }
                }
            )
            ->where( //all fields search and filter
                function ($query) use ($request) {
                    if ($request->has('status') && $request->has('type') && $request->has('term')) {
                        return $query
                            ->where('type', $request->input('type'))
                            ->where('status', $request->input('status'))
                            ->where('name', 'like', "%" . $request->input('term') . "%");
                    }
                }
            )
            ->where( //one text search, one field filter
                function ($query) use ($request) {
                    if ($request->has('term') && $request->has('type')) {
                        return $query
                            ->where('type', $request->input('type'))
                            ->where('name', 'like', "%" . $request->input('term') . "%");
                    }
                }
            )
            ->where( //one text search, one field filter
                function ($query) use ($request) {
                    if ($request->has('status') && $request->has('term')) {
                        return $query
                            ->where('status', $request->input('status'))
                            ->where('name', 'like', "%" . $request->input('term') . "%");
                    }
                }
            )->where( //two fields filter
                function ($query) use ($request) {
                    if ($request->has('status') && $request->has('type')) {
                        return $query
                            ->where('type', $request->input('type'))
                            ->where('status', $request->input('status'));
                    }
                }
            )
            ->paginate(15);

        //dd($request);

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
