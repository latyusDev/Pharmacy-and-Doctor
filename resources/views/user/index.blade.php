<x-user.user_layout>
  
    <section>

                <form >
                    {{-- @csrf --}}
                <div>
                    <label for="">Enter name of drug</label>
                <br>
                <input value="{{old('name')}}" class="search" type="text" name="search">
                @error('name')
                <p style="color:red"> {{$message}}</p>
                @enderror
            </div>
        </form>

        <div class="output"></div>
    </section>
@push('search')
   <script src="{{asset('assets/js/app.js')}}"></script>
@endpush
</x-user.user_layout>
