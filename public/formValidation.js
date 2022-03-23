document.addEventListener("DOMContentLoaded", () => 
{

    // validating the email input here 
    const email = document.querySelector(".email");

    email.addEventListener("input", function (event) {
        
    if (email.validity.typeMismatch) {
        
        email.setCustomValidity("Please enter a valid email address (johndoe@email.com)");
        email.reportValidity();
    } else {
        email.setCustomValidity("");
    }
    });


    const password = document.querySelector(".password");
    const passwordConfirm = document.querySelector(".passwordConfirm");

    let isValid;

    passwordConfirm.addEventListener("input", function()
    {
        

        if (password.value != passwordConfirm.value)
        {
            passwordConfirm.setCustomValidity("Password does not much, Please try again");
            passwordConfirm.reportValidity();
        } else {
            passwordConfirm.setCustomValidity("");
            isValid = true;
        }

    });


    let submitButotn = document.querySelector(".button");

    submitButotn.addEventListener("click", () => {
    
        if (email.checkValidity() == true && isValid == true)
        {
            console.log("Form is valid");
        }
        else{
            console.log("Form is invalid.")
        }
    })
 

});