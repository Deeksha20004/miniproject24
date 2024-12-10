document.getElementById('submitbtn').addEventListener('click', function(event) {
    // Get form elements
    const name = document.querySelector('[name="name"]').value;
    const email = document.querySelector('[name="email"]').value;
    const contact = document.querySelector('[name="contact"]').value;
    const age = document.querySelector('[name="age"]').value;
    const state = document.querySelector('[name="state"]').value;
    const city = document.querySelector('[name="city"]').value;
    const gender = document.querySelector('[name="gender"]:checked');
    const psw = document.querySelector('[name="psw"]').value;
    const pswRepeat = document.querySelector('[name="psw-repeat"]').value;

    // Check if all fields are filled
    if (!name || !email || !contact || !age || !state || !city || !gender || !psw || !pswRepeat) {
        alert("Please fill out all fields.");
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Check if the email is in a valid format
    const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Check if the contact number is valid (basic check)
    const contactPattern = /^\d{10}$/;
    if (!contactPattern.test(contact)) {
        alert("Please enter a valid 10-digit contact number.");
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Check if the password is at least 6 characters
    if (psw.length < 6) {
        alert("Password must be at least 6 characters long.");
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Check if passwords match
    if (psw !== pswRepeat) {
        alert("Passwords do not match.");
        event.preventDefault(); // Prevent form submission
        return;
    }

    // If all validations pass, the form will be submitted
    alert("Form submitted successfully.");
});


  