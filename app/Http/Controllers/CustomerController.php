<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Rental;

class CustomerController extends Controller
{
    /**
     * Display the rental history for the authenticated user.
     */
    public function history()
    {
        // First, update any expired pending bookings
        $this->updateExpiredBookings();

        // Get all rentals for the authenticated user
        $rentals = Rental::where('user_id', Auth::id())
            ->with('vehicle')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.history', [
            'rentals' => $rentals
        ]);
    }

    /**
     * Display the details of a specific rental.
     */
    public function historyDetail(Rental $rental)
    {
        // Make sure the rental belongs to the authenticated user
        if ($rental->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('customer.history-detail', [
            'rental' => $rental
        ]);
    }

    /**
     * Cancel a booking.
     */
    public function cancelBooking(Rental $rental)
    {
        // Make sure the rental belongs to the authenticated user
        if ($rental->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Check if the rental can be cancelled
        if (!$rental->can_be_cancelled) {
            return redirect()->back()
                ->with('error', 'This booking cannot be cancelled.');
        }

        // Update the rental status
        $rental->payment_status = 'cancelled';
        $rental->save();

        return redirect()->route('customer.history')
            ->with('success', 'Your booking has been cancelled successfully.');
    }

    /**
     * Update expired bookings to expired status.
     */
    private function updateExpiredBookings()
    {
        $oneHourAgo = Carbon::now()->subHour();

        // Find pending bookings older than 1 hour for the current user
        $expiredBookings = Rental::where('user_id', Auth::id())
            ->where('payment_status', 'pending')
            ->where('created_at', '<', $oneHourAgo)
            ->get();

        foreach ($expiredBookings as $booking) {
            // Update status to expired
            $booking->payment_status = 'expired';
            $booking->save();

            Log::info("Expired booking #{$booking->id} has been marked as expired.");
        }
    }

    /*public function downloadReceipt($id)
    {
        // Load rental beserta relasinya
        $rental = Rental::with(['vehicle', 'user'])->findOrFail($id);

        // Cek apakah user yang login berhak akses receipt ini
        if ($rental->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        // Cek status pembayaran
        if (!in_array($rental->payment_status, ['confirmed', 'completed'])) {
            abort(403, 'Payment not completed.');
        }

        // Load view dan kirim ke PDF
        $pdf = Pdf::loadView('pdf.receipt', [
            'rental' => $rental
        ]);

        $pdf->setPaper('a4', 'portrait');

        return $pdf->download('rental_receipt_' . $rental->id . '.pdf');
    }*/
}
