@extends('layouts.app')

@section('content')

    <!-- Optional Conditional code -->
    <!-- @if(class_exists(\App\Livewire\GstBills::class))    
        @livewire(\App\Livewire\GstBills::class)    
    @else        
        <p>Livewire component not found!</p>   
    @endif -->

    <!-- If the Livewire component name is like - GstBills, then you can use the following code to check if the component exists and then render it. -->
    @livewire('gst-bills')  

@endsection

