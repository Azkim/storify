<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            STORIES PAGE
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-20 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-8 gap-4">
                    <div class="col-start-1 col-end-3">
                        <div class="px-6 py-4 text-lg font-black">  
                            LIST OF STORIES
                        </div>
                    </div>
                    <div class="col-end-9 col-span-1">
                        <a href="{{route('stories.create')}}" class="px-6 py-4 flex items-center justify-end shrink">
                            <button type="button" class="flex-row-reverse px-4 py-1.5 bg-red-600 text-white font-bold text-space leading-tight uppercase rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-0">
        <div class=" mx-20 sm:px-6 lg:px-8">
            @if($results->isEmpty())
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 text-lg" role="alert">
                    <p class="font-bold">Oops!</p>
                    <p >There are no blog articles to display.</p>
                </div>
            @else
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-slate-600" style="background:grey">
                                        <tr>
                                            <th scope="col" class="px-28 text-left text-lg font-bold text-white uppercase tracking-wider border border-gray-300">
                                                Story
                                            </th>
                                            <th scope="col" class="px-6 text-left text-lg font-bold text-white uppercase tracking-wider border border-gray-300">
                                                Body of Story
                                            </th>
                                            <th scope="col" class="px-6 text-left text-lg font-bold text-white uppercase tracking-wider border border-gray-300">
                                                Author
                                            </th>
                                            <th scope="col" class="px-6 text-left text-lg font-bold text-white uppercase tracking-wider border border-gray-300">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 text-left text-lg font-bold text-white uppercase tracking-wider border border-gray-300">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($results as $result)
                                                <tr>
                                                    <td class="px-4 whitespace-normal border border-gray-300">
                                                        <div class="flex items-center">
                                                            <div class="text-lg font-light leading-relaxed mt-6 mb-4 text-gray-800">
                                                                {{$result->title}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 whitespace-normal border border-gray-300">
                                                        <div class="line-clamp-2 text-lg font-light leading-relaxed mt-6 mb-4 text-gray-800 display: inline">
                                                            {!! $result->body !!}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 whitespace-normal border border-gray-300">
                                                        <div class="text-lg font-light leading-relaxed mt-6 mb-4 text-gray-800">
                                                            {{$result->name}}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 whitespace-normal border border-gray-300">
                                                        @if($result->status == 1)
                                                            <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                Active
                                                            </span>
                                                        @elseif ($result->status !== 1)
                                                            <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-red-300 text-red-800">
                                                                Inactive
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 whitespace-normal text-right text-base font-semibold border border-gray-300">
                                                        <a href="{{route('stories.show',[$result->id])}}">
                                                            <button type="button" class=" px-6 py-1.5 bg-blue-600 text-white font-bold text-space leading-tight uppercase rounded">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div><br>{{$results->links()}}<br><br>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
