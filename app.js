console.log("why so serious");


let button = document.querySelector("#colapse");
button.addEventListener("click", (c)=>{
  let buttonParent = c.target.parentElement.parentElement;
    console.log(buttonParent);
    buttonParent.classList.toggle("close");
});


// for scrolling

 var lefts = function() {
  var z = document.querySelectorAll(".job-container")
  if (z.length > 1){
    z[1].scrollBy(-300, 0)
  }
  // Do something
};

function rights(){
  // console.log("left")
  var z = document.querySelectorAll(".job-container")
  if (z.length > 1){
    z[1].scrollBy(300, 0)
  }
  // console.log(z)
  // const someChild = document.createElement("div")
  // someChild.className = "mychild";
  // someChild.style.width = "1000px";
  // someChild.style.height = "1000px";
  // someChild.style.position = "absolute"
  // someChild.style.backgroundColor = "black"
  // z.appendChild(someChild)
  // console.log(z)

}


function searchclicked(){

  console.log("test")
document.querySelector(".s-b").classList.toggle("close");


}

// for logout 
let x =document.querySelector("#profile-picture");
x.addEventListener("click", (e)=>{      
  let xParent = e.target.parentElement;
  console.log(xParent);
  xParent.classList.toggle("vis");}
  )

 
  