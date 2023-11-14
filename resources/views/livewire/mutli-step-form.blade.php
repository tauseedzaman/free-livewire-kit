<div>
    <div class="container max-w-2xl mx-auto ">
        <h1 class="mt-12 mb-5 text-lg font-bold leading-tight text-center text-purple-700">Form Wizard - Multi Step Form
        </h1>
        <form id="signUpForm"
            class="p-12 mx-auto mb-8 bg-white border-2 border-gray-100 border-solid shadow-md rounded-2xl"
            wire:submit.prevent="save">
            @csrf
            <!-- start step indicators -->
            <div class="flex gap-3 mb-4 text-xs text-center form-header">
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
                    <p class="mt-8 mb-5 leading-tight text-center text-gray-700 text-md">Create your account</p>
                    <div class="mb-6">
                        <input type="email" placeholder="Email Address" wire:model.lazy="email"
                            class="w-full px-4 py-3 font-medium text-gray-700 border-2 border-gray-200 border-solid rounded-md"
                            autocomplete="off" />
                        @error('email')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input type="password" placeholder="Password" wire:model.lazy="password"
                            class="w-full px-4 py-3 font-medium text-gray-700 border-2 border-gray-200 border-solid rounded-md"
                            autocomplete="off" />
                        @error('password')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input type="password" placeholder="Confirm Password" wire:model.lazy="password_confirmation"
                            class="w-full px-4 py-3 font-medium text-gray-700 border-2 border-gray-200 border-solid rounded-md"
                            autocomplete="off" />
                    </div>
                </div>
            @elseif($step == 2)
                <div class="step">
                    <p class="mt-8 mb-5 leading-tight text-center text-gray-700 text-md">Your presence on the social
                        network
                    </p>
                    <div class="mb-6">
                        <input type="url" placeholder="Linked In" wire:model.lazy="linkedin"
                            class="w-full px-4 py-3 font-medium text-gray-700 border-2 border-gray-200 border-solid rounded-md"
                            autocomplete="off" />
                        @error('linkedin')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input type="url" placeholder="Twitter" wire:model.lazy="twitter"
                            class="w-full px-4 py-3 font-medium text-gray-700 border-2 border-gray-200 border-solid rounded-md"
                            autocomplete="off" />
                        @error('twitter')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input type="url" placeholder="Facebook" wire:model.lazy="facebook"
                            class="w-full px-4 py-3 font-medium text-gray-700 border-2 border-gray-200 border-solid rounded-md"
                            autocomplete="off" />
                        @error('facebook')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @elseif($step == 3)
                <div class="step">
                    <p class="mt-8 mb-5 leading-tight text-center text-gray-700 text-md">We will never sell it</p>
                    <div class="mb-6">
                        <input type="text" placeholder="Full name" wire:model.lazy="fullname"
                            class="w-full px-4 py-3 font-medium text-gray-700 border-2 border-gray-200 border-solid rounded-md"
                            autocomplete="off" />
                        @error('fullname')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input type="text" placeholder="Mobile" wire:model.lazy="mobile"
                            class="w-full px-4 py-3 font-medium text-gray-700 border-2 border-gray-200 border-solid rounded-md"
                            autocomplete="off" />
                        @error('mobile')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input type="text" placeholder="Address" wire:model.lazy="address"
                            class="w-full px-4 py-3 font-medium text-gray-700 border-2 border-gray-200 border-solid rounded-md"
                            autocomplete="off" />
                        @error('address')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif

            <!-- start previous / next buttons -->
            <div class="flex gap-3 form-footer">

                <button type="button" wire:click='prevStep'
                    class="flex-1 px-5 py-2 text-lg text-center text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none hover:bg-gray-100">Previous</button>
                @if ($step == $lastStep)
                    <button type="submit"
                        class="flex-1 p-3 text-lg text-center text-white bg-purple-600 border border-transparent rounded-md focus:outline-none hover:bg-purple-700">Save</button>
                @else
                    <button type="button" wire:click='nextStep'
                        class="flex-1 p-3 text-lg text-center text-white bg-purple-600 border border-transparent rounded-md focus:outline-none hover:bg-purple-700">Next</button>
                @endif

            </div>
            <!-- end previous / next buttons -->
        </form>
    </div>

</div>
