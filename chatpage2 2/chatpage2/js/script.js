const year = document.getElementById('year');
const year1 = document.getElementById('year1');
const year2 = document.getElementById('year2');
const year3 = document.getElementById('year3');
const year4 = document.getElementById('year4');

year2.style.display='none';
year3.style.display='none';
year4.style.display='none';

const atno = document.getElementById('atno');
const tno = document.getElementById('tno');

year.addEventListener('change', function () {
    const yr = year.value;
    if (yr === "1") {
        atno.style.display = 'block';
        tno.style.display = 'none';
        year1.style.display = 'block';  // Show year1 options
        year2.style.display = 'none';  // Hide year2 options
        year3.style.display = 'none';  // Hide year3 options
        year4.style.display = 'none';  // Hide year4 options
    } else if(yr === "2") {
        atno.style.display = 'none';
        tno.style.display = 'block';
        year1.style.display = 'none';   // Hide year1 options
        year2.style.display = 'block';  // Show year2 options
        year3.style.display = 'none';  // Hide year3 options
        year4.style.display = 'none';  // Hide year4 options
    } else if(yr === "3") {
        atno.style.display = 'none';
        tno.style.display = 'block';
        year1.style.display = 'none';   // Hide year1 options
        year2.style.display = 'none';  // Hide year2 options
        year3.style.display = 'block';  // Show year3 options
        year4.style.display = 'none';  // Hide year4 options
    } else {
        atno.style.display = 'none';
        tno.style.display = 'block';
        year1.style.display = 'none';   // Hide year1 options
        year2.style.display = 'none';  // Hide year2 options
        year3.style.display = 'none';  // Hide year3 options
        year4.style.display = 'block';  // Show year4 options
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Get the form element
    const form = document.getElementById("registrationForm");

    // Add an event listener to the form submission
    form.addEventListener("submit", function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });

    // Function to validate the form
    function validateForm() {
        let isValid = true;

        // Get form field values
        const firstNameError = document.getElementById("firstNameError");
        const middleNameError = document.getElementById("middleNameError");
        const surnameError = document.getElementById("surnameError");
        

        const firstName = document.querySelector('input[name="firstName"]').value;
        const surname = document.querySelector('input[name="surname"]').value;
        const middlename = document.querySelector('input[name="surname"]').value;
        const email = document.querySelector('input[name="email"]').value;
        
        
        
        // password validation 
        const password = document.querySelector('input[name="password"]').value;
        const cpassword = document.querySelector('input[name="cpassword"]').value;
        const passIdError = document.getElementById("passIdError");

        const hasLowerCharacter = /[a-z]/.test(password);
        const hasUpperCharacter = /[A-Z]/.test(password);
        const hasNumber = /\d/.test(password);

        if (hasUpperCharacter) {
            if (hasLowerCharacter){ 
                if(hasNumber){
                    isValid = true;
                }
                else{
                    passIdError.innerHTML = "Make sure your password has at least one  number.";
                    isValid = false;  
                }
            }else{
                passIdError.innerHTML = "Make sure your password has at least one lower case letter and a number.";
                isValid = false; 
            }

        }else{
            passIdError.innerHTML = "Make sure your password has a Upper case Letter.";
            isValid = false;
        }

    
        // Validate first name and surname (no numbers or special characters)
        const nameRegex = /^[A-Za-z\s]+$/;
        if (!nameRegex.test(firstName) || !nameRegex.test(middlename) || !nameRegex.test(surname)) {
            firstNameError.innerHTML = "First name can only contain letters";
            middleNameError.innerHTML = "Middle name can only contain letters";
            surnameError.innerHTML = "Surname can only contain letters";
            isValid = false;
        }

        // Validate email format
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Invalid email format.");
            isValid = false;
        }

        // Validate password (at least 6 characters)
        if (password.length < 8) {
            passIdError.innerHTML = "Password should be at least 8 characters.";
            isValid = false;
        }

        // Validate password and confirm password match
        if (password !== cpassword) {
            passIdError.innerHTML = "Passwords do not match.";
            isValid = false;
        }
        //check phone number for errors
        const phone = document.querySelector('input[name="phone"]').value;
        const phoneError = document.getElementById("phoneError");
        phoneError.innerHTML = "";

        const phoneRegex = /^(07|06)\d{8}$/;
        if (!phoneRegex.test(phone)) {
            phoneError.innerHTML = "Telephone Number should start with '07' or '06' and contain exactly 10 digits.";
            isValid = false;
        }
        return isValid;
    }
});

