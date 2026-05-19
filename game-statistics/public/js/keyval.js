 let index=0;
function addNewTextFields(){
  
 
   


    index++;

      let input = document.createElement("input");
      let input2 = document.createElement("input");
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

parent.appendChild(label1);
parent.appendChild(input);
parent.appendChild(label2);
parent.appendChild(input2);

   
      


}