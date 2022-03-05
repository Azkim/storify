@extends('source._layouts.master')


@section('body')

    @include('source._layouts.metrics')
    
    <div class="flex flex-col mt-8">
        <div class="-my-2 py-0 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead class="bg-blue-800">
                        <tr>
                            <th class="px-6 py-3 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">Author</th>
                            <th class="px-6 py-3 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">Story</th>
                            <th class="px-6 py-3 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach($results as $result)
                            <tr>
                                <td class="px-2 py-4 whitespace-no-wrap border-b border-white">
                                    <div class="flex items-center">

                                        <div class="ml-4">
                                            <div class="text-space leading-5 font-medium text-gray-900">{{ $result->name }}</div>
                                            <div class="text-sm leading-5 text-gray-500">{{ $result->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-white">
                                    <div class="text-space leading-5 text-gray-900">{{ $result->title }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-white">
                                    <div class="line-clamp-3 text-space leading-7 text-gray-900">{!! $result->body !!}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-white">
                                    @if($result->status == 1)
                                        <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active 
                                        </span>
                                    @elseif ($result->status !== 1)
                                        <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="px-10 py-4 whitespace-no-wrap text-right border-b border-white text-sm leading-5 font-medium">
                                    <a href="{{route('stories.show',[$result->id])}}" class="text-indigo-600 hover:text-blue-900">View</a>
                                </td>
                            </tr>
                        @endforeach    
                    </tbody>
                </table>
            </div>
        </div><br>{{$results->links()}}<br><br>
    </div>
@endsection
