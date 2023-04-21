@extends('layouts.app')

@section('content')
    <div class="flex justify-center p-2">
        <div class="  rounded-sm">
            <x-post :post="$post" />
           <livewire:comment.index :post="$post" />
        </div>
    </div>
@endsection
