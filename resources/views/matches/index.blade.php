<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>साथी ढूंढें - विवाहसंगम</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    {{-- Nav --}}
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-9 h-9 bg-gradient-to-r from-pink-500 to-rose-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-heart text-white"></i>
                </div>
                <span class="text-xl font-bold bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">विवाहसंगम</span>
            </a>
            <div class="flex gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-full text-sm font-semibold">डैशबोर्ड</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-pink-600 font-semibold border border-pink-300 rounded-full text-sm">लॉगिन</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-full text-sm font-semibold">रजिस्टर</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 py-8">

        {{-- Header --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                अपना <span class="bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">जीवनसाथी</span> ढूंढें
            </h1>
            <p class="text-gray-500">{{ $matches->total() }} प्रोफाइल मिले</p>
        </div>

        {{-- Search Filter Bar --}}
        <div class="bg-white rounded-2xl shadow-sm p-4 mb-8">
            <form action="{{ route('matches.index') }}" method="GET" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-3">
                <div>
                    <select name="looking_for" class="w-full px-3 py-2 border border-gray-200 rounded-xl text-sm text-gray-700">
                        <option value="">ढूंढ रहा हूँ</option>
                        <option value="bride"   {{ request('looking_for') == 'bride'  ? 'selected' : '' }}>दुल्हन</option>
                        <option value="groom"   {{ request('looking_for') == 'groom'  ? 'selected' : '' }}>दूल्हा</option>
                    </select>
                </div>
                <div>
                    <select name="age" class="w-full px-3 py-2 border border-gray-200 rounded-xl text-sm text-gray-700">
                        <option value="">उम्र</option>
                        <option value="18-25" {{ request('age') == '18-25' ? 'selected' : '' }}>18-25</option>
                        <option value="26-30" {{ request('age') == '26-30' ? 'selected' : '' }}>26-30</option>
                        <option value="31-35" {{ request('age') == '31-35' ? 'selected' : '' }}>31-35</option>
                        <option value="36-45" {{ request('age') == '36-45' ? 'selected' : '' }}>36-45</option>
                    </select>
                </div>
                <div>
                    <select name="religion" class="w-full px-3 py-2 border border-gray-200 rounded-xl text-sm text-gray-700">
                        <option value="">सभी धर्म</option>
                        <option value="hindu"    {{ request('religion') == 'hindu'    ? 'selected' : '' }}>हिंदू</option>
                        <option value="muslim"   {{ request('religion') == 'muslim'   ? 'selected' : '' }}>मुस्लिम</option>
                        <option value="sikh"     {{ request('religion') == 'sikh'     ? 'selected' : '' }}>सिख</option>
                        <option value="christian"{{ request('religion') == 'christian'? 'selected' : '' }}>ईसाई</option>
                        <option value="jain"     {{ request('religion') == 'jain'     ? 'selected' : '' }}>जैन</option>
                    </select>
                </div>
                {{-- Country --}}
                <div>
                    <select name="country" id="filter_country" class="w-full px-3 py-2 border border-gray-200 rounded-xl text-sm text-gray-700">
                        <option value="">देश</option>
                    </select>
                </div>
                {{-- State --}}
                <div>
                    <select name="state" id="filter_state" disabled class="w-full px-3 py-2 border border-gray-200 rounded-xl text-sm text-gray-700 disabled:bg-gray-50">
                        <option value="">राज्य</option>
                    </select>
                </div>
                {{-- City --}}
                <div>
                    <select name="city" id="filter_city" disabled class="w-full px-3 py-2 border border-gray-200 rounded-xl text-sm text-gray-700 disabled:bg-gray-50">
                        <option value="">शहर</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="w-full px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl text-sm font-semibold hover:shadow-lg transition">
                        <i class="fas fa-search mr-1"></i> खोजें
                    </button>
                </div>
            </form>
        </div>

        {{-- Results --}}
        @if($matches->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($matches as $user)
                    @php $profile = $user->profile; @endphp
                    <div class="bg-white rounded-2xl overflow-hidden shadow hover:shadow-xl transition transform hover:-translate-y-1">
                        
                        {{-- Card Header --}}
                        <div class="relative h-40 bg-gradient-to-r from-pink-400 to-rose-500 flex items-center justify-center">
                            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center text-pink-600 text-2xl font-bold shadow-lg">
                                {{ mb_substr($user->name, 0, 2) }}
                            </div>
                            @if($profile && $profile->looking_for)
                            <div class="absolute top-3 right-3">
                                <span class="bg-white/90 text-pink-600 text-xs px-2 py-1 rounded-full font-semibold">
                                    {{ $profile->looking_for == 'bride' ? 'दुल्हन' : 'दूल्हा' }}
                                </span>
                            </div>
                            @endif
                        </div>

                        <div class="p-4">
                            {{-- Name & Age — सबको दिखाएं --}}
                            <h3 class="text-lg font-bold text-gray-800">{{ $user->name }}</h3>
                            <p class="text-pink-600 text-sm font-semibold mb-3">
                                {{ $profile->age ?? '?' }} वर्ष
                                @if($profile && $profile->city) • {{ $profile->city }} @endif
                            </p>

                            @auth
                                {{-- Login है — सब details दिखाएं --}}
                                <div class="space-y-1 text-sm text-gray-600 mb-4">
                                    @if($profile && $profile->occupation)
                                        <p><i class="fas fa-briefcase text-pink-400 w-4"></i> {{ $profile->occupation }}</p>
                                    @endif
                                    @if($profile && $profile->education)
                                        <p><i class="fas fa-graduation-cap text-pink-400 w-4"></i> {{ $profile->education }}</p>
                                    @endif
                                    @if($profile && $profile->religion)
                                        <p><i class="fas fa-pray text-pink-400 w-4"></i> {{ $profile->religion }}</p>
                                    @endif
                                    @if($profile && $profile->annual_income)
                                        <p><i class="fas fa-rupee-sign text-pink-400 w-4"></i> {{ $profile->annual_income }}</p>
                                    @endif
                                    @if($profile && $profile->marital_status)
                                        <p><i class="fas fa-heart text-pink-400 w-4"></i> {{ $profile->marital_status }}</p>
                                    @endif
                                </div>
                                <div class="flex gap-2">
                                    <button class="flex-1 bg-gradient-to-r from-pink-500 to-rose-500 text-white py-2 rounded-full text-xs font-semibold hover:shadow-lg transition">
                                        <i class="fas fa-heart mr-1"></i> इंटरेस्ट
                                    </button>
                                    <button class="px-3 py-2 border-2 border-pink-400 text-pink-500 rounded-full hover:bg-pink-50 transition text-xs">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            @else
                                {{-- Login नहीं — details blur + login prompt --}}
                                <div class="relative mb-4">
                                    <div class="space-y-1 text-sm text-gray-400 blur-sm select-none">
                                        <p><i class="fas fa-briefcase w-4"></i> ••••••••••</p>
                                        <p><i class="fas fa-graduation-cap w-4"></i> ••••••••</p>
                                        <p><i class="fas fa-pray w-4"></i> ••••••</p>
                                        <p><i class="fas fa-rupee-sign w-4"></i> ••••••••••</p>
                                    </div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <a href="{{ route('login') }}" 
                                           class="bg-gradient-to-r from-pink-500 to-rose-500 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg hover:shadow-xl transition">
                                            <i class="fas fa-lock mr-1"></i> Details देखें
                                        </a>
                                    </div>
                                </div>
                                <a href="{{ route('login') }}" 
                                   class="block w-full text-center bg-gradient-to-r from-pink-500 to-rose-500 text-white py-2 rounded-full text-xs font-semibold hover:shadow-lg transition">
                                    <i class="fas fa-sign-in-alt mr-1"></i> Login करके इंटरेस्ट भेजें
                                </a>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8 flex justify-center">
                {{ $matches->links() }}
            </div>

        @else
            {{-- No Results --}}
            <div class="text-center py-20">
                <i class="fas fa-heart-broken text-pink-300 text-6xl mb-4"></i>
                <h3 class="text-xl font-bold text-gray-600 mb-2">कोई प्रोफाइल नहीं मिला</h3>
                <p class="text-gray-400 mb-6">Filter बदलकर दोबारा कोशिश करें</p>
                <a href="{{ route('matches.index') }}" class="px-6 py-3 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-full font-semibold hover:shadow-lg transition">
                    सभी प्रोफाइल देखें
                </a>
            </div>
        @endif
    </div>

<script>
    const CSRF = document.querySelector('meta[name="csrf-token"]') 
                 ? document.querySelector('meta[name="csrf-token"]').getAttribute('content') 
                 : '';

    // Pre-selected values from URL
    const selectedCountry = "{{ request('country') }}";
    const selectedState   = "{{ request('state') }}";
    const selectedCity    = "{{ request('city') }}";

    async function filterLoadCountries() {
        const sel = document.getElementById('filter_country');
        try {
            const res    = await fetch('/api/location/countries');
            const result = await res.json();
            sel.innerHTML = '<option value="">देश चुनें</option>';
            result.data.forEach(name => {
                const o = document.createElement('option');
                o.value = name; o.textContent = name;
                if (name === selectedCountry) o.selected = true;
                sel.appendChild(o);
            });
            if (selectedCountry) filterLoadStates();
        } catch (e) { console.error(e); }
    }

    async function filterLoadStates() {
        const country  = document.getElementById('filter_country').value;
        const stateSel = document.getElementById('filter_state');
        const citySel  = document.getElementById('filter_city');

        citySel.innerHTML = '<option value="">शहर</option>';
        citySel.disabled  = true;

        if (!country) {
            stateSel.innerHTML = '<option value="">राज्य</option>';
            stateSel.disabled  = true;
            return;
        }

        stateSel.innerHTML = '<option value="">लोड हो रहा है...</option>';
        stateSel.disabled  = true;

        try {
            const res  = await fetch('/api/location/states', {
                method : 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
                body   : JSON.stringify({ country }),
            });
            const data = await res.json();
            if (!data.error && data.data.states && data.data.states.length > 0) {
                stateSel.innerHTML = '<option value="">राज्य चुनें</option>';
                data.data.states.forEach(s => {
                    const o = document.createElement('option');
                    o.value = s.name; o.textContent = s.name;
                    if (s.name === selectedState) o.selected = true;
                    stateSel.appendChild(o);
                });
                stateSel.disabled = false;
                if (selectedState) filterLoadCities();
            } else {
                stateSel.innerHTML = '<option value="">उपलब्ध नहीं</option>';
            }
        } catch (e) { console.error(e); }
    }

    async function filterLoadCities() {
        const country = document.getElementById('filter_country').value;
        const state   = document.getElementById('filter_state').value;
        const citySel = document.getElementById('filter_city');

        if (!country || !state) {
            citySel.innerHTML = '<option value="">शहर</option>';
            citySel.disabled  = true;
            return;
        }

        citySel.innerHTML = '<option value="">लोड हो रहा है...</option>';
        citySel.disabled  = true;

        try {
            const res  = await fetch('/api/location/cities', {
                method : 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
                body   : JSON.stringify({ country, state }),
            });
            const data = await res.json();
            if (!data.error && data.data && data.data.length > 0) {
                citySel.innerHTML = '<option value="">शहर चुनें</option>';
                data.data.forEach(city => {
                    const o = document.createElement('option');
                    o.value = city; o.textContent = city;
                    if (city === selectedCity) o.selected = true;
                    citySel.appendChild(o);
                });
                citySel.disabled = false;
            } else {
                citySel.innerHTML = '<option value="">उपलब्ध नहीं</option>';
            }
        } catch (e) { console.error(e); }
    }

    document.getElementById('filter_country').addEventListener('change', filterLoadStates);
    document.getElementById('filter_state').addEventListener('change', filterLoadCities);

    document.addEventListener('DOMContentLoaded', filterLoadCountries);
</script>
</body>
</html>