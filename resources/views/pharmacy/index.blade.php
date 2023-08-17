<x-pharmacy.pharmacy_layout>
    @if (session('msg'))
            {{session('msg')}}
    @endif
    <section>
    <a href="/pharmacy/welcome" @style('text-decoration:none')><span @style('font-size:2rem')>&#128281</span></a>
       
    <div @style('margin-block:1rem')>
        <a href="/pharmacy/create">Create drugs</a>
    </div>
    <div>
        <form action="pharmacy">
        <div>
            <button>Search for drugs</button>
            <input type="text" value="{{old('search')}}" name="search">
        </div>
        </form>
    </div>

    <h1>Available drugs</h1>
    <div @style('display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;')>
    
        @forelse ($drugs as $drug)
             <div @style('text-align:center;width:25%')>
                <h1>{{$drug->name}}</h1>
                 <p>{{$drug->description}}</p>
                 <a href="/pharmacy/{{$drug->id}}">view</a>
            </div>
        @empty
            <p>No drug is available</p>
            @endforelse
        </div>

        <div @style('text-align:center')>
            {{$drugs->links()}}
        </div>
    </section>
</x-pharmacy.pharmacy_layout>