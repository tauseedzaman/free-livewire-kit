<div>
    <div class="max-w-2xl container mx-auto ">
        <h1 class="text-lg font-bold text-purple-700 leading-tight text-center mt-12 mb-5">Form Wizard - Multi Step Form
        </h1>
        <form id="signUpForm"
            class="p-12 shadow-md rounded-2xl bg-white mx-auto border-solid border-2 border-gray-100 mb-8"
            wire:submit.prevent="save">
            @csrf
            <!-- start step indicators -->
            <div class="form-header flex gap-3 mb-4 text-xs text-center">
                @foreach (range(1, 3) as $index)
                    <span
                        class="stepIndicator flex-1 pb-8 relative {{ $step == $index ? 'text-purple-400' : ($step > $index ? 'finish' : '') }}">
                        Step {{ $index }}
                    </span>
                @endforeach
            </div>
            <!-- end step indicators -->
            <!-- step one -->
            @if ($step == 1)
                <div class="step">
                    <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Create your account</p>
                    <div class="mb-6">
                        <input type="email" placeholder="Email Address" wire:model.lazy="email"
                            class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                            autocomplete="off" />
                        @error('email')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input type="password" placeholder="Password" wire:model.lazy="password"
                            class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                            autocomplete="off" />
                        @error('password')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input type="password" placeholder="Confirm Password" wire:model.lazy="password_confirmation"
                            class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                            autocomplete="off" />
                    </div>
                </div>
            @elseif($step == 2)
                <div class="step">
                    <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Your presence on the social
                        network
                    </p>
                    <div class="mb-6">
                        <input type="url" placeholder="Linked In" wire:model.lazy="linkedin"
                            class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                            autocomplete="off" />
                        @error('linkedin')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input type="url" placeholder="Twitter" wire:model.lazy="twitter"
                            class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                            autocomplete="off" />
                        @error('twitter')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input type="url" placeholder="Facebook" wire:model.lazy="facebook"
                            class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                            autocomplete="off" />
                        @error('facebook')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @elseif($step == 3)
                <div class="step">
                    <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">We will never sell it</p>
                    <div class="mb-6">
                        <input type="text" placeholder="Full name" wire:model.lazy="fullname"
                            class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                            autocomplete="off" />
                        @error('fullname')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input type="text" placeholder="Mobile" wire:model.lazy="mobile"
                            class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                            autocomplete="off" />
                        @error('mobile')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input type="text" placeholder="Address" wire:model.lazy="address"
                            class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                            autocomplete="off" />
                        @error('address')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif


            <!-- start previous / next buttons -->
            <div class="form-footer flex gap-3">

                <button type="button" wire:click='prevStep'
                    class="flex-1 focus:outline-none border border-gray-300 py-2 px-5 rounded-lg shadow-sm text-center text-gray-700 bg-white hover:bg-gray-100 text-lg">Previous</button>
                @if ($step == $lastStep)
                    <button type="submit"
                        class="flex-1 border border-transparent focus:outline-none p-3 rounded-md text-center text-white bg-purple-600 hover:bg-purple-700 text-lg">Save</button>
                @else
                    <button type="button" wire:click='nextStep'
                        class="flex-1 border border-transparent focus:outline-none p-3 rounded-md text-center text-white bg-purple-600 hover:bg-purple-700 text-lg">Next</button>
                @endif

            </div>
            <!-- end previous / next buttons -->
        </form>
    </div>

</div>
