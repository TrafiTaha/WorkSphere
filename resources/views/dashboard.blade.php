<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-black text-gray-900">
                Member Dashboard
            </h2>
            <a href="{{ route('bookings.create') }}" class="btn-primary py-2.5 px-5">
                <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Booking
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="relative overflow-hidden card mb-8 p-8 bg-gradient-to-br from-primary-600 via-primary-500 to-accent-500">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full -ml-24 -mb-24"></div>
                <div class="relative z-10">
                    <h3 class="text-3xl font-black text-white mb-2">Welcome back, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-white/90 text-lg">Ready to book your perfect workspace?</p>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="stat-card group hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Total Bookings</p>
                            <p class="text-4xl font-black gradient-text">{{ Auth::user()->bookings()->count() }}</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card group hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Active Bookings</p>
                            <p class="text-4xl font-black gradient-text">{{ Auth::user()->bookings()->where('status', 'confirmed')->count() }}</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card group hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Pending Bookings</p>
                            <p class="text-4xl font-black gradient-text">{{ Auth::user()->bookings()->where('status', 'pending')->count() }}</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card mb-8 p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Quick Actions</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('bookings.create') }}" class="group relative overflow-hidden bg-gradient-to-br from-primary-600 to-primary-500 text-white px-6 py-5 rounded-xl text-center hover:shadow-glow transition-all duration-300 hover:-translate-y-1">
                        <div class="absolute inset-0 bg-white/10 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                        <div class="relative flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span class="font-semibold">New Booking</span>
                        </div>
                    </a>
                    <a href="{{ route('bookings.index') }}" class="group relative overflow-hidden bg-gradient-to-br from-green-600 to-emerald-500 text-white px-6 py-5 rounded-xl text-center hover:shadow-glow transition-all duration-300 hover:-translate-y-1">
                        <div class="absolute inset-0 bg-white/10 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                        <div class="relative flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <span class="font-semibold">View All Bookings</span>
                        </div>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="group relative overflow-hidden bg-gradient-to-br from-gray-700 to-gray-600 text-white px-6 py-5 rounded-xl text-center hover:shadow-glow transition-all duration-300 hover:-translate-y-1">
                        <div class="absolute inset-0 bg-white/10 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                        <div class="relative flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="font-semibold">Edit Profile</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Upcoming Bookings -->
            <div class="card">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900">Upcoming Bookings</h3>
                </div>
                <div class="p-6">
                    @php
                        $upcomingBookings = Auth::user()->bookings()
                            ->with('workspace')
                            ->where('start_time', '>=', now())
                            ->orderBy('start_time')
                            ->take(5)
                            ->get();
                    @endphp

                    @if($upcomingBookings->count() > 0)
                        <div class="space-y-4">
                            @foreach($upcomingBookings as $booking)
                            <div class="card-bordered p-5 hover:shadow-lg hover:border-primary-200 transition-all duration-300 group">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900 text-lg group-hover:text-primary-600 transition">{{ $booking->workspace->name }}</h4>
                                        <p class="text-sm text-gray-600 mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="font-semibold">{{ $booking->start_time->format('M d, Y') }}</span>
                                        </p>
                                        <p class="text-sm text-gray-600 mt-1 flex items-center">
                                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>{{ $booking->start_time->format('g:i A') }} - {{ $booking->end_time->format('g:i A') }}</span>
                                        </p>
                                        <p class="text-xs text-gray-500 mt-2 inline-block px-2 py-1 bg-gray-100 rounded-md">{{ ucfirst(str_replace('_', ' ', $booking->workspace->type)) }}</p>
                                    </div>
                                    <div class="text-right ml-4">
                                        <span class="inline-block px-3 py-1.5 text-xs font-bold rounded-lg
                                            @if($booking->status === 'confirmed') badge-success
                                            @elseif($booking->status === 'pending') badge-warning
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                        <p class="text-2xl font-black gradient-text mt-3">${{ number_format((float)$booking->total_price, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="text-lg font-semibold text-gray-900 mb-2">No upcoming bookings</p>
                            <p class="text-gray-500 mb-6">Start booking your perfect workspace today!</p>
                            <a href="{{ route('bookings.create') }}" class="btn-primary inline-flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Book a Workspace
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
