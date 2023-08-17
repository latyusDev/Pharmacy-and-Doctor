<x-pharmacy.pharmacy_layout>

    <section>

        <a href="/pharmacy">drugs</a>
        <form action="/pharmacy" method="post">
    @csrf
    <div>
    <label for="">Name</label>
        <br>
<input value="{{old('name')}}" type="text" name="name">
    @error('name')
       <p style="color:red"> {{$message}}</p>
    @enderror
 
    </div>
    
    <div>
    <label for="">price</label>
        <br>
        <input value="{{old('price')}}" type="price" name="price">
    @error('price')
       <p style="color:red"> {{$message}}</p>
    @enderror
    </div>
    
    <div>
    <label for=""> quantity</label>
    <br>
    <input value="{{old('quantity')}}" type="quantity" name="quantity">
        @error('quantity')
        <p style="color:red"> {{$message}}</p>
        @enderror
    </div>

    <div>
        <label for=""> description</label>
        <br>
        <textarea name="description"  cols="30" rows="10" value="{{old('description')}}"></textarea>
        @error('description')
        <p style="color:red"> {{$message}}</p>
        @enderror
    </div>

    <button type="submit"> store</button>
</form>

</section>
</x-pharmacy.pharmacy_layout>
