<x-pharmacy.pharmacy_layout>
    <a href="/pharmacy/welcome" @style('text-decoration:none')><span @style('font-size:2rem')>&#128281</span></a>

    <section>
        @if (session('msg'))
            {{session('msg')}}
        @endif
        <div>
    
            <h1>{{$drug->name}}</h1>
            <p>N{{$drug->price}}</p>
            <p>{{$drug->quantity}}</p>
            <p>{{$drug->description}}</p>
        </div>
        <a href="/pharmacy/{{$drug->id}}/edit">Edit</a>
        <form action="/pharmacy/{{$drug->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    </section>

</x-pharmacy.pharmacy_layout>
