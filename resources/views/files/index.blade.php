<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('File Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @if (session('success'))
                        <div id="success-alert" class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                                <div class="py-1">
                                    <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold">{{ session('success') }}</p>
                                    <p class="text-sm">Make sure you know how these changes affect you.</p>
                                </div>
                            </div>
                        </div>

                        <script>
                            setTimeout(() => {
                                const alert = document.getElementById('success-alert');
                                if (alert) {
                                    alert.style.transition = "opacity 0.5s ease";
                                    alert.style.opacity = 0;
                                    setTimeout(() => alert.style.display = 'none', 500); // Espera a que la transición termine antes de ocultar
                                }
                            }, 3000); // Desaparece después de 3000 ms
                        </script>
                    @endif

                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">{{ __("Upload Your File") }}</h3>

                    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select a file:</label>
                            <input type="file" name="file" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Upload
                        </button>
                    </form>

                    <h2 class="mt-6 text-lg font-semibold text-gray-900 dark:text-gray-100">Uploaded Files:</h2>
                    <div class="mt-2 space-y-2">
                        @foreach ($files as $file)
                            <div class="flex justify-between items-center bg-gray-100 dark:bg-gray-700 p-4 rounded-md shadow">
                                <p class="text-gray-800 dark:text-gray-300">
                                    {{ $file->name }}
                                </p>
                                <a href="{{ asset('storage/' . $file->route) }}" target="_blank" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                                    </svg>
                                    <span>Download</span>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        <a href="/" class="inline-flex items-center justify-center px-4 py-2 bg-gray-300 text-gray-800 font-semibold rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                            ---> Go Back <---
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
