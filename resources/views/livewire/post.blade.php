<div>
    <div class="mt-6 mx-auto container max-w-2xl">
        <h1 class="text-2xl mb-3 text-center font-bold text-purple-600">Auto Slug Generator - Livewire Kit</h1>
        <div class=" bg-indigo-100 ">
            <div class="">
                <form class="bg-white p-10 rounded-lg shadow-lg border " wire:submit.prevent='save'>
                    @csrf
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="title">Title</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                            name="title" id="title" wire:model.live="title" />
                            @error('title')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="email">Slug</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                            name="slug" readonly disabled id="slug" wire:model.lazy="slug" />
                            @error('slug')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <button type="submit"
                        class="w-full mt-6 bg-purple-600 hover:bg-purple-700 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Save</button>
                </form>
            </div>
        </div>
        <!-- component -->
        <section class="antialiased bg-gray-100 text-gray-600  mt-4">
            <div class="flex flex-col justify-center h-full">
                <!-- Table -->
                <div class="w-full  bg-white shadow-lg rounded-sm border border-gray-200">
                    <header class="px-5 py-4 border-b border-gray-100">
                        <h2 class="font-semibold text-gray-800">Latest {{ count($posts) }} Record</h2>
                    </header>
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
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
                                            <div class="text-left font-medium text-green-500">{{ $post->slug }}</div>
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
