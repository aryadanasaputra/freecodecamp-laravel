<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <x-category-tabs>
                        No Categories!
                    </x-category-tabs>
                </div>
            </div>
            <div class="text-gray-900 mt-8">
                @forelse ($posts as $post)
                    <x-post-item :post="$post"></x-post-item>
                @empty
                    <div class="flex bg-white border border-gray-200 rounded-lg shadow-sm mb-8">
                        <div class="p-5 flex-1">
                            <h5
                                class="mb-3 py-20 text-2xl font-semibold tracking-tight text-gray-400 text-center text-heading leading-8">
                                No posts yet!
                            </h5>
                        </div>
                    </div>
                @endforelse
            </div>
            {{ $posts->onEachSide(1)->links() }}
        </div>
    </div>
</x-app-layout>