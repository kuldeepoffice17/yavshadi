<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>प्रोफाइल पूरी करें - विवाहसंगम</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 1rem;
        }
        
        .form-card {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 2rem;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            animation: slideUp 0.5s ease-out;
            position: relative;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Logout Button Styles */
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.3);
            padding: 8px 16px;
            border-radius: 50px;
            color: white;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            z-index: 10;
        }
        
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .logout-btn i {
            margin-right: 8px;
        }
        
        .progress-step {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .progress-step.active {
            background: linear-gradient(135deg, #ec4899, #f43f5e);
            color: white;
            transform: scale(1.05);
        }
        
        .progress-step.completed {
            background: #10b981;
            color: white;
        }
        
        .form-section {
            display: none;
            animation: fadeIn 0.5s ease-out;
        }
        
        .form-section.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .required-star::after {
            content: '*';
            color: #ec4899;
            margin-left: 4px;
            font-weight: bold;
        }
        
        input:focus, select:focus, textarea:focus {
            border-color: #ec4899;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
            outline: none;
        }
        
        .input-group {
            margin-bottom: 1.5rem;
        }
        
        .radio-group {
            display: flex;
            gap: 2rem;
            margin-top: 0.5rem;
            flex-wrap: wrap;
        }
        
        .radio-group label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }
        
        .radio-group input[type="radio"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        
        .progress-bar {
            transition: width 0.5s ease;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #ec4899, #f43f5e);
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(236, 72, 153, 0.4);
        }
        
        .btn-secondary {
            border: 2px solid #ec4899;
            background: transparent;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: #fce7f3;
            transform: translateY(-2px);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }
        
        select:disabled {
            background-color: #f3f4f6;
            cursor: not-allowed;
        }
        
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .loader {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid #ec4899;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 8px;
        }
        
        /* User info bar */
        .user-info-bar {
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 10px 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 20px;
        }
        
        .user-welcome {
            color: white;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .user-welcome i {
            font-size: 16px;
        }
        
        @media (max-width: 640px) {
            .form-card {
                margin: 0;
                border-radius: 1rem;
            }
            
            .radio-group {
                gap: 1rem;
            }
            
            .btn-primary, .btn-secondary, .btn-success {
                padding: 0.75rem 1.5rem;
                font-size: 0.875rem;
            }
            
            .logout-btn {
                top: 10px;
                right: 10px;
                padding: 6px 12px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="form-card">
        <!-- Logout Button - Only visible when logged in -->
        @auth
        <div class="user-info-bar">
            <div class="user-welcome">
                <i class="fas fa-user-circle"></i>
                <span>स्वागत है, {{ Auth::user()->name ?? 'उपयोगकर्ता' }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}" id="logoutForm" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn" onclick="event.preventDefault(); confirmLogout();">
                    <i class="fas fa-sign-out-alt"></i>
                    लॉगआउट (Logout)
                </button>
            </form>
        </div>
        @else
        <!-- Optional: Show login link if not logged in -->
        <div class="user-info-bar">
            <a href="{{ route('login') }}" class="logout-btn" style="text-decoration: none; background: rgba(255,255,255,0.2);">
                <i class="fas fa-sign-in-alt"></i>
                लॉगिन करें (Login)
            </a>
        </div>
        @endauth
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-pink-500 to-rose-500 p-6 text-white text-center">
            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-user-edit text-pink-500 text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold">प्रोफाइल पूरी करें</h1>
            <p class="text-pink-100 text-sm mt-1">कृपया अपनी सभी जानकारी भरें</p>
        </div>
        
        <!-- Progress Bar -->
        <div class="p-6 bg-gray-50">
            <div class="flex justify-between mb-2">
                <span class="text-gray-700 text-sm">प्रोफाइल पूर्णता</span>
                <span class="text-pink-600 text-sm font-bold" id="progressPercent">0%</span>
            </div>
            <div class="w-full bg-gray-300 rounded-full h-2">
                <div id="progressBar" class="progress-bar bg-gradient-to-r from-pink-500 to-rose-500 h-2 rounded-full" style="width: 0%"></div>
            </div>
        </div>
        
        <!-- Step Indicators -->
        <div class="grid grid-cols-3 gap-2 p-6 bg-gray-50 border-t border-gray-200">
            <div class="progress-step active text-center p-3 bg-white rounded-xl font-semibold text-gray-700 shadow-sm" data-step="1">
                <i class="fas fa-user text-lg mb-1 block"></i>
                <span class="text-xs">बेसिक जानकारी</span>
            </div>
            <div class="progress-step text-center p-3 bg-white rounded-xl font-semibold text-gray-700 shadow-sm" data-step="2">
                <i class="fas fa-briefcase text-lg mb-1 block"></i>
                <span class="text-xs">व्यावसायिक जानकारी</span>
            </div>
            <div class="progress-step text-center p-3 bg-white rounded-xl font-semibold text-gray-700 shadow-sm" data-step="3">
                <i class="fas fa-heart text-lg mb-1 block"></i>
                <span class="text-xs">अन्य जानकारी</span>
            </div>
        </div>
        
        <!-- Form -->
        <form method="POST" action="{{ route('profile.complete.store') }}" class="p-6" id="profileForm">
            @csrf
            
            <!-- Section 1: Basic Information -->
            <div id="section1" class="form-section active">
                <h2 class="text-xl font-bold text-gray-800 mb-6">📝 बेसिक जानकारी</h2>
                
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 required-star">
                        लिं्ग (Gender)
                    </label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="gender" value="male" required>
                            <span>पुरुष (Male)</span>
                        </label>
                        <label>
                            <input type="radio" name="gender" value="female" required>
                            <span>महिला (Female)</span>
                        </label>
                    </div>
                </div>
                
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 required-star">
                        मैं ढूंढ रहा हूँ (Looking For)
                    </label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="looking_for" value="groom" required>
                            <span>दूल्हा (Groom)</span>
                        </label>
                        <label>
                            <input type="radio" name="looking_for" value="bride" required>
                            <span>दुल्हन (Bride)</span>
                        </label>
                    </div>
                </div>
                
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 required-star">
                        उम्र (Age)
                    </label>
                    <input type="number" name="age" required min="18" max="100"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500"
                        placeholder="उदाहरण: 25">
                </div>
                
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 required-star">
                        धर्म (Religion)
                    </label>
                    <select name="religion" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500">
                        <option value="">-- चुनें --</option>
                        <option value="हिंदू">हिंदू (Hindu)</option>
                        <option value="मुस्लिम">मुस्लिम (Muslim)</option>
                        <option value="सिख">सिख (Sikh)</option>
                        <option value="ईसाई">ईसाई (Christian)</option>
                        <option value="जैन">जैन (Jain)</option>
                        <option value="बौद्ध">बौद्ध (Buddhist)</option>
                    </select>
                </div>
                
                <!-- Country Dropdown with API -->
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 required-star">
                        देश (Country)
                    </label>
                    <select name="country" id="country" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500">
                        <option value="">-- देश लोड हो रहा है... --</option>
                    </select>
                </div>
                
                <!-- State Dropdown -->
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 required-star">
                        राज्य (State)
                    </label>
                    <select name="state" id="state" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500" disabled>
                        <option value="">-- पहले देश चुनें --</option>
                    </select>
                </div>
                
                <!-- City Dropdown -->
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 required-star">
                        शहर (City)
                    </label>
                    <select name="city" id="city" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500" disabled>
                        <option value="">-- पहले राज्य चुनें --</option>
                    </select>
                </div>
                
                <div class="mt-8 flex justify-end">
                    <button type="button" onclick="nextSection(2)" class="btn-primary px-8 py-3 text-white rounded-lg font-semibold transition-all duration-300 flex items-center gap-2">
                        अगला चरण (Next) 
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            
            <!-- Section 2: Professional Information -->
            <div id="section2" class="form-section">
                <h2 class="text-xl font-bold text-gray-800 mb-6">💼 व्यावसायिक जानकारी</h2>
                
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 required-star">
                        शिक्षा (Education)
                    </label>
                    <input type="text" name="education" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500"
                        placeholder="उदाहरण: B.Tech, MBA, CA, M.Sc">
                </div>
                
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 required-star">
                        पेशा (Occupation)
                    </label>
                    <input type="text" name="occupation" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500"
                        placeholder="उदाहरण: सॉफ्टवेयर इंजीनियर, डॉक्टर, व्यवसायी">
                </div>
                
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        वार्षिक आय (Annual Income)
                    </label>
                    <select name="annual_income" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500">
                        <option value="">-- चुनें --</option>
                        <option value="0-3 लाख">0-3 लाख (0-3 Lakhs)</option>
                        <option value="3-6 लाख">3-6 लाख (3-6 Lakhs)</option>
                        <option value="6-10 लाख">6-10 लाख (6-10 Lakhs)</option>
                        <option value="10-15 लाख">10-15 लाख (10-15 Lakhs)</option>
                        <option value="15-20 लाख">15-20 लाख (15-20 Lakhs)</option>
                        <option value="20+ लाख">20+ लाख (Above 20 Lakhs)</option>
                    </select>
                </div>
                
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        ऊंचाई (Height)
                    </label>
                    <input type="text" name="height"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500"
                        placeholder="उदाहरण: 5'8'', 5'10''">
                </div>
                
                <div class="mt-8 flex justify-between gap-4">
                    <button type="button" onclick="prevSection(1)" class="btn-secondary px-8 py-3 text-pink-600 rounded-lg font-semibold transition-all duration-300 flex items-center gap-2">
                        <i class="fas fa-arrow-left"></i>
                        पीछे (Previous)
                    </button>
                    <button type="button" onclick="nextSection(3)" class="btn-primary px-8 py-3 text-white rounded-lg font-semibold transition-all duration-300 flex items-center gap-2">
                        अगला चरण (Next)
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            
            <!-- Section 3: Other Information -->
            <div id="section3" class="form-section">
                <h2 class="text-xl font-bold text-gray-800 mb-6">💕 अन्य जानकारी</h2>
                
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        वैवाहिक स्थिति (Marital Status)
                    </label>
                    <select name="marital_status" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500">
                        <option value="">-- चुनें --</option>
                        <option value="अविवाहित">अविवाहित (Never Married)</option>
                        <option value="तलाकशुदा">तलाकशुदा (Divorced)</option>
                        <option value="विधुर/विधवा">विधुर/विधवा (Widowed)</option>
                    </select>
                </div>
                
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        मातृभाषा (Mother Tongue)
                    </label>
                    <input type="text" name="mother_tongue"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500"
                        placeholder="उदाहरण: हिंदी, मराठी, गुजराती, तेलुगू">
                </div>
                
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        आहार (Diet)
                    </label>
                    <select name="diet" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500">
                        <option value="">-- चुनें --</option>
                        <option value="शाकाहारी">शाकाहारी (Vegetarian)</option>
                        <option value="मांसाहारी">मांसाहारी (Non-Vegetarian)</option>
                        <option value="शाकाहारी (अंडा)">शाकाहारी (अंडा) (Eggetarian)</option>
                    </select>
                </div>
                
                <div class="input-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        अपने बारे में (About Me)
                    </label>
                    <textarea name="about_me" rows="5"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-pink-500"
                        placeholder="अपने बारे में बताएं - आपकी रुचियां, शौक, स्वभाव, और आप किस तरह का जीवनसाथी ढूंढ रहे हैं..."></textarea>
                </div>
                
                <div class="mt-8 flex justify-between gap-4">
                    <button type="button" onclick="prevSection(2)" class="btn-secondary px-8 py-3 text-pink-600 rounded-lg font-semibold transition-all duration-300 flex items-center gap-2">
                        <i class="fas fa-arrow-left"></i>
                        पीछे (Previous)
                    </button>
                    <button type="submit" class="btn-success px-8 py-3 text-white rounded-lg font-semibold transition-all duration-300 flex items-center gap-2">
                        <i class="fas fa-check-circle"></i>
                        प्रोफाइल पूरी करें (Submit)
                    </button>
                </div>
            </div>
        </form>
        
        <!-- Note -->
        <div class="p-6 bg-pink-50 border-t border-pink-100">
            <div class="flex items-start gap-3">
                <i class="fas fa-info-circle text-pink-500 mt-1"></i>
                <div>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold">नोट:</span> * चिह्न वाले फील्ड भरना अनिवार्य है।
                        सही जानकारी भरने से आपको बेहतर मैच मिलेंगे।
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Logout confirmation function
        function confirmLogout() {
            if (confirm('क्या आप वाकई लॉगआउट करना चाहते हैं? / Are you sure you want to logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }
        
        // API Configuration - Using Laravel backend routes
        let currentStep = 1;
        const totalSteps = 3;
        const COUNTRY_API = '/api/location/countries';
        const STATES_API = '/api/location/states';
        const CITIES_API = '/api/location/cities';
        
        // Get CSRF token from meta tag
        const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Load Countries from API
        async function loadCountries() {
            const countrySelect = document.getElementById('country');
            countrySelect.innerHTML = '<option value="">-- देश लोड हो रहा है... --</option>';
            
            try {
                const response = await fetch(COUNTRY_API);
                if (!response.ok) throw new Error('Server error');
                const result = await response.json();
                
                countrySelect.innerHTML = '<option value="">-- देश चुनें --</option>';
                
                if (result.data && Array.isArray(result.data)) {
                    result.data.forEach(country => {
                        const option = document.createElement('option');
                        option.value = country;
                        option.textContent = country;
                        countrySelect.appendChild(option);
                    });
                }
                
                // Set default to India if available
                if (countrySelect.querySelector('option[value="India"]')) {
                    countrySelect.value = 'India';
                    await loadStates();
                }
                
                console.log('Countries loaded successfully');
            } catch (error) {
                console.error('Error loading countries:', error);
                countrySelect.innerHTML = '<option value="">-- त्रुटि: देश लोड नहीं हुए --</option>';
                showError('देश लोड करने में त्रुटि हुई। कृपया पेज रिफ्रेश करें।');
            }
        }
        
        // Load States based on selected country
        async function loadStates() {
            const country = document.getElementById('country').value;
            const stateSelect = document.getElementById('state');
            const citySelect = document.getElementById('city');
            
            if (!country) {
                stateSelect.innerHTML = '<option value="">-- पहले देश चुनें --</option>';
                stateSelect.disabled = true;
                citySelect.innerHTML = '<option value="">-- पहले राज्य चुनें --</option>';
                citySelect.disabled = true;
                return;
            }
            
            stateSelect.innerHTML = '<option value="">-- राज्य लोड हो रहे हैं... --</option>';
            stateSelect.disabled = true;
            citySelect.innerHTML = '<option value="">-- पहले राज्य चुनें --</option>';
            citySelect.disabled = true;
            
            try {
                const response = await fetch(STATES_API, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    body: JSON.stringify({ country: country })
                });
                
                const data = await response.json();
                
                if (!data.error && data.data && data.data.states) {
                    stateSelect.innerHTML = '<option value="">-- राज्य चुनें --</option>';
                    
                    data.data.states.forEach(state => {
                        const option = document.createElement('option');
                        option.value = state.name;
                        option.textContent = state.name;
                        stateSelect.appendChild(option);
                    });
                    
                    stateSelect.disabled = false;
                    console.log('States loaded successfully');
                } else {
                    throw new Error('No states found');
                }
            } catch (error) {
                console.error('Error loading states:', error);
                stateSelect.innerHTML = '<option value="">-- राज्य उपलब्ध नहीं हैं --</option>';
                stateSelect.disabled = true;
            }
        }
        
        // Load Cities based on selected country and state
        async function loadCities() {
            const country = document.getElementById('country').value;
            const state = document.getElementById('state').value;
            const citySelect = document.getElementById('city');
            
            if (!country || !state) {
                citySelect.innerHTML = '<option value="">-- पहले राज्य चुनें --</option>';
                citySelect.disabled = true;
                return;
            }
            
            citySelect.innerHTML = '<option value="">-- शहर लोड हो रहे हैं... --</option>';
            citySelect.disabled = true;
            
            try {
                const response = await fetch(CITIES_API, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    body: JSON.stringify({ country: country, state: state })
                });
                
                const data = await response.json();
                
                if (!data.error && data.data && Array.isArray(data.data)) {
                    citySelect.innerHTML = '<option value="">-- शहर चुनें --</option>';
                    
                    data.data.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city;
                        option.textContent = city;
                        citySelect.appendChild(option);
                    });
                    
                    citySelect.disabled = false;
                    console.log('Cities loaded successfully');
                } else {
                    throw new Error('No cities found');
                }
            } catch (error) {
                console.error('Error loading cities:', error);
                citySelect.innerHTML = '<option value="">-- शहर उपलब्ध नहीं हैं --</option>';
                citySelect.disabled = true;
            }
        }
        
        // Show error message
        function showError(message) {
            const errorDiv = document.createElement('div');
            errorDiv.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            errorDiv.style.animation = 'slideInRight 0.3s ease-out';
            errorDiv.innerHTML = `
                <div class="flex items-center gap-2">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>${message}</span>
                </div>
            `;
            document.body.appendChild(errorDiv);
            setTimeout(() => errorDiv.remove(), 5000);
        }
        
        // Show success message
        function showSuccess(message) {
            const successDiv = document.createElement('div');
            successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            successDiv.style.animation = 'slideInRight 0.3s ease-out';
            successDiv.innerHTML = `
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle"></i>
                    <span>${message}</span>
                </div>
            `;
            document.body.appendChild(successDiv);
            setTimeout(() => successDiv.remove(), 3000);
        }
        
        // Add animation keyframes
        const styleSheet = document.createElement("style");
        styleSheet.textContent = `
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
        `;
        document.head.appendChild(styleSheet);
        
        // Event Listeners
        document.getElementById('country').addEventListener('change', loadStates);
        document.getElementById('state').addEventListener('change', loadCities);
        
        function updateProgress() {
            const progressPercent = (currentStep / totalSteps) * 100;
            const progressBar = document.getElementById('progressBar');
            const progressPercentSpan = document.getElementById('progressPercent');
            
            if (progressBar) {
                progressBar.style.width = progressPercent + '%';
            }
            if (progressPercentSpan) {
                progressPercentSpan.innerText = Math.round(progressPercent) + '%';
            }
            
            // Update step indicators
            for(let i = 1; i <= totalSteps; i++) {
                const step = document.querySelector(`.progress-step[data-step="${i}"]`);
                if (step) {
                    if(i < currentStep) {
                        step.classList.add('completed');
                        step.classList.remove('active');
                    } else if(i === currentStep) {
                        step.classList.add('active');
                        step.classList.remove('completed');
                    } else {
                        step.classList.remove('active', 'completed');
                    }
                }
            }
        }
        
        function nextSection(next) {
            // Validate current section before proceeding
            if (currentStep === 1) {
                const gender = document.querySelector('input[name="gender"]:checked');
                const lookingFor = document.querySelector('input[name="looking_for"]:checked');
                const age = document.querySelector('input[name="age"]');
                const religion = document.querySelector('select[name="religion"]');
                const country = document.getElementById('country');
                const state = document.getElementById('state');
                const city = document.getElementById('city');
                
                if (!gender) {
                    showError('कृपया लिंग चुनें');
                    return;
                }
                if (!lookingFor) {
                    showError('कृपया बताएं कि आप क्या ढूंढ रहे हैं');
                    return;
                }
                if (!age.value || age.value < 18 || age.value > 100) {
                    showError('कृपया सही उम्र भरें (18-100 के बीच)');
                    return;
                }
                if (!religion.value) {
                    showError('कृपया धर्म चुनें');
                    return;
                }
                if (!country.value) {
                    showError('कृपया देश चुनें');
                    return;
                }
                if (!state.value) {
                    showError('कृपया राज्य चुनें');
                    return;
                }
                if (!city.value) {
                    showError('कृपया शहर चुनें');
                    return;
                }
            }
            
            if (currentStep === 2) {
                const education = document.querySelector('input[name="education"]');
                const occupation = document.querySelector('input[name="occupation"]');
                
                if (!education.value) {
                    showError('कृपया शिक्षा भरें');
                    return;
                }
                if (!occupation.value) {
                    showError('कृपया पेशा भरें');
                    return;
                }
            }
            
            const currentSection = document.getElementById(`section${currentStep}`);
            const nextSectionEl = document.getElementById(`section${next}`);
            
            if (currentSection && nextSectionEl) {
                currentSection.classList.remove('active');
                nextSectionEl.classList.add('active');
                currentStep = next;
                updateProgress();
                
                // Scroll to top of form
                window.scrollTo({ top: 0, behavior: 'smooth' });
                showSuccess('स्टेप ' + currentStep + ' पूरा हुआ!');
            }
        }
        
        function prevSection(prev) {
            const currentSection = document.getElementById(`section${currentStep}`);
            const prevSectionEl = document.getElementById(`section${prev}`);
            
            if (currentSection && prevSectionEl) {
                currentSection.classList.remove('active');
                prevSectionEl.classList.add('active');
                currentStep = prev;
                updateProgress();
                
                // Scroll to top of form
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }
        
        // Handle form submission with loading state
        const profileForm = document.getElementById('profileForm');
        if (profileForm) {
            profileForm.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> प्रोफाइल सेव हो रहा है...';
                
                // Re-enable button after 5 seconds in case of error (adjust as needed)
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }, 5000);
            });
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateProgress();
            loadCountries();
        });
    </script>
</body>
</html>