<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Booking') }} - WorkSphere
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf

                        <!-- Workspace Selection -->
                        <div class="mb-6">
                            <label for="workspace_id" class="block text-sm font-medium text-gray-700 mb-2">Select Workspace</label>
                            <select name="workspace_id" id="workspace_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent @error('workspace_id') border-red-500 @enderror" required>
                                <option value="">Choose a workspace...</option>
                                @foreach($workspaces as $workspace)
                                    <option value="{{ $workspace->id }}" data-price="{{ $workspace->price_per_hour }}" {{ old('workspace_id') == $workspace->id ? 'selected' : '' }}>
                                        {{ $workspace->name }} - {{ ucfirst(str_replace('_', ' ', $workspace->type)) }} (${{ $workspace->price_per_hour }}/hour)
                                    </option>
                                @endforeach
                            </select>
                            @error('workspace_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Start Time -->
                        <div class="mb-6">
                            <label for="start_time" class="block text-sm font-medium text-gray-700 mb-2">Start Time</label>
                            <input type="datetime-local" name="start_time" id="start_time" value="{{ old('start_time') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent @error('start_time') border-red-500 @enderror" required>
                            @error('start_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- End Time -->
                        <div class="mb-6">
                            <label for="end_time" class="block text-sm font-medium text-gray-700 mb-2">End Time</label>
                            <input type="datetime-local" name="end_time" id="end_time" value="{{ old('end_time') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent @error('end_time') border-red-500 @enderror" required>
                            @error('end_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Notes -->
                        <div class="mb-6">
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes (Optional)</label>
                            <textarea name="notes" id="notes" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-transparent @error('notes') border-red-500 @enderror" placeholder="Any special requirements or notes...">{{ old('notes') }}</textarea>
                            @error('notes')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price Estimate -->
                        <div class="mb-6 p-4 bg-indigo-50 rounded-lg">
                            <p class="text-sm text-gray-600 mb-2">Estimated Total Price:</p>
                            <p class="text-2xl font-bold text-indigo-600" id="price-estimate">$0.00</p>
                            <p class="text-xs text-gray-500 mt-1">Price will be calculated based on hours booked</p>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('bookings.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                                Cancel
                            </a>
                            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                                Create Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Available Workspaces Preview -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Available Workspaces</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach($workspaces as $workspace)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                            <h4 class="font-semibold text-gray-900">{{ $workspace->name }}</h4>
                            <p class="text-sm text-gray-600 mt-1">{{ ucfirst(str_replace('_', ' ', $workspace->type)) }}</p>
                            <p class="text-sm text-gray-500 mt-2">{{ $workspace->description }}</p>
                            <div class="mt-3 flex justify-between items-center">
                                <span class="text-lg font-bold text-indigo-600">${{ $workspace->price_per_hour }}/hour</span>
                                <span class="text-sm text-gray-500">Capacity: {{ $workspace->capacity }}</span>
                            </div>
                            @if($workspace->amenities)
                            <div class="mt-2 flex flex-wrap gap-1">
                                @foreach($workspace->amenities as $amenity)
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">{{ $amenity }}</span>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Calculate price estimate
        function calculatePrice() {
            const workspaceSelect = document.getElementById('workspace_id');
            const startTime = document.getElementById('start_time').value;
            const endTime = document.getElementById('end_time').value;
            const priceEstimate = document.getElementById('price-estimate');

            if (workspaceSelect.value && startTime && endTime) {
                const selectedOption = workspaceSelect.options[workspaceSelect.selectedIndex];
                const pricePerHour = parseFloat(selectedOption.dataset.price);
                
                const start = new Date(startTime);
                const end = new Date(endTime);
                const hours = Math.abs(end - start) / 36e5; // Convert milliseconds to hours

                if (hours > 0) {
                    const total = hours * pricePerHour;
                    priceEstimate.textContent = '$' + total.toFixed(2);
                } else {
                    priceEstimate.textContent = '$0.00';
                }
            } else {
                priceEstimate.textContent = '$0.00';
            }
        }

        document.getElementById('workspace_id').addEventListener('change', calculatePrice);
        document.getElementById('start_time').addEventListener('change', calculatePrice);
        document.getElementById('end_time').addEventListener('change', calculatePrice);
    </script>
</x-app-layout>

