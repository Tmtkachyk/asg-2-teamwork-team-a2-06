document.addEventListener("DOMContentLoaded", () => 
{

    let headerDiv = document.querySelector(".headerDiv");
    //headerDiv.style.borderStyle="solid"; 

    let logo = document.createElement("IMG");
    logo.className="teamLogo";
    logo.src="../images/teamLogo.png";

    let ul = document.createElement("UL"); 
    ul.className="unorderedList";
    

    // storing these in an array so it would be easy for us to add an elemnt later should we need to 
    let listOfItems = ["index", "login", "about"]; 


    listOfItems.forEach(element => 
    {
     
     let li = document.createElement("LI");
     li.className="listItem";

     let a = document.createElement("A");
     a.href=  element + ".php";
     a.textContent = element; 

     li.appendChild(a);
     ul.appendChild(li);

        console.log("shit");
    });


    headerDiv.appendChild(logo);
    headerDiv.appendChild(ul);


     // burger menu - mobile size screen 

        let burger = document.createElement("DIV");
        burger.className="burgerContainer";

        let bar1 = document.createElement("DIV");
        let bar2 = document.createElement("DIV");
        let bar3 = document.createElement("DIV");

        bar1.className="bar1";
        bar2.className="bar2";
        bar3.className="bar3";
        
        burger.appendChild(bar1);
        burger.appendChild(bar2);
        burger.appendChild(bar3);

        headerDiv.appendChild(burger);
        console.log(burger);


        // event listener


        let menuButton = document.querySelector(".burgerContainer");

        menuButton.addEventListener("click", function()
        {
            menuButton.classList.toggle("change");

            let anotherList = ul;
            anotherList.className="anotherList";
            anotherList.style.display="grid";

            document.querySelector(".smallMenu").appendChild(ul);
            

            

        });




})
