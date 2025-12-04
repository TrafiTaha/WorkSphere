<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Booking Details') }} - WorkSphere
            </h2>
            <a href="{{ route('bookings.index') }}" class="text-indigo-600 hover:text-indigo-900">
                ← Back to Bookings
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Status Badge -->
                    <div class="mb-6">
                        <span class="px-4 py-2 text-sm font-semibold rounded-full 
                            @if($booking->status === 'confirmed') bg-green-100 text-green-800
                            @elseif($booking->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif($booking->status === 'cancelled') bg-red-100 text-red-800
                            @else bg-blue-100 text-blue-800
                            @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>

                    <!-- Booking Information -->
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-1">Workspace</h3>
                            <p class="text-lg font-semibold text-gray-900">{{ $booking->workspace->name }}</p>
                            <p class="text-sm text-gray-600">{{ ucfirst(str_replace('_', ' ', $booking->workspace->type)) }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-1">Total Price</h3>
                            <p class="text-2xl font-bold text-indigo-600">${{ number_format($booking->total_price, 2) }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-1">Start Time</h3>
                            <p class="text-lg text-gray-900">{{ $booking->start_time->format('l, F j, Y') }}</p>
                            <p class="text-sm text-gray-600">{{ $booking->start_time->format('g:i A') }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-1">End Time</h3>
                            <p class="text-lg text-gray-900">{{ $booking->end_time->format('l, F j, Y') }}</p>
                            <p class="text-sm text-gray-600">{{ $booking->end_time->format('g:i A') }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-1">Duration</h3>
                            <p class="text-lg text-gray-900">
                                @php
                                    $duration = $booking->start_time->diff($booking->end_time);
                                    $hours = $duration->h + ($duration->days * 24);
                                @endphp
                                {{ $hours }} hour{{ $hours != 1 ? 's' : '' }}
                            </p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-1">Booking Date</h3>
                            <p class="text-lg text-gray-900">{{ $booking->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>

                    @if($booking->notes)
                    <div class="mb-6">
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Notes</h3>
                        <p class="text-gray-900 bg-gray-50 p-4 rounded-lg">{{ $booking->notes }}</p>
                    </div>
                    @endif

                    <!-- Workspace Details -->
                    <div class="border-t border-gray-200 pt-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Workspace Details</h3>
                        <p class="text-gray-700 mb-4">{{ $booking->workspace->description }}</p>
                        
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <span class="text-sm font-medium text-gray-500">Capacity:</span>
                                <span class="text-sm text-gray-900">{{ $booking->workspace->capacity }} people</span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-gray-500">Price per Hour:</span>
                                <span class="text-sm text-gray-900">${{ $booking->workspace->price_per_hour }}</span>
                            </div>
                        </div>

                        @if($booking->workspace->amenities)
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Amenities</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($booking->workspace->amenities as $amenity)
                                <span class="bg-indigo-100 text-indigo-800 text-xs px-3 py-1 rounded-full">{{ $amenity }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    @if($booking->status !== 'cancelled' && $booking->start_time > now())
                    <div class="flex justify-end space-x-4 border-t border-gray-200 pt-6">
                        <a href="{{ route('bookings.edit', $booking) }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Edit Booking
                        </a>
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition" onclick="return confirm('Are you sure you want to cancel this booking?')">
                                Cancel Booking
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

