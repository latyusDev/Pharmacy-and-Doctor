{{-- <x-admin.admin_layout> --}}

   <section>
    @if (session('msg'))
        {{session('msg')}}
    @endif
    <a href="/admin/index" @style('text-decoration:none')><span @style('font-size:2rem')>&#128281</span></a>
    <h1>Pharmacies</h1>

    <div class="flex justify-center flex-col ">
        @forelse ($pharmacies as $pharmacy)
            @if (!$pharmacy->status)
                @include('admin.includes.pharmacy')
            @endif
        @empty
            <p class="text-center">No Pharmacy is Available</p>
        @endforelse

        {{-- banned pharmacy --}}

        <h1 class="font-bold text-center my-10 text-xl">Banned pharmacies</h1>
        <div class="flex justify-center flex-col ">
            @forelse ($pharmacies as $pharmacy)
                @if($pharmacy->status)
                    @include('admin.includes.pharmacy')
                @endif
            @empty
                <p class="text-center">No Pharmacy is banned</p>
            @endforelse
       </div>
    </section>
    {{-- </x-admin.admin_layout> --}}