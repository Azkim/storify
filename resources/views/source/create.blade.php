@extends('source._layouts.master')
@section('body')
<container>
    <div class="mt-10 sm:mt-14 border-solid border-2 border-indigo-300 sm:rounded-md" style="padding:20px 20px 20px 30px">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-6">
                    <!-- edited -->
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Create a Story</h3>
                    <p class="mt-1 text-sm text-gray-600">Write a nice to read story for your audience</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2 pr-6">
                <form method="POST" action="{{ route('stories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6 sm:rounded-md">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 xl:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">Title of Story</label>
                                    <input type="text" name="title" value="{{ old('title') }}" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('title') is-invalid border-red-500 @enderror">
                                    @error('title')
                                        <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 xl:col-span-3">
                                    <label for="about" class="block text-sm font-medium text-gray-700"> Type of Story </label>
                                    <div class="grow justify-left">
                                        <div class="mb-3 xl:w-96">
                                            <select name="type" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('type') is-invalid border-red-500 @enderror">
                                                <option></option>
                                                <option value="educational" {{ 'educational' == old('type') ? 'selected' : '' }}>Educational</option>
                                                <option value="career" {{ 'career' == old('type') ? 'selected' : '' }}>Career</option>
                                                <option value="general" {{ 'general' == old('type') ? 'selected' : '' }}>General</option>
                                            </select>
                                            @error('type')
                                                <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-6">
                                    <label for="about" class="block text-sm font-medium text-gray-700"> Body of Story <span class="text-red-500">*</span></label></br>
                                    <textarea name="body" id="body" class="body border border-solid border-gray-300 rounded @error('body') is-invalid border-red-500 @enderror" value="">{{ old('body') }}</textarea>
                                    @error('body')
                                    <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="about" class="block text-sm font-medium text-gray-700"> Status of Story <span class="text-red-500">*</span></label>
                                    <div class="flex rounded-md bg-white py-4 px-4 overflow-x-auto">
                                        <label class="inline-flex items-center -ml-3">
                                            <input type="radio" class="form-radio h-5 w-5 text-green-500 @error('status') is-invalid border-red-500 @enderror" name="status" value="1" {{ '1' == old('status')? 'checked' : '' }}><span class="ml-3 text-gray-700 text-sm">Active</span>
                                        </label>

                                        <label class="inline-flex items-center ml-3">
                                            <input type="radio" class="form-radio h-5 w-5 text-red-500 @error('status') is-invalid border-red-500 @enderror" name="status" value="0" {{ '0' == old('status')? 'checked' : '' }}><span class="ml-3 text-gray-700 text-sm">Inactive</span>
                                        </label>
                                    </div>
                                    @error('status')
                                    <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-0 ml-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 py-3 bg-gray-0 text-right sm:px-0">
                            <!-- edited -->
                            <button role="submit" type="submit" style="padding-top: 0.250rem;padding-bottom: 0.250rem;" class="px-6 bg-green-700 text-white rounded-md font-bold mr-3">CREATE</button>
                            <a href="{{ route('stories.index') }}" style="padding-top: 0.450rem;padding-bottom: 0.450rem;" class="px-6 bg-red-700 text-white rounded-md font-bold">CANCEL</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
        <script>
            tinymce.init({
                selector: 'textarea.body',
                height: 500,
                plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker blobkquote',
                toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
            });
        </script>
    </div>
</container>
@endsection