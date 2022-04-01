@extends('source._layouts.master')

@section('body')

<div class="flex flex-col mt-8">
    <div class="-my-2 py-0 overflow-x-auto lg:-mx-8 lg:px-8 md:px-4">
        <div class="align-middle inline-block w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            @if($results->isEmpty())
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 text-lg" role="alert">
                <p class="font-bold">Oops!</p>
                <p>There are no users to display.</p>
            </div>
            @else
            <table class="min-w-full border-collapse block md:table">
                <thead class="block md:table-header-group">
                    <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative xs:invisible sm:invisible md:visible lg:visible xl:visible">
                        <th class="bg-gray-600 py-2 pl-8 text-white text-sm font-bold md:border md:border-grey-500 text-left block md:table-cell">USER ID</th>
                        <th class="bg-gray-600 py-2 pl-8 text-white text-sm font-bold md:border md:border-grey-500 text-left block md:table-cell">USER DETAILS</th>
                        <th class="bg-gray-600 py-2 pl-8 text-white text-sm font-bold md:border md:border-grey-500 text-left block md:table-cell">DATE CREATED</th>
                        <th class="grid place-items-center bg-gray-600 py-2 pl-8 pr-8 text-white text-sm font-bold md:border md:border-grey-500 text-left block md:table-cell">STORIES</th>
                        <th class="bg-gray-600 py-2 pl-8  text-white text-sm font-bold md:border md:border-grey-500 text-left block md:table-cell">ACTION</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    @foreach($results as $result)
                    <tr class="bg-gray-100 border border-grey-500 md:border-none block md:table-row">
                        <td class="line-clamp-3 md:break-all text-clip py-4 pl-8 md:border md:border-grey-500 text-left block md:table-cell"><span class="line-clamp-2 text-clip inline-block w-full md:hidden font-bold">USER ID</span>{{ $result->id }}</td>
                        <td class="py-2 pl-8 md:border md:border-grey-500 text-left block md:table-cell Whitespace-no-wrap border-b border-white"><span class="mb-1000 inline-block w-full md:hidden font-bold">USER DETAILS</span>
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{ strpos($result->file_name,'avatar') == false ? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' : asset($result->file_name) }}" alt="">
                                </div>

                                <div class="ml-4">
                                    <div class="text-sm leading-5 font-medium text-gray-900">{{ $result->name }}</div>
                                    <div class="text-sm leading-5 text-gray-500">{{ $result->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="md:break-all text-clip py-2 pl-8 md:border md:border-grey-500 text-left block md:table-cell"><span class="text-clip inline-block w-full md:hidden font-bold">CREATED AT</span>{{\Carbon\Carbon::parse($result->created_at)->format('Y-m-d H:i', '2016-11-05 12:00')}}</td>
                        <td class=" md:break-all text-clip py-2 pl-8 md:border md:border-grey-500 text-left block md:table-cell"><span class="text-clip inline-block w-full md:hidden font-bold">STORIES</span>
                            @if($result->stories()->exists())
                            <span class="text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $result->stories()->count() }}
                            </span>
                            @else
                            <span class="text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                {{ $result->stories()->count() }}
                            </span>
                            @endif
                        </td>
                        <td class="mb-8 py-2 pl-8 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-full md:hidden font-bold">Action</span>
                            <a href="{{route('users.show',[$result->id])}}" class="text-indigo-600 hover:text-blue-900">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><br>{{$results->links()}}<br><br>
            @endif
        </div>
    </div>
</div>
@endsection