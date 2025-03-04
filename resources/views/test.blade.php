<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" x-data="app()" x-cloak>
        @csrf
        
        {{-- Top Info --}}
        <div class="border-b-2 py-4 mb-2">
            <div class="uppercase tracking-wide text-md font-bold text-gray-500 mb-1 leading-tight" x-text="`Step: ${step} of 3`"></div>
            <div class="flex flex-col">
                <div class="flex-1">
                    <div x-show="step === 1">
                        <div class="text-3xl font-bold text-gray-700 leading-tight">Your Profile</div>
                    </div>

                    <div x-show="step === 2">
                        <div class="text-3xl font-bold text-gray-700 leading-tight">Your Password</div>
                    </div>

                    <div x-show="step === 3">
                        <div class="text-3xl font-bold text-gray-700 leading-tight">Tell me about yourself</div>
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="w-full bg-white rounded-full mr-2">
                        <div class="rounded-full bg-blue-500 text-xs leading-none h-2 text-center text-white" :style="'width: '+ parseInt(step / 3 * 100) +'%'"></div>
                    </div>
                    <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 3 * 100) +'%'"></div>
                </div>
            </div>
        </div>

        {{-- Complete Registration --}}
        <div x-show.transition="step === 'complete'">
            <div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
                <div>
                    <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>

                    <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Registration Success</h2>

                    <div class="text-gray-600 mb-8">
                        Thank you. We have sent you an email to demo@demo.test. Please click the link in the message to
                        activate your account.
                    </div>

                    <button @click="step = 1"
                        class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Back
                        to home</button>
                </div>
            </div>
        </div>
        
        <div x-show.transition="step != 'complete'">

            {{-- Step 1 --}}
            <div x-show.transition.in="step === 1">
                <div>
                    <div class="mx-auto flex justify-center w-[141px] h-[141px] bg-blue-300/20 rounded-full bg-cover bg-center bg-no-repeat">
                            <div class="bg-white/90 rounded-full w-6 h-6 text-center ml-28 mt-4">

                                <input type="file" name="profile" id="upload_profile" hidden required>

                                <label for="upload_profile">
                                        <svg data-slot="icon" class="w-6 h-5 text-blue-700" fill="none"
                                            stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z">
                                            </path>
                                        </svg>
                                    </label>
                            </div>
                        </div>
                    </div>
                    <h2 class="text-center mt-1 font-semibold dark:text-gray-300">Select Profile Photo
                    </h2>
                </div>
                <div class="mb-2">
                    <x-input-label for="fname" :value="__('First Name')" />
                    <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')" required autocomplete="name" />
                    <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                </div>
                <div class="mb-2">
                    <x-input-label for="mname" :value="__('Middle Name')" />
                    <x-text-input id="mname" class="block mt-1 w-full" type="text" name="mname" :value="old('mname')" required autocomplete="name" />
                    <x-input-error :messages="$errors->get('mname')" class="mt-2" />
                </div>
                <div class="mb-2">
                    <x-input-label for="lname" :value="__('Last Name')" />
                    <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required autocomplete="name" />
                    <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                </div>
                <div class="w-full mb-2">
                    <x-input-label for="sex" :value="__('Sex')"/>
                    <select class="w-full mt-2 p-2 rounded-lg border-gray-300">
                        <option disabled value="">Select Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="w-full mb-2">
                    <x-input-label for="birthday" :value="__('Birthday')" />
                    <input type="date" class="mt-2 p-2 w-full rounded-lg border-gray-300">
                </div>
            </div>
            
            {{-- Step 2 --}}
            <div x-show.transition.in="step === 2">
               
                <div class="mb-5">
                    Step 2
                </div>
            </div>

        </div>


        {{-- Bottom Navigation --}}
        <div x-show.transition.in="step != 'complete'">
            <div class="max-w-7xl mx-auto ">
                <div class="flex justify-between">
                    <div class="w-1/2">
                        <button
                            x-show="step > 1"
                            @click="step--"
                            class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Previous</button>
                    </div>

                    <div class="w-1/2 text-right">
                        <button
                            x-show="step < 3"
                            @click="step++"
                            class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Next</button>

                        <button
                            @click="step = 'complete'"
                            x-show="step === 3"
                            class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Complete</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <script>
        function app() {
            return {
                step: 1,
                passwordStrengthText: '',
                togglePassword: false,
                image: '',
                password: '',
                gender: 'Male',

                checkPasswordStrength() {
                    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
                    var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

                    let value = this.password;

                    if (strongRegex.test(value)) {
                        this.passwordStrengthText = "Strong password";
                    } else if (mediumRegex.test(value)) {
                        this.passwordStrengthText = "Could be stronger";
                    } else {
                        this.passwordStrengthText = "Too weak";
                    }
                }
            }
        }
    </script>
</x-guest-layout>