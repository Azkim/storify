@extends('source._layouts.master')
@section('body')

<div class="flex flex-col mt-8">
    <div class="-my-12 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">

            <div class="max-w-screen-lg mx-auto">

                <main class="mt-10">
                    <div class="mb-4 md:mb-0 w-full mx-auto relative">
                        <div class="px-4 lg:px-0">
                            <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
                                {{$story->title}}
                            </h2>
                            <div class="py-2 text-green-700 inline-flex items-center justify-center mb-2">
                                {{\Carbon\Carbon::parse($story->created_at)->format('l jS \\of F, Y')}}
                            </div>

                            <div class="flex justify-between items-center mt-0">

                                <div class="grid grid-cols-2 gap-2 pt-1 pb-3">
                                    @can('update',$story)
                                    <button class="px-4 h-8 bg-green-700 text-white text-center font-bold" style="border-radius: 0.25rem;"><a href="{{ route('stories.edit',[$story]) }}">EDIT</a></button>
                                    <form method="POST" action="{{ route('stories.destroy',[$story->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-4 h-8 bg-red-700 text-white rounded font-bold text-center" style="border-radius: 0.25rem;">DELETE</button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="flex flex-col lg:flex-row lg:space-x-12">

                        <div class="px-4 lg:px-0 mt-0 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
                            <p class="pb-6">{!! $story->body !!}</p>
                        </div>

                        <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
                            <div class="p-4 border-t border-b md:border md:rounded">
                                <div class="flex py-2">
                                    <div>
                                        <div class="flex-shrink-0 h-10 w-10 mb-2">
                                            <img class="h-10 w-10 rounded-full" src="{{ asset($story->user()->first()->file_name) }}" alt="">
                                        </div>
                                        <p class="font-semibold text-gray-700 text-sm"> {{$story->user()->first()->name}} </p>
                                        <p class="font-semibold text-gray-600 text-xs"> {{$story->user()->first()->role}} </p>
                                    </div>
                                </div>
                                <p class="text-gray-700 py-1">{!! $story->user()->first()->description !!}</p>
                                <div class="pt-5">
                                    <a href="{{ route('users.show',[$story->user()->first()->id]) }}" class="px-2 py-1 text-gray-100 bg-blue-700 flex w-full items-center justify-center" style="border-radius: 0.25rem;">
                                        PROFILE
                                        <i class='bx bx-user-plus ml-2'></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>

            </div>
        </div>
    </div>
    @endsection