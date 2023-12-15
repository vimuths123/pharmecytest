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

                    <div class="grid grid-cols-12 gap-4" x-data="{ drug: '', quantity: '', items: [], total: 0.00 }">
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
                            <div>
                                <table class="min-w-full  mb-4">
                                    <thead>
                                        <tr>
                                            <th class="py-2 px-4 text-left">Drug</th>
                                            <th class="py-2 px-4 text-left">Quantity</th>
                                            <th class="py-2 px-4 text-left">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in items" :key="item.code">
                                            <tr>
                                                <td class="py-2 px-4" x-text="item.name"></td>
                                                <td class="py-2 px-4" x-text="`${item.price.toFixed(2)} x ${item.quantity}`"></td>
                                                <td class="py-2 px-4" x-text="item.amount.toFixed(2)"></td>
                                            </tr>
                                        </template>
                                        <tr>
                                            <td class="py-2 px-4 ">

                                            </td>
                                            <td class="py-2 px-4 ">
                                                <b>Total</b>
                                            </td>
                                            <td class="py-2 px-4 " x-text="`${total.toFixed(2)}`">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="px-4 py-1 text-right">
                                    <label>Drug: <input class="ml-4" x-model="drug" type="text" /> </label>
                                </div>
                                <div class="px-4 py-1 text-right">
                                    <label>Quantity: <input class="ml-4" x-model="quantity" type="text" /> </label>
                                </div>
                                <div class="px-4 py-1 text-right">
                                    <button @click="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</button>
                                </div>

                            </div>

                        </div>
                        <div class="sm:col-span-12 p-4 text-right">
                            <button @click="sendQuotation" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Send Quotation</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        function displayValue() {
            this.outputValue = this.inputValue;
        }
    </script>
    <script>
        function add() {
            const drugDetailsList = [{
                    code: 'ABC123',
                    name: 'Amoxicillin 250mg',
                    price: 10.50
                },
                {
                    code: 'ABC234',
                    name: 'Paracetamol 500mg',
                    price: 5.00
                },
                // Add more drugs as needed (Or can be used a db record)
            ];

            const existingDrug = drugDetailsList.find(drug => drug.code === this.drug);

            if (existingDrug) {
                const prescription = {
                    code: existingDrug.code,
                    name: existingDrug.name,
                    quantity: this.quantity,
                    price: existingDrug.price,
                    amount: existingDrug.price * this.quantity
                };

                this.items.push(prescription);
                // console.log("Items:", this.items);
                this.total += existingDrug.price * parseInt(this.quantity, 10);
                // console.log("Prescription added:", prescription);
            } else {
                alert("Drug not found in the list")
                // console.log("Drug not found in the list");
            }
        }
        function sendQuotation(){
            console.log("Items:", this.items);
        }
    </script>
</x-app-layout>