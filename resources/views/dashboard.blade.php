<x-app-web-layout>


    
    @role('admin|super-admin')
    <div class="bg-gray-100 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-10 shadow-xl rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold">Welcome, <b>{{ Auth::user()->name }}</b></h1>
                    
                </div>
                <div class="mt-10">
                    <h1 class="text-xl font-bold mb-4">Actions</h1>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <x-action-box title="Manage Users" color="green" link="/users" linkText="View" addLink="/users/create" addLinkText="Add User" />
                        <x-action-box title="Manage Jobs" color="gray" link="/jobs" linkText="View" addLink="/jobs/create" addLinkText="Add Job" />
                        <x-action-box title="Manage Permissions" color="purple" link="/permissions" linkText="View" addLink="/permissions/create" addLinkText="Add Permission" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole

    
    @role('alumni')
<div class="py-12 bg-blue-50">
    <div class="max-w-7xl mx-auto bg-white p-10 shadow-lg rounded-lg">
        <!-- Category Section -->
        <div class="p-8 category bg-gray-200 rounded-lg">
            <div class="flex justify-between gap-10">
                
                <!-- Job Types Section -->
                <div class="job">
                    <div class="font-semibold text-xl text-blue-600 mb-4">Job Types</div>
                    @if(is_array($jobs) || is_object($jobs))
                        @foreach ($jobs as $job)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" id="job_type_{{ $job->id }}" class="mr-2">
                                <label for="job_type_{{ $job->id }}" class="text-gray-700">{{ $job->type }}</label>
                            </div>
                        @endforeach
                    @else
                        <p>No job types available.</p>
                    @endif
                </div>
                
                <!-- Budget Section -->
                <div class="amount">
                    <div class="text-xl font-semibold text-blue-600 mb-4">Budget Range</div>
                    <label for="points" class="block text-gray-700 mb-2">Set your budget:</label>
                    <input type="range" id="points" class="w-full h-2 bg-blue-300 rounded-lg appearance-none cursor-pointer">
                </div>
                
                <!-- Duration Section -->
                <div class="time">
                    <div class="text-xl font-semibold text-blue-600 mb-4">Duration</div>
                    @if(is_array($jobs) || is_object($jobs))
                        @foreach ($jobs as $job)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" id="job_duration_{{ $job->id }}" class="mr-2">
                                <label for="job_duration_{{ $job->id }}" class="text-gray-700">{{ $job->duration }}</label>
                            </div>
                        @endforeach
                    @else
                        <p>No duration options available.</p>
                    @endif
                </div>
                
                <!-- Search Button -->
                <div class="search flex items-end">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300 ease-in-out">
                        Search
                    </button>
                </div>
            </div>
            <hr class="mt-8">
        </div>
        
        <!-- Job Listings Section -->
        <div class="mt-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Available Jobs</h2>
            @if(is_array($jobs) || is_object($jobs))
                @foreach ($jobs as $job)
                    <div class="mt-6 p-8 bg-white rounded-lg shadow-md transition-transform transform hover:scale-105">
                        <a href="{{ url('jobs/' . $job->id) }}" class="block text-gray-900 hover:text-blue-600">
                            <p class="text-lg text-blue-700 font-semibold uppercase">{{ $job->title }}</p>
                            <h5 class="mt-2 mb-4 text-2xl font-bold">{{ $job->company_name }}</h5>
                            <div class="flex flex-wrap gap-4 text-gray-600">
                                <p><span class="font-semibold">Fixed Price:</span> ${{ $job->price }}</p>
                                <p><i class="fas fa-map-marker-alt"></i> {{ $job->location }}</p>
                                <p><i class="fas fa-clock"></i> {{ $job->duration }}</p>
                            </div>
                            <p class="mt-4 text-gray-700">{{ Str::limit($job->description, 100, '...') }}</p>
                            <div class="mt-4">
                                <a href="{{ url('jobs/' . $job->id) }}" class="text-blue-500 hover:underline">Read more</a>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p>No jobs available at the moment.</p>
            @endif
        </div>

        <!-- Applied Jobs Section -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Jobs You've Applied For</h2>
            @if(isset($applications) && (is_array($applications) || is_object($applications)))
                @if($applications->isEmpty())
                    <p class="text-gray-700">You have not applied for any jobs yet.</p>
                @else
                    @foreach ($applications as $application)
                        <div class="mt-6 p-8 bg-white rounded-lg shadow-md transition-transform transform hover:scale-105">
                            <a href="{{ url('jobs/' . $application->job->id) }}" class="block text-gray-900 hover:text-blue-600">
                                <p class="text-lg text-blue-700 font-semibold uppercase">{{ $application->job->title }}</p>
                                <h5 class="mt-2 mb-4 text-2xl font-bold">{{ $application->job->company_name }}</h5>
                                <div class="flex flex-wrap gap-4 text-gray-600">
                                    <p><span class="font-semibold">Status:</span> {{ ucfirst($application->status) }}</p>
                                    <p><i class="fas fa-clock"></i> Applied on {{ $application->created_at->format('M d, Y') }}</p>
                                </div>
                                <p class="mt-4 text-gray-700">{{ Str::limit($application->job->description, 100, '...') }}</p>
                                <div class="mt-4">
                                    <a href="{{ url('jobs/' . $application->job->id) }}" class="text-blue-500 hover:underline">Read more</a>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            @else
                <p class="text-gray-700">Unable to retrieve application data.</p>
            @endif
        </div>
    </div>
</div>
@endrole
</x-app-web-layout>