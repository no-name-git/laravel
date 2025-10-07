    @csrf
    <div>
        <label class="block mb-1 font-medium">Title</label>
        <input name="title" type="text" value="{{old('title') ?? $id->title ?? ''}}" placeholder="title" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
    @error('title')
        {{ $message }}
    @enderror
    </div>

    <div>
        <label class="block mb-1 font-medium">Content</label>
        <textarea name="deskr" rows="5" placeholder="Enter post content" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">{{old('deskr') ?? $id->deskr ?? ''}}</textarea>
        @error('deskr')
            {{$message}}
        @enderror
    </div>
    <div>
        <input name="user_id" type="hidden" value="{{ $id->user_id ?? Auth::id() }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
    </div>
    <div>
        
        <select name="categori_id" id="">
            <option selected="selected">{{old('categori_id') ? $categoris->find(old('categori_id'))->name : $id->categoris->name ?? 'Выберите категорию'}}</option>
            @foreach ($categoris as $categor)
                <option value="{{ $categor->id }}" {{ old('categori_id') == $categor->id ? 'selected' : ($id->category_id == $categor->id ? 'selected' : '') }}>{{$categor->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <input type="file" name="image" id="image" class="form-control">
        @error('image')
            {{$message}}
        @enderror
    </div>