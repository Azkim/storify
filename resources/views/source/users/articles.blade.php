@extends('source._layouts.master')
@section('body')

<div class="flex flex-col mt-8">
    <div class="-my-2 py-0 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            
    <table class="min-w-full border-collapse block md:table">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative sm:invisible xs:invisible md:visible lg:visible xl:visible">
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Title</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Status</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
			</tr>
		</thead>
		<tbody class="block md:table-row-group">
        @foreach($results as $result)
			<tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Name</span>{{ $result->title }}</td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">User Name</span>jrios1</td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
					<span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
					<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Edit</button>
					<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
				</td>
			</tr>
            @endforeach			
		</tbody>
	</table>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <table class="min-w-full">
                <thead class="bg-blue-800">
                    <tr>
                        <th class="pl-6 py-3 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">Title</th>
                        <th class="mr-200 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">Status</th>
                        <th class="py-0 border-b border-white bg-white-50 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @foreach($results as $result)
                    <tr>

                        <td class="pl-6 py-4 whitespace-no-wrap border-b border-white">
                            <div class="text-space leading-5 text-gray-900">{{ $result->title }}</div>
                        </td>

                        <td class="pl-0 py-4 whitespace-no-wrap border-b border-white">
                            @if($result->status == 1)
                            <span class=" inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                            @elseif ($result->status !== 1)
                            <span class="px-0 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Inactive
                            </span>
                            @endif
                        </td>

                        <td class="px-0 py-4 whitespace-no-wrap text-right border-b border-white text-sm leading-5 font-medium">
                            <a href="{{route('stories.show',[$result->id])}}" class="text-indigo-600 hover:text-blue-900">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><br>{{$results->links()}}<br><br>
</div>
@endsection