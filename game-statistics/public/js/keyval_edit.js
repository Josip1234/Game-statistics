

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
document.getElementById('number_of_fields').innerText=numberOfFields;



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
   document.getElementById('number_of_fields').innerText=numberOfFields;
}

function removeFieldById(id){
  let text = id.id; //button25
  //let s get ids from regex
  const re= new RegExp("[0-9].*"); //25
  const indexNum=re.exec(text); // 25

  let div=document.getElementById('values'); //dohvati div
  let input=div.getElementsByTagName('input'); //dohvati inpute iz diva
  let label=div.getElementsByTagName('label'); //dohvati lable oznake

      //s obzirom da postoje određeni problemi sa js-om za različite sustave najbolje je postaviti placeholdere u view za uunos key values-a
      //kao workaround


      let labId="label"+indexNum; //label25
      let keyId="key"+indexNum; //key25

      input[keyId].remove(); //remove key25
      label[labId].remove(); //remove label25
      id.remove(); //remove id
       numberOfFields--; //oduzmi broj polja
         document.getElementById('number_of_fields').innerText=numberOfFields; //ažuriraj broj polja na stranici





       let label2Id="label2"+indexNum; //label225
      let valId="val"+indexNum; //val25
      input[valId].remove(); //makni val25
      label[label2Id].remove(); //makni label225


      numberOfFields--; //smanji broj polja
      index--; //smanji index ako se dodaje iduće polje key i values su sljedeži brojevi
           document.getElementById('number_of_fields').innerText=numberOfFields; //ažuriraj broj polja na stranici





}
