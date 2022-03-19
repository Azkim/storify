@extends('source._layouts.master')
@section('body')
<container>
  <div class="mt-10 sm:mt-14 border-solid border-2 border-gray-400 bg-gray-300 sm:rounded-md" style="padding:20px 20px 20px 30px">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-6">
          <!-- edited -->
          <h3 class="text-lg font-medium leading-6 text-gray-900">Edit a User</h3>
          <p class="mt-1 text-sm text-gray-600">Edit a user and give them new details</p>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2 pr-6">
        <form method="POST" action="{{ route('users.update',[$user]) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6 sm:rounded-md">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 xl:col-span-3">
                  <label for="first-name" class="block text-sm font-medium text-gray-700">Full name</label>
                  <input type="text" name="name" value="{{ old('name',$user->name) }}" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') is-invalid border-red-500 @enderror">
                  @error('name')
                  <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 xl:col-span-3">
                  <label for="country" class="block text-sm font-medium text-gray-700">Role</label>
                  <select name="role" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('role') is-invalid border-red-500 @enderror">
                    <option></option>
                    <option value="admin" {{ 'admin' == old('role',$user->role) ? 'selected' : '' }}>Admin</option>
                    <option value="author" {{ 'author' == old('role',$user->role) ? 'selected' : '' }}>Author</option>
                  </select>
                  @error('role')
                  <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 xl:col-span-3">
                  <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                  <input type="email" name="email" value="{{ old('email',$user->email) }}" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('email') is-invalid border-red-500 @enderror">
                  @error('email')
                  <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label class="block text-sm font-medium text-gray-700"> Photo </label>
                  <div class="mb-3 w-96">
                    <input class="form-control
                      block
                      w-full
                      px-0
                      py-3
                      text-base
                      font-normal
                      text-gray-700
                      bg-white bg-clip-padding
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('avatar') is-invalid border-red-500 @enderror" type="file" value="{{ old('avatar',$user->file_name) }}" name="avatar">
                    @error('avatar')
                    <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-span-6">
                  <label for="about" class="block text-sm font-medium text-gray-700"> About </label>
                  <div class="mt-1">
                    <textarea value="" name="description" rows="3" id="body" class="body shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md @error('description') is-invalid border-red-500 @enderror" placeholder="About you...">{{ old('description',$user->description) }}</textarea>
                  </div>
                  <p class="mt-2 text-sm text-gray-500">Brief description for your profile.</p>
                  @error('description')
                  <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1">{{ $message }}</div>
                  @enderror
                </div>

                <input type="hidden" value="{{$user->password}}" name="password">

              </div>
            </div>
            <div class="mt-5 py-3 bg-gray-0 text-right sm:px-0">
              <!-- edited -->
              <button role="submit" type="submit" style="padding-top: 0.250rem;padding-bottom: 0.250rem;" class="px-6 bg-green-700 text-white rounded-md font-bold mr-3">UPDATE</button>
              <a href="{{ route('users.index') }}" style="padding-top: 0.450rem;padding-bottom: 0.450rem;" class="px-6 bg-red-700 text-white rounded-md font-bold">CANCEL</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script>
      tinymce.init({
        selector: 'textarea.body',
        height: 200,
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