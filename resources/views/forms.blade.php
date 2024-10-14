<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<div x-data="{ step: 1, rows: [{}], requestType: '', showModal: false, showConfirmationModal: false }" x-cloak>

    <!-- Stepper -->
    <div class="mx-auto max-w-xl mt-7">
        <div class="max-w-sm mx-auto px-4">
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
            <div class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-lg mt-7 " >
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
                    <template x-for="(row, index) in rows" :key="index">
                        <tr>
                            <td class="border px-4 py-2">
                                <span x-text="row.account_no"></span>
                            </td>
                            <td class="border px-4 py-2">
                                <span x-text="row.check_no"></span>
                            </td>
                            <td class="border px-4 py-2">
                                <span x-text="row.date"></span>
                            </td>
                            <td class="border px-4 py-2">
                                <span x-text="row.payee"></span>
                            </td>
                            <td class="border px-4 py-2">
                                <span x-text="row.amount"></span>
                            </td>
                            <td class="border px-4 py-2">
                                <span x-text="row.purpose"></span>
                            </td>
                        </tr>
                    </template>
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
 
<div x-show="step === 2 && requestType === 'type2'">
    <form x-data="fileUploader()" x-init="init()" @submit.prevent="submitRequest" method="POST" enctype="multipart/form-data" class="container mx-auto p-4" x-cloak>
        @csrf
        <div class="bg-white mt-10 sm:max-w-xl sm:rounded-lg pl-3 pr-3 mb-4 mx-auto max-w-prose">
            <div class="px-6 mt-1 sm:max-w-xl sm:rounded-lg pb-8">
                <h2 class="pt-7 text-xl font-bold sm:text-xl">Request Info</h2>
                
                <!-- Request Name -->
                <div class="grid mt-8">
                    <div class="mb-2 sm:mb-6">
                        <label for="request_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Name of Request</label>
                        <input type="text" id="request_name" name="request_name" x-model="requestData.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter request name" required>
                    </div>

                  <!-- Category Dropdown -->
                  <div class="mb-2 sm:mb-6">
                        <label for="category_id" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Category</label>
                        <select x-model="requestData.category_id" @change="updateCategory($event.target.value)" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" 
                                required>
                            <option value="" disabled>Select a category</option>
                            @forelse($expenditures as $expenditure)
                                <option value="{{ json_encode(['id' => $expenditure->id, 'name' => $expenditure->object_of_expenditure]) }}">
                                    {{ $expenditure->object_of_expenditure }}
                                </option>
                            @empty
                                <option value="" disabled>No expenditures found.</option>
                            @endforelse 
                            <option value="Other">Other</option>
                        </select>
                        
                


                    <!-- Other Category Input -->
                    <div x-show="showOtherInput" class="mb-2 sm:mb-6" x-transition>
                        <label for="otherCategory" class="block mb-2 mt-2 text-sm font-medium text-indigo-900 dark:text-black">Specify Other Category</label>
                        <input type="text" x-model="requestData.otherCategory" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" 
                            placeholder="Enter category">
                    </div>
                    
                    <div x-data="dropdown()" class="relative mb-2 sm:mb-6">
                    <label for="collaborators" class="block  mt-6 text-sm font-medium text-indigo-900 dark:text-black">Collaborators</label>

                    <!-- Selected Users Inside Input Box -->
                    <div class="flex flex-wrap gap-2 mb-2">
                        <template x-for="userId in selectedUsers" :key="userId">
                            <div class="flex items-center bg-gray-200 text-gray-800 px-2 py-1 rounded-lg">
                                <span x-text="getFullName(userId)" class="text-sm"></span>
                                <button type="button" @click="removeUser(userId)" class="ml-2 text-gray-600 hover:text-gray-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </template>
                    </div>

                    <!-- Searchable Dropdown -->
                    <input type="text" id="collaborators" name="collaborators" x-model="search" @input="filterUsers" @focus="openDropdown"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                    placeholder="Search users" autocomplete="off" x-ref="input" />

                    <!-- Dropdown Options -->
                    <div x-show="open" x-ref="dropdown" class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-1 shadow-lg">
                        <template x-for="user in filteredUsers" :key="user.id">
                            <div @click="selectUser(user)" class="px-4 py-2 hover:bg-indigo-500 hover:text-white cursor-pointer rounded-lg text-sm">
                                <span x-text="getFullName(user.id)"></span>
                            </div>
                        </template>
                        <div x-show="filteredUsers.length === 0" class="px-4 py-2 text-gray-500 text-sm">No users found</div>
                        </div>
                    </div>

                    
                    <!-- Request Description -->
                    <div class="mb-2 sm:mb-6">
                        <label for="request_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Description</label>
                        <textarea id="request_description" name="request_description" x-model="requestData.description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter request description" required></textarea>
                    </div>
                    
                    <!-- File Upload Section -->
                    <div class="mb-6 max-w-full overflow-hidden">
                    <label for="files" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Upload Files</label>
                    <input type="file" id="files" name="files[]" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.xls,.xlsx" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" @change="previewFiles">
                </div>
                
                <div x-show="hasFiles" class="mt-4 max-w-full overflow-hidden">
                    <h3 class="text-lg font-medium mb-2">Selected Files</h3>
                    <template x-for="(file, index) in files" :key="index">
                        <div class="flex items-center justify-between bg-gray-100 rounded-lg p-2.5 mb-2 max-w-full overflow-hidden">
                            <div class="flex items-center space-x-2">
                                <!-- File Preview (Clickable for Full View) -->
                                <a :href="file.url" target="_blank" class="w-20 h-20 block overflow-hidden rounded-lg bg-gray-200 flex items-center justify-center">
                                    <img x-show="file.type.includes('image')" :src="file.url" class="object-cover w-20 h-20" alt="Image preview">
                                    <span x-show="!file.type.includes('image')" x-html="getFileIcon(file)" class="text-blue-500 text-6xl w-20 h-20 flex items-center justify-center"></span>
                                </a>
                                <!-- File Name and Size -->
                                <div class="flex flex-col w-52"> <!-- Set a fixed width for truncation -->
                                    <a :href="file.url" target="_blank" class="text-sm text-blue-500 hover:underline truncate" x-text="file.name"></a>
                                    <span class="text-xs text-gray-500">(<span x-text="formatBytes(file.size)"></span>)</span>
                                </div>
                            </div>
                            <!-- Remove Button -->
                            <button type="button" @click="removeFile(index)" class="text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-3.707-8.293a1 1 0 011.414-1.414L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 11-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </template>
                </div>

               
                <!-- Send Button with Validation -->
                <div class="flex justify-end w-full mt-4">
                    <button 
                        @click="validateFormAndShowModal" 
                        :disabled="!isFormValid()" 
                        :class="{'opacity-50 cursor-not-allowed': !isFormValid()}" 
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mt-2">
                        Send
                    </button>
                </div>
            </div>
        </div>

        <!-- Confirmation Modal -->
        <div x-show="showConfirmationModal" class="fixed inset-0 overflow-y-auto z-[1000]">
            <div class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6 relative">
                    <div class="my-8">
                        <h4 class="text-lg text-[#333] font-semibold">Are you sure you want to send the form?</h4>
                        <p class="text-sm text-gray-500 mt-4">Once submitted, the information provided will be processed accordingly. Please review the details carefully before proceeding.</p>
                    </div>
                    <div class="flex justify-end gap-4 max-sm:flex-col">
                        <button type="button" @click="showConfirmationModal = false; showModal = true" class="px-6 py-2.5 min-w-[150px] rounded text-white text-sm font-semibold border-none outline-none bg-[#333] hover:bg-[#222]">Yes, send</button>
                        <button type="button" @click="showConfirmationModal = false" class="px-6 py-2.5 min-w-[150px] rounded text-[#333] text-sm font-semibold border-none outline-none bg-gray-200 hover:bg-gray-300 active:bg-gray-200">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Modal -->
        <div x-show="showModal" class="fixed inset-0 overflow-y-auto z-[1000]">
            <div class="fixed inset-0 px-4 flex flex-wrap justify-center items-center w-full h-full z-[100] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6 relative">
                    <div class="my-8 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 shrink-0 fill-[#333] inline" viewBox="0 0 512 512">
                            <path d="M383.841 171.838c-7.881-8.31-21.02-8.676-29.343-.775L221.987 296.732l-63.204-64.893c-8.005-8.213-21.13-8.393-29.35-.387-8.213 7.998-8.386 21.137-.388 29.35l77.492 79.561a20.687 20.687 0 0 0 14.869 6.275 20.744 20.744 0 0 0 14.288-5.694l147.373-139.762c8.316-7.888 8.668-21.027.774-29.344z" data-original="#000000" />
                            <path d="M256 0C114.84 0 0 114.84 0 256s114.84 256 256 256 256-114.84 256-256S397.16 0 256 0zm0 470.487c-118.265 0-214.487-96.214-214.487-214.487 0-118.265 96.221-214.487 214.487-214.487 118.272 0 214.487 96.221 214.487 214.487 0 118.272-96.215 214.487-214.487 214.487z" data-original="#000000" />
                        </svg>
                        <h4 class="text-2xl text-[#333] font-semibold mt-6">The form has been submitted successfully!</h4>
                        <p class="text-sm text-gray-500 mt-4">Thank you for your submission. Your request will now be processed, and you will receive further updates.</p>
                    </div>
                    <button type="button" @click="showModal = false; window.location.href='{{ route('main') }}';" class="px-6 py-2.5 min-w-[150px] w-full rounded text-white text-sm font-semibold border-none outline-none bg-[#333] hover:bg-[#222]">Okay</button>
                </div>
            </div>
        </div>
    </form>
</div>



<script>
const sharedData = {
    selectedUsers: []
};

function dropdown() {
    return {
        open: false,
        search: '',
        users: @json($users).filter(user => user.role_id === 1 && user.id !== @json(auth()->user()->id)), // Exclude current user
        filteredUsers: [],
        selectedUsers: [],  // Define selectedUsers here

        getFullName(userId) {
            const user = this.users.find(user => user.id === userId);
            return user ? `${user.fname} ${user.lname}` : 'Unknown';
        },

        openDropdown() {
            this.open = true;
            this.filteredUsers = this.users;
            this.$nextTick(() => {
                this.handleOutsideClick = this.handleOutsideClick.bind(this);
                document.addEventListener('click', this.handleOutsideClick);
            });
        },

        filterUsers() {
            const searchTerm = this.search.toLowerCase();
            this.filteredUsers = searchTerm ? 
                this.users.filter(user =>
                    `${user.fname} ${user.lname}`.toLowerCase().includes(searchTerm)
                ) : this.users;
        },

        selectUser(user) {
            if (!this.selectedUsers.includes(user.id)) {
                this.selectedUsers.push(user.id);
                sharedData.selectedUsers.push(user.id); // Update sharedData as well
                console.log('Selected User IDs (Component):', [...this.selectedUsers]);
                console.log('Selected User IDs (SharedData):', [...sharedData.selectedUsers]);
            }

            this.open = false;
            this.search = '';
            this.filteredUsers = this.users;
        },

        removeUser(userId) {
            this.selectedUsers = this.selectedUsers.filter(id => id !== userId);
            sharedData.selectedUsers = sharedData.selectedUsers.filter(id => id !== userId); // Update sharedData as well
            console.log('Removed User ID:', userId);
            console.log('Selected User IDs:', [...this.selectedUsers]);
        },

        handleOutsideClick(event) {
            if (!this.$refs.dropdown.contains(event.target) && !this.$refs.input.contains(event.target)) {
                this.open = false;
                this.search = ''; // Clear search input
                document.removeEventListener('click', this.handleOutsideClick);
            }
        }
    };
}

function fileUploader() {
    return {
        requestData: {
            name: '',
            description: '',
            category_id: '',
            category: '', // To hold the object_of_expenditure
            otherCategory: '', // Only if the "Other" option is selected
            expenseOptions: [], // Changed to expenseOptions for clarity
        },
        files: [],
        hasFiles: false,
        showOtherInput: false,
        showConfirmationModal: false, // Initialize confirmation modal state
        showModal: false, // Initialize success modal state

        init() {
            this.hasFiles = this.files.length > 0;
        },

        previewFiles(event) {
            const files = event.target.files;
            if (!files || files.length === 0) return;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Check file size (e.g., limit to 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('File size should not exceed 5MB.');
                    continue;
                }

                const reader = new FileReader();
                reader.onload = (e) => {
                    this.files.push({
                        name: file.name,
                        size: file.size,
                        type: file.type,
                        url: e.target.result
                    });
                };
                reader.readAsDataURL(file);
            }

            this.hasFiles = true;
        },


        removeFile(index) {
            this.files.splice(index, 1);
            if (this.files.length === 0) {
                this.hasFiles = false;
            }
        },

        formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        },

        getFileIcon(file) {
            const fileType = file.type.split('/')[1];
            let iconHtml = '';

            switch (fileType) {
                case 'pdf':
                    iconHtml = '<i class="far fa-file-pdf"></i>';
                    break;
                case 'doc':
                case 'docx':
                    iconHtml = '<i class="far fa-file-word"></i>';
                    break;
                case 'xls':
                case 'xlsx':
                    iconHtml = '<i class="far fa-file-excel"></i>';
                    break;
                default:
                    iconHtml = '<i class="far fa-file-alt"></i>';
                    break;
            }

            return iconHtml;
        },

        isFormValid() {
            return this.requestData.name !== '' && this.requestData.category_id !== '' && this.requestData.description !== '';
        },

        validateFormAndShowModal() {
            if (this.isFormValid()) {
                this.showConfirmationModal = true;
            }
        },

        submitRequest() {
            console.log('Selected Category ID:', this.requestData.category_id); // Debug log

            const formData = new FormData();

            // Use the selected category ID and name
            formData.append('category_id', this.requestData.category_id);
            formData.append('category', this.requestData.category); // Add category name

            // Append other form data
            formData.append('request_name', this.requestData.name);
            formData.append('request_description', this.requestData.description);
            
            // Handle collaborators
            if (Array.isArray(sharedData.selectedUsers) && sharedData.selectedUsers.length > 0) {
                sharedData.selectedUsers.forEach(userId => {
                    formData.append('collaborators[]', userId);
                });
            } else {
                console.warn('No selected users to submit');
            }

            // Append files
            this.files.forEach((file) => {
                formData.append('files[]', this.dataURLtoFile(file.url, file.name));
            });

            // Log selectedUsers and formData for debugging
            console.log('Submitting with Selected User IDs:', sharedData.selectedUsers);
            console.log('FormData Entries:', Array.from(formData.entries()));

            // CSRF token setup
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';

            // Submit form using fetch
            fetch('{{ route('request.submit') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
             
                } else {
                    console.error('Submission failed:', data.message); // Handle submission failure
                }
            })
            .catch(error => {
                console.error('Error:', error); // Handle fetch errors
            });
        },

        dataURLtoFile(dataurl, filename) {
            const arr = dataurl.split(',');
            const mime = arr[0].match(/:(.*?);/)[1];
            const bstr = atob(arr[1]);
            let n = bstr.length;
            const u8arr = new Uint8Array(n);
            while (n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new File([u8arr], filename, { type: mime });
        },

        updateCategory(selectedValue) {
            console.log('Selected Value:', selectedValue); // Log the selected value

            // Check if the selected value is "Other"
            if (selectedValue === 'Other') {
                this.showOtherInput = true; // Show the "Other" input
                this.requestData.category_id = 'Other'; // Set category_id to 'Other'
                this.requestData.category = ''; // Clear category name
            } else {
                try {
                    const parsedValue = JSON.parse(selectedValue); // Parse the selected category value
                    this.requestData.category_id = parsedValue.id; // Set the category_id
                    this.requestData.category = parsedValue.name; // Set the category name
                    this.showOtherInput = false; // Hide the "Other" input
                } catch (e) {
                    console.error('Error parsing selectedValue:', e);
                }
            }
            
            // Log the selected category_id for debugging
            console.log('Selected Category ID:', this.requestData.category_id);
        }
    };
}
</script>

             
</div>
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