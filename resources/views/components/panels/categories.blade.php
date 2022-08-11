<nav class="order-1">
    <ul class="block lg:flex">
        @foreach ($categories as $category)
        <li class="group">
            <a href="{{ route('category', $category) }}" class="@if (request()->is('catalog/' . $category->slug) || ($parent != null && $parent->slug == $category->slug)) text-orange cursor-default @else hover:text-orange @endif inline-block p-4 font-bold border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow">
                {{ $category->name }}
                @if (count($category->children) > 0)
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                @endif
            </a>
            @if (count($category->children) > 0)
            <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
                @foreach ($categoryRepository->getChildren($category) as $child)
                <li>
                    <a href="{{ route('category', $child) }}" class="@if (request()->is('catalog/' . $child->slug)) text-orange cursor-default @else hover:text-orange @endif block py-2 px-4 hover:bg-gray-100">
                        {{ $child->name }}
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach
    </ul>
</nav>