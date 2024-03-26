<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Reservation;

class FormController extends Controller
{
    public function index()
    {


        return view('frontend.index', ['reservations' => Reservation::all()]);
        //$reservations = Reservation::all();
        //return view('frontend.index', compact('reservations'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($reservationiId)
    {
            $reservation = Reservation::findOrFail($reservationiId);
            return view('frontend.partial.update', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $reservationiId)
    {

     $request->validate([
        'fullname' => 'required',
        'email' => 'required|email',
        'phonenumber' => 'required',
        'roomtype' => 'required',
        'checkin' => 'required|date',
        'checkout' => 'required|date|after:checkin',
        'totalFine' => 'nullable|numeric',
        'totalDeposit' => 'nullable|numeric'
    ]);

        $reservation = Reservation::findOrFail($reservationiId);
        $reservation->fullname = $request->input('fullname');
        $reservation->email = $request->input('email');
        $reservation->phonenumber = $request->input('phonenumber');
        $reservation->roomtype = $request->input('roomtype');
        $reservation->checkin = $request->input('checkin');
        $reservation->checkout = $request->input('checkout');
        $reservation->message = $request->input('message');
        $reservation->totalFine = $request->input('totalFine');

        $checkinTimestamp = strtotime($reservation->checkin);
        $checkoutTimestamp = strtotime($reservation->checkout);
        $secondsPerDay = 24 * 60 * 60; // Number of seconds in a day
        $numberOfNights = ($checkoutTimestamp - $checkinTimestamp) / $secondsPerDay;
        $numberOfNights += 1;


        $costPerNight = ($reservation->roomtype === 'deluxe') ? 200 : 50;
        $totalCost = ($numberOfNights * $costPerNight) + $reservation->totalFine;


        $reservation->totalCost = $totalCost;

    $reservation->save();
        Session::flash('success', 'Reservation updated successfully!');


        return redirect()->route('home')->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($reservationiId)
    {
        $reservation = Reservation::findOrFail($reservationiId);
        $reservation->delete();

        return redirect()->back()->with('success', 'Reservation deleted successfully');

    }

        public function create(Request $request)
    {
        return view('frontend.partial.create');
    }

    public function submit(Request $request)
    {

        $request->validate([
        'fullname' => 'required',
        'email' => 'required|email',
        'phonenumber' => 'required',
        'roomtype' => 'required',
        'checkin' => 'required|date',
        'checkout' => 'required|date|after:checkin',
        'totalFine' => 'nullable|numeric',
        'totalDeposit' => 'nullable|numeric'
    ]);


    $fullname = $request->input('fullname');
    $email = $request->input('email');
    $phonenumber = $request->input('phonenumber');
    $roomtype = $request->input('roomtype');
    $checkin = $request->input('checkin');
    $checkout = $request->input('checkout');
    $message = $request->input('message');
    $totalFine = $request->input('totalFine');

    $checkinTimestamp = strtotime($checkin);
    $checkoutTimestamp = strtotime($checkout);
    $secondsPerDay = 24 * 60 * 60; // Number of seconds in a day
    $numberOfNights = ($checkoutTimestamp - $checkinTimestamp) / $secondsPerDay;
    $numberOfNights += 1;

    $costPerNight = ($roomtype === 'deluxe') ? 200 : 50;


    $totalCost = ($numberOfNights*$costPerNight) + $totalFine;



    $reservation = new Reservation();
    $reservation->fullname = $fullname;
    $reservation->email = $email;
    $reservation->phonenumber = $phonenumber;
    $reservation->roomtype = $roomtype;
    $reservation->checkin = $checkin;
    $reservation->checkout = $checkout;
    $reservation->message = $message;
    $reservation->totalCost = $totalCost;
    $reservation->totalFine = $totalFine;
    $reservation->totalDeposit = $request->input('totalDeposit');

    $reservation->save();

    Session::flash('success', 'Reservation submitted successfully!');

    return redirect()->route('home')->with('success', 'Reservation confirmed successfully!');

}


}
