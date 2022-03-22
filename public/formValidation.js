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


    const password = document.querySelector(".password");
    const passwordConfirm = document.querySelector(".passwordConfirm");

    passwordConfirm.addEventListener("input", function()
    {
        
        console.log(password.value);
        console.log(passwordConfirm.value);

        if (password.value != passwordConfirm.value)
        {
            passwordConfirm.setCustomValidity("password does not much, Please try again");
            passwordConfirm.reportValidity();
        } else {
            passwordConfirm.setCustomValidity("");
        }

    });
    

});