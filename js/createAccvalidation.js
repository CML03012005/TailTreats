$(document).ready(function () {
    $('#signupformValidation').submit(function (e) {
        e.preventDefault();
        let isValid = true;


        // Function to set error message
        function setErrorFor(input, message) {
            const span = $(input).next('span');
            span.text(message);
            isValid = false;
        }

        // Function to set success message (clear error)
        function setSuccessFor(input) {
            const span = $(input).next('span');
            span.text('');
        }


        // Username validation
        let username = $('#username');
        if (!/^[a-zA-Z0-9]{4,12}$/.test(username.val())) {
            setErrorFor(username, 'Username must be alphanumeric, min 4, max 12 characters');
        } else {
            setSuccessFor(username);
        }
        console.log('Username validation result:', isValid);


        // Password validation
        let password = $('#password');
        if (!/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%&*])[A-Za-z\d!@#$%&*]{8,16}$/.test(password.val())) {
            setErrorFor(password, 'Password must be 8-16 chars, with 1 uppercase, 1 lowercase, 1 number, 1 special char (!@#$%&*)');
        } else {
            setSuccessFor(password);
        }
        console.log('Password validation result:', isValid);

        // Confirm Password validation
        let confirmpassword = $('#confirmpassword');
        if (password.val() !== confirmpassword.val()) {
            setErrorFor(confirmpassword, 'Passwords do not match');
        } else {
            setSuccessFor(confirmpassword);
        }
        console.log('confirm pass validation result:', isValid);

        // First Name validation
        let firstname = $('#firstname');
        if (!/^[a-zA-Z]+$/.test(firstname.val()) || firstname.val().length < 1) {
            setErrorFor(firstname, 'First Name must be characters only, min 1');
        } else {
            setSuccessFor(firstname);
        }
        console.log('First name validation result:', isValid);

        // Middle Name validation (optional)
        let middlename = $('#middlename');
        if (middlename.val() && !/^[a-zA-Z]+$/.test(middlename.val())) {
            setErrorFor(middlename, 'Middle Name must be characters only');
        } else {
            setSuccessFor(middlename);
        }
        console.log('Middle name validation result:', isValid);

        // Last Name validation
        let lastname = $('#lastname');
        if (!/^[a-zA-Z]{2,}$/.test(lastname.val())) {
            setErrorFor(lastname, 'Last Name must be characters only, min 2');
        } else {
            setSuccessFor(lastname);
        }
        console.log('Last name validation result:', isValid);

        // Complete Address validation
        let address = $('#address');
        if (!/^[a-zA-Z0-9\s,.'-]+$/.test(address.val())) {
            setErrorFor(address, 'Address must be alphanumeric');
        } else {
            setSuccessFor(address);
        }
        console.log('Address validation result:', isValid);

        // Birthday validation
        let birthday = $('#birthdate');
        if (!/^\d{2}-\d{2}-\d{4}$/.test(birthday.val())) {
            setErrorFor(birthday, 'Birthday must be in MM-DD-YYYY format');
        } else {
            setSuccessFor(birthday);
        }
        console.log('Birthday validation result:', isValid);

        // Mobile validation
        let mobile = $('#mobile');
        if (!/^\d{11}$/.test(mobile.val())) {
            setErrorFor(mobile, 'Mobile no. must be numeric, 11 digits');
        } else {
            setSuccessFor(mobile);
        }
        console.log('mobile validation result:', isValid);

        // If all inputs are valid, submit the form
        if (isValid == true) {
            alert("Registration Successful!");
            this.submit();
        } 
    });
});