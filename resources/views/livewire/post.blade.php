<div>
    <div class="container max-w-2xl mx-auto mt-6">
        <h1 class="mb-3 text-2xl font-bold text-center text-purple-600">Auto Slug Generator - Livewire Kit</h1>
        <div class="bg-indigo-100 ">
            <div class="">
                <form class="p-10 bg-white border rounded-lg shadow-lg " wire:submit.prevent='save'>
                    @csrf
                    <div>
                        <label class="block my-3 font-semibold text-gray-800 text-md" for="title">Title</label>
                        <input class="w-full px-4 py-2 bg-gray-100 rounded-lg focus:outline-none" type="text"
                            name="title" id="title" wire:model.live="title" />
                            @error('title')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <div>
                        <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Slug</label>
                        <input class="w-full px-4 py-2 bg-gray-100 rounded-lg focus:outline-none" type="text"
                            name="slug" wire:loading.class="opacity-25" readonly disabled id="slug" wire:model.lazy="slug" />
                            @error('slug')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <button type="submit"
                        class="w-full px-4 py-2 mt-6 font-sans text-lg font-semibold tracking-wide text-white bg-purple-600 rounded-lg hover:bg-purple-700">Save</button>
                </form>
            </div>
        </div>
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
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">{{ $post->title }}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="font-medium text-left text-green-500">{{ $post->slug }}</div>
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
</div>
