<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

@vite('resources/css/main.css', 'resources/js/app.js')
<title>Quotation Form</title>

<body class="bg-gray-200">
    <!--sidenav -->
      @livewire('sidebar')
      <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        @livewire('navbar')
        <!-- end navbar -->

      <!-- Content -->
       
      <div class="ml-5 mr-5">
    <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Request Forms</h2>

    <p class="text-gray-600 pl-6 pb-6">
         <a href="#" class="text-indigo-700 hover:underline">Home</a> >
         <span>Request Forms</span>
      </p>
    </div>   
 


<!-- Request Type -->
<div x-data="{ step: 1, rows: [{}], requestType: '', showModal: false, showConfirmationModal: false }">
       <!-- Stepper  -->
        <div class="mx-auto max-w-xl mt-7">
            <div class="max-w-sm mx-auto px-4 font-[sans-serif]">
                <h4 class="text-sm font-semibold" x-text="step + '/4 : Step ' + step">1/4 : Step 1</h4>
                <div class="flex items-start gap-3 mt-2">
                    <div x-ref="progress1" class="w-full h-1 rounded-xl bg-green-500"></div>
                    <div x-ref="progress2" class="w-full h-1 rounded-xl bg-gray-300"></div>
                    <div x-ref="progress3" class="w-full h-1 rounded-xl bg-gray-300"></div>
                    <div x-ref="progress4" class="w-full h-1 rounded-xl bg-gray-300"></div>
                </div>
            </div>
        </div>
        <!-- End of Stepper  -->

        <!-- Step 1: Select Request -->
        <div x-show="step === 1" >
            <div class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-md mt-7">
                <div class="px-8 mt-1 sm:rounded-lg pb-8">
                    <h2 class="pt-7 text-xl font-bold sm:text-xl">Quotation Info</h2>
                    <h2 class="pt-7 text-l font-bold sm:text-l">Company 1</h2>
                <div class="grid mt-8">
                    
                    <!-- Request Name -->
                    <div class="mb-4">
                        <label for="request_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Company Name</label>
                        <input type="text" id="request_name" name="request_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" placeholder="Enter request name" required>
                    </div>

                    <!-- Request Date -->
                    <div class="mb-4">
                        <label for="request_date" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Date</label>
                        <input type="date" id="request_date" name="request_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" required>
                    </div>

                    <!-- Request Description -->
                    <div class="mb-4">
                        <label for="request_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Description</label>
                        <textarea id="request_description" name="request_description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" placeholder="Enter request description" required></textarea>
                    </div>

                    <!-- Quotation Items -->
                    <div class="mb-4 flex flex-col">
                        <label for="quotation_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Quotation</label>
                            <div class="overflow-x-auto mb-2">
                                <table id="quotation-table" class="min-w-full bg-white border-gray-300 border rounded-lg">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Item</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Qty</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Unit</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Description</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Unit Price</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Amount</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(row, index) in rows" :key="index">
                                            <tr>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.item" class="border-0 w-full p-2" placeholder="Item" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="number" x-model="row.qty" class="border-0 w-full p-2" placeholder="Qty" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.unit" class="border-0 w-full p-2" placeholder="Unit" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <textarea x-model="row.description" rows="2" class="border-0 w-full p-2" placeholder="Description" required></textarea>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="number" x-model="row.unit_price" class="border-0 w-full p-2" placeholder="Unit Price" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="number" x-model="row.amount" class="border-0 w-full p-2" placeholder="Amount" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <button @click="rows.splice(index, 1)" class="text-red-600 hover:text-red-800 font-medium text-sm">Remove</button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-end">
                                <button @click="rows.push({})" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Add More</button>
                            </div>
                            <tfoot>
                                <tr id="total-row">
                                    <td colspan="5" class="text-right pr-4 text-sm font-medium text-indigo-900 dark:text-black">Total</td>
                                    <td id="total-amount" class="border px-4 py-2 text-right">0</td>
                                </tr>
                            </tfoot>
                        </div>
                    </div>
                        <div class="flex justify-end">
                            <button @click="step = 2; console.log(step); $refs.progress2.classList.add('bg-green-500'); $refs.progress2.classList.remove('bg-gray-300')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="step === 2" >
            <div class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-md mt-7">
                <div class="px-8 mt-1 sm:rounded-lg pb-8">
                    <h2 class="pt-7 text-xl font-bold sm:text-xl">Quotation Info</h2>
                    <h2 class="pt-7 text-l font-bold sm:text-l">Company 2</h2>
                <div class="grid mt-8">
                    
                    <!-- Request Name -->
                    <div class="mb-4">
                        <label for="request_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Company Name</label>
                        <input type="text" id="request_name" name="request_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" placeholder="Enter request name" required>
                    </div>

                    <!-- Request Date -->
                    <div class="mb-4">
                        <label for="request_date" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Date</label>
                        <input type="date" id="request_date" name="request_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" required>
                    </div>

                    <!-- Request Description -->
                    <div class="mb-4">
                        <label for="request_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Description</label>
                        <textarea id="request_description" name="request_description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" placeholder="Enter request description" required></textarea>
                    </div>

                    <!-- Quotation Items -->
                    <div class="mb-4 flex flex-col">
                        <label for="quotation_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Quotation</label>
                            <div class="overflow-x-auto mb-2">
                                <table id="quotation-table" class="min-w-full bg-white border-gray-300 border rounded-lg">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Item</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Qty</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Unit</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Description</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Unit Price</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Amount</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(row, index) in rows" :key="index">
                                            <tr>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.item" class="border-0 w-full p-2" placeholder="Item" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="number" x-model="row.qty" class="border-0 w-full p-2" placeholder="Qty" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.unit" class="border-0 w-full p-2" placeholder="Unit" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <textarea x-model="row.description" rows="2" class="border-0 w-full p-2" placeholder="Description" required></textarea>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="number" x-model="row.unit_price" class="border-0 w-full p-2" placeholder="Unit Price" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="number" x-model="row.amount" class="border-0 w-full p-2" placeholder="Amount" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <button @click="rows.splice(index, 1)" class="text-red-600 hover:text-red-800 font-medium text-sm">Remove</button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-end">
                                <button @click="rows.push({})" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Add More</button>
                            </div>
                            <tfoot>
                                <tr id="total-row">
                                    <td colspan="5" class="text-right pr-4 text-sm font-medium text-indigo-900 dark:text-black">Total</td>
                                    <td id="total-amount" class="border px-4 py-2 text-right">0</td>
                                </tr>
                            </tfoot>
                        </div>
                    </div>
                        <div class="col-span-2 flex justify-between mt-4">
                            <button @click="step = 1; console.log(step); $refs.progress2.classList.remove('bg-green-500'); $refs.progress1.classList.remove('bg-gray-300'); $refs.progress2.classList.add('bg-gray-300'); $refs.progress1.classList.add('bg-green-500')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                            <button @click="step = 3; console.log(step); $refs.progress2.classList.remove('bg-gray-300'); $refs.progress3.classList.add('bg-green-500')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
                        </div>
                </div>
            </div>
            </div>
            <div x-show="step === 3" >
            <div class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-md mt-7">
                <div class="px-8 mt-1 sm:rounded-lg pb-8">
                    <h2 class="pt-7 text-xl font-bold sm:text-xl">Quotation Info</h2>
                    <h2 class="pt-7 text-l font-bold sm:text-l">Company 3</h2>
                <div class="grid mt-8">
                    
                    <!-- Request Name -->
                    <div class="mb-4">
                        <label for="request_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Company Name</label>
                        <input type="text" id="request_name" name="request_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" placeholder="Enter request name" required>
                    </div>

                    <!-- Request Date -->
                    <div class="mb-4">
                        <label for="request_date" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Date</label>
                        <input type="date" id="request_date" name="request_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" required>
                    </div>

                    <!-- Request Description -->
                    <div class="mb-4">
                        <label for="request_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Description</label>
                        <textarea id="request_description" name="request_description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" placeholder="Enter request description" required></textarea>
                    </div>

                    <!-- Quotation Items -->
                    <div class="mb-4 flex flex-col">
                        <label for="quotation_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Quotation</label>
                            <div class="overflow-x-auto mb-2">
                                <table id="quotation-table" class="min-w-full bg-white border-gray-300 border rounded-lg">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Item</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Qty</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Unit</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Description</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Unit Price</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Amount</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(row, index) in rows" :key="index">
                                            <tr>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.item" class="border-0 w-full p-2" placeholder="Item" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="number" x-model="row.qty" class="border-0 w-full p-2" placeholder="Qty" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.unit" class="border-0 w-full p-2" placeholder="Unit" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <textarea x-model="row.description" rows="2" class="border-0 w-full p-2" placeholder="Description" required></textarea>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="number" x-model="row.unit_price" class="border-0 w-full p-2" placeholder="Unit Price" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="number" x-model="row.amount" class="border-0 w-full p-2" placeholder="Amount" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <button @click="rows.splice(index, 1)" class="text-red-600 hover:text-red-800 font-medium text-sm">Remove</button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-end">
                                <button @click="rows.push({})" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Add More</button>
                            </div>
                            <tfoot>
                                <tr id="total-row">
                                    <td colspan="5" class="text-right pr-4 text-sm font-medium text-indigo-900 dark:text-black">Total</td>
                                    <td id="total-amount" class="border px-4 py-2 text-right">0</td>
                                </tr>
                            </tfoot>
                        </div>
                    </div>
                        <div class="col-span-2 flex justify-between mt-4">
                            <button @click="step = 2; console.log(step); $refs.progress2.classList.remove('bg-green-500'); $refs.progress1.classList.remove('bg-gray-300'); $refs.progress2.classList.add('bg-gray-300'); $refs.progress1.classList.add('bg-green-500')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                            <button @click="step = 4; console.log(step); $refs.progress3.classList.remove('bg-gray-300'); $refs.progress4.classList.add('bg-green-500')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
                        </div>
                </div>
            </div>
            </div>
            <div x-show="step === 4" >
            <div class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-md mt-7">
    <div class="px-8 mt-1 sm:rounded-lg pb-8">
        <h2 class="pt-7 text-xl font-bold sm:text-xl">Summary</h2>
        
        <!-- Company 1 Summary -->
        <div class="mt-6">
            <h3 class="text-l font-bold sm:text-l">Company 1</h3>
            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white border-gray-300 border rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Field</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Company 1 Details -->
                        <tr>
                            <td class="border px-4 py-2 text-sm font-medium text-gray-700">Company Name</td>
                            <td class="border px-4 py-2"><span id="summary_company1_name"></span></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 text-sm font-medium text-gray-700">Quotation</td>
                            <td class="border px-4 py-2"><span id="summary_company1_quotation"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Company 2 Summary -->
        <div class="mt-6">
            <h3 class="text-l font-bold sm:text-l">Company 2</h3>
            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white border-gray-300 border rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Field</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Company 2 Details -->
                        <tr>
                            <td class="border px-4 py-2 text-sm font-medium text-gray-700">Company Name</td>
                            <td class="border px-4 py-2"><span id="summary_company2_name"></span></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 text-sm font-medium text-gray-700">Quotation</td>
                            <td class="border px-4 py-2"><span id="summary_company2_quotation"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Company 3 Summary -->
        <div class="mt-6">
            <h3 class="text-l font-bold sm:text-l">Company 3</h3>
            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white border-gray-300 border rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Field</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Company 3 Details -->
                        <tr>
                            <td class="border px-4 py-2 text-sm font-medium text-gray-700">Company Name</td>
                            <td class="border px-4 py-2"><span id="summary_company3_name"></span></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 text-sm font-medium text-gray-700">Quotation</td>
                            <td class="border px-4 py-2"><span id="summary_company3_quotation"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-end w-full mt-4">
            <button @click="showConfirmationModal = true" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mt-2">Send</button>
        </div>
         <div class="flex justify-between w-full mt-6">
            <button @click="step = 3; console.log(step); $refs.progress4.classList.remove('bg-green-500'); $refs.progress3.classList.remove('bg-gray-300'); $refs.progress4.classList.add('bg-gray-300'); $refs.progress3.classList.add('bg-green-500')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
         </div>
    </div>
</div>
 <!-- End of Content -->
 <div x-show="showConfirmationModal" class="fixed inset-0 overflow-y-auto z-[1000]">
            <div class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 cursor-pointer shrink-0 fill-[#333] hover:fill-red-500 float-right" viewBox="0 0 320.591 320.591">
                        <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z" data-original="#000000"></path>
                        <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z" data-original="#000000"></path>
                    </svg>
                    <div class="my-8">
                        <h4 class="text-lg text-[#333] font-semibold">Are you sure you want to send the form? </h4>
                        <p class="text-sm text-gray-500 mt-4">Once submitted, the information provided will be processed accordingly. Please review the details carefully before proceeding</p>
                    </div>
                    <div class="flex justify-end gap-4 max-sm:flex-col">
                        <button type="button" @click="showConfirmationModal = false" class="px-6 py-2.5 min-w-[150px] rounded text-[#333] text-sm font-semibold border-none outline-none bg-gray-200 hover:bg-gray-300 active:bg-gray-200">No, cancel</button>
                        <button type="button" @click="showConfirmationModal = false; showModal = true" class="px-6 py-2.5 min-w-[150px] rounded text-white text-sm font-semibold border-none outline-none bg-[#333] hover:bg-[#222]">Yes, send</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start of Modal -->
        <div x-show="showModal" class="fixed inset-0 overflow-y-auto z-[1000]">
            <div class="fixed inset-0 px-4 flex flex-wrap justify-center items-center w-full h-full z-[100] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 cursor-pointer shrink-0 fill-[#333] hover:fill-red-500 float-right" viewBox="0 0 320.591 320.591">
                        <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z" data-original="#000000"></path>
                        <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z" data-original="#000000"></path>
                    </svg>
                    <div class="my-8 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 shrink-0 fill-[#333] inline" viewBox="0 0 512 512">
                            <path d="M383.841 171.838c-7.881-8.31-21.02-8.676-29.343-.775L221.987 296.732l-63.204-64.893c-8.005-8.213-21.13-8.393-29.35-.387-8.213 7.998-8.386 21.137-.388 29.35l77.492 79.561a20.687 20.687 0 0 0 14.869 6.275 20.744 20.744 0 0 0 14.288-5.694l147.373-139.762c8.316-7.888 8.668-21.027.774-29.344z" data-original="#000000" />
                            <path d="M256 0C114.84 0 0 114.84 0 256s114.84 256 256 256 256-114.84 256-256S397.16 0 256 0zm0 470.487c-118.265 0-214.487-96.214-214.487-214.487 0-118.265 96.221-214.487 214.487-214.487 118.272 0 214.487 96.221 214.487 214.487 0 118.272-96.215 214.487-214.487 214.487z" data-original="#000000" />
                        </svg>
                        <h4 class="text-2xl text-[#333] font-semibold mt-6">The form has been submitted successfully!</h4>
                        <p class="text-sm text-gray-500 mt-4">Thank you for your submission. Your request will now be processed, and you will receive further updates.</p>
                    </div>
                    <button type="button" @click="showModal = false" class="px-6 py-2.5 min-w-[150px] w-full rounded text-white text-sm font-semibold border-none outline-none bg-[#333] hover:bg-[#222]">Okay</button>
                </div>
            </div>
        </div>

        <!-- End of Modal -->

</div>
</main>

   <script src="https://unpkg.com/@popperjs/core@2"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
         
   // start: Sidebar
   const sidebarToggle = document.querySelector('.sidebar-toggle')
   const sidebarOverlay = document.querySelector('.sidebar-overlay')
   const sidebarMenu = document.querySelector('.sidebar-menu')
   const main = document.querySelector('.main')
   sidebarToggle.addEventListener('click', function (e) {
      e.preventDefault()
      main.classList.toggle('active')
      sidebarOverlay.classList.toggle('hidden')
      sidebarMenu.classList.toggle('-translate-x-full')
   })
   sidebarOverlay.addEventListener('click', function (e) {
      e.preventDefault()
      main.classList.add('active')
      sidebarOverlay.classList.add('hidden')
      sidebarMenu.classList.add('-translate-x-full')
   })
   document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
      item.addEventListener('click', function (e) {
         e.preventDefault()
         const parent = item.closest('.group')
         if (parent.classList.contains('selected')) {
               parent.classList.remove('selected')
         } else {
               document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (i) {
                  i.closest('.group').classList.remove('selected')
               })
               parent.classList.add('selected')
         }
      })
   })
   // end: Sidebar

   // start: Popper
   const popperInstance = {}
   document.querySelectorAll('.dropdown').forEach(function (item, index) {
      const popperId = 'popper-' + index
      const toggle = item.querySelector('.dropdown-toggle')
      const menu = item.querySelector('.dropdown-menu')
      menu.dataset.popperId = popperId
      popperInstance[popperId] = Popper.createPopper(toggle, menu, {
         modifiers: [
               {
                  name: 'offset',
                  options: {
                     offset: [0, 8],
                  },
               },
               {
                  name: 'preventOverflow',
                  options: {
                     padding: 24,
                  },
               },
         ],
         placement: 'bottom-end'
      });
   })
   document.addEventListener('click', function (e) {
      const toggle = e.target.closest('.dropdown-toggle')
      const menu = e.target.closest('.dropdown-menu')
      if (toggle) {
         const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
         const popperId = menuEl.dataset.popperId
         if (menuEl.classList.contains('hidden')) {
               hideDropdown()
               menuEl.classList.remove('hidden')
               showPopper(popperId)
         } else {
               menuEl.classList.add('hidden')
               hidePopper(popperId)
         }
      } else if (!menu) {
         hideDropdown()
      }
   })

   function hideDropdown() {
      document.querySelectorAll('.dropdown-menu').forEach(function (item) {
         item.classList.add('hidden')
      })
   }
   function showPopper(popperId) {
      popperInstance[popperId].setOptions(function (options) {
         return {
               ...options,
               modifiers: [
                  ...options.modifiers,
                  { name: 'eventListeners', enabled: true },
               ],
         }
      });
      popperInstance[popperId].update();
   }
   function hidePopper(popperId) {
      popperInstance[popperId].setOptions(function (options) {
         return {
               ...options,
               modifiers: [
                  ...options.modifiers,
                  { name: 'eventListeners', enabled: false },
               ],
         }
      });
   }

   
   // start: Tab
   document.querySelectorAll('[data-tab]').forEach(function (item) {
      item.addEventListener('click', function (e) {
            e.preventDefault()
            const tab = item.dataset.tab
            const page = item.dataset.tabPage
            const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page + '"]')
            document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function (i) {
               i.classList.remove('active')
            })
            document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function (i) {
               i.classList.add('hidden')
            })
            item.classList.add('active')
            target.classList.remove('hidden')
      })
   })
   // end: Tab

   window.addEventListener('DOMContentLoaded', function() {
        // Simulate change event on dropdown to initialize requestType
        document.querySelector('#request_type').dispatchEvent(new Event('change'));
    });
   </script>
</body>
