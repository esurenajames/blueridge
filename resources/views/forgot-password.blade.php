<script src="https://cdn.tailwindcss.com"></script>
@vite('resources/css/app.css')

<body class="bg-gray-200 rounded-lg py-5">

<div class="py-16">
    <div class="py-16">
        <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="hidden lg:block lg:w-1/2 bg-cover"
                 style="background-image:url('https://st.depositphotos.com/5390090/51510/v/450/depositphotos_515102604-stock-illustration-registration-form-cute-cartoon-man.jpg')">
            </div>
            <div class="w-full p-8 lg:w-1/2">
                <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-4">Forgot Password</h2>
                <p class="text-base text-gray-600 text-center mb-5">Enter your email to reset your password</p>

                <!-- Email Input Field -->
                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="email" />
                </div>

                <div class="mt-8">
                    <a href="{{ route('verification') }}"><button class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">Reset Password</button></a>
                </div>
                
                <!-- Back to Login -->
                <div class="mt-4 flex flex-col items-center">
                    <div class="flex items-center justify-between w-full">
                        <span class="border-b w-1/5 md:w-1/4"></span>
                        <label class="text-xs text-gray-500 uppercase mx-2">log in</label>
                        <span class="border-b w-1/5 md:w-1/4"></span>
                    </div>
                    <div class="py-1">
                        <p class="mt-4 text-sm text-gray-600">Remembered your password? <a href="{{ route('login') }}" class="font-bold text-gray-600 hover:text-gray-800">Sign in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

