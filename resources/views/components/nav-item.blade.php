    <a href="{{ $route }}"
        class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-blue-800 hover:text-blue-300">
        @isset($icon)
            {!! $icon !!}
        @endisset
        {!! $slot !!}
    </a>
