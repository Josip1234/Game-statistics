

 let numberOfFields=0;
 let index=0;
 let labelId=0;
// update number of fields when page is fully loaded
// ovdje je potencijalni problem
window.addEventListener("load",function(){
   let p = document.getElementById('number_of_fields');
   let text = p.textContent;
   let number = Number(text);
   //need to update indexes and label ids
   //index value is half of sum of fields
   let ind=50/2;
   index=ind;
   labelId=ind;
   numberOfFields=number;

});









function addNewTextFields(){



      index++;

      let input = document.createElement("input");
      numberOfFields++;
      let input2 = document.createElement("input");
      numberOfFields++;
      let parent = document.getElementById("values");
      let label1 = document.createElement("label");
      let label2 = document.createElement("label");
      let additionalDiv=document.createElement("div");
      let checkbox=document.createElement("input");
      let labelForCheckBox=document.createElement("label");

checkbox.setAttribute('id','remove_fields[]');
checkbox.setAttribute('type','checkbox');
checkbox.setAttribute('value',index);
checkbox.setAttribute('name','remove_fields[]');
checkbox.setAttribute('class','w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft');
labelForCheckBox.setAttribute('for','remove_fields[]');
labelForCheckBox.setAttribute('class','w-full py-3 ms-2 text-sm font-medium text-heading');
labelForCheckBox.textContent='Remove';
additionalDiv.setAttribute('class','flex items-center ps-3');
additionalDiv.appendChild(checkbox);
additionalDiv.appendChild(labelForCheckBox);

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
parent.appendChild(additionalDiv);


document.getElementById('number_of_fields').innerText=numberOfFields;



}






