<div class="flex justify-evenly ">
    <p>{{$pharmacy->name}}</p>
        <p>{{$pharmacy->email}}</p>
        <p>{{$pharmacy->phone_number}}</p>
        <div class="self-center">
            <form action="/admin/pharmacies/destroy/{{$pharmacy->id}}" method="post" >
            @method('DELETE')
             @csrf
             <button type="submit">Delete</button>
            </form>
        </div>

        @if ($pharmacy->status)
                <div>
                    <form action="/admin/pharmacies/release/{{$pharmacy->id}}" method="post">
                        @method('PATCH')
                     @csrf
                     <button type="submit">Release</button>
                    </form>

                </div>
        @else
            
                <div>
                    <form action="/admin/pharmacies/ban/{{$pharmacy->id}}" method="post">
                        @method('PATCH')
                     @csrf
                     <button type="submit">Ban</button>
                    </form>
                </div>
        @endif

    </div>