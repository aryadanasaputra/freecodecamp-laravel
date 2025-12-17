<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-4xl font-extrabold mb-4 border-b border-gray-200">{{ $post->title }}</h1>

                {{-- Author info --}}
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->user" size="w-24 h-24" />

                    {{-- User info --}}
                    <div class="flex flex-col justify-center">
                        <x-follow-container :user="$post->user" class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}"
                                class="font-semibold text-gray-900 hover:underline">
                                {{ $post->user->name }}
                            </a>
                            @if (auth()->user() && auth()->user()->id !== $post->user->id)
                                &middot;
                                <button @click="follow()" x-text="following ? 'Unfollow' : 'Follow'"
                                    :class="following ? 'text-red-500' : 'text-emerald-500'">
                                </button>
                            @endif
                        </x-follow-container>
                        <div class="flex gap-2 text-gray-500 text-sm">
                            {{ $post->readTime() }} min read
                            &middot;
                            {{ $post->created_at->format('M d, Y') }}
                        </div>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $post->user->email }}"
                            class="text-blue-500">
                            {{ $post->user->email }}
                        </a>
                    </div>
                </div>
                {{-- Author info --}}

                {{-- Clap Section --}}
                <x-clap-button :post="$post" />
                {{-- Clap Section --}}

                {{-- --}}
                <div class="mt-8">
                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }} Image"
                        class="w-full rounded-lg">
                    <div class="mt-4">
                        {{ $post->content }}
                    </div>
                    <div class="mt-8">
                        <span class="px-4 py-2 bg-gray-200 rounded-2xl">
                            {{ $post->category->name }}
                        </span>
                    </div>
                </div>

                {{-- Clap Section --}}
                <x-clap-button :post="$post" />
                {{-- Clap Section --}}
            </div>
        </div>
    </div>
</x-app-layout>