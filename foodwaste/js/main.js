function openSignUp() {
    document.getElementById("signUp").style.display = "block";
}
  
function closeSignUp() {
    document.getElementById("signUp").style.display = "none";
}
  
function openLogIn() {
    document.getElementById("logIn").style.display = "block";
}
  
function closeLogIn() {
    document.getElementById("logIn").style.display = "none";
}

// Map

function closeMap() {
    document.getElementById("map").style.display = "none";
}
  
function openMap() {
    document.getElementById("map").style.display = "flex";
    this.map.reseize();
}

// Listing

function showSubmit() {
    document.getElementById("profilePicSubmit").style.display = "block";
    document.getElementById("profilePicLabel").style.display = "block";
    document.getElementById("profilePicForm").style.position = "relative";
    document.getElementById("changePhoto").style.display = "none";
}


//Function with parameter where x is a post id

function openListing(x) {
    document.getElementById("profileImage" + x).style.display = "block";
    document.getElementById("listingImage" + x).style.width = "260px";
    document.getElementById("listingImage" + x).style.height = "260px";
    document.getElementById("contact" + x).style.display = "block";
    document.getElementById("city" + x).style.display = "none";
    document.getElementById("text" + x).style.width = "100%";
    document.getElementById("cityOpen" + x).style.display = "block";
    document.getElementById("name" + x).style.display = "block";
    document.getElementById("nameDate" + x).style.display = "none";
    document.getElementById("shortDescription" + x).style.display = "none";
    document.getElementById("fullDescription" + x).style.display = "block";
    document.getElementById("close" + x).style.display = "block";
    alert("open listing");
}

function closeListing(x) {
    document.getElementById("profileImage" + x).removeAttribute("style");
    document.getElementById("listingImage" + x).style.width = "180px";
    document.getElementById("listingImage" + x).style.height = "180px";
    document.getElementById("contact" + x).setAttribute("style", "");
    document.getElementById("city" + x).style.display = "block";
    document.getElementById("text" + x).style.width = "50%";
    document.getElementById("cityOpen" + x).style.display = "none";
    document.getElementById("name" + x).style.display = "none";
    document.getElementById("nameDate" + x).style.display = "block";
    document.getElementById("shortDescription" + x).style.display = "block";
    document.getElementById("fullDescription" + x).style.display = "none";
    document.getElementById("close" + x).style.display = "none";
    alert("close listing");
}
