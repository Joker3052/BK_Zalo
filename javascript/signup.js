const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");


form.onsubmit = (e)=>
{
    e.preventDefault(); //prevent form from submit 
}

continueBtn.onclick =() =>
{
    //ajax///////////////
    let xhr = new XMLHttpRequest(); //creting xml object
    xhr.open("POST","php/signup.php",true);
    xhr.onload = () =>{
      if(xhr.readyState=== XMLHttpRequest.DONE)
      {
        if(xhr.status ===200)
        {
            let data = xhr.response;       
            if(data === "success")
            {
                location.href = "users.php";
            }
            else{
              errorText.style.display = "block";
              errorText.textContent = data;
              
            }
        }
      }
    }
    //we have to send the form data through ajax to php
    let formdata = new FormData(form); //creating new form data Object
    xhr.send(formdata);// send form data to php
}