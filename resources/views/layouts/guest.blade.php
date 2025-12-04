<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex gradient-mesh relative overflow-hidden">
            <!-- Animated background elements -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-20 left-10 w-96 h-96 bg-primary-400/20 rounded-full blur-3xl animate-float"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-accent-400/20 rounded-full blur-3xl animate-float animation-delay-300"></div>
            </div>

            <!-- Left Side - Branding -->
            <div class="hidden lg:flex lg:w-1/2 relative items-center justify-center p-12">
                <div class="max-w-md relative z-10">
                    <a href="/" class="flex items-center space-x-3 mb-8 group">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-600 to-accent-500 rounded-2xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-300 shadow-xl">
                            <span class="text-white font-bold text-2xl">W</span>
                        </div>
                        <span class="text-3xl font-bold gradient-text">WorkSphere</span>
                    </a>

                    <h1 class="text-4xl font-black text-gray-900 mb-4">
                        Welcome to Your Perfect Workspace
                    </h1>
                    <p class="text-lg text-gray-600 leading-relaxed mb-8">
                        Join thousands of professionals who have found their ideal coworking space. Book desks, offices, and meeting rooms with ease.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center mr-4 shrink-0">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Flexible Booking</h3>
                                <p class="text-sm text-gray-600">Book by the hour, day, or month</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center mr-4 shrink-0">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Premium Amenities</h3>
                                <p class="text-sm text-gray-600">High-speed WiFi, coffee, and more</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center mr-4 shrink-0">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">24/7 Access</h3>
                                <p class="text-sm text-gray-600">Work on your own schedule</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 relative z-10">
                <div class="w-full max-w-md">
                    <!-- Mobile Logo -->
                    <div class="lg:hidden mb-8 text-center">
                        <a href="/" class="inline-flex items-center space-x-3 group">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary-600 to-accent-500 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-300 shadow-lg">
                                <span class="text-white font-bold text-xl">W</span>
                            </div>
                            <span class="text-2xl font-bold gradient-text">WorkSphere</span>
                        </a>
                    </div>

                    <div class="card p-8 sm:p-10">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
