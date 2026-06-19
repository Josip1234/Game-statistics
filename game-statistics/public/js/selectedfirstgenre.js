let removedElement="";

window.onload= function(){
  removedElement=removeCheckedValueFromCheckbox();
  alert(removedElement);
}
function getValues(){
//chosen genre id
let genreSelectedValues = document.getElementById("genre").value;

    document.getElementById(genreSelectedValues).remove();
}

function removeCheckedValueFromCheckbox(){
  let removedElement="";
  let genreSelectedValues = document.getElementById("genre").value;
  //if there ia a checked value remove it from chexbox form
var ulElement=document.getElementById("checkboxValues");
var lists=ulElement.getElementsByTagName("li");
for (let index = 0; index < lists.length; index++) {
  const element = lists[index];
  const div = element.getElementsByTagName("div");
  for( j=0;j<div.length;j++){
      const divContent=div[j].getElementsByTagName("input");
      
      for (let dc = 0; dc < divContent.length; dc++) {
        const isChecked = divContent[dc].getAttribute("checked");
        if(isChecked!==null){
            removedElement=document.getElementById(genreSelectedValues).getHTML();
            document.getElementById(genreSelectedValues).remove();
        }
        
      }
      
  }
}
return removedElement;
}

