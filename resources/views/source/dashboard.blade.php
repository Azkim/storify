@extends('source._layouts.master')
@section('body')

<div class="relative rounded-xl overflow-auto p-8">
    <div class="grid grid-cols-2 gap-4">
        <div class="flex flex-wrap col-span-2 divide-y">
            <h2 class="text-3xl font-bold text-gray-700 leading-10 mb-3">Performance Indicators</h2>
        </div>
        <div class="flex flex-wrap md:col-span-1 sm:col-span-2">
            <div class="flex items-center pl-5 py-3 shadow-sm rounded-md bg-white sm:w-full">
                <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                    <svg class="md:h-10 sm:h-6  md:w-10 sm:w-6 text-white" viewBox="0 0 28 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z" fill="currentColor" />
                        <path d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z" fill="currentColor" />
                        <path d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z" fill="currentColor" />
                        <path d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z" fill="currentColor" />
                        <path d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z" fill="currentColor" />
                        <path d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z" fill="currentColor" />
                    </svg>
                </div>

                <div class="mx-5 mb-2">
                    <h4 class="md:pl-3 sm:pl-1 md:text-3xl sm:text-lg font-semibold text-gray-700 ">{{ $total['users'] }}</h4>
                    <div class="md:pl-3 sm:pl-1 text-gray-500 md:text-xl sm:text-sm leading-3">TOTAL USERS</div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap md:col-span-1 sm:col-span-2 ">
            <div class="flex items-center pl-5 py-3 shadow-sm rounded-md bg-white sm:w-full">
                <div class="p-3 rounded-full bg-blue-600 bg-opacity-75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="md:h-10 sm:h-6  md:w-10 sm:w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                    </svg>
                </div>

                <div class="mx-5 mb-2">
                    <h4 class="md:pl-3 sm:pl-1 md:text-3xl sm:text-lg font-semibold text-gray-700">{{ $total['authors'] }}</h4>
                    <div class="md:pl-3 sm:pl-1 text-gray-500 md:text-xl sm:text-sm leading-3">TOTAL AUTHORS</div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap md:col-span-1 sm:col-span-2">
            <div class="flex items-center pl-5 py-3 shadow-sm rounded-md bg-white sm:w-full">
                <div class="p-3 rounded-full bg-green-600 bg-opacity-75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="md:h-10 sm:h-6  md:w-10 sm:w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>

                <div class="mx-5 mb-2">
                    <h4 class="md:pl-3 sm:pl-1 md:text-3xl sm:text-lg font-semibold text-gray-700">{{ $total['active_stories'] }}</h4>
                    <div class="md:pl-3 sm:pl-1 text-gray-500 md:text-xl sm:text-sm leading-3">ACTIVE STORIES</div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap md:col-span-1 sm:col-span-2">
            <div class="flex items-center pl-5 py-3 shadow-sm rounded-md bg-white sm:w-full">
                <div class="p-3 rounded-full bg-red-600 bg-opacity-75 col-span-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="md:h-10 sm:h-6  md:w-10 sm:w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>

                <div class="mx-5 mb-2">
                    <h4 class="md:pl-3 sm:pl-1 md:text-3xl sm:text-lg font-semibold text-gray-700">{{ $total['inactive_stories'] }}</h4>
                    <div class="md:pl-3 sm:pl-1 text-gray-500 md:text-xl sm:text-sm leading-3">INACTIVE STORIES</div>
                </div>
            </div>
        </div>
        <!-- Chart's container -->
        <div class="flex flex-wrap col-span-2 divide-y">
            <h2 class="text-3xl font-bold text-gray-700 leading-10 mt-10 mb-0">Performance Trends</h2>
        </div>
        <div id="chart1" class="md:col-span-2 sm:col-span-2 mb-10" style="height: 400px;"></div>
        <div id="chart2" class="md:col-span-2 sm:col-span-2" style="height: 400px;"></div>
    </div>
</div>

<!-- Charting library -->
<script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
<!-- Your application script -->
<script>
    var route = "{{route('user.chart')}}";
    const user_chart = new Chartisan({
        el: '#chart1',
        url: route,
        hooks: new ChartisanHooks()
            .colors(['#ECC94B', '#4299E1'])
            .responsive()
            .beginAtZero()
            .legend({
                position: 'bottom',
                display: false,
                labels: {
                    fontColor: 'rgb(0, 0, 0)',
                    fontSize: 14,
                    boxWidth: 20
                }
            })
            .title({
                text: 'Users per Month',
                fontSize: 25,
                padding: 10,
                fontStyle: 'bold',
                lineHeight: 2,
                position: 'top'
            })
            .datasets([{
                type: 'line',
                fill: false,
                backgroundColor: '#F4A03A',
                borderColor: '#083050',
                borderWidth: 1,
                beginAtZero: true
            }]),
    });
</script>

<script>
    var route = "{{route('story.chart')}}";
    const story_chart = new Chartisan({
        el: '#chart2',
        url: route,
        hooks: new ChartisanHooks()
            .colors(['#ECC94B', '#4299E1'])
            .responsive()
            .beginAtZero()
            .legend({
                position: 'bottom',
                display: false,
                labels: {
                    fontColor: 'rgb(0, 0, 0)',
                    fontSize: 14,
                    boxWidth: 20
                }
            })
            .title({
                text: 'Stories per Month',
                fontSize: 25,
                padding: 10,
                fontStyle: 'bold',
                lineHeight: 2,
                position: 'top'
            })
            .datasets([{
                type: 'line',
                fill: false,
                backgroundColor: '#F4A03A',
                borderColor: '#083050',
                borderWidth: 1,
                beginAtZero: true
            }]),
    });
</script>

@endsection