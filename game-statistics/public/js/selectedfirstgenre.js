let removedElement="";
let removedElementIndex=0;

window.onload= function(){
 // removedElement=removeCheckedValueFromCheckbox();
  
}
function getValues(){

//chosen genre id
let genreSelectedValues = document.getElementById("genre").value;
 if(removedElementIndex == genreSelectedValues){
    genreSelectedValues = removedElementIndex;
  //alert(parseInt(genreSelectedValues));
 }else{
  genreSelectedValues = document.getElementById("genre").value;
 }
   let selectChoice = document.getElementById("genre");
   let option=selectChoice.getElementsByTagName("option");
   //get selected option (will be used to remove selected option value)
   let selectedOption=option.item(parseInt(genreSelectedValues));
   //get removed checked element from checkbox

    let re=""; 
  
    //create new html element li
    let newListItem=document.createElement("li");
    //add tailwind class
    newListItem.setAttribute("class","w-full border-b border-default rounded-t-lg"); 
    
    //append li element to checkbox div
    document.getElementById("checkboxValues").append(newListItem);
    //print removed element
    let previous="";
    let next="";
    if(removedElementIndex===genreSelectedValues){
      //add id from currently removed element
    newListItem.setAttribute("id", removedElementIndex);
      // re=document.getElementById(parseInt(genreSelectedValues)).getHTML();
      next=document.getElementById(parseInt(genreSelectedValues++)).getHTML();
      //alert("Previous: "+previous+", current: "+re+"next"+document.getElementById(parseInt(genreSelectedValues++)).getHTML());
      previous=removedElement;
      re=previous;
       //remove currently selected value from checkbox
       removeCheckedValueFromCheckbox();
      newListItem.innerHTML=re;
        removedElement="";
    }else{
            //add id from currently removed element
    newListItem.setAttribute("id", parseInt(genreSelectedValues));
       document.getElementById(parseInt(genreSelectedValues)).remove();
        next=document.getElementById(parseInt(genreSelectedValues++)).getHTML();
        re=next;
     newListItem.innerHTML=re;
    }
  
   
   
}

function removeCheckedValueFromCheckbox(){
  let removedElement="";
  let genreSelectedValues = document.getElementById("genre").value; 
  removedElementIndex=genreSelectedValues;
   
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
            try {
               removedElement=document.getElementById(genreSelectedValues).getHTML();
               document.getElementById(genreSelectedValues).remove();
            } catch (error) {
               removedElement=document.getElementById(genreSelectedValues-1).getHTML();
               document.getElementById(genreSelectedValues-1).remove();
            }
         
        }
        
      }
      
  }
}
return removedElement;
}

