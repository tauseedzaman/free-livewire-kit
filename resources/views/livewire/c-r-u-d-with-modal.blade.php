<div>
    <div class="container max-w-2xl mx-auto mt-6">
        <h1 class="mb-3 text-2xl font-bold text-center text-purple-600">Auto Slug Generator - Livewire Kit</h1>

        <!-- Button to open the modal -->
        <button wire:click="toggleModal" class="px-4 py-2 text-white bg-purple-600 rounded-lg">New</button>

        <!-- Modal -->
        @if ($isModalOpen)
            <div class="fixed inset-0 z-10 overflow-y-auto" style="">
                <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <!-- Modal Content -->
                    <div
                        class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <form class="p-10" wire:submit.prevent='save'>
                            @csrf
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md"
                                    for="title">Title</label>
                                <input class="w-full px-4 py-2 bg-gray-100 rounded-lg focus:outline-none" type="text"
                                    name="title" id="title" wire:model.live="title" />
                                @error('title')
                                    <span class="text-red-500">{{ $message }} </span>
                                @enderror
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md"
                                    for="slug">Slug</label>
                                <input class="w-full px-4 py-2 bg-gray-100 rounded-lg focus:outline-none" type="text"
                                    name="slug" readonly disabled id="slug" wire:model.lazy="slug" />
                                @error('slug')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="w-full px-4 py-2 mt-6 font-sans text-lg font-semibold tracking-wide text-white bg-purple-600 rounded-lg hover:bg-purple-700">Save</button>
                        </form>

                        <!-- Close button -->
                        <div class="absolute top-0 right-0 pt-4 pr-4">
                            <button wire:click="toggleModal" class="text-gray-500 hover:text-gray-700">
                                <span class="sr-only">Close</span>
                                <!-- Heroicon name: x -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <!-- component -->
        <section class="mt-4 antialiased text-gray-600 bg-gray-100">
            <div class="flex flex-col justify-center h-full">
                <!-- Table -->
                <div class="w-full bg-white border border-gray-200 rounded-sm shadow-lg">
                    <header class="px-5 py-4 border-b border-gray-100">
                        <h2 class="font-semibold text-gray-800">Latest {{ count($posts) }} Record</h2>
                    </header>
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead class="text-xs font-semibold text-gray-400 uppercase bg-gray-50">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Title</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Slug</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Actions</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $post->title }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="font-medium text-left text-green-500">{{ $post->slug }}
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <button wire:click="editPost({{ $post->id }})"
                                                    class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button wire:click="deletePost({{ $post->id }})"
                                                    wire:confirm="Are you sure you want to delete this post?"
                                                    class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-700">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>

    <script>
        document.addEventListener('livewire:initialized', () => {
            console.log("s")
            @this.on('success', (event) => {
                console.log(event)
                alert(event[0].message)
            });
        });
    </script>
</div>
