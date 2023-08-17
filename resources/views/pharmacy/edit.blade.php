<x-pharmacy.pharmacy_layout>
<section>

    <a href="/pharmacy/{{$drug->id}}" @style('text-decoration:none')><span @style('font-size:2rem')>&#128281</span></a>
    
    <form action="/pharmacy/{{$drug->id}}" method="post">
        @method('put')
    @csrf
    <div>
        <label for="">Name</label>
            <br>
    <input value="{{$drug->name}}" type="text" name="name">
    @error('name')
           <p style="color:red"> {{$message}}</p>
        @enderror
     
        </div>
    
        <div>
        <label for="">price</label>
            <br>
        <input value="{{$drug->price}}" type="price" name="price">
        @error('price')
           <p style="color:red"> {{$message}}</p>
        @enderror
        </div>
        
        <div>
        <label for=""> quantity</label>
            <br>
        <input value="{{$drug->quantity}}" type="quantity" name="quantity">
            @error('quantity')
            <p style="color:red"> {{$message}}</p>
            @enderror
        </div>
    
        <div>
        <label for=""> description</label>
            <br>
           <textarea name="description"  cols="30" rows="10" >{{$drug->description}}</textarea>
            @error('description')
            <p style="color:red"> {{$message}}</p>
            @enderror
        </div>
    <button type="submit"> Update</button>
</form>

</section>
</x-pharmacy.pharmacy_layout>
