function getValues(){
//chosen genre id
let genreSelectedValues = document.getElementById("genre").value;
//get all li elements
let li=document.getElementsByTagName("li");
let value= li.item(genreSelectedValues-1);

//let parent=document.getElementById("checkboxValues");
//let removed = parent.removeChild(value);

if (value.parentNode) {
  value.parentNode.removeChild(value);
}

}
