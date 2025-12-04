<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WorkSphere - Modern Coworking Space</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white overflow-x-hidden">
    <!-- Navigation -->
    <nav class="fixed w-full glass z-50 border-b border-gray-100/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <a href="/" class="flex items-center space-x-2 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-600 to-accent-500 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-300">
                            <span class="text-white font-bold text-xl">W</span>
                        </div>
                        <span class="text-2xl font-bold gradient-text">WorkSphere</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#services" class="text-gray-700 hover:text-primary-600 transition-colors font-medium">Services</a>
                    <a href="#pricing" class="text-gray-700 hover:text-primary-600 transition-colors font-medium">Pricing</a>
                    <a href="#testimonials" class="text-gray-700 hover:text-primary-600 transition-colors font-medium">Testimonials</a>
                    <a href="#contact" class="text-gray-700 hover:text-primary-600 transition-colors font-medium">Contact</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary-600 transition-colors font-medium">Login</a>
                        <a href="{{ route('register') }}" class="btn-primary">Get Started</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-24 px-4 overflow-hidden gradient-mesh min-h-screen flex items-center">
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-primary-400/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-accent-400/20 rounded-full blur-3xl animate-float animation-delay-300"></div>
            <div class="absolute top-1/2 left-1/2 w-80 h-80 bg-purple-400/10 rounded-full blur-3xl animate-pulse-soft"></div>
        </div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center">
                <div class="inline-flex items-center px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full shadow-soft mb-8 animate-fade-in-down">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse mr-2"></span>
                    <span class="text-sm font-semibold text-gray-700">🎉 Now Open - Limited Spots Available</span>
                </div>

                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-gray-900 mb-6 animate-fade-in-up leading-tight">
                    Your Perfect
                    <span class="block gradient-text mt-2">Workspace Awaits</span>
                </h1>

                <p class="text-xl md:text-2xl text-gray-600 mb-10 max-w-3xl mx-auto animate-fade-in-up animation-delay-100 leading-relaxed">
                    Experience the future of coworking. Book premium desks, private offices, and meeting rooms in a vibrant collaborative environment.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up animation-delay-200">
                    <a href="{{ route('register') }}" class="group relative btn-primary text-lg px-10 py-4">
                        <span class="relative z-10">Start Working Today</span>
                        <svg class="w-5 h-5 ml-2 inline-block group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="#services" class="btn-secondary text-lg px-10 py-4">
                        Explore Features
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20 max-w-4xl mx-auto animate-fade-in-up animation-delay-300">
                    <div class="text-center">
                        <div class="text-4xl font-bold gradient-text">500+</div>
                        <div class="text-sm text-gray-600 mt-1">Happy Members</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold gradient-text">50+</div>
                        <div class="text-sm text-gray-600 mt-1">Workspaces</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold gradient-text">24/7</div>
                        <div class="text-sm text-gray-600 mt-1">Access</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold gradient-text">100%</div>
                        <div class="text-sm text-gray-600 mt-1">Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce-soft">
            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 px-4 bg-white relative">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20">
                <span class="inline-block px-4 py-2 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">
                    ✨ Premium Amenities
                </span>
                <h2 class="section-title mb-4">Everything You Need to Thrive</h2>
                <p class="section-subtitle max-w-2xl mx-auto">
                    World-class facilities designed to boost your productivity and creativity
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group card-bordered p-8 hover:border-primary-200">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">High-Speed WiFi</h3>
                    <p class="text-gray-600 leading-relaxed">Lightning-fast 1Gbps fiber internet to keep you connected and productive all day long.</p>
                </div>

                <div class="group card-bordered p-8 hover:border-primary-200">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Flexible Spaces</h3>
                    <p class="text-gray-600 leading-relaxed">Hot desks, dedicated desks, and private offices tailored to your unique work style.</p>
                </div>

                <div class="group card-bordered p-8 hover:border-primary-200">
                    <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">24/7 Access</h3>
                    <p class="text-gray-600 leading-relaxed">Work on your schedule with round-the-clock secure access to all facilities.</p>
                </div>

                <div class="group card-bordered p-8 hover:border-primary-200">
                    <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Premium Coffee</h3>
                    <p class="text-gray-600 leading-relaxed">Unlimited artisan coffee, tea, and refreshments to fuel your productivity.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Workspaces -->
    <section class="py-24 px-4 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20">
                <span class="inline-block px-4 py-2 bg-accent-100 text-accent-700 rounded-full text-sm font-semibold mb-4">
                    🏢 Our Spaces
                </span>
                <h2 class="section-title mb-4">Featured Workspaces</h2>
                <p class="section-subtitle max-w-2xl mx-auto">
                    Discover the perfect environment for your productivity
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredWorkspaces as $workspace)
                <div class="group card overflow-hidden">
                    <div class="relative h-56 bg-gradient-to-br from-primary-400 via-accent-400 to-purple-500 flex items-center justify-center overflow-hidden">
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition-colors duration-300"></div>
                        <span class="text-8xl transform group-hover:scale-110 transition-transform duration-300 relative z-10">
                            @if($workspace->type === 'desk') 🖥️
                            @elseif($workspace->type === 'office') 🏢
                            @else 👥
                            @endif
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-3">
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary-600 transition-colors">
                                {{ $workspace->name }}
                            </h3>
                            <span class="badge badge-info shrink-0 ml-2">
                                {{ ucfirst(str_replace('_', ' ', $workspace->type)) }}
                            </span>
                        </div>
                        <p class="text-gray-600 mb-5 leading-relaxed">{{ Str::limit($workspace->description, 100) }}</p>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div>
                                <span class="text-3xl font-bold gradient-text">${{ $workspace->price_per_hour }}</span>
                                <span class="text-gray-500 text-sm">/hour</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                {{ $workspace->capacity }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-24 px-4 bg-white relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-100/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-accent-100/30 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-20">
                <span class="inline-block px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-4">
                    💰 Flexible Plans
                </span>
                <h2 class="section-title mb-4">Pricing That Scales With You</h2>
                <p class="section-subtitle max-w-2xl mx-auto">
                    Choose the perfect plan for your needs. No hidden fees, cancel anytime.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($pricingPlans as $plan)
                <div class="relative group">
                    @if($plan->is_popular)
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 z-10">
                        <span class="inline-flex items-center px-4 py-1.5 bg-gradient-to-r from-primary-600 to-accent-500 text-white text-xs font-bold rounded-full shadow-lg">
                            ⭐ MOST POPULAR
                        </span>
                    </div>
                    @endif

                    <div class="card p-8 h-full {{ $plan->is_popular ? 'ring-2 ring-primary-500 shadow-glow' : '' }}">
                        <div class="mb-6">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $plan->name }}</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $plan->description }}</p>
                        </div>

                        <div class="mb-8">
                            <div class="flex items-baseline">
                                <span class="text-5xl font-black gradient-text">${{ $plan->price }}</span>
                                <span class="text-gray-500 ml-2">/{{ $plan->duration }}</span>
                            </div>
                        </div>

                        <ul class="space-y-4 mb-8">
                            @if($plan->features)
                                @foreach($plan->features as $feature)
                                <li class="flex items-start text-gray-700">
                                    <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm">{{ $feature }}</span>
                                </li>
                                @endforeach
                            @endif
                        </ul>

                        <a href="{{ route('register') }}" class="block w-full text-center {{ $plan->is_popular ? 'btn-primary' : 'btn-secondary' }} py-3.5">
                            Get Started
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-24 px-4 gradient-mesh relative overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-20">
                <span class="inline-block px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold mb-4">
                    ⭐ Testimonials
                </span>
                <h2 class="section-title mb-4">Loved by Professionals</h2>
                <p class="section-subtitle max-w-2xl mx-auto">
                    See what our community members have to say about their experience
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($testimonials as $testimonial)
                <div class="glass p-8 rounded-2xl hover:shadow-soft-lg transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center mb-5">
                        @for($i = 0; $i < $testimonial->rating; $i++)
                        <svg class="w-5 h-5 text-yellow-400 drop-shadow" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 italic leading-relaxed text-lg">"{{ $testimonial->content }}"</p>
                    <div class="flex items-center pt-4 border-t border-gray-200/50">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-600 to-accent-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-4 shadow-lg">
                            {{ substr($testimonial->name, 0, 1) }}
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $testimonial->name }}</h4>
                            <p class="text-sm text-gray-600">{{ $testimonial->position }}@if($testimonial->company) at {{ $testimonial->company }}@endif</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 px-4 bg-white">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold mb-4">
                    📧 Contact Us
                </span>
                <h2 class="section-title mb-4">Let's Start a Conversation</h2>
                <p class="section-subtitle max-w-2xl mx-auto">
                    Have questions? We're here to help you find your perfect workspace.
                </p>
            </div>

            <div class="card p-10">
                <form class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                            <input type="text" class="input-modern" placeholder="John Doe">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                            <input type="email" class="input-modern" placeholder="john@example.com">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Subject</label>
                        <input type="text" class="input-modern" placeholder="How can we help you?">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                        <textarea rows="6" class="input-modern resize-none" placeholder="Tell us more about your needs..."></textarea>
                    </div>
                    <button type="submit" class="w-full btn-primary text-lg py-4">
                        <span>Send Message</span>
                        <svg class="w-5 h-5 ml-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Contact Info Cards -->
            <div class="grid md:grid-cols-3 gap-6 mt-12">
                <div class="text-center p-6 card-bordered">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-1">Email</h4>
                    <p class="text-sm text-gray-600">info@worksphere.com</p>
                </div>
                <div class="text-center p-6 card-bordered">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-1">Phone</h4>
                    <p class="text-sm text-gray-600">+1 (555) 123-4567</p>
                </div>
                <div class="text-center p-6 card-bordered">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-1">Location</h4>
                    <p class="text-sm text-gray-600">123 Cowork Street, City</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-16 px-4 overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-primary-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent-500 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-600 to-accent-500 rounded-xl flex items-center justify-center">
                            <span class="text-white font-bold text-xl">W</span>
                        </div>
                        <h3 class="text-2xl font-bold">WorkSphere</h3>
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-6">Your perfect workspace for productivity and collaboration in the modern age.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#services" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span class="w-1.5 h-1.5 bg-primary-500 rounded-full mr-2 group-hover:w-2 transition-all"></span>
                            Services
                        </a></li>
                        <li><a href="#pricing" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span class="w-1.5 h-1.5 bg-primary-500 rounded-full mr-2 group-hover:w-2 transition-all"></span>
                            Pricing
                        </a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span class="w-1.5 h-1.5 bg-primary-500 rounded-full mr-2 group-hover:w-2 transition-all"></span>
                            Testimonials
                        </a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span class="w-1.5 h-1.5 bg-primary-500 rounded-full mr-2 group-hover:w-2 transition-all"></span>
                            Contact
                        </a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Account</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span class="w-1.5 h-1.5 bg-accent-500 rounded-full mr-2 group-hover:w-2 transition-all"></span>
                            Login
                        </a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span class="w-1.5 h-1.5 bg-accent-500 rounded-full mr-2 group-hover:w-2 transition-all"></span>
                            Register
                        </a></li>
                        @auth
                        <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span class="w-1.5 h-1.5 bg-accent-500 rounded-full mr-2 group-hover:w-2 transition-all"></span>
                            Dashboard
                        </a></li>
                        @endauth
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Contact Info</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start text-gray-400">
                            <svg class="w-5 h-5 mr-3 mt-0.5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>info@worksphere.com</span>
                        </li>
                        <li class="flex items-start text-gray-400">
                            <svg class="w-5 h-5 mr-3 mt-0.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-start text-gray-400">
                            <svg class="w-5 h-5 mr-3 mt-0.5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>123 Cowork Street, City</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700/50 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} WorkSphere. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

