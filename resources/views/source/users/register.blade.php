<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="referrer" content="always">
    <link rel="canonical" href="">

    <meta name="description" content="{{ config('dash.meta_description', 'Dum Dum Dum!!') }}">

    <title>Storify App - Login</title>

    <link rel="stylesheet" href="{{ mix('css/main.css') }}">

    <script src="{{ mix('js/main.js') }}"></script>
</head>

<body class="bg-gray-200">

    <div class="flex justify-center items-center h-screen bg-gray-200 px-6">
        <div class="p-6 max-w-xl w-full bg-white shadow-md rounded-md">
            <div class="flex justify-center items-center">
                <svg class="h-10 w-10" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white" />
                </svg>
                <span class="text-gray-700 font-semibold text-2xl">Dashboard</span>
            </div>

            <form class="mt-4" method="POST" action="{{ route('user.save') }}" enctype="multipart/form-data">
                @csrf

                <label class="block mt-3">
                    <span class="text-gray-700 text-sm font-medium" :value="__('Email')">{{ __('Email Address') }}</span>
                    <input id="email" type="email" class="form-input mt-1 block w-full rounded-md focus:border-indigo-600 text-gray-700 text-normal @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" autocomplete="email">
                </label>
                @error('email')
                <span class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="grid grid-flow-row grid-cols-2 gap-6">
                    <div class="col-span-2 md:col-span-1">
                        <label class="block mt-3">
                            <span class="text-gray-700 text-sm font-medium" :value="__('Name')">{{ __('Name') }}</span>
                            <input id="name" type="text" class="form-input mt-1 block w-full rounded-md focus:border-indigo-600 text-gray-700 text-normal  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Full Name" autocomplete="name">

                            @error('name')
                            <span class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </label>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <label class="block mt-3">
                            <span class="text-gray-700 text-sm font-medium" :value="__('Password')">{{ __('Password') }}</span>
                            <input id="password" type="password" class="col-span-2 md:col-span-1 form-input mt-1 block w-full rounded-md focus:border-indigo-600 text-gray-700 text-normal @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" autocomplete="new-password">
                            @error('password')
                            <span class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </label>
                    </div>
                </div>

                <label class="block mt-3">
                    <span class="text-gray-700 text-sm font-medium" :value="__('About You')">{{ __('About You') }}</span>
                    <textarea class="form-input mt-1 block w-full rounded-md focus:border-indigo-600 text-gray-700 text-normal @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="A brief description about you" autocomplete="description"></textarea>

                    @error('description')
                    <span class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>

                <div class="grid grid-flow-row grid-cols-2 gap-6">
                    <div class="col-span-2 md:col-span-1">
                        <label class="block mt-3">
                            <span class="text-gray-700 text-sm font-medium" :value="__('Role')">{{ __('Your Role') }}</span>
                            <select name="role" autocomplete="country-name" class="form-input mt-1 block w-full rounded-md focus:border-indigo-600 text-gray-700 text-normal @error('role') is-invalid border-red-500 @enderror">
                                <option value="" disabled selected>Choose your role</option>
                                <option value="admin" {{ 'admin' == old('role') ? 'selected' : '' }}>Admin</option>
                                <option value="author" {{ 'author' == old('role') ? 'selected' : '' }}>Author</option>
                            </select>
                            @error('role')
                            <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-1 ml-1"><strong>{{ $message }}</strong></div>
                            @enderror
                        </label>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <label class="block mt-3">
                            <span class="text-gray-700 text-sm font-medium" :value="__('Avatar')">{{ __('Profile Photo') }}</span>

                            <input class="form-input mt-1 block w-full rounded-md
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            py-2
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('avatar') is-invalid border-red-500 @enderror" type="file" value="{{ old('avatar') }}" name="avatar">
                            @error('avatar')
                            <div class="alert alert-danger flex items-center font-medium tracking-wide text-red-500 text-sm mt-0 ml-1"><strong>{{ $message }}</strong></div>
                            @enderror
                        </label>
                    </div>
                </div>

                <div class="mt-6 flex justify-center items-center">
                    <div class="w-full">
                        <button role="submit" type="submit" class="py-2 px-4 font-semibold text-center bg-indigo-600 rounded-md w-full text-white text-sm hover:bg-indigo-500">
                            REGISTER
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>