<x-user.user_layout>
    <a href="/user/index" @style('text-decoration:none')><span @style('font-size:2rem')>&#128281</span></a>

    <section>

        <div>
            <h1>{{$drug->name}}</h1>
    <h2> Name: {{$drug->name}}</h2>
    <p>Price : N{{$drug->price}}</p>
    <p>Doctor profit : N{{$drug->doctorProfit($drug->price)}}</p>
    <p>Total amount : N{{$drug->totalAmount($drug->price)}}</p>
    <p>Quantity available : {{$drug->quantity}}</p>
   <form action="/user/{{$drug->id}}/order" method="post">
        @csrf
        <div>
                <label>Enter amount</label>
                <input type="number" name="quantity">
                @error('quantity')
                
                <p style="color:red"> {{$message}}</p>
                @enderror
       </div>
        <button type="submit">order</button>
    </form>
</div>
</section>
</x-user.user_layout>
