@extends('layouts.dashboard')

@section('title', 'My Interests')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-white mb-4">
        My Interests 💌
    </h1>
    
    @if(isset($interestedUsers) && $interestedUsers->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($interestedUsers as $user)
                <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-sm">
                    <div class="p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-rose-500 rounded-full flex items-center justify-center text-white text-xl font-bold">
                                {{ substr($user->name, 0, 2) }}
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ $user->name }}</h3>
                                <p class="text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <form method="POST" action="{{ route('matches.accept.interest', $user->id) }}">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                                    <i class="fas fa-check mr-1"></i> Accept
                                </button>
                            </form>
                            <a href="#" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                                <i class="fas fa-times mr-1"></i> Decline
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-2xl">
            <i class="fas fa-inbox text-6xl text-gray-400 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">No interests yet</h3>
            <p class="text-gray-600 dark:text-gray-400">When someone shows interest in you, it will appear here.</p>
            <a href="{{ route('matches.index') }}" class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-lg hover:from-pink-600 hover:to-rose-600 transition">
                Find Matches
            </a>
        </div>
    @endif
</div>
@endsection