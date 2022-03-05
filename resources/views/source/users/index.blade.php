@extends('source._layouts.master')

@section('body')

@include('source._layouts.metrics')

<div class="flex flex-col mt-8">
    <div class="-my-2 py-0 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-blue-800">
                    <tr>
                        <th class="px-6 py-3 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">User id</th>
                        <th class="px-6 py-3 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">User Email</th>
                        <th class="px-6 py-3 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">Date Created</th>
                        <th class="px-6 py-3 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">Count of Stories</th>
                        <th class="px-6 py-3 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @foreach($results as $result)
                    <tr>
                        <td class="px-2 py-4 whitespace-no-wrap border-b border-white">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="text-sm leading-5 font-medium text-gray-900">{{ $result->id }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-white">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{ strpos($result->file_path,'avatar') == false ? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' : asset($result->file_path) }}" alt="">
                                </div>

                                <div class="ml-4">
                                    <div class="text-sm leading-5 font-medium text-gray-900">{{ $result->name }}</div>
                                    <div class="text-sm leading-5 text-gray-500">{{ $result->email }}</div>
                                </div>
                            </div> 
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-white">
                            <div class="line-clamp-3 text-sm leading-7 text-gray-900">{{ $result->created_at }}</div>
                        </td>

                        <td class="text-left px-8 py-4 whitespace-no-wrap border-b border-white">
                            @if($result->stories()->exists())
                            <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $result->stories()->count() }}
                            </span>
                            @else
                            <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                {{ $result->stories()->count() }}
                            </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap text-left border-b border-white text-sm leading-5 font-medium">
                            <a href="{{route('users.show',[$result->id])}}" class="text-indigo-600 hover:text-blue-900">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><br>{{$results->links()}}<br><br>
</div>
@endsection