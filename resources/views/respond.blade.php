<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Approve or Reject the Prescription') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf

                        <x-primary-button class="ml-3" name="approval" value="approve">
                            {{ __('Approve') }}
                        </x-primary-button>
                        <x-primary-button class="ml-3" name="approval" value="reject">
                            {{ __('Reject') }}
                        </x-primary-button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>