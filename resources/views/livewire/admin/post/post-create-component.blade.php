<div>
    <div class="container mx-auto px-4">
        <h1 class="text-4xl mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">Create Post</h1>
        <p class="text-lg mt-2 text-gray-600">Start crafting your new post below.</p>
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">

            @if($saveSuccess)
                <div class="rounded-md bg-green-100 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">Successfully Saved Post</h3>
                            <div class="mt-2 text-sm text-green-700">
                                <p>Your new post has been saved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        <form wire:submit.prevent="storePost">
            <div class="sm:col-span-6">
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.debounce.500ms="title" />
                </div>               
            </div>

            <div class="sm:col-span-6 pt-5">
                @if ($image)
                    Photo Preview:
                    <img src="{{ $image->temporaryUrl() }}">
                @endif

                <div class="mt-1">
                    <input type="file" wire:model.defer="image">
                </div>
            </div>

            <div class="sm:col-span-6 pt-5">
                    <div class="mt-4">
                        <x-jet-label for="body" value="{{ __('Content') }}" />
                        <div class="rounded-md shadow-sm">
                            <div class="mt-1 bg-white body-content">
                                                    
                                <textarea name="body" id="body" placeholder="Body of post here..." wire:model="body" class="form-control"></textarea>
                                @error('body') <span class="error">{{ $message }}</span> @enderror
                                
                            </div>
                        </div>
                    </div>
                <p class="mt-2 text-sm text-gray-500">Add the body for your post.</p>
            </div>
            <x-jet-button type="submit">Submit Post</x-jet-button>
        </form>
            
            
        </div>
    </div>
</div>


@section('scripts')
    
@endsection
