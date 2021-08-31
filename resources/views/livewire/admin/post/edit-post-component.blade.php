<div>
    <div class="container mx-auto px-4">
        <h1 class="text-4xl mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">Create Post</h1>
        <p class="text-lg mt-2 text-gray-600">Start crafting your new post below.</p>
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">

            <form wire:submit.prevent="updatePost">
            <div class="sm:col-span-6">
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.lazy="title" />
                </div>               
            </div>

            <div class="sm:col-span-6 pt-5">
                @if ($image)
                    Photo Preview:
                    <img src="{{ $image->temporaryUrl() }}">
                @endif

                @if ($newImage)
                    Photo:
                    <img src="{{ asset('storage/photos/' . $newImage) }}">
                @endif
                <div class="mt-1">
                    <input type="file" wire:model="image">
                </div>
                @error('image') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="sm:col-span-6 pt-5">
                    <div class="mt-4">
                        <x-jet-label for="body" value="{{ __('Content') }}" />
                        <div class="rounded-md shadow-sm">
                            <div class="mt-1 bg-white">
                                <div class="body-content" wire:ignore>
                                    <trix-editor
                                        class="trix-content"
                                        x-ref="trix"
                                        wire:model.lazy="body"
                                        wire:key="trix-content-unique-key">  
                                    </trix-editor>
                                </div>
                            </div>
                        </div>
                    </div>
                <p class="mt-2 text-sm text-gray-500">Add the body for your post.</p>
            </div>
            <x-jet-button type="submit">Update</x-jet-button>




        </form>
            
            
        </div>
    </div>
<div>
       
