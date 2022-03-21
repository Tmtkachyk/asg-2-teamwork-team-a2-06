document.addEventListener("DOMContentLoaded", () => 
{

    // validating the email input here 
    const email = document.querySelector(".email");

    email.addEventListener("input", function (event) {
        console.log("the event is triggering")
    if (email.validity.typeMismatch) {
        
        email.setCustomValidity("Please enter a valid email address (johndoe@email.com)");
        email.reportValidity();
    } else {
        email.setCustomValidity("");
    }
    });

    

});