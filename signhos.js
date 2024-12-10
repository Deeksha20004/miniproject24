document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const submitbtn = document.getElementById("submitbtn");
  
    submitbtn.addEventListener("click", (event) => {
        event.preventDefault(); // Prevent form submission for validation
  
        const name = document.querySelector('input[name="name"]').value.trim();
        const email = document.querySelector('input[name="email"]').value.trim();
        const contact = document.querySelector('input[name="contact"]').value.trim();
        const age = document.querySelector('input[name="age"]').value.trim();
        const state = document.querySelector('select[name="state"]').value.trim();
        const gender = document.querySelector('input[name="gender"]:checked');
        const password = document.querySelector('input[name="psw"]').value.trim();
        const confirmPassword = document.querySelector('input[name="pswrepeat"]').value.trim();
  
        let isValid = true;
  
        // Validate Name
        if (name === "") {
            alert("Name is required.");
            isValid = false;
        }
  
        // Validate Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            isValid = false;
        }
  
        // Validate Contact Number
        if (contact === "" || isNaN(contact) || contact.length < 10) {
            alert("Contact number must be numeric and at least 10 digits.");
            isValid = false;
        }
  
        // Validate Age
        if (age === "" || isNaN(age) || parseInt(age) <= 0) {
            alert("Age must be a positive number.");
            isValid = false;
        }
  
        // Validate State
        if (state === "") {
            alert("Please select a state.");
            isValid = false;
        }
  
  
        // Validate Gender
        if (!gender) {
            alert("Please select a gender.");
            isValid = false;
        }
  
        // Validate Password
        if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            isValid = false;
        } else if (password !== confirmPassword) {
            alert("Passwords do not match.");
            isValid = false;
        }
  
        // Submit the form if all validations pass
        if (isValid) {
            alert("Form submitted successfully!");
            form.submit();
        }
    });
  });