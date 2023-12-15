<x-app-layout>
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
                            {{ __('User added Prescriptions') }}
                        </h3>
                    </div>

                    @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-medium">Success alert!</span> {{ session('success') }}
                    </div>
                    @endif

                    @if($prescriptions->isEmpty())
                    <p class="text-center mt-4">No Prescriptions to display.</p>
                    @else
                    <table class="min-w-full border border-gray-300 mb-4">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300">Note</th>
                                <th class="py-2 px-4 border border-gray-300">Address</th>
                                <th class="py-2 px-4 border border-gray-300">Status</th>
                                <th class="py-2 px-4 border border-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prescriptions as $prescription)
                            <tr>
                                <td class="py-2 px-4 border border-gray-300">
                                    {{ strlen($prescription->note) > 80 ? substr($prescription->note, 0, 80) . '...' : $prescription->note }}
                                </td>
                                <td class="py-2 px-4 border border-gray-300">
                                    {{ strlen($prescription->delivery_address) > 80 ? substr($prescription->delivery_address, 0, 80) . '...' : $prescription->delivery_address }}
                                </td>
                                <td class="py-2 px-4 border border-gray-300">
                                    {{ $prescription->string_status }}
                                </td>
                                <td class="py-2 px-4 border border-gray-300">
                                    <a href="{{ route('pharmecy.view_prescription', $prescription->id) }}" target="_blank" class="text-blue-500 hover:underline mr-2">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $prescriptions->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>