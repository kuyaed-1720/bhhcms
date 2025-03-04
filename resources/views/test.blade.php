<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" x-data="app()" x-cloak>
        @csrf
        
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
            <div x-show.transition="step == 1">
                
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
            </div>
        </div>
        <div class="py-5" x-show="step != 'complete'">
            <div class="max-w-3xl mx-auto ">
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
            }
        }
    </script>
</x-guest-layout>