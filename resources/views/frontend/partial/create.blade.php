@extends('frontend.master')



@section('content')
    <form action="/submit" method="post" class="bg-white p-md-5 p-4 mb-5" style="margin-top: -150px">
        @csrf
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="fullname">Guest Full Name:</label>
                <input type="text" id="fullname" name="fullname" class="form-control" required />
            </div>
            <div class="col-md-6 form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <label for="phonenumber">Phone Number:</label>
                <input type="tel" id="phonenumber" name="phonenumber" class="form-control" placeholder="012-345-6789"
                    required />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <label for="roomtype">Room Type:</label>
                <select id="roomtype" name="roomtype" class="form-control" required>
                    <option value="deluxe">Deluxe</option>
                    <option value="budget">Budget</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="checkin">Check-In Date:</label>
                <input type="date" id="checkin" name="checkin" required class="form-control" />
            </div>
            <div class="col-md-6 form-group">
                <label for="checkout">Check-Out Date:</label>
                <input type="date" id="checkout" name="checkout" required class="form-control" />
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 form-group">
                <label for="message">Damage Remark:</label>
                <textarea name="message" id="message" class="form-control" cols="30" rows="8"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 form-group">
                <label for="totalFine">Total Fine:</label>
                <input type="text" id="totalFine" name="totalFine" class="form-control" step="0.01" placeholder="0.00"
                    required />
            </div>
            <div class="col-md-5 form-group">
                <label for="totalDeposit">Total Deposit:</label>
                <input type="text" id="totalDeposit" name="totalDeposit" class="form-control" placeholder="0.00"
                    step="0.01" required />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <input type="submit" value="Reservation Confirm" class="btn btn-primary" />
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <a href="http://hotel-fe-be-00001.test/home" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    <script>
        // Get references to the check-in and check-out date inputs
        const checkinInput = document.getElementById('checkin');
        const checkoutInput = document.getElementById('checkout');

        // Add event listener to check-out date input
        checkoutInput.addEventListener('change', function() {
            // Parse the selected dates
            const checkinDate = new Date(checkinInput.value);
            const checkoutDate = new Date(checkoutInput.value);

            // Check if check-out date is before check-in date
            if (checkoutDate < checkinDate) {
                // If check-out date is before check-in date, display error message
                checkoutInput.setCustomValidity('Check-out date must be after check-in date');
            } else {
                // If check-out date is valid, clear any previous error message
                checkoutInput.setCustomValidity('');
            }
        });

        $(document).ready(function($) {
            $('#totalFine,#totalDeposit').mask('000,000.00', {
                reverse: true
            });
        });

        $(document).ready(function($) {
            $('#phonenumber').mask('000-000 0000');
        });
    </script>
@endsection
