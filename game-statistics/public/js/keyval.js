 let numberOfFields=0;

 let index=0;
 let labelId=0;

function addNewTextFields(){
  
   
      index++;

      let input = document.createElement("input"); 
      numberOfFields++;
      let input2 = document.createElement("input"); 
      numberOfFields++;
      let parent = document.getElementById("values");
      let label1 = document.createElement("label");
      let label2 = document.createElement("label"); 
     

input.setAttribute('type', 'text');
input2.setAttribute('type', 'text');

input.setAttribute('name','key'+index);
input2.setAttribute('name', 'val'+index);

input.setAttribute('id','key'+index);
input2.setAttribute('id', 'val'+index);

label1.setAttribute('for','key'+index);
label2.setAttribute('for','val'+index);

label1.textContent='Insert new attribute key';
label2.textContent='Insert new attribute value';

label1.setAttribute('class','block font-medium text-sm text-gray-700');
label2.setAttribute('class','block font-medium text-sm text-gray-700');

input.setAttribute('class','border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full');
input2.setAttribute('class','border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full');

input.setAttribute('required','');
input2.setAttribute('required','');

label1.setAttribute('id','label'+index);
label2.setAttribute('id','label2'+index);

 let button = document.createElement("button");
  button.setAttribute('type','button');
 button.setAttribute("id",'button'+index);
 button.textContent='Remove key val fields';
 button.setAttribute("class","inline-flex items-center px-4 py-5 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150");
 button.setAttribute('onclick',"removeFieldById(this)");




parent.appendChild(label1);
parent.appendChild(input);
parent.appendChild(label2);
parent.appendChild(input2);
parent.appendChild(button);

//sessionStorage.setItem("number_of_fields", numberOfFields);
document.getElementById('number_or_fields').innerText=numberOfFields;  
      


}


function resetKeyValues(){
  index=0;
  labelId=0;
  numberOfFields=0;
}


function removeAllFields(){
  let div=document.getElementById('values');
  
   while (div.hasChildNodes()) {
    div.removeChild(div.firstChild);
  }


  index=0;
  labelId=0;
  numberOfFields=0;
   document.getElementById('number_or_fields').innerText=numberOfFields;
} 

function removeFieldById(id){

   
  let div=document.getElementById('values');
  let input=div.getElementsByTagName('input');
  let label=div.getElementsByTagName('label');


 
      let labId="label"+index;
      let keyId="key"+index;
      input[keyId].remove();
      label[labId].remove();
      id.remove();
       numberOfFields--;
         document.getElementById('number_or_fields').innerText=numberOfFields;
       
        
  

      
       let label2Id="label2"+index;
      let valId="val"+index;
      input[valId].remove();
      label[label2Id].remove();
      
      numberOfFields--;
      index--;
           document.getElementById('number_or_fields').innerText=numberOfFields;
          
  



}