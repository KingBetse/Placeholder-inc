


let button = document.querySelector("#colapse");
button.addEventListener("click", (c)=>{
  let buttonParent = c.target.parentElement.parentElement;
    console.log(buttonParent);
    buttonParent.classList.toggle("close");
});


// for scrolling
function lefts(){
  let z = document.querySelector(".job-container")
  z.scrollBy(350,0);
}
function rights(){
  let z = document.querySelector(".job-container")
  z.scrollBy(-350,0);
}




// for logout 
let x =document.querySelector("#profile-picture");
x.addEventListener("click", (e)=>{      
  let xParent = e.target.parentElement;
  console.log(xParent);
  xParent.classList.toggle("vis");}
  )

