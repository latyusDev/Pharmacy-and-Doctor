<x-pharmacy.pharmacy_layout>
    @if (session('msg'))
            {{session('msg')}}
    @endif
    <section>
    <div>
        <form action="">
        <div>
            <button>Search for drugs</button>
            <input type="text" value="{{old('search')}}" name="search">
        </div>
        </form>
    </div>

    <h1>available drugs</h1>
    <a href="/pharmacy/create">Create drugs</a>
    <div @style('display:flex; justify-content:space-between;flex-wrap:wrap;')>
    
        @forelse ($drugs as $drug)
             <div @style('text-align:center;width:25%')>
                <h1>{{$drug->pharmacy->name}}</h1>
                <h3>{{$drug->name}}</h3>
                 <p>{{$drug->description}}</p>
                 <a href="/pharmacy/{{$drug->id}}">view</a>
            </div>
        @empty
            <p>No drug is available</p>
            @endforelse
        </div>

        <div @style('text-align:center')>
            {{$drugs->links()}}
        </div>    </section>
</x-pharmacy.pharmacy_layout>