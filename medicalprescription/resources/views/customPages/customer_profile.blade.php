@extends('layout')

@section('content')
<div>
    @include('customPages.customer_sidebar')
    <div class="ml-8">
        <div>
            <div class="font-bold text-2xl">My Account</div>
            <div class="mt-3">Account Information</div>
        </div>
        <hr class="border-t-2 border-blue-500 my-4 w-96">
        <div>
            <div class="font-bold text-xl">Contact Information</div>
            <div>
                Name: {{$user->firstName}}
            </div>
            <div>
                Email:
            </div>
            <div>
                Contact Number:
            </div>
        </div>
    </div>
</div>
@endsection