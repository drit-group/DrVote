var $ = document;
var CheckBoxCounter = 0;
var getClassElement = (nameClass)=>$.getElementsByClassName(nameClass);
var getIdElement = (nameId)=>$.getElementById(nameId);


getIdElement("inputId").addEventListener("input" , (event)=>{
    event.target.value = event.target.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');
});

for ( input of getClassElement("inputOnclick")){
    input.checked = false;
    input.addEventListener("click" , (event)=>{
            if(event.target.checked){
                // به جای این 4 هر چی نوشتی میشه ماکسیموم کاندید هایی که میتونه رای بده
                if(CheckBoxCounter < 4){
                // 
                    CheckBoxCounter++;
                    console.log(CheckBoxCounter);
                }else{
                    event.target.checked = false;
                }
            }else{
                CheckBoxCounter--;
            }
    });
}