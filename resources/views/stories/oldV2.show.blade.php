<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold" style="background-color:white!important">
            {{ Breadcrumbs::render('stories.show') }}
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-4 bg-white border-b border-gray-200 text-lg font-black">  
                    STORY DETAILS
                </div>
            </div>
        </div>
    </div>
    
    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
          <!-- component -->
          <div class="max-w-7xl px-10 my-4 py-6 bg-white rounded-lg shadow-md">
              <div class="flex justify-between items-center">
                  <span class="font-light text-gray-600">{{\Carbon\Carbon::parse($story->created_at)->format('l jS \\of F, Y')}}</span>
                  
                  @if($story->status == 1)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                        </span>
                    @elseif ($story->status !== 1)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-300 text-red-800">
                            Inactive
                        </span>
                    @endif
              </div>
              <div class="mt-2">
                  <p class="text-2xl text-gray-700 font-bold hover:text-gray-600">{{$story->title}}</p>
                  <p class="mt-2 text-gray-600 text-lg">{!!$story->body!!}</p>
              </div>
              <div class="flex justify-between items-center mt-4">

                    <div class="flex items-center justify-center">
                        <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
                            <a href="{{ route('stories.edit',[$story]) }}">
                                <button type="button" class="rounded px-7 py-1.5 bg-green-600 text-white font-bold text-xs leading-tight uppercase hover:bg-green-700 focus:bg-green-700 focus:outline-none focus:ring-0 active:bg-green-800 transition duration-150 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                  
                    <div>
                        <div class="flex items-center">
                            <x-application-logo class="px-4 block h-10 w-auto fill-current text-gray-600" />
                            <h1 class="text-gray-700 font-bold">{{$name_of_user}}</h1>
                        </div>
                  </div>
              </div>
          </div>
        </div>
    </div>



</x-app-layout>
