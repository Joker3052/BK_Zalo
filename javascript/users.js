const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
userslist = document.querySelector(".users .users-list");

searchBtn.onclick = function(){
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
}

searchBar.onkeyup =()=>
{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  //getting users search value
  //start ajax
  let xhr = new XMLHttpRequest();//creating XML object
  xhr.open("POST", "php/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          // if(!searchBar.classList.contains("active")){
          //   userslist.innerHTML = data;
          // }
          //console.log(data);k,
        userslist.innerHTML = data;
        }
    }
  }
  // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm="+searchTerm);
}

setInterval(() =>{
  //start ajax
  let xhr = new XMLHttpRequest();//creating XML object
  xhr.open("GET", "php/users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            userslist.innerHTML = data;
          }
        //   console.log(data);
        // userslist.innerHTML = data;
        }
    }
  }
  xhr.send();
}, 500); //this function will run frequently after 500ms

