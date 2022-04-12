@extends('source._layouts.master')

@section('body')
@include('source._layouts.search')

<div class="flex flex-col mt-8">
    <div class="-my-2 py-0 overflow-x-auto lg:-mx-8 lg:px-8 md:px-4">
        <div class="align-middle inline-block w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">

            @if($results->isEmpty())
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 text-lg" role="alert">
                <p class="font-bold">Oops!</p>
                <p>There are no stories to display.</p>
            </div>
            @else

            <table class="min-w-full border-collapse block md:table">
                <thead class="block md:table-header-group">
                    <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative xs:invisible sm:invisible md:visible lg:visible xl:visible">
                        <th class="bg-gray-600 py-2 pl-8 text-white text-sm font-bold md:border md:border-grey-500 text-left block md:table-cell">TIME CREATED</th>
                        <th class="bg-gray-600 py-2 pl-8 text-white text-sm font-bold md:border md:border-grey-500 text-left block md:table-cell">AUTHOR</th>
                        <th class="bg-gray-600 py-2 pl-8 text-white text-sm font-bold md:border md:border-grey-500 text-left block md:table-cell">TITLE OF STORY</th>
                        <th class="bg-gray-600 py-2 pl-8 text-white text-sm font-bold md:border md:border-grey-500 text-left block md:table-cell">TYPE OF STORY</th>
                        <th class="grid place-items-center bg-gray-600 py-2 pl-8 pr-10 text-white text-sm font-bold md:border md:border-grey-500 text-left block md:table-cell">STATUS</th>
                        <th class="bg-gray-600 py-2 pl-8  text-white text-sm font-bold md:border md:border-grey-500 text-left block md:table-cell">ACTION</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    @foreach($results as $result)
                    <tr class="bg-gray-100 border border-grey-500 md:border-none block md:table-row">
                        <td class="line-clamp-3 md:break-all text-clip py-2 pl-8 md:border md:border-grey-500 text-left block md:table-cell"><span class="line-clamp-2 text-clip inline-block w-full md:hidden font-bold">Time Created</span>{{\Carbon\Carbon::parse($result->created_at)->format('Y-m-d H:i', '2016-11-05 12:00')}}</td>
                        <td class="py-2 pl-8 md:border md:border-grey-500 text-left block md:table-cell"><span class="mb-1000 inline-block w-full md:hidden font-bold">Author</span>{{ $result->name }}</td>
                        <td class="py-2 pl-8 md:border md:border-grey-500 text-left block md:table-cell"><span class="mb-1000 inline-block w-full md:hidden font-bold">Title</span>{{ $result->title }}</td>
                        <td class="py-2 pl-8 md:border md:border-grey-500 text-left block md:table-cell"><span class="mb-1000 inline-block w-full md:hidden font-bold">Title</span>{{ ucfirst($result->type) }}</td>
                        <td class="py-2 pl-8 whitespace-no-wrap border-b border-white">
                            @if($result->status == 1)
                            <span class="inline-block w-full md:hidden font-bold">Status</span>
                            <span class="inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                            @elseif ($result->status !== 1)
                            <span class="inline-block w-full md:hidden font-bold">Status</span>
                            <span class="inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Inactive
                            </span>
                            @endif
                        </td>
                        <td class="mb-8 py-2 pl-8 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-full md:hidden font-bold">Action</span>
                            <a href="{{route('stories.show',[$result->id])}}" class="text-indigo-600 hover:text-blue-900">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><br>{{$results->withQueryString()->links()}}<br><br>
            @endif
        </div>
    </div>
</div>
@endsection