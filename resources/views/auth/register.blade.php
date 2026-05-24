<x-guest-layout>
    <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white dark:bg-gray-800 shadow-2xl overflow-hidden sm:rounded-2xl border border-gray-200 dark:border-gray-700">
        
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-gradient-to-r from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center mx-auto shadow-lg mb-4 transform rotate-45">
                <i class="fas fa-heart text-white text-3xl transform -rotate-45"></i>
            </div>
            <h2 class="text-3xl font-bold bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">
                नया अकाउंट बनाएं
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2">अपनी प्रेम कहानी शुरू करें</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    पूरा नाम
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="pl-10 w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-pink-500 focus:border-pink-500"
                        placeholder="राहुल शर्मा">
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    ईमेल पता
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="pl-10 w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-pink-500 focus:border-pink-500"
                        placeholder="rahul@example.com">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    पासवर्ड
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input id="password" type="password" name="password" required
                        class="pl-10 w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-pink-500 focus:border-pink-500"
                        placeholder="••••••••">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    पासवर्ड कन्फर्म करें
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-check-circle text-gray-400"></i>
                    </div>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="pl-10 w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-pink-500 focus:border-pink-500"
                        placeholder="••••••••">
                </div>
            </div>

            <!-- Terms & Conditions -->
            <div class="flex items-center">
                <input type="checkbox" id="terms" name="terms" required class="rounded border-gray-300 text-pink-600 focus:ring-pink-500">
                <label for="terms" class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                    मैं <a href="#" class="text-pink-600">नियम और शर्तें</a> स्वीकार करता हूँ
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-3 px-4 rounded-xl text-white font-semibold bg-gradient-to-r from-pink-600 to-rose-600 hover:from-pink-700 hover:to-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition-all duration-200 shadow-lg shadow-pink-500/25">
                <i class="fas fa-user-plus mr-2"></i>
                मुफ्त रजिस्टर करें
            </button>

            <!-- Login Link -->
            <div class="text-center pt-4">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    पहले से अकाउंट है?
                    <a href="{{ route('login') }}" class="font-medium text-pink-600 hover:text-pink-500 dark:text-pink-400">
                        लॉगिन करें
                    </a>
                </p>
            </div>
        </form>
        
        <!-- Quick Registration Note -->
        <div class="mt-6 p-4 bg-pink-50 dark:bg-pink-900/20 rounded-xl">
            <p class="text-xs text-center text-gray-600 dark:text-gray-400">
                <i class="fas fa-heart text-pink-500 mr-1"></i>
                रजिस्टर करने पर आप 1 करोड़+ सदस्यों से जुड़ सकते हैं
            </p>
        </div>
    </div>
</x-guest-layout>