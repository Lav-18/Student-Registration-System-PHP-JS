function validateForm() {
    let isValid = true;

    // ===== Full Name Validation =====
    const fullName = document.getElementById('fullName');
    const fullNameError = document.getElementById('fullNameError');
    if (fullName.value.trim() === '') {
        fullNameError.textContent = 'Full Name is required.';
        isValid = false;
    } else if (!/^[a-zA-Z\s]+$/.test(fullName.value)) {
        fullNameError.textContent = 'Name should only contain letters.';
        isValid = false;
    } else {
        fullNameError.textContent = '';
    }

    // ===== Email Validation =====
    const email = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email.value.trim() === '') {
        emailError.textContent = 'Email is required.';
        isValid = false;
    } else if (!emailRegex.test(email.value)) {
        emailError.textContent = 'Invalid email format.';
        isValid = false;
    } else {
        emailError.textContent = '';
    }

    // ===== Password Validation =====
    const password = document.getElementById('password');
    const passwordError = document.getElementById('passwordError');
    if (password.value.trim() === '') {
        passwordError.textContent = 'Password is required.';
        isValid = false;
    } else if (password.value.length < 6) {
        passwordError.textContent = 'Password must be at least 6 characters.';
        isValid = false;
    } else {
        passwordError.textContent = '';
    }

    // ===== Mobile Validation =====
    const mobile = document.getElementById('mobile');
    const mobileError = document.getElementById('mobileError');
    const mobileRegex = /^[0-9]{10}$/; // 10 digit number
    if (mobile.value.trim() === '') {
        mobileError.textContent = 'Mobile number is required.';
        isValid = false;
    } else if (!mobileRegex.test(mobile.value)) {
        mobileError.textContent = 'Enter a valid 10-digit mobile number.';
        isValid = false;
    } else {
        mobileError.textContent = '';
    }

    // ===== Course Validation =====
    const course = document.getElementById('course');
    const courseError = document.getElementById('courseError');
    if (course.value === '') {
        courseError.textContent = 'Please select a course.';
        isValid = false;
    } else {
        courseError.textContent = '';
    }

    // Stop form submission if not valid
    return isValid;
}
