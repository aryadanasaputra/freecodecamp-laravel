@props(['user'])

<div {{ $attributes }} x-data="{
        {{-- status follow awal --}}
        following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
        
        {{-- jumlah followers --}}
        followersCount: {{ $user->followers()->count() }},
        
        {{-- fuction follow / unfollow --}}
        follow() {
            axios.post('/follow/{{ $user->id }}').then(res => {
                this.following = !this.following
                this.followersCount = res.data.followersCount
            })
        }
    }" class="w-[320] border-l px-8">
    {{ $slot }}
</div>