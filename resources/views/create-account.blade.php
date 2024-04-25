<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css">
@vite('resources/css/app.css')

<body class="bg-gray-200 rounded-lg py-5">
 
<div class="py-8">
    <div class="py-8">
        <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="hidden lg:block lg:w-1/2 bg-cover"
                style="background-image:url('https://st.depositphotos.com/5390090/51510/v/450/depositphotos_515102604-stock-illustration-registration-form-cute-cartoon-man.jpg')">
            </div>
            <div class="w-full p-8 lg:w-1/2">
                <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-4">Create an Account</h2>
                <p class="text-base text-gray-600 text-center mb-5">Please sign up to continue</p>
                
                <!-- Full Name Input Fields -->
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
                        <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="text" />
                    </div>
                    <div class="w-1/2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
                        <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="text" />
                    </div>
                </div>

                <!-- Remaining Input Fields -->
                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                    <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="email" />
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="email" />
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="password" />
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                    <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="password" />
                </div>
                <div class="mt-8">
                    <button class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">Register</button>
                </div>
                <div class="mt-4 flex flex-col items-center">
                    <div class="flex items-center justify-between w-full">
                        <span class="border-b w-1/5 md:w-1/4"></span>
                        <label class="text-xs text-gray-500 uppercase mx-2">log in</label>
                        <span class="border-b w-1/5 md:w-1/4"></span>
                    </div>
                    <div class="py-1">
                        <p class="mt-4 text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}" class="font-bold text-gray-600 hover:text-gray-800">Sign in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
</body>

