<x-pharmacy_layout>
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

</x-pharmacy_layout>