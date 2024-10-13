<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>


@vite('resources/css/main.css', 'resources/js/main.js')
<title>Dashboard</title>

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

        <div class="flex flex-wrap mt-10 ml-10 mr-10 gap-6">
          <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 w-full">
            <!-- Remaining Budget -->
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center justify-between">
                <div class="p-4 rounded-full text-orange-500 dark:text-orange-100 bg-orange-100 dark:bg-orange-500 mr-4">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                  </svg>
                </div>
                <div class="text-center">
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400 text-right"><span>{{ $currentYear}}</span> Remaining Budget</p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200 text-right">₱{{ number_format($remainingBudgetYear, 2) }}</p>
                </div>
              </div>
            </div>
        
            <!-- Expenses for the Year -->
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center justify-between">
                <div class="p-4 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="text-center">
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400 text-right">Expenses for the year <span>{{ $currentYear}}</span></p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200 text-right">₱{{ number_format($currentExpensesYear, 2) }}</p>
                </div>
              </div>
            </div>
        
            <!-- Cash Balance Remaining Budget -->
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center justify-between">
                <div class="p-4 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="text-center">
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400 text-right">Cash Balance Remaining Budget</p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200 text-right">₱{{ number_format($cashBalanceRemainingBudget, 2) }}</p>
                </div>
              </div>
            </div>
        
            <!-- Cash Balance Current Expenses -->
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center justify-between">
                <div class="p-4 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="text-center">
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400 text-right">Cash Balance Current Expenses</p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200 text-right">₱{{ number_format($cashBalanceCurrentExpenses, 2) }}</p>
                </div>
              </div>
            </div>
        
            <!-- Receipts Remaining Budget -->
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center justify-between">
                <div class="p-4 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="text-center">
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400 text-right">Receipts Remaining Budget</p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200 text-right">₱{{ number_format($receiptsRemainingBudget, 2) }}</p>
                </div>
              </div>
            </div>
        
            <!-- Receipts Current Expenses -->
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center justify-between">
                <div class="p-4 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="text-center">
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400 text-right">Receipts Current Expenses</p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200 text-right">₱{{ number_format($receiptsCurrentExpenses, 2) }}</p>
                </div>
              </div>
            </div>
        
            <!-- Expenditures Remaining Budget -->
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center justify-between">
                <div class="p-4 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="text-center">
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400 text-right">Expenditures Remaining Budget</p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200 text-right">₱{{ number_format($expendituresRemainingBudget, 2) }}</p>
                </div>
              </div>
            </div>
        
            <!-- Expenditures Current Expenses -->
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
              <div class="p-12 flex items-center justify-between">
                <div class="p-4 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="text-center">
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400 text-right">Expenditures Current Expenses</p>
                  <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200 text-right">₱{{ number_format($expendituresCurrentExpenses, 2) }}</p>
                </div>
              </div>
            </div>



            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800 col-span-2">
              <div class="p-12 flex items-center justify-between">
                <div class="p-4 rounded-full text-blue-500 dark:text-blue-100 bg-blue-100 dark:bg-blue-500 mr-4">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <!-- SVG for the chart icon -->
                    <path fill-rule="evenodd" d="M2 11a1 1 0 100 2h2a1 1 0 001-1v-2H2v1zM6 9a1 1 0 011-1h2a1 1 0 011 1v4H6V9zM10 7a1 1 0 011-1h2a1 1 0 011 1v6h-4V7zM14 5a1 1 0 011-1h2a1 1 0 011 1v8h-4V5z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="text-center w-full">
                  <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400"><span>{{ $currentYear}}</span> Annual Expenses Breakdown</p>
                  <!-- Chart will be placed here -->
                  <canvas id="barChart"></canvas>
                </div>
              </div>
            </div>

            <script>
              var ctx = document.getElementById('barChart').getContext('2d');
              var barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: ['Cash Balance', 'Receipts', 'Expenditures'], // Labels for the three groups
                  datasets: [
                    {
                      label: 'Proposed Budget',
                      backgroundColor: 'rgba(52, 211, 153, 0.7)', // green
                      borderColor: 'rgba(16, 185, 129, 1)',
                      borderWidth: 1,
                      data: [
                        {{ $cashBalanceTotalBudget }},
                        {{ $receiptsTotalBudget }},
                        {{ $expendituresTotalBudget }}
                      ],
                    },
                    {
                      label: 'Current Expenses',
                      backgroundColor: 'rgba(229, 62, 62, 0.7)', // red
                      borderColor: 'rgba(220, 38, 38, 1)',
                      borderWidth: 1,
                      data: [
                        {{ $cashBalanceCurrentExpenses }},
                        {{ $receiptsCurrentExpenses }},
                        {{ $expendituresCurrentExpenses }}
                      ],
                    },
                    {
                      label: 'Remaining Budget',
                      backgroundColor: 'rgba(59, 130, 246, 0.7)', // blue
                      borderColor: 'rgba(37, 99, 235, 1)',
                      borderWidth: 1,
                      data: [
                        {{ $cashBalanceRemainingBudget }},
                        {{ $receiptsRemainingBudget }},
                        {{ $expendituresRemainingBudget }}
                      ],
                    },
                  ]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true,
                      ticks: {
                        // Add the peso sign before the numbers on the y-axis
                        callback: function(value) {
                          return '₱' + value.toLocaleString(); // Format the value with commas and peso sign
                        }
                      }
                    }
                  },
                  plugins: {
                    tooltip: {
                      callbacks: {
                        // Add peso sign to the tooltip
                        label: function(tooltipItem) {
                          let value = tooltipItem.raw; // Access the data value
                          return tooltipItem.dataset.label + ': ₱' + value.toLocaleString();
                        }
                      }
                    }
                  }
                }
              });
            </script>

            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800 col-span-2">
              <div class="p-12 flex items-center justify-between">
                  <div class="p-4 rounded-full text-blue-500 dark:text-blue-100 bg-blue-100 dark:bg-blue-500 mr-4">
                      <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                          <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zm3.536 5.464a5 5 0 01-7.072 7.072l7.072-7.072z" clip-rule="evenodd"></path>
                      </svg>
                  </div>
                  <div class="text-center w-full">
                      <p class="mb-2 text-lg font-medium text-gray-600 dark:text-gray-400"><span class="font-semibold">({{ $activeRequestsCount }})</span> Current Active Requests by Type </p>
                      <!-- Remove fixed dimensions and use responsive styling -->
                      <canvas id="pieChart" class="pie-chart"></canvas>
                  </div>
              </div>
            </div>

            <script>
              var ctx = document.getElementById('pieChart').getContext('2d');
              var pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                  labels: [
                    'Punong Barangay\'s Certification Form',
                    'Petty Cash Voucher',
                    'Request Form',
                    'Quotation Form',
                    'Purchase Request',
                    'Purchase Order'
                  ],
                  datasets: [{
                    label: 'Request Types',
                    data: [
                      {{ $punongBarangayCertificationCount }},
                      {{ $pettyCashVoucherCount }},
                      {{ $requestFormCount }},
                      {{ $quotationFormCount }},
                      {{ $purchaseRequestCount }},
                      {{ $purchaseOrderCount }},
                    ],
                    backgroundColor: [
                      'rgba(75, 192, 192, 0.7)', // teal for Punong Barangay's Certification Form
                      'rgba(255, 99, 132, 0.7)', // pink for Petty Cash Voucher
                      'rgba(255, 206, 86, 0.7)', // yellow for Request Form
                      'rgba(54, 162, 235, 0.7)', // blue for Quotation Form
                      'rgba(153, 102, 255, 0.7)', // purple for Purchase Request
                      'rgba(255, 159, 64, 0.7)'  // orange for Purchase Order
                    ],
                    borderColor: [
                      'rgba(75, 192, 192, 1)', // teal
                      'rgba(255, 99, 132, 1)', // pink
                      'rgba(255, 206, 86, 1)', // yellow
                      'rgba(54, 162, 235, 1)', // blue
                      'rgba(153, 102, 255, 1)', // purple
                      'rgba(255, 159, 64, 1)'  // orange
                    ],
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  plugins: {
                    datalabels: {
                      formatter: function(value, ctx) {
                        if (value === 0) {
                          return null; // Hide label if the value is zero
                        }
                        var dataset = ctx.chart.data.datasets[0];
                        var total = dataset.data.reduce((acc, curr) => acc + curr, 0); // Sum all values
                        var percentage = ((value / total) * 100).toFixed(2); // Calculate percentage
                        
                        return percentage + '%'; // Show percentage on the chart
                      },
                      color: '#fff', // Text color for the percentage
                      font: {
                        weight: 'bold',
                        size: 14
                      },
                      textAlign: 'center'
                    }
                  }
                },
                plugins: [ChartDataLabels] // Add ChartDataLabels plugin
              });
            </script>
            
            
          

            </div>
          </div>
        

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
