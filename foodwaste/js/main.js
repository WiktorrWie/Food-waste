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
}

// Listing

function showSubmit() {
    document.getElementById("profilePicSubmit").style.display = "block";
    document.getElementById("profilePicLabel").style.display = "block";
    document.getElementById("profilePicForm").style.position = "relative";
    document.getElementById("changePhoto").style.display = "none";
}