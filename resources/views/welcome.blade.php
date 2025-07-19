<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Vision - Inspiring GCC Leaders</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Styles / Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            'inter': ['Inter', 'sans-serif'],
                            'playfair': ['Playfair Display', 'serif'],
                        },
                        colors: {
                            primary: {
                                50: '#f0f9ff',
                                100: '#e0f2fe',
                                200: '#bae6fd',
                                300: '#7dd3fc',
                                400: '#38bdf8',
                                500: '#0ea5e9',
                                600: '#0284c7',
                                700: '#0369a1',
                                800: '#075985',
                                900: '#0c4a6e',
                            }
                        }
                    }
                }
            }
        </script>

        <style>
            :root {
                --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
                --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
                --gradient-4: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
                --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            }
            
            body {
                font-family: 'Inter', sans-serif;
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            }
            
            .font-display {
                font-family: 'Playfair Display', serif;
            }
            
            .hero-gradient {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            
            .glass-effect {
                background: rgba(255, 255, 255, 0.25);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.18);
            }
            
            .card-hover {
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            }
            
            .card-hover:hover {
                transform: translateY(-12px) scale(1.02);
                box-shadow: var(--shadow-2xl);
            }
            
            .animate-fade-in {
                animation: fadeIn 1s ease-out;
            }
            
            .animate-slide-up {
                animation: slideUp 1s ease-out;
            }
            
            .animate-pulse-slow {
                animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }
            
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
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
            
            .gradient-text {
                background: var(--gradient-1);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .category-badge {
                position: relative;
                overflow: hidden;
            }
            
            .category-badge::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
                transition: left 0.7s;
            }
            
            .category-badge:hover::before {
                left: 100%;
            }
            
            .floating {
                animation: float 6s ease-in-out infinite;
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }
            
            .parallax-bg {
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            
            .content-grid {
                display: grid;
                grid-template-columns: 2fr 1fr;
                gap: 3rem;
            }
            
            @media (max-width: 1024px) {
                .content-grid {
                    grid-template-columns: 1fr;
                    gap: 2rem;
                }
            }
            
            .interview-card {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            
            .podcast-card {
                background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            }
            
            .ad-card {
                background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            }
            
            .event-card {
                background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            }
            
            .text-shadow {
                text-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            
            .btn-primary {
                background: var(--gradient-1);
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }
            
            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            }
            
            .btn-primary::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
                transition: left 0.5s;
            }
            
            .btn-primary:hover::before {
                left: 100%;
            }
        </style>
            
            
    </head>
    <body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <!-- Navigation -->
        <nav class="fixed top-0 w-full z-50 glass-effect animate-fade-in">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-display font-bold gradient-text">The Vision</h1>
                    </div>
                    
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#home" class="text-gray-700 hover:text-blue-600 transition-colors duration-300 font-medium">Home</a>
                        <a href="#interviews" class="text-gray-700 hover:text-blue-600 transition-colors duration-300 font-medium">Interviews</a>
                        <a href="#podcasts" class="text-gray-700 hover:text-blue-600 transition-colors duration-300 font-medium">Podcasts</a>
                        <a href="#events" class="text-gray-700 hover:text-blue-600 transition-colors duration-300 font-medium">Events</a>
                        <a href="{{ route('login') }}" class="btn-primary text-white px-6 py-2 rounded-full font-medium">Admin</a>
                    </div>
                    
                    <div class="md:hidden">
                        <button class="text-gray-700 hover:text-blue-600">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="home" class="hero-gradient min-h-screen flex items-center justify-center relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="absolute top-20 left-10 w-20 h-20 bg-white opacity-10 rounded-full floating"></div>
            <div class="absolute bottom-20 right-10 w-32 h-32 bg-white opacity-10 rounded-full floating" style="animation-delay: -3s;"></div>
            <div class="absolute top-1/3 right-1/4 w-16 h-16 bg-white opacity-10 rounded-full floating" style="animation-delay: -1.5s;"></div>
            
            <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 animate-slide-up">
                <h1 class="text-5xl md:text-7xl font-display font-bold mb-6 text-shadow">
                    Inspiring <span class="text-yellow-300">Journeys</span><br>
                    of <span class="text-cyan-300">GCC Leaders</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto leading-relaxed opacity-90">
                    Discover the stories, insights, and visions that shape the future of the Gulf region
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#interviews" class="btn-primary text-white px-8 py-4 rounded-full font-semibold text-lg">
                        Explore Stories
                    </a>
                    <a href="#podcasts" class="glass-effect text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-gray-800 transition-all duration-300">
                        Listen to Podcasts
                    </a>
                </div>
                
                @if($featuredInterview)
                <div class="mt-16 max-w-4xl mx-auto">
                    <div class="glass-effect rounded-2xl p-8 text-left">
                        <div class="flex items-center mb-4">
                            <span class="category-badge interview-card text-white text-sm px-4 py-2 rounded-full font-semibold">Featured Interview</span>
                        </div>
                        <h3 class="text-2xl font-display font-bold mb-4">{{ $featuredInterview->title }}</h3>
                        <p class="text-gray-200 mb-6 leading-relaxed">{{ Str::limit($featuredInterview->content, 150) }}</p>
                        <button class="bg-white text-gray-800 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300">
                            Read Full Story <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </section>
        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="content-grid">
                <!-- Main Content Area -->
                <div class="space-y-20">
                    <!-- Latest Interviews -->
                    <section id="interviews" class="animate-fade-in">
                        <div class="flex items-center justify-between mb-12">
                            <div>
                                <h2 class="text-4xl font-display font-bold gradient-text mb-4">Latest Interviews</h2>
                                <p class="text-gray-600 text-lg">Exclusive conversations with industry leaders</p>
                            </div>
                            <span class="text-sm text-gray-500 bg-white px-4 py-2 rounded-full shadow-md">{{ $interviews->count() }} Stories</span>
                        </div>
                        
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @forelse($interviews as $interview)
                            <article class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                                @if($interview->image)
                                <div class="h-48 interview-card relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $interview->image) }}" alt="{{ $interview->title }}" 
                                         class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                    <div class="absolute top-4 left-4">
                                        <span class="category-badge bg-white text-purple-600 text-xs px-3 py-1 rounded-full font-semibold">Interview</span>
                                    </div>
                                </div>
                                @else
                                <div class="h-48 interview-card flex items-center justify-center relative">
                                    <div class="text-center text-white">
                                        <i class="fas fa-microphone text-4xl mb-3 opacity-60"></i>
                                        <span class="category-badge bg-white text-purple-600 text-xs px-3 py-1 rounded-full font-semibold">Interview</span>
                                    </div>
                                </div>
                                @endif
                                
                                <div class="p-6">
                                    <h3 class="font-display font-bold text-xl text-gray-900 mb-3 line-clamp-2">{{ $interview->title }}</h3>
                                    @if($interview->category)
                                    <span class="inline-block bg-blue-50 text-blue-600 text-xs px-3 py-1 rounded-full mb-3 font-medium">{{ $interview->category }}</span>
                                    @endif
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-3 leading-relaxed">{{ Str::limit($interview->content, 120) }}</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-gray-500">{{ $interview->created_at->format('M d, Y') }}</span>
                                        <button class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center">
                                            Read More <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </article>
                            @empty
                            <div class="col-span-full text-center py-16">
                                <i class="fas fa-microphone text-6xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 text-lg">No interviews available yet.</p>
                            </div>
                            @endforelse
                        </div>
                    </section>

                    <!-- Latest Podcasts -->
                    <section id="podcasts" class="animate-slide-up">
                        <div class="flex items-center justify-between mb-12">
                            <div>
                                <h2 class="text-4xl font-display font-bold gradient-text mb-4">Latest Podcasts</h2>
                                <p class="text-gray-600 text-lg">Listen to inspiring conversations</p>
                            </div>
                            <span class="text-sm text-gray-500 bg-white px-4 py-2 rounded-full shadow-md">{{ $podcasts->count() }} Episodes</span>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-8">
                            @forelse($podcasts as $podcast)
                            <article class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden">
                                <div class="flex">
                                    @if($podcast->image)
                                    <div class="w-32 h-32 podcast-card flex-shrink-0">
                                        <img src="{{ asset('storage/' . $podcast->image) }}" alt="{{ $podcast->title }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    @else
                                    <div class="w-32 h-32 podcast-card flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-podcast text-3xl text-white opacity-60"></i>
                                    </div>
                                    @endif
                                    
                                    <div class="p-6 flex-1">
                                        <div class="flex items-center mb-3">
                                            <span class="category-badge podcast-card text-white text-xs px-3 py-1 rounded-full font-semibold mr-3">Podcast</span>
                                            @if($podcast->category)
                                            <span class="bg-pink-50 text-pink-600 text-xs px-3 py-1 rounded-full font-medium">{{ $podcast->category }}</span>
                                            @endif
                                        </div>
                                        <h3 class="font-display font-bold text-lg text-gray-900 mb-2 line-clamp-2">{{ $podcast->title }}</h3>
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed">{{ Str::limit($podcast->content, 80) }}</p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-xs text-gray-500">{{ $podcast->created_at->format('M d, Y') }}</span>
                                            <button class="bg-gradient-to-r from-pink-500 to-rose-500 text-white px-4 py-2 rounded-full text-sm font-medium hover:shadow-lg transition-all duration-300 flex items-center">
                                                <i class="fas fa-play mr-2"></i> Play
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @empty
                            <div class="col-span-full text-center py-16">
                                <i class="fas fa-podcast text-6xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 text-lg">No podcasts available yet.</p>
                            </div>
                            @endforelse
                        </div>
                    </section>

                    <!-- Featured Ads -->
                    <section class="animate-fade-in">
                        <div class="flex items-center justify-between mb-12">
                            <div>
                                <h2 class="text-4xl font-display font-bold gradient-text mb-4">Featured Promotions</h2>
                                <p class="text-gray-600 text-lg">Discover opportunities and partnerships</p>
                            </div>
                            <span class="text-sm text-gray-500 bg-white px-4 py-2 rounded-full shadow-md">{{ $ads->count() }} Promotions</span>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-8">
                            @forelse($ads as $ad)
                            <article class="card-hover bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl shadow-lg overflow-hidden border border-green-100">
                                @if($ad->image)
                                <div class="h-40 ad-card relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $ad->image) }}" alt="{{ $ad->title }}" 
                                         class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                                    <div class="absolute top-4 left-4">
                                        <span class="category-badge bg-white text-green-600 text-xs px-3 py-1 rounded-full font-semibold">Sponsored</span>
                                    </div>
                                </div>
                                @else
                                <div class="h-40 ad-card flex items-center justify-center">
                                    <div class="text-center text-white">
                                        <i class="fas fa-bullhorn text-3xl mb-2 opacity-60"></i>
                                        <span class="category-badge bg-white text-green-600 text-xs px-3 py-1 rounded-full font-semibold">Sponsored</span>
                                    </div>
                                </div>
                                @endif
                                
                                <div class="p-6">
                                    <h3 class="font-display font-bold text-xl text-gray-900 mb-3">{{ $ad->title }}</h3>
                                    @if($ad->category)
                                    <span class="inline-block bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full mb-3 font-medium">{{ $ad->category }}</span>
                                    @endif
                                    <p class="text-gray-600 text-sm mb-6 leading-relaxed">{{ Str::limit($ad->content, 100) }}</p>
                                    <button class="ad-card text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg transition-all duration-300 w-full">
                                        Learn More <i class="fas fa-external-link-alt ml-2"></i>
                                    </button>
                                </div>
                            </article>
                            @empty
                            <div class="col-span-full text-center py-16">
                                <i class="fas fa-bullhorn text-6xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 text-lg">No promotions available yet.</p>
                            </div>
                            @endforelse
                        </div>
                    </section>
                </div>
                <!-- Sidebar -->
                <aside class="space-y-8">
                    <!-- Upcoming Events -->
                    <section id="events" class="glass-effect rounded-2xl p-6 shadow-xl">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center mr-3">
                                <i class="fas fa-calendar text-white"></i>
                            </div>
                            <h3 class="text-xl font-display font-bold text-gray-800">Upcoming Events</h3>
                        </div>
                        <div class="space-y-4">
                            @forelse($events as $event)
                            <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition-all duration-300 border-l-4 border-orange-400">
                                <div class="flex items-start">
                                    <div class="event-card text-white rounded-lg p-3 text-center mr-4 shadow-sm flex-shrink-0">
                                        <span class="block text-lg font-bold">{{ $event->created_at->format('d') }}</span>
                                        <span class="text-xs font-medium">{{ $event->created_at->format('M') }}</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900 mb-1">{{ $event->title }}</h4>
                                        @if($event->category)
                                        <span class="inline-block bg-orange-100 text-orange-600 text-xs px-2 py-1 rounded-full mb-2 font-medium">{{ $event->category }}</span>
                                        @endif
                                        <p class="text-gray-600 text-sm mb-2 leading-relaxed">{{ Str::limit($event->content, 60) }}</p>
                                        <span class="text-xs text-gray-500">{{ $event->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-8">
                                <i class="fas fa-calendar text-4xl text-gray-300 mb-3"></i>
                                <p class="text-gray-500">No upcoming events.</p>
                            </div>
                            @endforelse
                        </div>
                    </section>

                    <!-- Categories -->
                    <section class="glass-effect rounded-2xl p-6 shadow-xl">
                        <h3 class="text-xl font-display font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-layer-group mr-3 text-blue-500"></i>
                            Categories
                        </h3>
                        <div class="space-y-3">
                            <a href="#interviews" class="flex items-center justify-between py-3 px-4 rounded-xl hover:bg-blue-50 transition-all duration-300 group">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 interview-card rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-microphone text-white text-sm"></i>
                                    </div>
                                    <span class="text-gray-700 group-hover:text-blue-700 font-medium">Interviews</span>
                                </div>
                                <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full font-semibold">{{ $interviews->count() }}</span>
                            </a>
                            <a href="#podcasts" class="flex items-center justify-between py-3 px-4 rounded-xl hover:bg-pink-50 transition-all duration-300 group">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 podcast-card rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-podcast text-white text-sm"></i>
                                    </div>
                                    <span class="text-gray-700 group-hover:text-pink-700 font-medium">Podcasts</span>
                                </div>
                                <span class="bg-pink-100 text-pink-700 text-xs px-3 py-1 rounded-full font-semibold">{{ $podcasts->count() }}</span>
                            </a>
                            <a href="#events" class="flex items-center justify-between py-3 px-4 rounded-xl hover:bg-orange-50 transition-all duration-300 group">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 event-card rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-calendar text-white text-sm"></i>
                                    </div>
                                    <span class="text-gray-700 group-hover:text-orange-700 font-medium">Events</span>
                                </div>
                                <span class="bg-orange-100 text-orange-700 text-xs px-3 py-1 rounded-full font-semibold">{{ $events->count() }}</span>
                            </a>
                            <a href="#" class="flex items-center justify-between py-3 px-4 rounded-xl hover:bg-green-50 transition-all duration-300 group">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 ad-card rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-bullhorn text-white text-sm"></i>
                                    </div>
                                    <span class="text-gray-700 group-hover:text-green-700 font-medium">Sponsored</span>
                                </div>
                                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold">{{ $ads->count() }}</span>
                            </a>
                        </div>
                    </section>

                    <!-- Newsletter Signup -->
                    <section class="hero-gradient rounded-2xl p-6 text-white shadow-xl relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-white opacity-10 rounded-full -mr-12 -mt-12"></div>
                        <div class="absolute bottom-0 left-0 w-16 h-16 bg-white opacity-10 rounded-full -ml-8 -mb-8"></div>
                        <div class="relative z-10">
                            <h3 class="text-xl font-display font-bold mb-4 flex items-center">
                                <i class="fas fa-envelope mr-3"></i>
                                Stay Updated
                            </h3>
                            <p class="text-sm mb-6 opacity-90 leading-relaxed">Get the latest stories and updates from The Vision community.</p>
                            <div class="space-y-3">
                                <input type="email" placeholder="Your email address" 
                                       class="w-full px-4 py-3 rounded-xl bg-white/20 border border-white/30 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50 backdrop-blur-sm">
                                <button class="w-full bg-white text-gray-800 py-3 rounded-xl font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg">
                                    Subscribe <i class="fas fa-paper-plane ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </section>

                    <!-- Stats Card -->
                    <section class="glass-effect rounded-2xl p-6 shadow-xl">
                        <h3 class="text-xl font-display font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-chart-bar mr-3 text-green-500"></i>
                            Community Stats
                        </h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold gradient-text">{{ $interviews->count() + $podcasts->count() }}</div>
                                <div class="text-sm text-gray-600">Stories</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold gradient-text">{{ $events->count() }}</div>
                                <div class="text-sm text-gray-600">Events</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold gradient-text">50K+</div>
                                <div class="text-sm text-gray-600">Readers</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold gradient-text">25+</div>
                                <div class="text-sm text-gray-600">Partners</div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </main>
        <!-- Footer -->
        <footer class="bg-white shadow-2xl mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="col-span-1 md:col-span-2">
                        <h3 class="text-3xl font-display font-bold gradient-text mb-4">The Vision</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed max-w-md">
                            Showcasing the inspiring journeys of GCC business leaders and their transformative impact on the region's future.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center text-white hover:shadow-lg transition-all duration-300">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-600 to-purple-700 flex items-center justify-center text-white hover:shadow-lg transition-all duration-300">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" class="w-12 h-12 rounded-full bg-gradient-to-r from-pink-500 to-red-600 flex items-center justify-center text-white hover:shadow-lg transition-all duration-300">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-12 h-12 rounded-full bg-gradient-to-r from-green-500 to-blue-600 flex items-center justify-center text-white hover:shadow-lg transition-all duration-300">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="font-display font-semibold text-lg text-gray-900 mb-6">Content</h4>
                        <ul class="space-y-3">
                            <li><a href="#interviews" class="text-gray-600 hover:text-blue-600 transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-blue-500"></i> Interviews</a></li>
                            <li><a href="#podcasts" class="text-gray-600 hover:text-blue-600 transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-blue-500"></i> Podcasts</a></li>
                            <li><a href="#events" class="text-gray-600 hover:text-blue-600 transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-blue-500"></i> Events</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-blue-500"></i> Newsletter</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="font-display font-semibold text-lg text-gray-900 mb-6">Company</h4>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-blue-500"></i> About Us</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-blue-500"></i> Contact</a></li>
                            <li><a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-blue-500"></i> Admin Portal</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-blue-500"></i> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 mt-12 pt-8 text-center">
                    <p class="text-gray-600">© {{ date('Y') }} The Vision. All rights reserved. Empowering GCC leadership stories.</p>
                </div>
            </div>
        </footer>

        <!-- Scroll to Top Button -->
        <button id="scrollToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 opacity-0 invisible">
            <i class="fas fa-chevron-up"></i>
        </button>

        <script>
            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Navbar background on scroll
            const navbar = document.querySelector('nav');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                    navbar.style.backdropFilter = 'blur(20px)';
                } else {
                    navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.25)';
                    navbar.style.backdropFilter = 'blur(10px)';
                }
            });

            // Scroll to top button
            const scrollToTopBtn = document.getElementById('scrollToTop');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    scrollToTopBtn.style.opacity = '1';
                    scrollToTopBtn.style.visibility = 'visible';
                } else {
                    scrollToTopBtn.style.opacity = '0';
                    scrollToTopBtn.style.visibility = 'invisible';
                }
            });

            scrollToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all sections for animations
            document.querySelectorAll('section').forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';
                section.style.transition = 'all 0.8s ease-out';
                observer.observe(section);
            });

            // Add loading animation
            window.addEventListener('load', () => {
                document.body.style.opacity = '1';
                document.body.style.transform = 'translateY(0)';
            });

            // Initialize body animation
            document.body.style.opacity = '0';
            document.body.style.transform = 'translateY(20px)';
            document.body.style.transition = 'all 0.6s ease-out';
        </script>
    </body>
</html>
