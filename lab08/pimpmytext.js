var i = 12
function myFunction (){
  setInterval(function(){
    var area = document.getElementById("area");
    i = i+2;
    area.style.fontSize = i + "pt";
  },500);
}

function Function (){
  var check = document.getElementById("check");
  if (check.checked) {
    var area = document.getElementById("area");
    area.style.fontWeight = "bold";
    area.style.color = "green";
    area.style.textDecoration = "underline";
  } else {
      var area = document.getElementById("area");
      area.style.fontWeight = "normal";
      area.style.color = "black";
      area.style.textDecoration = "none";
  }
}

function Functioning() {
  var area = document.getElementById("area");
  var split = area.value.split(".");
  area.value = split.join("-izzle.");
  area.style.textTransform = "uppercase";
}
