<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="referrer" content="always">
    <link rel="canonical" href="">

    <meta name="description" content="{{ config('dash.meta_description', 'Dum Dum Dum!!') }}">

    <title>{{ config('app.name', 'Laravel') }} </title>

    <link rel="stylesheet" href="{{ mix('css/main.css') }}">

    <script src="{{ mix('js/main.js') }}"></script>
</head>

<body>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
        @include('source._layouts.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('source._layouts.header')

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-2">
                    <h3 class="text-white-700 text-3xl font-medium">@yield('pageTitle')</h3>

                    @if ($message = Session::get('status'))
                    <div class="pt-6 pb-8">
                        <div class="mx-auto">
                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                                <p> {{ $message }} </p>
                            </div>
                        </div>
                    </div>
                    @endif

                    @yield('body')
                </div>
            </main>
        </div>
    </div>
</body>

</html>