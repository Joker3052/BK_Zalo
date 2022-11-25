const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>
{
    e.preventDefault(); //prevent form from submit 
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}
sendBtn.onclick =()=>
{
     //ajax///////////////
    let xhr = new XMLHttpRequest(); //creting xml object
    xhr.open("POST","php/insert-ch@t.php",true);
    xhr.onload = () =>{
      if(xhr.readyState=== XMLHttpRequest.DONE)
      {
        if(xhr.status ===200)
        {
          inputField.value = "";
          scrollToBottom();   
        }
      }
    }
    //we have to send the form data through ajax to php
    let formdata = new FormData(form); //creating new form data Object
    xhr.send(formdata);// send form data to php
}

chatBox.onmouseenter = ()=>{
  chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
  chatBox.classList.remove("active");
}

setInterval(() =>{
  //start ajax
  let xhr = new XMLHttpRequest();//creating XML object
  xhr.open("POST", "php/get-ch@t.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          chatBox.innerHTML = data;
          // scrollToBottom();
          // if(!searchBar.classList.contains("active")){
          //   userslist.innerHTML = data;
          // }
        //   console.log(data);
        if(!chatBox.classList.contains("active")){
          scrollToBottom();
        }
        }
    }
  }
 //we have to send the form data through ajax to php
 let formdata = new FormData(form); //creating new form data Object
 xhr.send(formdata);// send form data to php
}, 500); //this function will run frequently after 500ms

function scrollToBottom(){
  chatBox.scrollTop = chatBox.scrollHeight;
}
