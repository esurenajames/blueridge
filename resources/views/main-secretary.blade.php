<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

@vite('resources/css/main.css', 'resources/js/main.js')
<title>Form Request List</title>

<body class="mb-5 bg-gray-200">
    <!--sidenav -->
      @livewire('sidebar-secretary')
      <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        @livewire('navbar')
        <!-- end navbar -->

        <div class="ml-5 mr-5">
    <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Home</h2>
        </div>

        <div class="flex mt-10 ml-10">
          <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-5">
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center"> <!-- Increased padding from p-8 to p-12 -->
                <div class="p-4 rounded-full text-orange-500 dark:text-orange-100 bg-orange-100 dark:bg-orange-500 mr-4"> <!-- Increased padding from p-3 to p-4 -->
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6"> <!-- Increased width and height from w-5 h-5 to w-6 h-6 -->
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400"> <!-- Increased font size from text-sm to text-lg -->
                    Expenses for the year
                  </p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200"> <!-- Increased font size from text-lg to text-2xl -->
                    $ 46,760.89
                  </p>
                </div>
              </div>
            </div>
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center"> <!-- Increased padding from p-8 to p-12 -->
                <div class="p-4 rounded-full text-orange-500 dark:text-orange-100 bg-orange-100 dark:bg-orange-500 mr-4"> <!-- Increased padding from p-3 to p-4 -->
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6"> <!-- Increased width and height from w-5 h-5 to w-6 h-6 -->
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400"> <!-- Increased font size from text-sm to text-lg -->
                    Expenses for the year
                  </p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200"> <!-- Increased font size from text-lg to text-2xl -->
                    $ 46,760.89
                  </p>
                </div>
              </div>
            </div>
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center"> <!-- Increased padding from p-8 to p-12 -->
                <div class="p-4 rounded-full text-orange-500 dark:text-orange-100 bg-orange-100 dark:bg-orange-500 mr-4"> <!-- Increased padding from p-3 to p-4 -->
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6"> <!-- Increased width and height from w-5 h-5 to w-6 h-6 -->
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400"> <!-- Increased font size from text-sm to text-lg -->
                    Expenses for the year
                  </p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200"> <!-- Increased font size from text-lg to text-2xl -->
                    $ 46,760.89
                  </p>
                </div>
              </div>
            </div>
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center"> <!-- Increased padding from p-8 to p-12 -->
                <div class="p-4 rounded-full text-orange-500 dark:text-orange-100 bg-orange-100 dark:bg-orange-500 mr-4"> <!-- Increased padding from p-3 to p-4 -->
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6"> <!-- Increased width and height from w-5 h-5 to w-6 h-6 -->
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400"> <!-- Increased font size from text-sm to text-lg -->
                    Expenses for the year
                  </p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200"> <!-- Increased font size from text-lg to text-2xl -->
                    $ 46,760.89
                  </p>
                </div>
              </div>
            </div>
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center"> <!-- Increased padding from p-8 to p-12 -->
                <div class="p-4 rounded-full text-orange-500 dark:text-orange-100 bg-orange-100 dark:bg-orange-500 mr-4"> <!-- Increased padding from p-3 to p-4 -->
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6"> <!-- Increased width and height from w-5 h-5 to w-6 h-6 -->
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400"> <!-- Increased font size from text-sm to text-lg -->
                    Expenses for the year
                  </p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200"> <!-- Increased font size from text-lg to text-2xl -->
                    $ 46,760.89
                  </p>
                </div>
              </div>
            </div>
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center">
                <div class="p-4 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400">
                    Remaining balance
                  </p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    $ 46,760.89
                  </p>
                </div>
              </div>
            </div>
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center">
                <div class="p-4 rounded-full text-blue-500 dark:text-blue-100 bg-blue-100 dark:bg-blue-500 mr-4">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400">
                    New Request
                  </p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    376
                  </p>
                </div>
              </div>
            </div>
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center">
                <div class="p-4 rounded-full text-teal-500 dark:text-teal-100 bg-teal-100 dark:bg-teal-500 mr-4">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400">
                    Pending Request
                  </p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">35</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      
    
  
        {{-- <div class="ml-5 mr-5 mt-5">
          <h2 class="text-xl pl-6 font-bold mb-2 text-gray-700">Request Progression</h2>
              </div> --}}
      
 
      {{-- <div class="flex mt-6 mb-6">
      <div class="max-w-md w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 ml-10 mr-10 md:p-6">
         <div class="flex justify-between mb-3">
           <div class="flex items-center">
             <div class="flex justify-center items-center">
               <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Forms Progress</h5>
               <svg data-popover-target="chart-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                 <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
               </svg>
               <div data-popover id="chart-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                   <div class="p-3 space-y-2">
                       <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental</h3>
                       <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                       <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                       <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
                       <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                 </svg></a>
                   </div>
                   <div data-popper-arrow></div>
               </div>
             </div>
           </div>
         </div>
       
         <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
           <div class="grid grid-cols-3 gap-3 mb-2">
             <dl class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
               <dt class="w-10 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">12</dt>
               <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">For Approval</dd>
             </dl>
             <dl class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
               <dt class="w-10 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1">23</dt>
               <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">For Quotation</dd>
             </dl>
             <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
               <dt class="w-10 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600  dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">64</dt>
               <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium whitespace-nowrap">Purchase Order</dd>
             </dl>
           </div>
           <button data-collapse-toggle="more-details" type="button" class="hover:underline text-xs text-gray-500 dark:text-gray-400 font-medium inline-flex items-center">Show more details <svg class="w-2 h-2 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
             </svg>
           </button>
           <div id="more-details" class="border-gray-200 border-t dark:border-gray-600 pt-3 mt-3 space-y-2 hidden">
             <dl class="flex items-center justify-between">
               <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Average task completion rate:</dt>
               <dd class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                 <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                 </svg> 57%
               </dd>
             </dl>
             <dl class="flex items-center justify-between">
               <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Days until sprint ends:</dt>
               <dd class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">13 days</dd>
             </dl>
             <dl class="flex items-center justify-between">
               <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Next meeting:</dt>
               <dd class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">Thursday</dd>
             </dl>
           </div>
         </div>
       
         <!-- Radial Chart -->
         <div class="py-6" id="radial-chart"></div>
       
         <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
           <div class="flex justify-between items-center pt-5">
             <!-- Button -->
             <button
               id="dropdownDefaultButton"
               data-dropdown-toggle="lastDaysdropdown"
               data-dropdown-placement="bottom"
               class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
               type="button">
               Last 7 days
               <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
               </svg>
             </button>
             <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                 <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                   <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                   </li>
                   <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                   </li>
                   <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                   </li>
                   <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                   </li>
                   <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                   </li>
                 </ul>
             </div>
             <a
               href="#"
               class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
               Request Table
               <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
               </svg>
             </a>
           </div>
         </div>
       </div>
      </div> --}}

      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>

<style>
@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
@import url(https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css);
</style>

{{-- <div class="ml-5 mr-5 mt-5">
  <h2 class="text-xl pl-6 font-bold mb-2 text-gray-700">Expense Tracker</h2>
      </div>
 
<div class="flex mt-6 mb-6 ml-10">

    <div class="bg-gray-800 text-gray-500 rounded shadow-xl py-5 px-5 w-full lg:w-1/2" x-data="{chartData:chartData()}" x-init="chartData.fetch()">
        <div class="flex flex-wrap items-end">
            <div class="flex-1">
                <h3 class="text-lg font-semibold leading-tight">Expense Total</h3>
            </div>
            <div class="relative" @click.away="chartData.showDropdown=false">
                <button class="text-xs hover:text-gray-300 h-6 focus:outline-none" @click="chartData.showDropdown=!chartData.showDropdown">
                    <span x-text="chartData.options[chartData.selectedOption].label"></span><i class="ml-1 mdi mdi-chevron-down"></i>
                </button>
                <div class="bg-gray-700 shadow-lg rounded text-sm absolute top-auto right-0 min-w-full w-32 z-30 mt-1 -mr-3" x-show="chartData.showDropdown" style="display: none;" x-transition:enter="transition ease duration-300 transform" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease duration-300 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4">
                    <span class="absolute top-0 right-0 w-3 h-3 bg-gray-700 transform rotate-45 -mt-1 mr-3"></span>
                    <div class="bg-gray-700 rounded w-full relative z-10 py-1">
                        <ul class="list-reset text-xs">
                            <template x-for="(item,index) in chartData.options">
                                <li class="px-4 py-2 hover:bg-gray-600 hover:text-white transition-colors duration-100 cursor-pointer" :class="{'text-white':index==chartData.selectedOption}" @click="chartData.selectOption(index);chartData.showDropdown=false">
                                    <span x-text="item.label"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-end mb-5">
            <h4 class="text-2xl lg:text-3xl text-white font-semibold leading-tight inline-block mr-2" x-text="'$'+(chartData.data?chartData.data[chartData.date].total.comma_formatter():0)">0</h4>
            <span class="inline-block" :class="chartData.data&&chartData.data[chartData.date].upDown<0?'text-red-500':'text-green-500'"><span x-text="chartData.data&&chartData.data[chartData.date].upDown<0?'▼':'▲'">0</span> <span x-text="chartData.data?chartData.data[chartData.date].upDown:0">0</span>%</span>
        </div>
        <div>
            <canvas id="chart" class="w-full"></canvas>
        </div>
    </div>
</div> --}}


<script>

</script>

      <div class="fixed bottom-0 right-0 mb-4 mr-4 w-64" hidden>
    <div class="bg-white rounded-lg shadow-lg p-4">
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center">
                <img src="https://www.svgrepo.com/show/401340/cookie.svg" alt="Cookie" class="h-6 w-6 mr-2">
                <span class="text-gray-700 font-bold text-sm">Cookie Policy</span>
            </div>
            <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <p class="text-gray-600 text-sm">
            We use cookies to enhance your experience. By continuing to visit this site, you agree to our use of
            cookies.
        </p>
        <button class="mt-4 bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">
            Accept
        </button>
    </div>
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

   Number.prototype.comma_formatter = function() {
    return this.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}

let chartData = function(){
    return {
        date: 'today',
        options: [
            {
                label: 'Today',
                value: 'today',
            },
            {
                label: 'Last 7 Days',
                value: '7days',
            },
            {
                label: 'Last 30 Days',
                value: '30days',
            },
            {
                label: 'Last 6 Months',
                value: '6months',
            },
            {
                label: 'This Year',
                value: 'year',
            },
        ],
        showDropdown: false,
        selectedOption: 0,
        selectOption: function(index){
            this.selectedOption = index;
            this.date = this.options[index].value;
            this.renderChart();
        },
        data: null,
        fetch: function(){
            fetch('https://cdn.jsdelivr.net/gh/swindon/fake-api@master/tailwindAlpineJsChartJsEx1.json')
                .then(res => res.json())
                .then(res => {
                    this.data = res.dates;
                    this.renderChart();
                })
        },
        renderChart: function(){
            let c = false;

            Chart.helpers.each(Chart.instances, function(instance) {
                if (instance.chart.canvas.id == 'chart') {
                    c = instance;
                }
            });

            if(c) {
                c.destroy();
            }

            let ctx = document.getElementById('chart').getContext('2d');

            let chart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: this.data[this.date].data.labels,
                    datasets: [
                        {
                            label: "Income",
                            backgroundColor: "rgba(102, 126, 234, 0.25)",
                            borderColor: "rgba(102, 126, 234, 1)",
                            pointBackgroundColor: "rgba(102, 126, 234, 1)",
                            data: this.data[this.date].data.income,
                        },
                        {
                            label: "Expenses",
                            backgroundColor: "rgba(237, 100, 166, 0.25)",
                            borderColor: "rgba(237, 100, 166, 1)",
                            pointBackgroundColor: "rgba(237, 100, 166, 1)",
                            data: this.data[this.date].data.expenses,
                        },
                    ],
                },
                layout: {
                    padding: {
                        right: 10
                    }
                },
                options: {
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                callback: function(value,index,array) {
                                    return value > 1000 ? ((value < 1000000) ? value/1000 + 'K' : value/1000000 + 'M') : value;
                                }
                            }
                        }]
                    }
                }
            });
        }
    }
}
   </script>
</body>
