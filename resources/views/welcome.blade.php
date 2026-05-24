<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>विवाहसंगम - भारत का सबसे भरोसेमंद वैवाहिक प्लेटफॉर्म</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        /* Hero Section with Parallax */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.15)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
            animation: fadeInUp 1s ease-out;
        }
        
        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Pulse Animation */
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
        }
        
        /* Fade In Up */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
        }
        
        /* Slide In */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .animate-slideInLeft {
            animation: slideInLeft 0.8s ease-out;
        }
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .animate-slideInRight {
            animation: slideInRight 0.8s ease-out;
        }
        
        /* Feature Cards */
        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(236, 72, 153, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .feature-card:hover::before {
            left: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        /* Success Story Card */
        .story-card {
            transition: all 0.4s ease;
        }
        
        .story-card:hover {
            transform: translateY(-10px);
        }
        
        /* Counter Animation */
        .counter {
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(135deg, #ec4899, #f43f5e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Search Form */
        .search-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        /* Mobile Menu */
        .mobile-menu {
            transition: all 0.3s ease;
        }
        
        /* CTA Button */
        .cta-button {
            background: linear-gradient(135deg, #ec4899, #f43f5e);
            position: relative;
            overflow: hidden;
        }
        
        .cta-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .cta-button:hover::before {
            width: 300px;
            height: 300px;
        }
        
        /* Responsive Grid */
        @media (max-width: 768px) {
            .counter {
                font-size: 1.8rem;
            }
            
            .feature-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden">
    
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-r from-pink-500 to-rose-500 rounded-xl flex items-center justify-center transform rotate-45">
                        <i class="fas fa-heart text-white text-xl transform -rotate-45"></i>
                    </div>
                    <span class="text-xl md:text-2xl font-bold bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">
                        विवाहसंगम
                    </span>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-pink-600 transition font-medium">होम</a>
                    <a href="#features" class="text-gray-700 hover:text-pink-600 transition font-medium">विशेषताएँ</a>
                    <a href="#success-stories" class="text-gray-700 hover:text-pink-600 transition font-medium">सफलता की कहानियाँ</a>
                    <a href="#how-it-works" class="text-gray-700 hover:text-pink-600 transition font-medium">कैसे काम करता है</a>
                    <a href="#contact" class="text-gray-700 hover:text-pink-600 transition font-medium">संपर्क करें</a>
                </div>
                
                <!-- Auth Buttons -->
                <div class="flex items-center space-x-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-full font-semibold hover:shadow-lg transition">
                            <i class="fas fa-tachometer-alt mr-2"></i>
                            डैशबोर्ड
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 text-pink-600 font-semibold hover:bg-pink-50 rounded-full transition">
                            लॉगिन
                        </a>
                        <a href="{{ route('register') }}" class="px-5 py-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-full font-semibold hover:shadow-lg transition">
                            <i class="fas fa-user-plus mr-2"></i>
                            मुफ्त रजिस्टर
                        </a>
                    @endauth
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="md:hidden text-gray-700 text-2xl">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t shadow-lg">
            <div class="px-4 py-3 space-y-2">
                <a href="#home" class="block py-2 text-gray-700 hover:text-pink-600 transition">होम</a>
                <a href="#features" class="block py-2 text-gray-700 hover:text-pink-600 transition">विशेषताएँ</a>
                <a href="#success-stories" class="block py-2 text-gray-700 hover:text-pink-600 transition">सफलता की कहानियाँ</a>
                <a href="#how-it-works" class="block py-2 text-gray-700 hover:text-pink-600 transition">कैसे काम करता है</a>
                <a href="#contact" class="block py-2 text-gray-700 hover:text-pink-600 transition">संपर्क करें</a>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section id="home" class="hero-section min-h-screen flex items-center relative overflow-hidden">
        <div class="absolute inset-0 bg-black/30"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 z-10">
            <div class="text-center text-white">
                <div class="animate-fadeInUp">
                    <h1 class="text-4xl sm:text-5xl lg:text-7xl font-bold mb-6 leading-tight">
                        अपना <span class="text-pink-300">आदर्श जीवनसाथी</span>
                        <br>ढूंढें
                    </h1>
                    <p class="text-xl sm:text-2xl mb-8 text-gray-200 max-w-3xl mx-auto">
                        भारत के 1 करोड़+ खुशहाल जोड़ों से जुड़ें। आज ही अपनी प्रेम कहानी शुरू करें!
                    </p>
                    
                    @guest
                        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12">
                            <a href="{{ route('register') }}" class="cta-button inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-full text-lg font-semibold hover:shadow-2xl transition transform hover:scale-105 relative overflow-hidden">
                                <i class="fas fa-heart mr-2"></i>
                                आज ही रजिस्टर करें
                            </a>
                            <a href="#how-it-works" class="inline-flex items-center justify-center px-8 py-4 bg-white/20 backdrop-blur-sm text-white rounded-full text-lg font-semibold hover:bg-white/30 transition border border-white/30">
                                <i class="fas fa-play-circle mr-2"></i>
                                कैसे काम करता है?
                            </a>
                        </div>
                    @endguest
                    
                    {{-- <!-- Search Form -->
                    <div class="search-card max-w-4xl mx-auto p-4 md:p-6 rounded-2xl">
                        <form action="{{ route('matches.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-3">
                            <div>
                                <label class="block text-gray-800 text-sm font-semibold mb-2 text-left">मैं ढूंढ रहा हूँ</label>
                                <select name="looking_for" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-pink-500 focus:border-pink-500 text-gray-700">
                                    <option value="bride">दुल्हन</option>
                                    <option value="groom">दूल्हा</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-800 text-sm font-semibold mb-2 text-left">उम्र</label>
                                <select name="age" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-pink-500 focus:border-pink-500 text-gray-700">
                                    <option value="20-25">20-25 वर्ष</option>
                                    <option value="26-30">26-30 वर्ष</option>
                                    <option value="31-35">31-35 वर्ष</option>
                                    <option value="36-40">36-40 वर्ष</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-800 text-sm font-semibold mb-2 text-left">धर्म</label>
                                <select name="religion" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-pink-500 focus:border-pink-500 text-gray-700">
                                    <option value="hindu">हिंदू</option>
                                    <option value="muslim">मुस्लिम</option>
                                    <option value="sikh">सिख</option>
                                    <option value="christian">ईसाई</option>
                                    <option value="jain">जैन</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-800 text-sm font-semibold mb-2 text-left">शहर</label>
                                <input type="text" name="city" placeholder="शहर का नाम" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-pink-500 focus:border-pink-500">
                            </div>
                            <div class="md:col-span-4">
                                <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-rose-500 text-white py-3 rounded-xl font-bold hover:shadow-lg transition transform hover:scale-105">
                                    <i class="fas fa-search mr-2"></i>
                                    साथी ढूंढें
                                </button>
                            </div>
                        </form>
                    </div> --}}
                    <!-- Search Form -->
<div class="search-card max-w-5xl mx-auto p-4 md:p-6 rounded-2xl">
    <form action="{{ route('matches.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-3">
        
        <!-- मैं ढूंढ रहा हूँ -->
        <div>
            <label class="block text-gray-800 text-sm font-semibold mb-2 text-left">मैं ढूंढ रहा हूँ</label>
            <select name="looking_for" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:ring-pink-500 focus:border-pink-500 text-gray-700 text-sm">
                <option value="bride">दुल्हन</option>
                <option value="groom">दूल्हा</option>
            </select>
        </div>

        <!-- उम्र -->
        <div>
            <label class="block text-gray-800 text-sm font-semibold mb-2 text-left">उम्र</label>
            <select name="age" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:ring-pink-500 focus:border-pink-500 text-gray-700 text-sm">
                <option value="20-25">20-25 वर्ष</option>
                <option value="26-30">26-30 वर्ष</option>
                <option value="31-35">31-35 वर्ष</option>
                <option value="36-40">36-40 वर्ष</option>
            </select>
        </div>

        <!-- धर्म -->
        <div>
            <label class="block text-gray-800 text-sm font-semibold mb-2 text-left">धर्म</label>
            <select name="religion" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:ring-pink-500 focus:border-pink-500 text-gray-700 text-sm">
                <option value="">सभी धर्म</option>
                <option value="hindu">हिंदू</option>
                <option value="muslim">मुस्लिम</option>
                <option value="sikh">सिख</option>
                <option value="christian">ईसाई</option>
                <option value="jain">जैन</option>
            </select>
        </div>

        <!-- देश -->
        <div>
            <label class="block text-gray-800 text-sm font-semibold mb-2 text-left">देश</label>
            <select name="country" id="search_country" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:ring-pink-500 focus:border-pink-500 text-gray-700 text-sm">
                <option value="">-- लोड हो रहा है... --</option>
            </select>
        </div>

        <!-- राज्य -->
        <div>
            <label class="block text-gray-800 text-sm font-semibold mb-2 text-left">राज्य</label>
            <select name="state" id="search_state" disabled class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:ring-pink-500 focus:border-pink-500 text-gray-700 text-sm disabled:bg-gray-100">
                <option value="">-- पहले देश --</option>
            </select>
        </div>

        <!-- शहर -->
        <div>
            <label class="block text-gray-800 text-sm font-semibold mb-2 text-left">शहर</label>
            <select name="city" id="search_city" disabled class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:ring-pink-500 focus:border-pink-500 text-gray-700 text-sm disabled:bg-gray-100">
                <option value="">-- पहले राज्य --</option>
            </select>
        </div>

        <!-- Button -->
        <div class="md:col-span-3 lg:col-span-6">
            <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-rose-500 text-white py-3 rounded-xl font-bold hover:shadow-lg transition transform hover:scale-105">
                <i class="fas fa-search mr-2"></i>
                साथी ढूंढें
            </button>
        </div>
    </form>
</div>
                </div>
            </div>
        </div>
        
        <!-- Floating Elements -->
        <div class="absolute bottom-10 left-10 float-animation opacity-20">
            <i class="fas fa-heart text-white text-6xl"></i>
        </div>
        <div class="absolute top-20 right-20 float-animation opacity-20" style="animation-delay: 1s;">
            <i class="fas fa-heart text-white text-4xl"></i>
        </div>
    </section>
    
    <!-- Statistics Section -->
    <section class="py-16 bg-gradient-to-r from-pink-50 to-rose-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-users text-pink-600 text-2xl"></i>
                    </div>
                    <div class="counter text-3xl md:text-4xl font-bold text-gray-800" data-count="10000000">1 करोड़+</div>
                    <p class="text-gray-600 text-sm mt-1">खुशहाल सदस्य</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-heart text-pink-600 text-2xl"></i>
                    </div>
                    <div class="counter text-3xl md:text-4xl font-bold text-gray-800" data-count="50000">50,000+</div>
                    <p class="text-gray-600 text-sm mt-1">सफल विवाह</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-globe text-pink-600 text-2xl"></i>
                    </div>
                    <div class="counter text-3xl md:text-4xl font-bold text-gray-800" data-count="150">150+</div>
                    <p class="text-gray-600 text-sm mt-1">देशों में सेवा</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-calendar-check text-pink-600 text-2xl"></i>
                    </div>
                    <div class="counter text-3xl md:text-4xl font-bold text-gray-800" data-count="1000">1000+</div>
                    <p class="text-gray-600 text-sm mt-1">शादियाँ/महीना</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    क्यों चुनें <span class="bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">विवाहसंगम</span>?
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    भारत का सबसे विश्वसनीय और सुरक्षित वैवाहिक प्लेटफॉर्म
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <div class="feature-card">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">सत्यापित प्रोफाइल</h3>
                    <p class="text-gray-600">हर प्रोफाइल को मैन्युअली वेरिफाई किया जाता है, 100% सुरक्षित</p>
                </div>
                
                <div class="feature-card">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center mb-4">
                        <i class="fas fa-brain text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">स्मार्ट मैचिंग</h3>
                    <p class="text-gray-600">AI आधारित एल्गोरिदम से सबसे अनुकूल जीवनसाथी ढूंढें</p>
                </div>
                
                <div class="feature-card">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center mb-4">
                        <i class="fas fa-lock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">प्राइवेसी सुरक्षित</h3>
                    <p class="text-gray-600">आपकी व्यक्तिगत जानकारी पूरी तरह सुरक्षित</p>
                </div>
                
                <div class="feature-card">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center mb-4">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">95% सफलता दर</h3>
                    <p class="text-gray-600">हजारों खुशहाल शादियाँ, विश्वसनीय सेवा</p>
                </div>
                
                <div class="feature-card">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center mb-4">
                        <i class="fas fa-headset text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">24/7 सहायता</h3>
                    <p class="text-gray-600">समर्पित ग्राहक सहायता टीम हमेशा मदद के लिए तैयार</p>
                </div>
                
                <div class="feature-card">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center mb-4">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">मोबाइल ऐप</h3>
                    <p class="text-gray-600">कभी भी, कहीं भी अपने मैचेस देखें</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- How It Works -->
    <section id="how-it-works" class="py-20 bg-gradient-to-br from-pink-50 to-rose-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    कैसे करता है <span class="bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">काम</span>?
                </h2>
                <p class="text-xl text-gray-600">बस 4 सरल कदम, अपना जीवनसाथी ढूंढें</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-r from-pink-500 to-rose-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg transform group-hover:scale-110 transition">
                        <span class="text-3xl font-bold text-white">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">मुफ्त रजिस्टर</h3>
                    <p class="text-gray-600">अपनी बेसिक जानकारी भरें</p>
                </div>
                
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-r from-pink-500 to-rose-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg transform group-hover:scale-110 transition">
                        <span class="text-3xl font-bold text-white">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">प्रोफाइल पूरा करें</h3>
                    <p class="text-gray-600">अपनी पसंद और अपेक्षाएँ जोड़ें</p>
                </div>
                
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-r from-pink-500 to-rose-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg transform group-hover:scale-110 transition">
                        <span class="text-3xl font-bold text-white">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">मैचेस पाएं</h3>
                    <p class="text-gray-600">व्यक्तिगत रूप से मैच सुझाव प्राप्त करें</p>
                </div>
                
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-r from-pink-500 to-rose-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg transform group-hover:scale-110 transition">
                        <span class="text-3xl font-bold text-white">4</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">कनेक्ट करें</h3>
                    <p class="text-gray-600">बातचीत शुरू करें, अपना साथी पाएं</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Latest Members Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    हाल ही में <span class="bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">जुड़े सदस्य</span>
                </h2>
                <p class="text-xl text-gray-600">नए सदस्य जो ढूंढ रहे हैं अपना जीवनसाथी</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $latestMembers = [
                        ['name' => 'प्रिया शर्मा', 'age' => 26, 'city' => 'मुंबई', 'looking_for' => 'दूल्हा', 'occupation' => 'सॉफ्टवेयर इंजीनियर', 'education' => 'MBA'],
                        ['name' => 'राजेश कुमार', 'age' => 29, 'city' => 'दिल्ली', 'looking_for' => 'दुल्हन', 'occupation' => 'बिजनेस एनालिस्ट', 'education' => 'B.Tech'],
                        ['name' => 'नीहा पटेल', 'age' => 25, 'city' => 'अहमदाबाद', 'looking_for' => 'दूल्हा', 'occupation' => 'डॉक्टर', 'education' => 'MBBS'],
                        ['name' => 'अमित सिंह', 'age' => 31, 'city' => 'बैंगलोर', 'looking_for' => 'दुल्हन', 'occupation' => 'प्रोडक्ट मैनेजर', 'education' => 'MBA'],
                        ['name' => 'स्नेहा रेड्डी', 'age' => 27, 'city' => 'हैदराबाद', 'looking_for' => 'दूल्हा', 'occupation' => 'CA', 'education' => 'कंपनी सेक्रेटरी'],
                        ['name' => 'विक्रम मेहता', 'age' => 32, 'city' => 'पुणे', 'looking_for' => 'दुल्हन', 'occupation' => 'आर्किटेक्ट', 'education' => 'B.Arch'],
                        ['name' => 'अंजलि नायर', 'age' => 24, 'city' => 'चेन्नई', 'looking_for' => 'दूल्हा', 'occupation' => 'सॉफ्टवेयर डेवलपर', 'education' => 'B.Tech'],
                        ['name' => 'रोहित वर्मा', 'age' => 28, 'city' => 'लखनऊ', 'looking_for' => 'दुल्हन', 'occupation' => 'बैंकर', 'education' => 'MBA फाइनेंस'],
                    ];
                @endphp
                
                @foreach($latestMembers as $member)
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2 group">
                    <div class="relative h-48 bg-gradient-to-r from-pink-400 to-rose-500 flex items-center justify-center">
                        <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center text-pink-600 text-3xl font-bold shadow-lg">
                            {{ substr($member['name'], 0, 2) }}
                        </div>
                        <div class="absolute top-3 right-3">
                            <span class="bg-white/90 backdrop-blur-sm text-pink-600 text-xs px-2 py-1 rounded-full font-semibold">
                                {{ $member['looking_for'] }}
                            </span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $member['name'] }}</h3>
                        <div class="space-y-1 text-sm text-gray-600 mb-3">
                            <p><i class="fas fa-calendar-alt text-pink-500 w-5"></i> {{ $member['age'] }} वर्ष</p>
                            <p><i class="fas fa-map-marker-alt text-pink-500 w-5"></i> {{ $member['city'] }}</p>
                            <p><i class="fas fa-briefcase text-pink-500 w-5"></i> {{ $member['occupation'] }}</p>
                            <p><i class="fas fa-graduation-cap text-pink-500 w-5"></i> {{ $member['education'] }}</p>
                        </div>
                        <div class="flex gap-2 mt-4">
                            @guest
                                <a href="{{ route('login') }}" class="flex-1 text-center bg-gradient-to-r from-pink-500 to-rose-500 text-white py-2 rounded-full text-sm font-semibold hover:shadow-lg transition">
                                    <i class="fas fa-heart mr-1"></i> इंटरेस्ट भेजें
                                </a>
                            @else
                                <button class="flex-1 bg-gradient-to-r from-pink-500 to-rose-500 text-white py-2 rounded-full text-sm font-semibold hover:shadow-lg transition">
                                    <i class="fas fa-heart mr-1"></i> इंटरेस्ट भेजें
                                </button>
                            @endguest
                            <button class="px-4 py-2 border-2 border-pink-500 text-pink-500 rounded-full hover:bg-pink-50 transition font-semibold">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-10">
                <a href="{{ route('matches.index') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-full font-bold hover:shadow-xl transition transform hover:scale-105">
                    सभी सदस्य देखें
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Success Stories -->
    <section id="success-stories" class="py-20 bg-gradient-to-br from-pink-50 to-rose-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    सफलता की <span class="bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">कहानियाँ</span>
                </h2>
                <p class="text-xl text-gray-600">हमारे खुशहाल जोड़ों की प्रेम कहानियाँ</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="story-card bg-white rounded-2xl overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1516589091380-5d8e87df6999?w=400&h=250&fit=crop" alt="Couple" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex text-yellow-400 mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-gray-600 italic mb-4">"विवाहसंगम ने हमें एक-दूसरे से मिलवाया। बहुत-बहुत धन्यवाद!"</p>
                        <div class="font-bold text-gray-800">प्रिया और राजेश</div>
                        <div class="text-sm text-pink-600">शादी: 15 दिसंबर, 2024</div>
                    </div>
                </div>
                
                <div class="story-card bg-white rounded-2xl overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=400&h=250&fit=crop" alt="Couple" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex text-yellow-400 mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-gray-600 italic mb-4">"हमें सही जीवनसाथी मिला। प्रोफाइल वेरिफिकेशन ने सुरक्षा दी।"</p>
                        <div class="font-bold text-gray-800">नीहा और विक्रम</div>
                        <div class="text-sm text-pink-600">शादी: 20 अक्टूबर, 2024</div>
                    </div>
                </div>
                
                <div class="story-card bg-white rounded-2xl overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=400&h=250&fit=crop" alt="Couple" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex text-yellow-400 mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-gray-600 italic mb-4">"बहुत अच्छा अनुभव रहा। बहुत जल्द हमें मैच मिल गया।"</p>
                        <div class="font-bold text-gray-800">अंजलि और अमित</div>
                        <div class="text-sm text-pink-600">शादी: 5 जनवरी, 2025</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-pink-600 via-rose-600 to-pink-600 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-4xl mx-auto text-center px-4">
            <div class="pulse-animation inline-block">
                <i class="fas fa-heart text-white text-5xl mb-4"></i>
            </div>
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">
                आज ही अपनी प्रेम कहानी शुरू करें!
            </h2>
            <p class="text-xl text-white/90 mb-8">
                1 करोड़ से अधिक खुशहाल जोड़ों से जुड़ें। आपका जीवनसाथी इंतज़ार कर रहा है।
            </p>
            @guest
                <a href="{{ route('register') }}" class="inline-flex items-center gap-3 px-10 py-4 bg-white text-pink-600 rounded-full text-xl font-bold hover:shadow-2xl transition transform hover:scale-105">
                    <i class="fas fa-user-plus"></i>
                    मुफ्त प्रोफाइल बनाएं
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-3 px-10 py-4 bg-white text-pink-600 rounded-full text-xl font-bold hover:shadow-2xl transition transform hover:scale-105">
                    <i class="fas fa-tachometer-alt"></i>
                    डैशबोर्ड पर जाएं
                </a>
            @endguest
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-pink-500 to-rose-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-heart text-white text-xl"></i>
                        </div>
                        <span class="text-xl font-bold">विवाहसंगम</span>
                    </div>
                    <p class="text-gray-400 text-sm">भारत का सबसे भरोसेमंद और सुरक्षित वैवाहिक प्लेटफॉर्म</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">त्वरित लिंक</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#home" class="hover:text-pink-400 transition">होम</a></li>
                        <li><a href="#features" class="hover:text-pink-400 transition">विशेषताएँ</a></li>
                        <li><a href="#success-stories" class="hover:text-pink-400 transition">सफलता की कहानियाँ</a></li>
                        <li><a href="#how-it-works" class="hover:text-pink-400 transition">कैसे काम करता है</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">सहायता</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-pink-400 transition">सहायता केंद्र</a></li>
                        <li><a href="#" class="hover:text-pink-400 transition">सुरक्षा टिप्स</a></li>
                        <li><a href="#" class="hover:text-pink-400 transition">प्राइवेसी पॉलिसी</a></li>
                        <li><a href="#" class="hover:text-pink-400 transition">नियम और शर्तें</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">संपर्क करें</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-phone mr-2 text-pink-500"></i> +91-123-456-7890</li>
                        <li><i class="fas fa-envelope mr-2 text-pink-500"></i> support@vivahsangam.com</li>
                        <li><i class="fas fa-map-marker-alt mr-2 text-pink-500"></i> मुंबई, भारत</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2025 विवाहसंगम. सर्वाधिकार सुरक्षित। भारत का सबसे भरोसेमंद वैवाहिक प्लेटफॉर्म</p>
            </div>
        </div>
    </footer>
    
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                    mobileMenu.classList.add('hidden');
                }
            });
        });
        
        // Counter Animation
        const counters = document.querySelectorAll('.counter');
        const speed = 200;
        
        counters.forEach(counter => {
            const updateCount = () => {
                const target = counter.getAttribute('data-count');
                const count = parseInt(counter.innerText);
                const increment = target / speed;
                
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 1);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
        // ─── Search Form: Country / State / City API ──────────────────
const CSRF = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

async function searchLoadCountries() {
    const sel = document.getElementById('search_country');
    try {
        const res    = await fetch('/api/location/countries');
        const result = await res.json();
        sel.innerHTML = '<option value="">-- देश चुनें --</option>';
        result.data.forEach(name => {
            const o = document.createElement('option');
            o.value = name; o.textContent = name;
            if (name === 'India') o.selected = true;
            sel.appendChild(o);
        });
        // Auto-load India states
        if (sel.value === 'India') searchLoadStates();
    } catch (e) {
        sel.innerHTML = '<option value="">-- त्रुटि हुई --</option>';
    }
}

async function searchLoadStates() {
    const country  = document.getElementById('search_country').value;
    const stateSel = document.getElementById('search_state');
    const citySel  = document.getElementById('search_city');

    citySel.innerHTML = '<option value="">-- पहले राज्य --</option>';
    citySel.disabled  = true;

    if (!country) {
        stateSel.innerHTML = '<option value="">-- पहले देश --</option>';
        stateSel.disabled  = true;
        return;
    }

    stateSel.innerHTML = '<option value="">-- लोड हो रहा है... --</option>';
    stateSel.disabled  = true;

    try {
        const res  = await fetch('/api/location/states', {
            method : 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
            body   : JSON.stringify({ country }),
        });
        const data = await res.json();
        if (!data.error && data.data.states && data.data.states.length > 0) {
            stateSel.innerHTML = '<option value="">-- राज्य चुनें --</option>';
            data.data.states.forEach(s => {
                const o = document.createElement('option');
                o.value = s.name; o.textContent = s.name;
                stateSel.appendChild(o);
            });
            stateSel.disabled = false;
        } else {
            stateSel.innerHTML = '<option value="">-- उपलब्ध नहीं --</option>';
        }
    } catch (e) {
        stateSel.innerHTML = '<option value="">-- त्रुटि हुई --</option>';
    }
}

async function searchLoadCities() {
    const country = document.getElementById('search_country').value;
    const state   = document.getElementById('search_state').value;
    const citySel = document.getElementById('search_city');

    if (!country || !state) {
        citySel.innerHTML = '<option value="">-- पहले राज्य --</option>';
        citySel.disabled  = true;
        return;
    }

    citySel.innerHTML = '<option value="">-- लोड हो रहा है... --</option>';
    citySel.disabled  = true;

    try {
        const res  = await fetch('/api/location/cities', {
            method : 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
            body   : JSON.stringify({ country, state }),
        });
        const data = await res.json();
        if (!data.error && data.data && data.data.length > 0) {
            citySel.innerHTML = '<option value="">-- शहर चुनें --</option>';
            data.data.forEach(city => {
                const o = document.createElement('option');
                o.value = city; o.textContent = city;
                citySel.appendChild(o);
            });
            citySel.disabled = false;
        } else {
            citySel.innerHTML = '<option value="">-- उपलब्ध नहीं --</option>';
        }
    } catch (e) {
        citySel.innerHTML = '<option value="">-- त्रुटि हुई --</option>';
    }
}

// Event Listeners
document.getElementById('search_country').addEventListener('change', searchLoadStates);
document.getElementById('search_state').addEventListener('change', searchLoadCities);

// Page load पर countries load करें
searchLoadCountries();
    </script>

</body>
</html>