<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Auth::user()->bookings()->with('workspace')->latest()->paginate(10);
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workspaces = Workspace::where('is_available', true)->get();
        return view('bookings.create', compact('workspaces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'workspace_id' => 'required|exists:workspaces,id',
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
            'notes' => 'nullable|string',
        ]);

        $workspace = Workspace::findOrFail($validated['workspace_id']);

        // Calculate total price based on hours
        $startTime = new \DateTime($validated['start_time']);
        $endTime = new \DateTime($validated['end_time']);
        $hours = $endTime->diff($startTime)->h + ($endTime->diff($startTime)->days * 24);
        $totalPrice = $hours * $workspace->price_per_hour;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'workspace_id' => $validated['workspace_id'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'total_price' => $totalPrice,
            'status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('bookings.show', $booking)->with('success', 'Booking created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        // Ensure user can only view their own bookings (unless admin)
        if ($booking->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        // Ensure user can only edit their own bookings
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        $workspaces = Workspace::where('is_available', true)->get();
        return view('bookings.edit', compact('booking', 'workspaces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        // Ensure user can only update their own bookings
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'workspace_id' => 'required|exists:workspaces,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'notes' => 'nullable|string',
        ]);

        $workspace = Workspace::findOrFail($validated['workspace_id']);

        // Recalculate total price
        $startTime = new \DateTime($validated['start_time']);
        $endTime = new \DateTime($validated['end_time']);
        $hours = $endTime->diff($startTime)->h + ($endTime->diff($startTime)->days * 24);
        $totalPrice = $hours * $workspace->price_per_hour;

        $booking->update([
            'workspace_id' => $validated['workspace_id'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'total_price' => $totalPrice,
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('bookings.show', $booking)->with('success', 'Booking updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        // Ensure user can only delete their own bookings
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        $booking->update(['status' => 'cancelled']);

        return redirect()->route('bookings.index')->with('success', 'Booking cancelled successfully!');
    }
}
