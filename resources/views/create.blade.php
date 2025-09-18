@extends('layouts.header', ['titlePage' => "Создание поста"])
@section('content')

<div>
    <h1 class="text-2xl font-bold mb-6">Create</h1>

    <form class="space-y-4" action="{{'store'}}" method="post" enctype="multipart/form-data">
        
        @include('layouts.form')
        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save</button>
    </form>
</div>
@endsection
