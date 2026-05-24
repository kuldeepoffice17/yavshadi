<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Modern App') }} - Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Sidebar Styles */
        .sidebar {
            transition: all 0.3s ease-in-out;
            width: 280px;
        }
        
        .sidebar.collapsed {
            width: 80px;
        }
        
        .sidebar.collapsed .sidebar-text,
        .sidebar.collapsed .user-details,
        .sidebar.collapsed .logo-text,
        .sidebar.collapsed .menu-text {
            display: none;
        }
        
        .sidebar.collapsed .sidebar-link {
            justify-content: center;
            padding: 12px;
        }
        
        .sidebar.collapsed .sidebar-link i {
            margin: 0;
            font-size: 1.25rem;
        }
        
        .sidebar.collapsed .user-avatar {
            margin: 0 auto;
        }
        
        .sidebar.collapsed .logo-icon {
            margin: 0 auto;
        }
        
        .main-content {
            transition: all 0.3s ease-in-out;
            width: calc(100% - 280px);
        }
        
        .main-content.expanded {
            width: calc(100% - 80px);
        }
        
        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 40;
        }
        
        .overlay.active {
            display: block;
        }
        
        @media (max-width: 1023px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                z-index: 50;
                transform: translateX(-100%);
                width: 280px !important;
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .sidebar.collapsed {
                transform: translateX(-100%);
            }
            
            .main-content {
                width: 100% !important;
            }
            
            .toggle-btn {
                display: block !important;
            }
        }
        
        @media (min-width: 1024px) {
            .mobile-toggle {
                display: none;
            }
        }
        
        /* Dropdown Styles */
        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.2s ease;
        }
        
        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 font-sans antialiased">
    
    <div id="overlay" class="overlay" onclick="closeSidebar()"></div>
    
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white shadow-2xl overflow-y-auto">
            <!-- Sidebar Header -->
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="logo-icon w-10 h-10 bg-gradient-to-r from-primary-500 to-purple-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-layer-group text-white text-xl"></i>
                        </div>
                        <div class="logo-text">
                            <h1 class="text-xl font-bold">ModernApp</h1>
                            <p class="text-xs text-white/60">Dashboard</p>
                        </div>
                    </div>
                    <button onclick="toggleSidebar()" class="hidden lg:block text-white/70 hover:text-white transition">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </button>
                    <button onclick="closeSidebar()" class="lg:hidden text-white/70 hover:text-white">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- User Info -->
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="user-avatar w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-lg font-bold">{{ substr(auth()->user()->name, 0, 2) }}</span>
                    </div>
                    <div class="user-details">
                        <p class="font-semibold text-sm">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-white/60">{{ auth()->user()->email }}</p>
                        <p class="text-xs text-white/40 mt-1">
                            <i class="fas fa-user-tag"></i> {{ ucfirst(auth()->user()->role) }}
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <!-- Navigation Menu in Hindi -->
<nav class="p-4 space-y-1">
    <p class="text-xs uppercase tracking-wider text-white/40 px-4 mb-3">मुख्य मेनू</p>
    
     <a href="{{ url('/') }}" class="sidebar-link home-link flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-white mb-2">
                    <i class="fas fa-home w-5"></i>
                    <span class="sidebar-text font-semibold">होम (Home)</span>
                </a>
    <a href="{{ route('dashboard') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
        <i class="fas fa-tachometer-alt w-5"></i>
        <span class="sidebar-text">डैशबोर्ड</span>
    </a>
    
    {{-- <a href="{{ route('matches.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-white/70 hover:bg-white/10 hover:text-white">
        <i class="fas fa-search w-5"></i>
        <span class="sidebar-text">साथी ढूंढें</span>
    </a> --}}
    
    <a href="{{ route('interests') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-white/70 hover:bg-white/10 hover:text-white">
        <i class="fas fa-heart w-5"></i>
        <span class="sidebar-text">इंटरेस्ट</span>
    </a>
    
    <a href="{{ route('my.profile') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-white/70 hover:bg-white/10 hover:text-white">
        <i class="fas fa-user w-5"></i>
        <span class="sidebar-text">मेरी प्रोफाइल</span>
    </a>
    
    <a href="{{ route('profile.complete') }}" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-white/70 hover:bg-white/10 hover:text-white">
        <i class="fas fa-edit w-5"></i>
        <span class="sidebar-text">प्रोफाइल अपडेट</span>
    </a>
    
    <a href="#" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-white/70 hover:bg-white/10 hover:text-white">
        <i class="fas fa-calendar-alt w-5"></i>
        <span class="sidebar-text">शादी की तैयारी</span>
    </a>
</nav>
            
            <!-- Logout Button -->
            {{-- <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 w-full text-red-300 hover:bg-red-500/20 hover:text-red-300">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span class="sidebar-text">Logout</span>
                    </button>
                </form>
            </div> --}}
        </aside>
        
        <!-- Main Content -->
        <div class="main-content flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white dark:bg-gray-800 shadow-sm sticky top-0 z-30">
                <div class="px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <!-- Mobile Menu Button -->
                            <button onclick="openSidebar()" class="mobile-toggle lg:hidden text-gray-600 dark:text-gray-300">
                                <i class="fas fa-bars text-2xl"></i>
                            </button>
                            
                            <!-- Desktop Toggle Button -->
                            <button onclick="toggleSidebar()" class="toggle-btn hidden lg:block text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">
                                <i class="fas fa-bars text-xl"></i>
                            </button>
                            
                            <!-- Page Title -->
                            <h1 class="text-xl font-semibold text-gray-800 dark:text-white">
                                @yield('title', 'Dashboard')
                            </h1>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <!-- Notifications -->
                            <button class="relative text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute -top-1 -right-2 w-4 h-4 bg-red-500 rounded-full text-white text-xs flex items-center justify-center">3</span>
                            </button>
                            
                            <!-- User Dropdown -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center gap-3 focus:outline-none group">
                                    <div class="w-9 h-9 bg-gradient-to-r from-primary-500 to-purple-600 rounded-full flex items-center justify-center">
                                        <span class="text-sm font-bold text-white">{{ substr(auth()->user()->name, 0, 2) }}</span>
                                    </div>
                                    <div class="hidden md:block text-left">
                                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-200 group-hover:text-primary-600 transition">{{ auth()->user()->name }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
                                    </div>
                                    <i class="fas fa-chevron-down text-xs text-gray-500 dark:text-gray-400 transition-transform duration-200" :class="{'rotate-180': open}"></i>
                                </button>
                                
                                <!-- Dropdown Menu -->
                                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2" class="absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-xl shadow-lg py-2 border border-gray-200 dark:border-gray-700 z-50" style="display: none;">
                                    <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                                        <p class="text-sm font-semibold text-gray-800 dark:text-white">{{ auth()->user()->name }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
                                        <p class="text-xs text-primary-600 dark:text-primary-400 mt-1">
                                            <i class="fas fa-user-tag"></i> {{ ucfirst(auth()->user()->role) }}
                                        </p>
                                    </div>
                                    
                                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <i class="fas fa-user-circle w-5 text-gray-500"></i>
                                        <span>My Profile</span>
                                    </a>
                                    
                                    <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <i class="fas fa-cog w-5 text-gray-500"></i>
                                        <span>Account Settings</span>
                                    </a>
                                    
                                    <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <i class="fas fa-shield-alt w-5 text-gray-500"></i>
                                        <span>Privacy</span>
                                    </a>
                                    
                                    <hr class="my-2 border-gray-200 dark:border-gray-700">
                                    
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="flex items-center gap-3 px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition w-full">
                                            <i class="fas fa-sign-out-alt w-5"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>
    
    <script>
        // Toggle Sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
            
            sidebar.classList.toggle('collapsed');
            
            if (sidebar.classList.contains('collapsed')) {
                mainContent.classList.add('expanded');
                localStorage.setItem('sidebarCollapsed', 'true');
            } else {
                mainContent.classList.remove('expanded');
                localStorage.setItem('sidebarCollapsed', 'false');
            }
        }
        
        // Open sidebar on mobile
        function openSidebar() {
            document.getElementById('sidebar').classList.add('open');
            document.getElementById('overlay').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        // Close sidebar on mobile
        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('overlay').classList.remove('active');
            document.body.style.overflow = '';
        }
        
        // Load saved sidebar state
        document.addEventListener('DOMContentLoaded', function() {
            const savedState = localStorage.getItem('sidebarCollapsed');
            if (savedState === 'true' && window.innerWidth >= 1024) {
                document.getElementById('sidebar').classList.add('collapsed');
                document.querySelector('.main-content').classList.add('expanded');
            }
        });
        
        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                document.getElementById('sidebar').classList.remove('open');
                document.getElementById('overlay').classList.remove('active');
                document.body.style.overflow = '';
            } else {
                // On mobile, ensure sidebar is collapsed properly
                document.getElementById('sidebar').classList.remove('collapsed');
                document.querySelector('.main-content').classList.remove('expanded');
            }
        });
    </script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>