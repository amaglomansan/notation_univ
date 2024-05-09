@extends('dashboard')
@section('content')
   
<div class="container mt-4">
        <div class="bg-white rounded-lg shadow-sm p-4 text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Dashboard') }}
            </h2>
        </div

        <div class="mt-4 grid grid-cols-2 gap-4">
            <div>
                <img src="https://th.bing.com/th/id/R.ee8f3d096cb8a28d5f8144d28413ede6?rik=ojvEuIO9bv3qvw&pid=ImgRaw&r=0" alt="Education Image 1" class="w-full rounded-lg shadow" style="max-width: 100%;">
            </div>
            <div>
                <img src="https://www.francaisaletranger.fr/wp-content/uploads/2020/02/Sans-titre-6-3-1320x792.jpg" alt="Education Image 2" class="w-full rounded-lg shadow" style="max-width: 100%;">
            </div>
        </div>
</div>
@endsection