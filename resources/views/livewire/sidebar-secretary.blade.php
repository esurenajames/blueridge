<div class="fixed left-0 top-0 w-64 h-full p-4 z-50 sidebar-menu transition-transform px-4 py-8 bg-white border-r dark:bg-gray-800 dark:border-gray-600">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Barangay Blueridge B</h2>

    <div class="relative mt-6">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>

        <input type="text" class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Search"/>
    </div>
    
    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav>
            <a class="flex items-center px-4 py-2 {{ request()->routeIs('sample') ? 'bg-gray-200 dark:bg-gray-700 dark:text-gray-200' : 'hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200' }} text-gray-700 dark:text-gray-200 rounded-md" href="{{ route('main') }}">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.18753 11.3788C4.03002 11.759 4 11.9533 4 12V20.0018C4 20.5529 4.44652 21 5 21H8V15C8 13.8954 8.89543 13 10 13H14C15.1046 13 16 13.8954 16 15V21H19C19.5535 21 20 20.5529 20 20.0018V12C20 11.9533 19.97 11.759 19.8125 11.3788C19.6662 11.0256 19.4443 10.5926 19.1547 10.1025C18.5764 9.1238 17.765 7.97999 16.8568 6.89018C15.9465 5.79788 14.9639 4.78969 14.0502 4.06454C13.5935 3.70204 13.1736 3.42608 12.8055 3.2444C12.429 3.05862 12.1641 3 12 3C11.8359 3 11.571 3.05862 11.1945 3.2444C10.8264 3.42608 10.4065 3.70204 9.94978 4.06454C9.03609 4.78969 8.05348 5.79788 7.14322 6.89018C6.23505 7.97999 5.42361 9.1238 4.8453 10.1025C4.55568 10.5926 4.33385 11.0256 4.18753 11.3788ZM10.3094 1.45091C10.8353 1.19138 11.4141 1 12 1C12.5859 1 13.1647 1.19138 13.6906 1.45091C14.2248 1.71454 14.7659 2.07921 15.2935 2.49796C16.3486 3.33531 17.4285 4.45212 18.3932 5.60982C19.3601 6.77001 20.2361 8.0012 20.8766 9.08502C21.1963 9.62614 21.4667 10.1462 21.6602 10.6134C21.8425 11.0535 22 11.5467 22 12V20.0018C22 21.6599 20.6557 23 19 23H16C14.8954 23 14 22.1046 14 21V15H10V21C10 22.1046 9.10457 23 8 23H5C3.34434 23 2 21.6599 2 20.0018V12C2 11.5467 2.15748 11.0535 2.33982 10.6134C2.53334 10.1462 2.80369 9.62614 3.12345 9.08502C3.76389 8.0012 4.63995 6.77001 5.60678 5.60982C6.57152 4.45212 7.65141 3.33531 8.70647 2.49796C9.2341 2.07921 9.77521 1.71454 10.3094 1.45091Z" fill="#c0c0c0"></path>
                    </g>
                </svg>
                

                <span class="mx-4 font-medium">Home</span>
            </a>

            <a class="flex items-center px-4 py-2 mt-2 {{ request()->routeIs('request-table') ? 'bg-gray-200 dark:bg-gray-700 dark:text-gray-200' : 'hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200' }} text-gray-700 dark:text-gray-200 rounded-md" href="{{ route('forms') }}">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#c0c0c0" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.186 2.09c.521.25 1.136.612 1.625 1.101.49.49.852 1.104 1.1 1.625.313.654.11 1.408-.401 1.92l-7.214 7.213c-.31.31-.688.541-1.105.675l-4.222 1.353a.75.75 0 0 1-.943-.944l1.353-4.221a2.75 2.75 0 0 1 .674-1.105l7.214-7.214c.512-.512 1.266-.714 1.92-.402zm.211 2.516a3.608 3.608 0 0 0-.828-.586l-6.994 6.994a1.002 1.002 0 0 0-.178.241L9.9 14.102l2.846-1.496c.09-.047.171-.107.242-.178l6.994-6.994a3.61 3.61 0 0 0-.586-.828zM4.999 5.5A.5.5 0 0 1 5.47 5l5.53.005a1 1 0 0 0 0-2L5.5 3A2.5 2.5 0 0 0 3 5.5v12.577c0 .76.082 1.185.319 1.627.224.419.558.754.977.978.442.236.866.318 1.627.318h12.154c.76 0 1.185-.082 1.627-.318.42-.224.754-.559.978-.978.236-.442.318-.866.318-1.627V13a1 1 0 1 0-2 0v5.077c0 .459-.021.571-.082.684a.364.364 0 0 1-.157.157c-.113.06-.225.082-.684.082H5.923c-.459 0-.57-.022-.684-.082a.363.363 0 0 1-.157-.157c-.06-.113-.082-.225-.082-.684V5.5z"></path>
                    </g>
                </svg>
            
                <span class="mx-4 font-medium">Form Request List</span>
            </a>

            <a class="flex items-center px-4 py-2 mt-2 {{ request()->routeIs('view-all') ? 'bg-gray-200 dark:bg-gray-700 dark:text-gray-200' : 'hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200' }} text-gray-700 dark:text-gray-200 rounded-md" href="{{ route('view-all') }}">
                <svg class="w-5 h-5" fill="#c0c0c0" height="64px" width="64px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 219.376 219.376" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M127.518,0H40.63c-6.617,0-12,5.383-12,12v195.376c0,6.617,5.383,12,12,12h138.117c6.617,0,12-5.383,12-12V59.227 c0-3.204-1.248-6.217-3.514-8.484l-51.364-47.36C133.619,1.2,130.661,0,127.518,0z M175.747,204.376H43.63V15h71.768v40.236 c0,8.885,7.225,16.114,16.105,16.114h44.244V204.376z M131.503,56.35c-0.609,0-1.105-0.5-1.105-1.114v-31.58l34.968,32.693H131.503z M65.499,97.805c-5.14,0-9.321,4.182-9.321,9.321c0,5.14,4.182,9.321,9.321,9.321c5.14,0,9.321-4.182,9.321-9.321 C74.82,101.987,70.638,97.805,65.499,97.805z M82.499,99.627h79.5v15h-79.5V99.627z M65.499,127.805 c-5.14,0-9.321,4.182-9.321,9.321s4.182,9.321,9.321,9.321c5.14,0,9.321-4.182,9.321-9.321S70.638,127.805,65.499,127.805z M82.499,129.626h79.5v15h-79.5V129.626z M65.499,157.805c-5.14,0-9.321,4.182-9.321,9.321s4.182,9.321,9.321,9.321 c5.14,0,9.321-4.182,9.321-9.321S70.638,157.805,65.499,157.805z M82.499,159.626h79.5v15h-79.5V159.626z"></path>
                    </g>
                </svg>
            
                <span class="mx-4 font-medium">Approval Manager</span>
            </a>

            <a class="flex items-center px-4 py-2 mt-2 {{ request()->routeIs('view-all') ? 'bg-gray-200 dark:bg-gray-700 dark:text-gray-200' : 'hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200' }} text-gray-700 dark:text-gray-200 rounded-md" href="{{ route('view-all') }}">
                <svg class="w-5 h-5" fill="#c0c0c0" height="64px" width="64px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 219.376 219.376" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M127.518,0H40.63c-6.617,0-12,5.383-12,12v195.376c0,6.617,5.383,12,12,12h138.117c6.617,0,12-5.383,12-12V59.227 c0-3.204-1.248-6.217-3.514-8.484l-51.364-47.36C133.619,1.2,130.661,0,127.518,0z M175.747,204.376H43.63V15h71.768v40.236 c0,8.885,7.225,16.114,16.105,16.114h44.244V204.376z M131.503,56.35c-0.609,0-1.105-0.5-1.105-1.114v-31.58l34.968,32.693H131.503z M65.499,97.805c-5.14,0-9.321,4.182-9.321,9.321c0,5.14,4.182,9.321,9.321,9.321c5.14,0,9.321-4.182,9.321-9.321 C74.82,101.987,70.638,97.805,65.499,97.805z M82.499,99.627h79.5v15h-79.5V99.627z M65.499,127.805 c-5.14,0-9.321,4.182-9.321,9.321s4.182,9.321,9.321,9.321c5.14,0,9.321-4.182,9.321-9.321S70.638,127.805,65.499,127.805z M82.499,129.626h79.5v15h-79.5V129.626z M65.499,157.805c-5.14,0-9.321,4.182-9.321,9.321s4.182,9.321,9.321,9.321 c5.14,0,9.321-4.182,9.321-9.321S70.638,157.805,65.499,157.805z M82.499,159.626h79.5v15h-79.5V159.626z"></path>
                    </g>
                </svg>
            
                <span class="mx-4 font-medium">Budget Manager</span>
            </a>
            

            <hr class="my-6 border-gray-200 dark:border-gray-600" />
            
            <a class="flex items-center px-4 py-2 mt-2 {{ request()->routeIs('settings') ? 'bg-gray-200 dark:bg-gray-700 dark:text-gray-200' : 'hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200' }} text-gray-700 dark:text-gray-200 rounded-md" href="{{ route('settings') }}">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M9.65202 4.56614C9.85537 3.65106 10.667 3 11.6044 3H12.3957C13.3331 3 14.1447 3.65106 14.3481 4.56614L14.551 5.47935C15.2121 5.73819 15.8243 6.09467 16.3697 6.53105L17.2639 6.24961C18.1581 5.96818 19.1277 6.34554 19.5964 7.15735L19.9921 7.84264C20.4608 8.65445 20.3028 9.68287 19.612 10.3165L18.9218 10.9496C18.9733 11.2922 19.0001 11.643 19.0001 12C19.0001 12.357 18.9733 12.7078 18.9218 13.0504L19.612 13.6835C20.3028 14.3171 20.4608 15.3455 19.9921 16.1574L19.5965 16.8426C19.1278 17.6545 18.1581 18.0318 17.2639 17.7504L16.3698 17.4689C15.8243 17.9053 15.2121 18.2618 14.551 18.5206L14.3481 19.4339C14.1447 20.3489 13.3331 21 12.3957 21H11.6044C10.667 21 9.85537 20.3489 9.65202 19.4339L9.44909 18.5206C8.78796 18.2618 8.17579 17.9053 7.63034 17.4689L6.73614 17.7504C5.84199 18.0318 4.87234 17.6545 4.40364 16.8426L4.00798 16.1573C3.53928 15.3455 3.69731 14.3171 4.38811 13.6835L5.07833 13.0504C5.02678 12.7077 5.00005 12.357 5.00005 12C5.00005 11.643 5.02678 11.2922 5.07833 10.9496L4.38813 10.3165C3.69732 9.68288 3.5393 8.65446 4.008 7.84265L4.40365 7.15735C4.87235 6.34554 5.842 5.96818 6.73616 6.24962L7.63035 6.53106C8.1758 6.09467 8.78796 5.73819 9.44909 5.47935L9.65202 4.56614Z" stroke="#c0c0c0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12Z" stroke="#c0c0c0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
            
                <span class="mx-4 font-medium">Settings</span>
            </a>

            <form id="logout-form" method="POST" action="{{ route('logout') }}" wire:submit.prevent="logout">
                @csrf
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="menuitem" class="flex items-center px-4 py-2 mt-2 text-gray-600 transition-colors duration-200 transform rounded-md dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#c0c0c0"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>< id="SVGRepo_iconCarrier"> <> <path fill="none" d="M0 0h24v24H0z"></path> <path d="M5 11h8v2H5v3l-5-4 5-4v3zm-1 7h2.708a8 8 0 1 0 0-12H4A9.985 9.985 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10a9.985 9.985 0 0 1-8-4z"></path> </svg>
                    </svg>
                    <span class="mx-4 font-medium">Logout</span>
                </a>
            </form>
            
            


                
        </nav>

    </div>
</div>