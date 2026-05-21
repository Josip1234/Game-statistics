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

parent.appendChild(label1);
parent.appendChild(input);
parent.appendChild(label2);
parent.appendChild(input2);

//sessionStorage.setItem("number_of_fields", numberOfFields);
document.getElementById('number_or_fields').innerText=numberOfFields;  
      


}


function removeNewTextFields(){

   
    
    let element=document.getElementById('values');
    let element2=element.getElementsByTagName('input');  
    let label=element.getElementsByTagName('label');
    
    for (let ind = 0; ind <= element2.length; ind++) {
          
      if(index<0) index=1;
      if(labelId<0) index=1;

      const element3 = document.getElementById(element2[ind].id);
      element3.remove();  
      const labelRemove=document.getElementById(label[ind].id);
      labelRemove.remove();
       index--;
       numberOfFields--;
      labelId--;
      document.getElementById('number_or_fields').innerText=numberOfFields; 
    }
      
   
}