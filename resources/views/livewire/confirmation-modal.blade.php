<div>
    <!-- Confirmation Modal -->        
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
</div>
