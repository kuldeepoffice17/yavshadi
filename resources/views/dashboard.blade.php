@extends('layouts.dashboard')

@section('title', 'डैशबोर्ड - विवाहसंगम')

@section('content')
<div class="space-y-6">
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-pink-500 via-rose-500 to-pink-500 rounded-2xl p-6 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 opacity-10">
            <i class="fas fa-heart text-9xl"></i>
        </div>
        <div class="relative">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold mb-2">
                        🙏 नमस्ते, {{ auth()->user()->name }}!
                    </h1>
                    <p class="text-pink-100">
                        आपका जीवनसाथी ढूंढने का सफर शुरू हो चुका है
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                        <i class="fas fa-chart-line mr-2"></i>
                        प्रोफाइल मैच स्कोर: <span class="font-bold">85%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards - Dashboard Metrics -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        <!-- New Matches -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-4 md:p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-xs md:text-sm">नए मैचेस</p>
                    <p class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white mt-1">28</p>
                    <p class="text-green-500 text-xs mt-2">
                        <i class="fas fa-arrow-up"></i> +8 इस हफ्ते
                    </p>
                </div>
                <div class="w-12 h-12 bg-pink-100 dark:bg-pink-900/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-heart text-pink-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Interests Received -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-4 md:p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-xs md:text-sm">इंटरेस्ट प्राप्त</p>
                    <p class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white mt-1">15</p>
                    <p class="text-green-500 text-xs mt-2">
                        <i class="fas fa-arrow-up"></i> +5 नए
                    </p>
                </div>
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-user-plus text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Profile Views -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-4 md:p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-xs md:text-sm">प्रोफाइल देखे गए</p>
                    <p class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white mt-1">342</p>
                    <p class="text-green-500 text-xs mt-2">
                        <i class="fas fa-arrow-up"></i> +28% बढ़ोतरी
                    </p>
                </div>
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-eye text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-4 md:p-6 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-xs md:text-sm">संदेश</p>
                    <p class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white mt-1">8</p>
                    <p class="text-blue-500 text-xs mt-2">
                        <i class="fas fa-envelope"></i> 3 नहीं पढ़े
                    </p>
                </div>
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-comments text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Menu -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4">
        <a href="{{ route('matches.index') }}" class="bg-gradient-to-r from-pink-500 to-rose-500 text-white p-4 rounded-xl text-center hover:shadow-lg transition transform hover:scale-105">
            <i class="fas fa-search text-2xl mb-2 block"></i>
            <span class="text-sm font-semibold">साथी ढूंढें</span>
        </a>
        <a href="{{ route('profile.complete') }}" class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-4 rounded-xl text-center hover:shadow-lg transition transform hover:scale-105">
            <i class="fas fa-user-edit text-2xl mb-2 block"></i>
            <span class="text-sm font-semibold">प्रोफाइल अपडेट</span>
        </a>
        <a href="{{ route('interests') }}" class="bg-gradient-to-r from-green-500 to-teal-500 text-white p-4 rounded-xl text-center hover:shadow-lg transition transform hover:scale-105">
            <i class="fas fa-heart text-2xl mb-2 block"></i>
            <span class="text-sm font-semibold">इंटरेस्ट देखें</span>
        </a>
        <a href="#" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded-xl text-center hover:shadow-lg transition transform hover:scale-105">
            <i class="fas fa-calendar-check text-2xl mb-2 block"></i>
            <span class="text-sm font-semibold">शादी की तैयारी</span>
        </a>
    </div>

    <!-- Your Profile Summary -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm overflow-hidden">
        <div class="border-b border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                <i class="fas fa-id-card text-pink-500 mr-2"></i>
                मेरी प्रोफाइल
            </h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-pink-600"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">पूरा नाम</p>
                            <p class="font-semibold text-gray-800 dark:text-white">{{ auth()->user()->name }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-venus-mars text-pink-600"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">मैं ढूंढ रहा हूँ</p>
                            <p class="font-semibold text-gray-800 dark:text-white">
                                {{ auth()->user()->profile->looking_for ?? 'अपडेट नहीं किया' }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-pink-600"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">शहर</p>
                            <p class="font-semibold text-gray-800 dark:text-white">
                                {{ auth()->user()->profile->city ?? 'अपडेट नहीं किया' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-pink-600"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">शिक्षा</p>
                            <p class="font-semibold text-gray-800 dark:text-white">
                                {{ auth()->user()->profile->education ?? 'अपडेट नहीं किया' }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-briefcase text-pink-600"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">पेशा</p>
                            <p class="font-semibold text-gray-800 dark:text-white">
                                {{ auth()->user()->profile->occupation ?? 'अपडेट नहीं किया' }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-calendar-alt text-pink-600"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">उम्र</p>
                            <p class="font-semibold text-gray-800 dark:text-white">
                                {{ auth()->user()->profile->age ?? 'अपडेट नहीं किया' }} वर्ष
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 text-right">
                <a href="{{ route('profile.complete') }}" class="inline-flex items-center gap-2 text-pink-600 hover:text-pink-700">
                    <i class="fas fa-edit"></i>
                    प्रोफाइल पूरा करें
                </a>
            </div>
        </div>
    </div>

    <!-- Suggested Matches -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm overflow-hidden">
        <div class="border-b border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                    <i class="fas fa-heart text-pink-500 mr-2"></i>
                    आपके लिए सुझाए गए मैचेस
                </h3>
                <a href="{{ route('matches.index') }}" class="text-pink-600 text-sm hover:text-pink-700">सभी देखें →</a>
            </div>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @php
                    $suggestedMatches = [
                        ['name' => 'प्रिया शर्मा', 'age' => 26, 'city' => 'मुंबई', 'occupation' => 'सॉफ्टवेयर इंजीनियर', 'match' => '95% मैच', 'photo' => 'PS'],
                        ['name' => 'नीहा पटेल', 'age' => 25, 'city' => 'अहमदाबाद', 'occupation' => 'डॉक्टर', 'match' => '92% मैच', 'photo' => 'NP'],
                        ['name' => 'स्नेहा रेड्डी', 'age' => 27, 'city' => 'हैदराबाद', 'occupation' => 'CA', 'match' => '88% मैच', 'photo' => 'SR'],
                    ];
                @endphp
                
                @foreach($suggestedMatches as $match)
                <div class="border border-gray-200 dark:border-gray-700 rounded-xl p-4 hover:shadow-lg transition">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-14 h-14 bg-gradient-to-r from-pink-500 to-rose-500 rounded-full flex items-center justify-center text-white font-bold text-xl">
                            {{ $match['photo'] }}
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 dark:text-white">{{ $match['name'] }}</h4>
                            <p class="text-xs text-gray-500">{{ $match['age'] }} वर्ष, {{ $match['city'] }}</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                        <i class="fas fa-briefcase mr-1 text-pink-500"></i> {{ $match['occupation'] }}
                    </p>
                    <div class="flex items-center justify-between mt-3">
                        <span class="text-xs text-green-600 font-semibold">{{ $match['match'] }}</span>
                        <button class="bg-pink-500 text-white px-4 py-1 rounded-full text-sm hover:bg-pink-600 transition">
                            <i class="fas fa-heart mr-1"></i> इंटरेस्ट
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm overflow-hidden">
        <div class="border-b border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                <i class="fas fa-bell text-pink-500 mr-2"></i>
                हाल की गतिविधियाँ
            </h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-start gap-3 p-3 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-xl transition">
                    <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-eye text-pink-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800 dark:text-white">किसी ने आपकी प्रोफाइल देखी</p>
                        <p class="text-xs text-gray-500">मुंबई से एक सदस्य ने आपकी प्रोफाइल देखी</p>
                    </div>
                    <p class="text-xs text-gray-400">5 मिनट पहले</p>
                </div>
                <div class="flex items-start gap-3 p-3 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-xl transition">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-heart text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800 dark:text-white">नया इंटरेस्ट प्राप्त हुआ</p>
                        <p class="text-xs text-gray-500">प्रिया शर्मा ने आपको इंटरेस्ट भेजा है</p>
                    </div>
                    <p class="text-xs text-gray-400">1 घंटे पहले</p>
                </div>
                <div class="flex items-start gap-3 p-3 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-xl transition">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-envelope text-blue-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800 dark:text-white">नया संदेश आया</p>
                        <p class="text-xs text-gray-500">आपको एक नया संदेश मिला है</p>
                    </div>
                    <p class="text-xs text-gray-400">3 घंटे पहले</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Wedding Tips -->
    <div class="bg-gradient-to-r from-pink-50 to-rose-50 dark:from-gray-800 dark:to-gray-700 rounded-2xl p-6">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-lightbulb text-white text-xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">शादी की टिप्स</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    अपनी प्रोफाइल को 100% पूरा करें और 3 गुना अधिक मैचेस पाएं। 
                    अच्छी फोटो और सही जानकारी से आपको बेहतर मैच मिलेंगे।
                </p>
                <a href="#" class="inline-block mt-3 text-pink-600 text-sm font-semibold hover:text-pink-700">
                    और टिप्स पढ़ें →
                </a>
            </div>
        </div>
    </div>
</div>
@endsection