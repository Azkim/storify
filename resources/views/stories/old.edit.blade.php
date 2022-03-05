<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold bg-transaprent">
            {{ Breadcrumbs::render('stories.create') }}
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-4 bg-white border-b border-gray-200 text-lg font-black">  
                    EDIT A STORY
                </div>
            </div>
        </div>
    </div>
    
    <div class="pb-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
            <!-- component -->
            <div class="mb-100">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form method="POST" action="{{ route('stories.update',[$story]) }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label class="text-lg text-gray-600">Title of Story<span class="text-red-500">*</span></label></br>
                                    <input type="text" class="border border-solid border-gray-300 rounded p-2 w-9/12 @error('title') is-invalid border-red-500 @enderror" value="{{ old('title',$story->title) }}" name="title">
                                    @error('title')
                                        <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-8">
                                    <label class="text-lg text-gray-600">Body of Story <span class="text-red-500">*</span></label></br>
                                    <textarea name="body" class="text-lg border border-solid border-gray-300 rounded @error('body') is-invalid border-red-500 @enderror" value="">{{ old('body',$story->body) }}</textarea>
                                    @error('body')
                                        <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Two columns -->
                                <div class="flex mt-8 gap-2 grid-cols-1">
                                    <div class="w-1/2 h-12">
                                        <label class="text-lg text-gray-600">Type of Story <span class="text-red-500">*</span></label></br>
                                        <div class="grow justify-left">
                                            <div class="mb-3 xl:w-96">
                                                <select class="form-select form-select-lg appearance-none
                                                block
                                                w-full
                                                px-3
                                                py-1.5
                                                text-base
                                                font-normal
                                                text-gray-700
                                                bg-white bg-clip-padding bg-no-repeat
                                                border border-solid border-gray-300
                                                rounded
                                                transition
                                                ease-in-out
                                                m-0
                                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('type') is-invalid border-red-500 @enderror" aria-label="Default select example" name="type">
                                                    <option></option>
                                                    <option value="educational" {{ 'educational' == old('type',$story->type) ? 'selected' : '' }}>Educational</option>
                                                    <option value="career" {{ 'career' == old('type',$story->type) ? 'selected' : '' }}>Career</option>
                                                    <option value="general" {{ 'general' == old('type',$story->type) ? 'selected' : '' }}>General</option>
                                                </select>
                                                 @error('type')
                                                    <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-1/2 h-full">
                                        <label class="text-lg text-gray-600">Status of Story <span class="text-red-500">*</span></label></br>
                                        <div class="flex justify-right">
                                            <div class="grow">
                                                <div class="form-check">
                                                    <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer @error('status') is-invalid border-red-500 @enderror" type="radio" name="status" value="1" {{ '1' == old('status',$story->status)? 'checked' : '' }} id="flexRadioDefault2">
                                                    <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault2">
                                                        Activated
                                                    </label>
                                                </div>    
                                                <div class="form-check">
                                                    <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="status" value="0" {{ '0' == old('status',$story->status)? 'checked' : '' }} id="flexRadioDefault1">
                                                    <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault1">
                                                        Inactivated
                                                    </label>
                                                </div>
                                                 @error('status')
                                                    <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                                
                                <div class="grid grid-cols-8 gap-2 pt-10">
                                    <button role="submit" class="px-6 py-1.5 bg-green-500 text-white rounded font-bold">UPDATE</button>
                                    <a href="{{route('stories.show',[$story->id])}}" class="px-6 py-1.5 bg-red-500 text-white rounded font-bold text-center">
                                        CANCEL
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

            <script type="text/javascript">
                CKEDITOR.replace('body', {
                    filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form'
                });
            </script>
        </div>
    </div>



</x-app-layout>
