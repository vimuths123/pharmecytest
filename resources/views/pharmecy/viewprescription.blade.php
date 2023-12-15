<x-app-layout>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="mx-auto">
                    <div class="max-w-screen-xl mx-auto mb-4">
                        <h3>
                            {{ __('Prescription data') }}
                        </h3>
                    </div>

                    @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-medium">Success alert!</span> {{ session('success') }}
                    </div>
                    @endif

                    <div class="grid grid-cols-12 gap-4">
                        <div class="md:col-span-4 sm:col-span-12 p-4">
                            <main class="cd__main">
                                <!-- Start DEMO HTML (Use the following code into your project)-->
                                <div class="container">
                                    <!-- main images -->
                                    <div class="holder">
                                        @foreach($prescription->images as $image)
                                        <div class="slides">
                                            <img src="{{ asset('/storage/' . $image) }}" alt="" />
                                        </div>
                                        @endforeach
                                    </div>
                                    
                                    <div class="caption-container">
                                        <p id="caption"></p>
                                    </div>

                                    <!-- thumnails in a row -->
                                    <div class="row">
                                        @foreach($prescription->images as $image)
                                        <div class="column">
                                            <img class="slide-thumbnail" src="{{ asset('/storage/' . $image) }}" onclick="currentSlide({{ $loop->index + 1 }})" alt="Prescription image {{ $loop->index + 1 }}">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </main>
                        </div>
                        <div class="md:col-span-8 sm:col-span-12 p-4">
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</x-app-layout>