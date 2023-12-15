<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('prescription.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">Note</span>
                                <textarea name="note" class="block w-full @error('note') border-red-500 @enderror mt-1 rounded-md" placeholder="">{{ old('note') }}</textarea>
                            </label>
                            @error('note')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">Delivery Address</span>
                                <textarea name="delivery_address" class="block w-full @error('delivery_address') border-red-500 @enderror mt-1 rounded-md" placeholder="">{{ old('delivery_address') }}</textarea>
                            </label>
                            @error('delivery_address')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">Time slot</span>
                                <input type="text" name="time_slot" class="block w-full @error('time_slot') border-red-500 @enderror mt-1 rounded-md" placeholder="" value="{{old('time_slot')}}" />
                            </label>
                            @error('time_slot')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block">
                                <span class="text-gray-700">Prescription Images</span>
                                <input type="file" name="images[]" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" multiple />
                            </label>
                            @error('images')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                            @error('images.*')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <x-primary-button class="ml-3">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>