function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}



function myFunction() {
  var x = document.getElementById("uw-sub");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}


function hamBurger() {
  var x = document.getElementById("sub-men");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}


function moSearch() {
  var x = document.getElementById("mob-search");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}



function cDelete() {
  var x = document.getElementById("confirm-dele");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


function soIcons() {
  var x = document.getElementById("share-links");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}


function likedis(){

let likebutton = document.querySelector('.like--btn');
       
if( typeof(likebutton) === 'undefined' || likebutton === null ){
    return;
}

likebutton.addEventListener('click', function(){
    //To get the data attribute this means we're storing the
    // value in data attribute
    // eg <div data-user_id="4" data-post_id="55">Like icon</div>
    sendRepy = {
        'user_id': responseBox.getAttribute( 'data-user_id' ),
        'postcard_id': responseBox.getAttribute( 'data-postcard_id' ),
        'type': responseBox.getAttribute( 'data-type' ),
    };


    let http = new XMLHttpRequest(),
        message_holder = document.querySelector('.message_holder ul');

    //It's recommended the url is created in api.php that way
    // Laravel is not crsf_field else it would always return a 419 response.
    //
    http.open('POST', '/api/recordlikes' );
    http.setRequestHeader('Content-type', 'application/json')
    http.send(JSON.stringify(sendRepy));

    http.onload = function() {
        //here we can update the div or anything in frontend once it's successful
        //Maybe change the class of the icon or the counter
    }
})


}


