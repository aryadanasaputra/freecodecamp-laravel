<ul class="hidden rounded-lg text-sm font-medium text-center text-body sm:flex -space-x-px">
    <li class="px-1 w-full focus-within:z-10">
        <a href="/"
            class="{{ request('category')
    ? 'rounded-lg inline-block text-body bg-neutral-primary-soft border border-gray-100 hover:bg-gray-100 hover:text-gray-800 font-medium leading-5 text-sm px-4 py-2' : 'rounded-lg inline-block text-body text-white bg-blue-600 bg-neutral-primary-soft border font-medium leading-5 text-sm px-4 py-2' }}">
            All
        </a>
    </li>
    @forelse ($categories as $category)
        <li class="px-1 w-full focus-within:z-10">
            <a href="{{ route('post.byCategory', $category->id) }}"
                class="{{ 
                                                Route::currentRouteNamed('post.byCategory') && Route::current()->parameter('category')->id == $category->id
            ? 'rounded-lg inline-block text-body text-white bg-blue-600 bg-neutral-primary-soft border font-medium leading-5 text-sm px-4 py-2'
            : 'rounded-lg inline-block text-body bg-neutral-primary-soft border border-gray-100 hover:bg-gray-100 hover:text-gray-800 font-medium leading-5 text-sm px-4 py-2' }}">
                {{ $category->name }}
            </a>
        </li>
    @empty
        {{ $slot }}
    @endforelse
</ul>