document.addEventListener("DOMContentLoaded", () => {

    let headerDiv = document.querySelector(".headerDiv");
    //headerDiv.style.borderStyle="solid"; 

    let logo = document.createElement("IMG");
    logo.className="teamLogo";
    logo.src="../images/teamLogo.png";

    let ul = document.createElement("UL"); 
    ul.className="unorderedList";
    

    // storing these in an array so it would be easy for us to add an elemnt later should we need to 
    let listOfItems = ["login", "index", "about"];


    listOfItems.forEach(element => {
     
     let li = document.createElement("LI");
     li.className="listItem";

     let a = document.createElement("A");
     a.href=  element + ".php";
     a.textContent = element; 

     li.appendChild(a);
     ul.appendChild(li);
        
    });

    headerDiv.appendChild(logo);
    headerDiv.appendChild(ul);



})