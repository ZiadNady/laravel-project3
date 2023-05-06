@extends('home.layouts.app')

@section('content')
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
        }

        #regForm {
            background-color: #ffffff;
            margin: 100px auto;
            font-family: Raleway;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }

        h1 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #04AA6D;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }
    </style>
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Register User</h3>
                        <div class="card-body">

                            <form name="register" action="{{ route('register.custom') }}" method="POST">
                                @csrf
                                <!-- One "tab" for each step in the form: -->
                                <div class="tab">Name:
                                    <p><input class="form-control" placeholder="First name..." name="first_name"></p>
                                    <p><input class="form-control" placeholder="Last name..." name="last_name"></p>
                                </div>
                                <div class="tab">E-mail:
                                    <p><input class="form-control" placeholder="E-mail..." name="email"></p>
                                    <p><input class="form-control" placeholder="Phone..." name="mobile_number"></p>
                                </div>


                                <div class="tab">Address:
                                    <div class="mb-3 col">
                                        <select class="form-control" type="name" id="country" name="country_id" placeholder="province">
                                            <option>-- select country --</option>
                                            @foreach (getCountries() as $country)
                                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col">
                                        <select class="form-control" type="name" id="province" name="province_id" placeholder="province">
                                        </select>
                                    </div>
                                    <div class="mb-3 col">
                                        <select class="form-control" type="name" id="district" name="district_id" placeholder="district">
                                        </select>
                                    </div>
                                    <p> <select name="gender" class="form-select">
                                            <option selected value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select></p>
                                </div>
                                <div class="tab">Password:




                                    <p> <input type="password" placeholder="Password" name="password" id="password"
                                            required></p>
                                    <p> <input type="password" placeholder="Confirm Password" id="confirm_password"
                                            required></p>
                                </div>
                                <div style="overflow:auto;">
                                    {{-- <div style="float:right;"> --}}
                                    <div>

                                        <p> <button class="form-control btn btn-primary" type="button" id="nextBtn"
                                                onclick="nextPrev(1)">Next</button></p>
                                        <p> <button class="form-control btn btn-secondary" type="Submit"
                                                id="Submit">Submit</button></p>
                                        <p> <button class="form-control" type="button" id="prevBtn"
                                                onclick="nextPrev(-1)">Previous</button></p>
                                    </div>
                                </div>
                                <!-- Circles which indicates the steps of the form: -->
                                <div style="text-align:center;margin-top:40px;">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                </div>
                            </form>




                            {{-- <form action="{{ route('register.custom') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Name" id="name" class="form-control"
                                        name="name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                        name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="remember"> Remember Me</label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
        document.getElementById("Submit").style.display = "none";

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            console.log(x.length);
            console.log(n);
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {

                document.getElementById("nextBtn").innerHTML = "Submit";
                document.getElementById("Submit").style.display = "inline";
                document.getElementById("nextBtn").style.display = "none";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:/register

                document.getElementById("Submit").style.display = "inline";
                // document.getElementById("register").submit();
                return false;
            }
            if  (currentTab == (x.length - 2)) {
                // ... the form gets submitted:/register

                document.getElementById("Submit").style.display =  "none";
                document.getElementById("nextBtn").style.display = "inline";
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var countrySelect = document.getElementById("country");
            var provinceSelect = document.getElementById("province");
            var districtSelect = document.getElementById("district")

            countrySelect.addEventListener("change", function() {
                var countryId = countrySelect.value;
                provinceSelect.innerHTML = '<option value="">-- Select Province --</option>';

                fetch('{{ route('provinces.getProvinces',"") }}/'+countryId)
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        data.forEach(function(province) {
                            var option = document.createElement("option");
                            option.value = province.id;
                            option.text = province.province_name;
                            provinceSelect.appendChild(option);
                        });
                    })
                    .catch(function() {
                        alert('There was an error retrieving the provinces.');
                    });
            });

            provinceSelect.addEventListener("change", function() {
                console.log("hi");
                var provienceId = provinceSelect.value;
                districtSelect.innerHTML = '<option value="">-- Select District --</option>';

                fetch('{{ route('districts.getDistricts',"") }}/'+provienceId)
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        data.forEach(function(district) {
                            var option = document.createElement("option");
                            option.value = district.id;
                            option.text = district.district_name;
                            districtSelect.appendChild(option);
                        });
                    })
                    .catch(function() {
                        alert('There was an error retrieving the districts.');
                    });
            });
        });
    </script>
@endsection
