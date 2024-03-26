@extends('frontend.master')

@section('content')
    <form action="/update/{{ $reservation->id }}" method="post" class="bg-white p-md-5 p-4 mb-5" style="margin-top: -150px">
        @csrf
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="fullname">Guest Full Name:</label>
                <input type="text" id="fullname" name="fullname" value="{{ $reservation->fullname }}" class="form-control"
                    required />
            </div>
            <div class="col-md-6 form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $reservation->email }}" class="form-control"
                    required />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <label for="phonenumber">Phone Number:</label>
                <input type="tel" id="phonenumber" name="phonenumber" value="{{ $reservation->phonenumber }}"
                    class="form-control" required required />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <label for="roomtype">Room Type:</label>
                <select id="roomtype" name="roomtype" value="{{ $reservation->roomtype }}" class="form-control" required>
                    <option value="deluxe">Deluxe</option>
                    <option value="budget">Budget</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="checkin">Check-In Date:</label>
                <input type="date" id="checkin" name="checkin" value="{{ $reservation->checkin }}" required
                    class="form-control" />
            </div>
            <div class="col-md-6 form-group">
                <label for="checkout">Check-Out Date:</label>
                <input type="date" id="checkout" name="checkout" value="{{ $reservation->checkout }}" required
                    class="form-control" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <label for="roomtype">Breakfast, Lunch & Dinner:</label>
                <select id="roomtype" name="roomtype" class="form-control" required>
                    <option value="deluxe">Provided</option>
                    <option value="budget">
                        Not Provided
                    </option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <label for="message">Damage Remark:</label>
                <textarea name="message" id="message" class="form-control" cols="30" rows="8"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 form-group">
                <label for="totalFine">Total Fine:</label>
                <input type="number" id="totalFine" name="totalFine" value="{{ $reservation->totalFine }}"
                    class="form-control" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <input type="submit" value="Update" class="btn btn-primary" />
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-7 form-group">
                <a href="http://laravelhotelreserve.test/home" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
@endsection
