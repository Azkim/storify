@extends('source._layouts.master')
@section('body')

<style>
  :root {
    --main-color: #4a76a8;
  }

  .bg-main-color {
    background-color: var(--main-color);
  }

  .text-main-color {
    color: var(--main-color);
  }

  .border-main-color {
    border-color: var(--main-color);
  }
</style>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



<div class="bg-gray-100">

  <div class="container mx-auto my-5 p-5">
    <div class="md:flex no-wrap md:-mx-2 ">
      <!-- Left Side -->
      <div class="w-full md:w-3/12 md:mx-2">
        <!-- Profile Card -->
        <div class="bg-white p-3 border-t-4 border-blue-800">
          <div class="image overflow-hidden">
            <img class="h-auto w-full mx-auto" src="{{ strpos($user->file_name,'avatar') == false ? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' : asset($user->file_name) }}" alt="">
          </div>
          <h1 class="text-gray-900 font-bold text-xl leading-8 mt-4">ABOUT ME</h1>
          <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{$user->description}}</p>
          <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
            <li class="flex items-center py-3 grid grid-cols-2 gap-2">
              <a href="{{ route('users.edit',[$user]) }}" class="col-span-1 w-full bg-green-800 py-1 px-2 rounded text-white text-base font-semibold text-center">EDIT</a>
              <form method="POST" action="{{ route('users.destroy',[$user->id]) }}">
                @csrf
                @method('DELETE')
                <button href="{{ route('users.edit',[$user]) }}" class="col-span-1 w-full bg-red-800 py-1 px-2 rounded text-white text-base font-semibold text-center">DELETE</button>
              </form>
            </li>
            <li class="flex items-center py-3">
              <span>Member since</span>
              <span class="ml-auto">{{\Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</span>
            </li>
          </ul>
        </div>
        <!-- End of profile card -->
        <div class="my-4"></div>

      </div>
      <!-- Right Side -->
      <div class="w-full md:w-9/12 mx-2 h-64">
        <!-- Profile tab -->
        <!-- About Section -->
        <div class="bg-white p-3 shadow-sm rounded-sm">
          <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
            <span clas="text-green-500">
              <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </span>
            <span class="tracking-wide">PROFILE DETAILS</span>
          </div>
          <div class="text-gray-700">
            <div class="grid md:grid-cols-2 text-sm">
              <div class="grid grid-cols-3">
                <div class="pl-4 py-2 font-semibold col-span-1">Name</div>
                <div class="px-0 py-2">{{$user->name}}</div>
              </div>
              <div class="grid grid-cols-3">
                <div class="pl-4 py-2 font-semibold col-span-1">Email</div>
                <div class="py-2">{{$user->email}}</div>
              </div>
              <div class="grid grid-cols-3">
                <div class="pl-4 py-2 font-semibold col-span-1">Role</div>
                <div class="py-2">{{ucfirst($user->role)}}</div>
              </div>
              <div class="grid grid-cols-3">
                <div class="pl-4 py-2 font-semibold col-span-1">Updated</div>
                <div class="py-2">{{\Carbon\Carbon::parse($user->updated_at)->format('d-m-Y')}}</div>
              </div>
            </div>
          </div>
          <a href="{{ route('user.articles',[$user]) }}" class="bg-blue-600 block w-full text-white text-base font-semibold rounded py-2 my-4 text-center">SHOW
            USER STORIES</a>
        </div>
        <!-- End of about section -->

        <div class="my-4"></div>
      </div>
    </div>
  </div>
</div>

@endsection