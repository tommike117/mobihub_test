<div class="container mx-auto mt-2">
    {{-- create post button --}}
    <div class="flex content-center mt-10 overflow-x-auto mx-8 sm:px-6 lg:px-8">
        <x-jet-button><a href="{{ route('dashboard-posts-create') }}">Create a new post</a></x-jet-button>
    </div>
    {{-- table --}}
    {{-- <div class="my-2 overflow-x-auto mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Title</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Status</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Image</th>
                  <th scope="col" class="relative px-6 py-3">Edit</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr></tr>

                @foreach($posts as $post)
                
                <tr>
                  
                    <td class="px-6 py-4 whitespace-nowrap"><a href="{{ route('post-show', $post->slug) }}">{{ $post->id }}</a></td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $post->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      @if($post->active)
                        active
                      @else
                        not active
                      @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <img class="w-8 h-8 rounded-full" src="{{ asset('storage/photos/' . $post->image) }}" />
                    </td>
                    <td class="px-6 py-4 text-right text-sm">
                      <x-jet-button wire:click="editPost">Edit</x-jet-button>
                      <x-jet-button>Delete</x-jet-button>
                    </td>
                  
                  </tr>
                
                @endforeach --}}

                <!-- More items... -->
              {{-- </tbody>
            </table>
            <div class="m-2 p-2">Pagination</div>
          </div>
        </div>
      </div> --}}
      {{-- end-table --}}

      <div class="container mx-auto p-10">
        <ul class="grid grid-cols-1 gap-1 sm:grid-cols-2 md:grid-cols-3 md:gap-8">
          @foreach($posts as $post)
          <li class="bg-white dark:bg-gray-800 rounded-lg shadow-xl">
            <a href="{{ route('post-show', $post->slug) }}" class="group max-w-sm mx-auto overflow-hidden bg-white rounded-lg hover:shadow-lg dark:bg-gray-800 hover:bg-gray-200 transition duration-500 ease-in-out">
              <img
              class="object-cover object-center w-full h-44 opacity-90 rounded-lg group-hover:opacity-100 transition duration-500 ease-in-out"
                src="{{ asset('storage/photos/' . $post->image) }}" alt="avatar">
  
              <div class="mt-2">
                <div class="flex items-center px-6 py-3 bg-gray-900 rounded-lg rounded-b-none">
                  <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M17 21C15.8954 21 15 20.1046 15 19V15C15 13.8954 15.8954 13 17 13H19V12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12V13H7C8.10457 13 9 13.8954 9 15V19C9 20.1046 8.10457 21 7 21H3V12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12V21H17ZM19 15H17V19H19V15ZM7 15H5V19H7V15Z"/>
                  </svg>
  
                  <h1 class="mx-3 text-lg font-semibold text-white group-hover:text-indigo-600">{{ $post->title }}</h1>
                </div>
  
                <div class="px-6 py-4 group-hover:bg-gray-200 dark:group-hover:bg-gray-700 rounded-lg transition duration-500 ease-in-out">
                  <h1 class="text-xl font-semibold text-gray-800 dark:text-white transition duration-500 ease-in-out dark:group-hover:text-blue-200">{{ $post->title }}</h1>
  
                  <p class="py-2 text-gray-700 dark:text-gray-400">
                      regreg rgergerg regregerg ergergerg ergergreg
                  </p>
                </div>
              </div>
            </a>
                <div class="px-6 py-4 group-hover:bg-gray-200 dark:group-hover:bg-gray-700 rounded-lg transition duration-500 ease-in-out">
                  <x-jet-button><a href="{{ route('dashboard-posts-edit', $post->id) }}">Edit</a></x-jet-button>
                  <x-jet-button>Delete</x-jet-button>
                </div>
          </li>
        @endforeach
        </ul>
      </div>
</div>
