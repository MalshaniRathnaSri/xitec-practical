@extends('layout')

@section('content')
<div class="lg:flex lg:space-x-24">

<div>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="font-bold text-2xl">Already a Customer?</div>
    <div class="text-lg whitespace-nowrap">If you have an account with us, log in using your email address.</div>

        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <div class="sm:col-span-4">
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
    </div>

    <div class="sm:col-span-4">
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        <div class="mt-2">
            <input id="password" name="password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
    </div>

    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
</form>
</div>

<!-- Registration Form -->
<div class="sm:mt-10 lg:mt-0 bg-gradient-to-br from-blue-700 via-blue-600 to-blue-800 p-4 rounded-xl">
    <div class="font-bold text-white text-2xl">Is this your First time?</div>
    <div class="text-white text-lg whitespace-nowrap">Fill in the following information to upload Prescription</div>
    <form method="POST" action="{{ route('patient.registration') }}" id="registrationForm">
        @csrf
        <div class="border-b border-gray-900/10 pb-12 text-white">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="first-name" class="block text-sm font-medium leading-6">First name</label>
                    <div class="mt-2">
                        <input type="text" name="firstName" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div id="firstNameError"></div>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="last-name" class="block text-sm font-medium leading-6">Last name</label>
                    <div class="mt-2">
                        <input type="text" name="lastName" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div id="lastNameError"></div>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="email" class="block text-sm font-medium leading-6">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div id="mailError"></div>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="contact" class="block text-sm font-medium leading-6 text-gray-900">Contact Number</label>
                    <div class="mt-2">
                        <input id="contact" name="contact" id="contact" type="text" autocomplete="contact" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div id="contactError"></div>

                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="dob" class="block text-sm font-medium leading-6">Date of Birth</label>
                    <div class="mt-2">
                        <input id="dob" name="dob" type="date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div id="dobError"></div>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="street-address" class="block text-sm font-medium leading-6">Permanent Address</label>
                    <div class="mt-2">
                        <textarea id="street-address" name="address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter your permanent address"></textarea>
                        <div id="addressError"></div>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="password" class="block text-sm font-medium leading-6">Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div id="passwordError"></div>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="conPassword" class="block text-sm font-medium leading-6">Confirm Password</label>
                    <div class="mt-2">
                        <input id="conPassword" name="confirmPassword" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div id="confirmPasswordError"></div>
                    </div>
                </div>

                <div class="mt-6 flex items-center sm:col-span-4 justify-end gap-x-6">
                    <a type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign Up</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('#registrationForm');

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const validationMessages = document.querySelectorAll('.validation-message');
            validationMessages.forEach(message => message.remove());

            const firstName = form.querySelector('#first-name').value.trim();
            const lastName = form.querySelector('#last-name').value.trim();
            const email = form.querySelector('#email').value.trim();
            const contact = form.querySelector('#contact').value.trim();
            const dob = form.querySelector('#dob').value.trim();
            const address = form.querySelector('#street-address').value.trim();
            const password = form.querySelector('#password').value.trim();
            const confirmPassword = form.querySelector('#conPassword').value.trim();

            if (firstName === '') {
                displayErrorMessage('Please enter your first name.', 'firstNameError');
                return;
            }
            if (lastName === '') {
                displayErrorMessage('Please enter your last name.', 'lastNameError');
                return;
            }
            if (email === '') {
                displayErrorMessage('Please enter your email address.', 'mailError');
                return;
            }
            if (contact === '') {
                displayErrorMessage('Please enter your contact number.', 'contactError');
                return;
            }
            if (dob === '') {
                displayErrorMessage('Please enter your date of birth.', 'dobError');
                return;
            }
            if (address === '') {
                displayErrorMessage('Please enter your permanent address.', 'addressError');
                return;
            }
            if (password === '') {
                displayErrorMessage('Please enter a password.', 'passwordError');
                return;
            }
            if (confirmPassword === '') {
                displayErrorMessage('Please confirm your password.', 'confirmPasswordError');
                return;
            }
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                displayErrorMessage('Please enter a valid email address.', 'mailError');
                return;
            }
        const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/;
        if (!strongPasswordRegex.test(password)) {
            displayErrorMessage('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.', 'passwordError');
            return;
        }
            if (password !== confirmPassword) {
                displayErrorMessage('Passwords do not match.', 'confirmPasswordError');
                return;
            }
            form.submit();
        });

        function displayErrorMessage(message, inputId) {
            const errorMessage = document.createElement('div');
            errorMessage.classList.add('text-red-500', 'text-sm', 'validation-message');
            errorMessage.textContent = message;
            const inputField = form.querySelector(`#${inputId}`);
            inputField.innerHTML = '';
            inputField.appendChild(errorMessage);
        }
    });
</script>
</div>
</div>
@endsection