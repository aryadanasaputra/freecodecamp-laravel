<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex">
                    <div class="flex-1 pr-8">
                        <h2 class="font-semibold text-5xl text-gray-800">
                            {{ $user->name }}
                        </h2>
                        <div class="mt-8">
                            @forelse ($posts as $post)
                                <x-post-item :post="$post"></x-post-item>
                            @empty
                                <div class="flex bg-white border border-gray-200 rounded-lg shadow-sm my-8">
                                    <div class="flex-1">
                                        <h5
                                            class="mb-3 py-20 text-2xl font-semibold tracking-tight text-gray-400 text-center text-heading leading-8">
                                            No posts yet!
                                        </h5>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Sidebar Right --}}
                    <x-follow-container :user="$user">
                        <x-user-avatar :user="$user" size="w-24 h-24" />
                        <h3 class="mt-4">{{ $user->name }}</h3>
                        <p class="text-gray-500 mt-2">
                            <span x-text="followersCount"></span> followers
                        </p>
                        <p class="text-gray-500 w-[200px] break-words text-sm mt-2">
                            {{ $user->bio }}
                        </p>
                        <div class="flex gap-2 mt-4">
                            @if (auth()->user() && auth()->user()->id !== $user->id)
                                <button @click="follow()" x-text="following ? 'Unfollow' : 'Follow'"
                                    :class="following ? 'bg-emerald-500 hover:bg-emerald-600' : 'bg-gray-900'"
                                    class="rounded-full px-4 py-2 text-white transition-all duration-300 hover:bg-gray-700">
                                    Follow
                                </button>
                            @endif
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $user->email }}"
                                class="bg-gray-900 rounded-full px-4 py-2 text-white transition-all duration-300 hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </a>
                        </div>
                    </x-follow-container>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>