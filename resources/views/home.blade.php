@extends('layouts.master')

@section('content')
  <div class="max-w-md mx-auto overflow-hidden md:max-w-2xl m-3 flex items-center h-screen ">
    <div class="flex items-center rounded-xl shadow-md bg-white">
      <div class="p-8">
        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Upload Document</div>
        <form action="{{ route('gemini.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
          @csrf
          <div class="form-group">
            <input type="file" name="document"
              class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" id="document">
          </div>
          <button type="submit"
            class="mt-6 px-4 py-2 rounded text-white bg-indigo-500 hover:bg-indigo-600">Upload</button>
        </form>

        @if (session('message'))
          <div class="mt-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Success</p>
            <div>{{ session('message') }}</div>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
