const year = document.getElementById('year');

// const atno = document.getElementById('atno');
// const tno = document.getElementById('tno');
const regno = document.getElementById("regno");

year.addEventListener('change', function () {
    const yr = year.value;
    
    if (yr === "1") {
        regno.innerHTML = "AT Number: ";
        // atno.style.display = 'block';
        // tno.style.display = 'none';

    } 
    else 
    {
        regno.innerHTML = "T Number: ";
        // atno.style.display = 'none';
        // tno.style.display = 'block';

    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Get the form element
    const form = document.getElementById("loginform");

    form.addEventListener("submit", function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });

    function validateForm() {
    var regnumber = document.getElementById("regnumber").value;
    //var tNumber = document.getElementById("Tnumber").value;

    if (regnumber.startsWith("AT") || regnumber.startsWith("T")) {
    //alert("AT Number must start with 'AT'");
    return true;
    } else {
        alert("AT Number must start with 'AT' and T Number must start with 'T'.");
        return false;
    }
        
    };

});
