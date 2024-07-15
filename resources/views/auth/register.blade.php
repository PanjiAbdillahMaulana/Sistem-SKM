<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- isAdmin? --}}
                <div class="flex items-center my-4">
                    <input id="isAdmin" type="radio" value="1" name="isAdmin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="isAdmin" class="ms-2 text-sm font-medium text-gray-900">Admin</label>
                </div>
                <div class="flex items-center">
                    <input checked id="isNotAdmin" type="radio" value="0" name="isAdmin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="isNotAdmin" class="ms-2 text-sm font-medium text-gray-900">Non-admin</label>
                </div>
                

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <button type="button" onclick="togglePasswordVisibility()" class="items-center text-sm leading-5 text-grey-500 hover:text-blue-700 underline">
                    Show Password?
                </button>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
        // Ambil elemen radio button
        const isAdminRadio = document.getElementById('isAdmin');
        const isNotAdminRadio = document.getElementById('isNotAdmin');
    
        // Tambahkan event listener untuk setiap perubahan nilai radio button
        isAdminRadio.addEventListener('change', function() {
            if (isAdminRadio.checked) {
                isAdminRadio.value = '1'; // Set nilai menjadi 1 jika admin dipilih
            } else {
                isAdminRadio.value = '0'; // Set nilai menjadi 0 jika tidak admin dipilih
            }
        });
    
        isNotAdminRadio.addEventListener('change', function() {
            if (isNotAdminRadio.checked) {
                isNotAdminRadio.value = '0'; // Set nilai menjadi 0 jika tidak admin dipilih
            } else {
                isNotAdminRadio.value = '1'; // Set nilai menjadi 1 jika admin dipilih
            }
        });
    </script>
    
</x-app-layout>
