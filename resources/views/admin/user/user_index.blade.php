{{-- <x-admin.admin_layout> --}}

   <section>
    @if (session('msg'))
        {{session('msg')}}
    @endif

    
    <a href="/admin/index" @style('text-decoration:none')><span @style('font-size:2rem')>&#128281</span></a>
    <h1>Users</h1>
    
    <div class="flex justify-center flex-col ">
        @forelse ($users as $user)
        @if (!$user->status)
            @include('admin.includes.user')
        @endif
        @empty
            <p class="text-center">No User is Available</p>
        @endforelse

        {{-- banned users --}}
        <h1 class="font-bold text-center my-10 text-xl">Banned Users</h1>
        <div class="flex justify-center flex-col ">
            @forelse ($users as $user)
                @if($user->status)
                    @include('admin.includes.user')
                @endif
            @empty
                <p class="text-center">No User is banned</p>
            @endforelse
       </div>
    </section>
    {{-- </x-admin.admin_layout> --}}