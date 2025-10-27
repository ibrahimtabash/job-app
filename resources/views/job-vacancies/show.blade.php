<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $jobVacancy->title }} - Job Details
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="bg-black shadow-lg rounded-lg p-6 max-w-7xl mx-auto">
            <!-- Back Button -->
            <a href="{{ route('dashboard') }}" class="text-blue-400 hover:underline mb-6 inline-block px-4 py-2 rounded">
                <i class="fa-solid fa-chevron-left text-xs"></i> Back to Jobs
            </a>

            <div class="border-b border-white/10 pb-6">
                <div class="flex items-center justify-between flex-wrap">
                    <div>
                        <h1 class="text-2xl font-bold">{{ $jobVacancy->title }}</h1>
                        <p class="text-md text-gray-400">{{ $jobVacancy->company->name }}</p>

                        <div class="flex items-center gap-2">
                            <p class="text-sm text-gray-400">{{ $jobVacancy->location }}</p>
                            <p class="text-sm text-gray-400">.</p>
                            <p class="text-sm text-gray-400">{{ '$' . number_format($jobVacancy->salary) }}</p>
                            <p class="text-sm rounded-lg bg-white/10 px-4 py-2 text-white">
                                {{ $jobVacancy->type }}</p>

                        </div>
                    </div>

                    <div>
                        <a href="{{ route('job-vacancies.apply', $jobVacancy->id) }}"
                            class="justify-center bg-gradient-to-t from-indigo-500 to-rose-500 text-bg-white rounded-lg px-4 py-10 md:py-2 hover:from-indigo-600 hover:to-rose-600 transition">
                            Apply Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6">
                <div class="col-span-2">
                    <h2 class="text-lg font-bold text-white">Job Description</h2>
                    <p class="text-gray-400">{{ $jobVacancy->description }}</p>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <h2 class="text-lg font-bold text-white">Job Overview</h2>
                    <div class="bg-gray-900 rounded-lg p-6 space-y-4">
                        <div>
                            <p class="text-gray-400">Published Date</p>
                            <p class="text-white">{{ $jobVacancy->created_at->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Company</p>
                            <p class="text-white">{{ $jobVacancy->company->name }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Location</p>
                            <p class="text-white">{{ $jobVacancy->location }}</p>
                        </div>

                        <div>
                            <p class="text-gray-400">Salary</p>
                            <p class="text-white">{{ number_format($jobVacancy->salary) }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Type</p>
                            <p class="text-white">{{ $jobVacancy->type }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Category</p>
                            <p class="text-white">{{ $jobVacancy->jobCategory->name }}</p>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
