function mobileNavTrigger() {
  var x = document.getElementById("mainNav");
  if (x.className === "") {
    x.className += "responsive";
  } else {
    x.className = "";
  }
}