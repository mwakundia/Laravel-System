<x-app-web-layout>
    <div class="w-full min-h-screen bg-gray-100 py-10">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-3xl font-bold">Job Information Details</h1>
                <a href="/roles" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Back</a>
            </div>

            <div class="bg-white p-8 shadow-lg rounded-lg">
                <form action="{{ url('jobs') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                            <input id="job_title" name="job_title" type="text" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Enter job title">
                        </div>
                        <div>
                            <label for="job_position" class="block text-sm font-medium text-gray-700">Job Position</label>
                            <input id="job_position" name="job_position" type="text" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Enter job name">
                        </div>
                        <div>
                            <label for="job_type" class="block text-sm font-medium text-gray-700">Job Category Type</label>
                            <select id="job_type" name="job_type" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="">Select job category type</option>
                                <option value="Software Developer">Software Developer</option>
                                <option value="Web Developer">Web Developer</option>
                                <option value="Network Engineer">Network Engineer</option>
                                <option value="Administrator">Administrator</option>
                            </select>
                        </div>
                        <div>
                            <label for="job_duration" class="block text-sm font-medium text-gray-700">Job Duration</label>
                            <select id="job_duration" name="job_duration" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="">Select job type</option>
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="Contract">Contract</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        <div class="col-span-1 sm:col-span-2">
                            <label for="job_description" class="block text-sm font-medium text-gray-700">Job Description</label>
                            <textarea id="job_description" name="job_description" rows="4" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Enter job description"></textarea>
                        </div>
                        <div class="col-span-1 sm:col-span-2">
                            <label for="job_qualification" class="block text-sm font-medium text-gray-700">Job Qualification</label>
                            <textarea id="job_qualification" name="job_qualification" rows="3" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Enter job qualification"></textarea>
                        </div>
                        <div>
                            <label for="job_location" class="block text-sm font-medium text-gray-700">Job Location</label>
                            <input id="job_location" name="job_location" type="text" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Enter job location">
                        </div>
                        <div>
                            <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                            <input id="salary" name="salary" type="number" step="0.01" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Enter job amount">
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save Job
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-web-layout>
