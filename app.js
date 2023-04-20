


let button = document.querySelector("#colapse");
button.addEventListener("click", (c)=>{
  let buttonParent = c.target.parentElement.parentElement;
    console.log(buttonParent);
    buttonParent.classList.toggle("close");
});
