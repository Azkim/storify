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
                    @can('update',$story)
                    <div class="grid grid-cols-8 gap-2 pt-10">
                        <a href="{{ route('stories.edit',[$story]) }}" class="px-9 py-1.5 bg-green-500 text-white rounded font-bold">EDIT</a>
                        <form method="POST" action="{{ route('stories.destroy',[$story->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="px-6 py-1.5 bg-red-500 text-white rounded font-bold text-center">DELETE</button>
                        </form>
                    </div>
                    @endcan
                    <div>
                        <div class="flex items-center">
                            <x-application-logo class="pr-4 block h-10 w-auto fill-current text-gray-600" />
                            <h1 class="text-gray-700 font-bold">{{$name_of_user}}</h1>
                        </div>
                    </div>
                </div>
          </div>
        </div>
    </div>



</x-app-layout>
