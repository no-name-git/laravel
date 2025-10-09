@extends('layouts.header', ['titlePage' => 'Edit profile'])
@section('content')
<div class="bg-white shadow rounded p-6">
    <form action="{{ route('user.update', $id->id) }}" method="post" class="flex gap-3 flex-col w-[400px]" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        
        <label for="city">City</label>
        <input type="text" name="city" id="city">
        <label for="hobbi">Hobbi</label>
        <input type="text" name="hobbi" id="hobbi">
        <label for="avatar">Avatarka</label>
        <input type="file" id="avatar" name="avatar">
        <button type="submit" class=" px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save</button>
    </form>
</div>
@endsection
