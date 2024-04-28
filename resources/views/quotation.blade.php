<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

@vite('resources/css/main.css', 'resources/js/app.js')
<title>Admin Panel</title>

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
    <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Quotation Form</h2>

    <p class="text-gray-600 pl-6 pb-6">
         <a href="#" class="text-indigo-700 hover:underline">Home</a> >
         <span>Quotation Form</span>
      </p>
    </div>   
 
   <!-- Form Request -->
   <div class="mx-auto max-w-xl mt-7 ">
      <ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
         <li class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
            <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                  <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                  </svg>
                  Select<span class="hidden sm:inline-flex sm:ms-2">Request</span>
            </span>
         </li>
         <li class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
            <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                  <span class="me-2">2</span>
                  Quotation <span class="hidden sm:inline-flex sm:ms-2">Info</span>
            </span>
         </li>
         <li class="flex items-center">   
            <span class="me-2">3</span>
            Confirmation
         </li>
      </ol>
   </div>

       <!-- Request Type -->
<!-- Request Type -->
<div class="bg-white mt-10 sm:max-w-xl sm:rounded-lg pl-3 pr-3 mb-4 mx-auto max-w-prose">
    <div class="px-8 mt-1 sm:rounded-lg pb-8">
        <h2 class="pt-7 text-xl font-bold sm:text-xl">Select Request</h2>
        
        <!-- Type of Request -->
        <div class="grid mt-8">
            <div class="mb-4">
                <label for="request_type" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Select Request</label>
                <select id="request_type" name="request_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" required>
                    <option value="" disabled selected>Select Request Transaction</option>
                    <option value="type1">Request Name 1</option>
                    <option value="type2">Request Name 2</option>
                    <option value="type3">Request Name 3</option>
                </select>
            </div>
            
            <!-- Next Button -->
            <div class="flex justify-end w-full">
                <button class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
            </div>
        </div>
    </div>
</div>

<!-- Request Info -->
<div x-data="{ rows: [{},], totalAmount: 0 }" class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-md mt-7">
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
                    
            <!-- Next Button -->
            <div class="flex justify-between w-full mt-4">
                <button class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                <button class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
            </div>
        </div>
</div>


<div x-data="{ rows: [{},], totalAmount: 0 }" class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-md mt-7">
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
                    
            <!-- Next Button -->
            <div class="flex justify-between w-full mt-4">
                <button class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                <button class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
            </div>
        </div>
</div>


<div x-data="{ rows: [{},], totalAmount: 0 }" class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-md mt-7">
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
                    
            <!-- Next Button -->
            <div class="flex justify-between w-full mt-4">
                <button class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                <button class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
            </div>
        </div>
</div>


<!-- Confirmation -->
<!-- Summary Section -->
<!-- Summary Section -->
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
            <button class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mt-2">Send Quotation</button>
        </div>
         <div class="flex justify-between w-full mt-6">
            <button class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
         </div>
    </div>
</div>






      <!-- End Content -->
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

   </script>
</body>
