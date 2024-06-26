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
        <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Request Forms</h2>
        <ol class="list-none p-0 inline-flex space-x-2 ml-6 ">
            <li class="flex items-center">
            <svg onclick="window.location.href='/';" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="cursor-pointer hover:fill-blue-500 transition-colors duration-300" fill="#4b5563"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>        <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <span class="text-gray-800">Request Forms</span>
            </li>
        </ol>
    </div>
 
 


<!-- Request Type -->
<div x-data="{ step: 1, rows: [{}], requestType: '', showModal: false, showConfirmationModal: false }">
       <!-- Stepper  -->
        <div class="mx-auto max-w-xl mt-7">
            <div class="max-w-sm mx-auto px-4 font-[sans-serif]">
                <h4 class="text-md font-semibold" x-text="step + '/3 : Step ' + step">1/3 : Step 1</h4>
                <div class="flex items-start gap-3 mt-2">
                    <div x-ref="progress1" class="w-full h-1 rounded-xl bg-green-500"></div>
                    <div x-ref="progress2" class="w-full h-1 rounded-xl bg-gray-300"></div>
                    <div x-ref="progress3" class="w-full h-1 rounded-xl bg-gray-300"></div>
                </div>
            </div>
        </div>
        <!-- End of Stepper  -->

        <!-- Step 1: Select Request -->
        <div x-show="step === 1">
            <div class="bg-white mt-10 sm:max-w-xl sm:rounded-lg pl-3 pr-3 mb-4 mx-auto max-w-prose">
                <div class="px-8 mt-1 sm:rounded-lg pb-8">
                    <h2 class="pt-7 text-xl font-bold sm:text-xl">Create Request</h2>
                    <div class="grid mt-8">
                        <div class="mb-4">
                            <label for="request_type" class="block mb-2 text-sm text-indigo-900 dark:text-black">Select Type of Request</label>
                            <select id="request_type" name="request_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" required x-model="requestType">
                              <option value="" class="text-md" disabled >Select Request Transaction</option>
                              <option value="type1" class="text-md">Punong Barangay's Certification Form</option>
                              <option value="type2" class="text-md">Request Form</option>
                              <option value="type3" class="text-md">Fetty Cash Voucher</option>
                           </select>
                        </div>
                        <div class="flex justify-end">
                            <button @click="step = 2; console.log(step); $refs.progress2.classList.add('bg-green-500'); $refs.progress2.classList.remove('bg-gray-300')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 2: Punong Barangay -->
        <div x-show="step === 2 && requestType === 'type1'">
            <div class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-lg mt-7">
                <div class="px-8 mt-1 sm:rounded-lg pb-8">
                    <h2 class="pt-7 text-xl font-bold sm:text-xl">Punong Barangay's Certification Form</h2>
                    <div class="grid grid-cols-2 gap-8 mt-8">
                        <!-- To Section -->
                        <div>
                            <label for="request_name" class="block text-sm font-medium text-indigo-900 dark:text-black inline-block font-semibold">To: <span class="text-sm font-medium text-indigo-900 dark:text-black">The Bank Manager</span></label>
                            <div class="text-sm font-medium text-indigo-900 dark:text-black">
                                <p>Land Bank of the Philippines</p>
                                <p>QC Hall Extension Office</p>
                            </div>
                        </div>

                        <!-- Date and PCB Number Section -->
                        <div class="flex flex-col items-end">
                            <!-- PCB Number -->
                            <div>
                                <label for="pcb_number" class="block text-sm font-medium text-indigo-900 dark:text-black inline-block font-semibold">PCB No:</label>
                                <span class="inline-block text-sm font-medium text-indigo-900 dark:text-black">Placeholder</span>
                            </div>
                            <!-- Date -->
                            <div>
                                <label for="request_date" class="block text-sm font-medium text-indigo-900 dark:text-black inline-block font-semibold">Date:</label>
                                <span class="inline-block text-sm font-medium text-indigo-900 dark:text-black">Placeholder</span>
                            </div>
                        </div>

                        <!-- Account Information -->
                        <div class="col-span-2">
                            <label for="account_info" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Account Information</label>
                            <div class="overflow-x-auto mb-2">
                                <table id="account-table" class="min-w-full bg-white border-gray-300 border rounded-lg">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Account No.</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Check No.</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Date</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Payee</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Amount</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Purpose</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(row, index) in rows" :key="index">
                                            <tr>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.account_no" class="border-0 w-full p-2" placeholder="Account No." required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.check_no" class="border-0 w-full p-2" placeholder="Check No." required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="date" x-model="row.date" class="border-0 w-full p-2" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.payee" class="border-0 w-full p-2" placeholder="Payee" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="number" x-model="row.amount" class="border-0 w-full p-2" placeholder="Amount" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.purpose" class="border-0 w-full p-2" placeholder="Purpose" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <button @click="rows.splice(index, 1)" class="text-red-600 hover:text-red-800 font-medium text-sm">Delete</button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-end">
                                <button @click="rows.push({})" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Add More</button>
                            </div>
                        </div>

                        <!-- Next and Previous Buttons -->
                        <div class="col-span-2 flex justify-between mt-4">
                            <button @click="step = 1; console.log(step); $refs.progress2.classList.remove('bg-green-500'); $refs.progress1.classList.remove('bg-gray-300'); $refs.progress2.classList.add('bg-gray-300'); $refs.progress1.classList.add('bg-green-500')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                            <button @click="step = 3; console.log(step); $refs.progress2.classList.remove('bg-gray-300'); $refs.progress3.classList.add('bg-green-500')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 3: Summary -->
        <div x-show="step === 3 && requestType === 'type1'">
            <div class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-lg mt-7 ">
                <div class="px-8 mt-1 sm:rounded-lg pb-8">
                    <h2 class="pt-7 text-xl font-bold sm:text-xl">PCB Form Summary</h2>
                    <div class="grid grid-cols-2 gap-8 mt-8">
                        <!-- To Section -->
                        <div>
                            <label for="request_name" class="block text-sm font-medium text-indigo-900 dark:text-black inline-block font-semibold">To: <span class="text-sm font-medium text-indigo-900 dark:text-black">The Bank Manager</span></label>
                            <div class="text-sm font-medium text-indigo-900 dark:text-black">
                                <p>Land Bank of the Philippines</p>
                                <p>QC Hall Extension Office</p>
                            </div>
                        </div>

                        <!-- Date and PCB Number Section -->
                        <div class="flex flex-col items-end">
                            <!-- PCB Number -->
                            <div>
                                <label for="pcb_number" class="block text-sm font-medium text-indigo-900 dark:text-black inline-block font-semibold">PCB No:</label>
                                <span class="inline-block text-sm font-medium text-indigo-900 dark:text-black">Placeholder</span>
                            </div>
                            <!-- Date -->
                            <div>
                                <label for="request_date" class="block text-sm font-medium text-indigo-900 dark:text-black inline-block font-semibold">Date:</label>
                                <span class="inline-block text-sm font-medium text-indigo-900 dark:text-black">Placeholder</span>
                            </div>
                        </div>

                        <!-- Account Information Summary -->
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Account Information Summary</label>
                            <div class="overflow-x-auto mb-2">
                                <table class="min-w-full bg-white border-gray-300 border rounded-lg">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Account No.</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Check No.</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Date</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Payee</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Amount</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Purpose</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Summary rows will be dynamically added here -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- Submit Button -->
                            <div class="flex justify-end w-full mt-4">
                                <button @click="showConfirmationModal = true" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mt-2">Send</button>
                            </div>
                        </div>
                        <div class="flex justify-between w-full mt-8">
                            <button @click="step = 2; console.log(step); $refs.progress3.classList.remove('bg-green-500'); $refs.progress2.classList.remove('bg-gray-300'); $refs.progress2.classList.add('bg-green-500')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Request Form Info -->
        <div x-show="step === 2 && requestType === 'type2'">
            <div class="bg-white mt-10 sm:max-w-xl sm:rounded-lg pl-3 pr-3 mb-4 mx-auto max-w-prose">
                <div class="px-6 mt-1 sm:max-w-xl sm:rounded-lg pb-8">
                    <h2 class="pt-7 text-xl font-bold sm:text-xl">Request Info</h2>
                    
                    <!-- Request Name -->
                    <div class="grid mt-8">
                        <div class="mb-2 sm:mb-6">
                            <label for="request_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Name of Request</label>
                            <input type="text" id="request_name" name="request_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter request name" required>
                        </div>
                        
                        <!-- Request Description -->
                        <div class="mb-2 sm:mb-6">
                            <label for="request_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Description</label>
                            <textarea id="request_description" name="request_description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter request description" required></textarea>
                        </div>
                        
                        <!-- Request File -->
                        
                        <div class="mb-2 sm:mb-6">
                        <label for="request_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Upload a File</label>
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2 border-gray-300 border-solid rounded-lg cursor-pointer bg-white hover:bg-gray-100 ">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PDF, WORD, PNG, or JPG (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>


                    </div>
                    
                    <!-- Next Button -->
                    <div class="flex justify-between w-full">
                        <button @click="step = 1; console.log(step); $refs.progress2.classList.remove('bg-green-500'); $refs.progress1.classList.remove('bg-gray-300'); $refs.progress2.classList.add('bg-gray-300'); $refs.progress1.classList.add('bg-green-500')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                        <button @click="step = 3; console.log(step); $refs.progress2.classList.remove('bg-gray-300'); $refs.progress3.classList.add('bg-green-500')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
                    </div>
                </div>
            </div>
        </div>

   <!-- Step 2 Confirmation -->
        <div x-show="step === 3 && requestType === 'type2'">
            <div class="bg-white mt-10 sm:max-w-xl sm:rounded-lg pl-3 pr-3 mb-4 mx-auto max-w-prose ">
                <div class="px-6 mt-1 sm:max-w-xl sm:rounded-lg pb-8">
                    <h2 class="pt-7 text-xl font-bold sm:text-xl">Confirmation</h2>
                    
                    <!-- Summary -->
                    <div class="grid mt-8">

                        <div class="mb-2 sm:mb-6">
                            <label for="summary_type" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Type of Request</label>
                            <input type="text" id="summary_type" name="summary_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" readonly>
                        </div>

                        <div class="mb-2 sm:mb-6">
                            <label for="summary_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Name of Request</label>
                            <input type="text" id="summary_name" name="summary_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" readonly>
                        </div>
                        
                        <!-- Request Description -->
                        <div class="mb-2 sm:mb-6">
                            <label for="summary_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Description</label>
                            <textarea id="summary_description" name="summary_description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" readonly></textarea>
                        </div>
                        
                        <!-- Request File -->
                        <div class="mb-2 sm:mb-6">
                            <label for="summary_file" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">File</label>
                            <input type="text" id="summary_file" name="summary_file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" readonly>
                        </div>
                        
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="flex justify-end w-full mt-4">
                        <button @click="showConfirmationModal = true" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mt-2">Send</button>
                    </div>
                    <div class="flex justify-between w-full mt-6">
                        <button @click="step = 2; console.log(step); $refs.progress3.classList.remove('bg-green-500'); $refs.progress2.classList.remove('bg-gray-300'); $refs.progress2.classList.add('bg-green-500')" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                    </div>
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
                        <button type="button" @click="showConfirmationModal = false; showModal = true" class="px-6 py-2.5 min-w-[150px] rounded text-white text-sm font-semibold border-none outline-none bg-[#333] hover:bg-[#222]">Yes, send</button>
                        <button type="button" @click="showConfirmationModal = false" class="px-6 py-2.5 min-w-[150px] rounded text-[#333] text-sm font-semibold border-none outline-none bg-gray-200 hover:bg-gray-300 active:bg-gray-200">No, cancel</button>
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

   window.addEventListener('DOMContentLoaded', function() {
        // Simulate change event on dropdown to initialize requestType
        document.querySelector('#request_type').dispatchEvent(new Event('change'));
    });
   </script>
</body>