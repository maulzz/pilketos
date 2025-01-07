<a href="{{ $href }}"
    class="flex items-center p-2 rounded-lg group
    {{ $active ? 'bg-gray-100 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group dark:bg-gray-700' : 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white group hover:bg-gray-100 dark:hover:bg-gray-700' }}">
    {{ $slot }}
</a>