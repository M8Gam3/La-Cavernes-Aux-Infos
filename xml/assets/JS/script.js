let sportDiv = document.querySelector("#sportDiv");
let economyDiv = document.querySelector("#economyDiv");
let environmentDiv = document.querySelector("#environmentDiv");
let politicsDiv = document.querySelector("#politicsDiv");
let numericDiv = document.querySelector("#numericDiv");
let santeDiv = document.querySelector("#santeDiv");

sportFlag = 0;
economyFlag = 0;
environmentFlag = 0;
politicsFlag = 0;
numericFlag = 0;
santeFlag = 0;

console.log(sportDiv)

sportDiv.addEventListener("click", function(){
    alert('heyyyyyyyyyyyyyy!')
    if (economyFlag%2 == 0) {
        sportDiv.classList.add("border-select");
    } else {
        sportDiv.classList.remove("border-select");
    }
    sportFlag++;
});

economyDiv.addEventListener("click", function(){
    if (economyFlag%2 == 0) {
        economyDiv.classList.add("border-select");
    } else {
        economyDiv.classList.remove("border-select");
    }
    economyFlag++;
});

environmentDiv.addEventListener("click", function(){
    if (environmentFlag%2 == 0) {
        environmentDiv.classList.add("border-select");
    } else {
        environmentDiv.classList.remove("border-select");
    }
    environmentFlag++;
});

politicsDiv.addEventListener("click", function(){
    if (politicsFlag%2 == 0) {
        politicsDiv.classList.add("border-select");
    } else {
        politicsDiv.classList.remove("border-select");
    }
    politicsFlag++;
});

numericDiv.addEventListener("click", function(){
    if (numericFlag%2 == 0) {
        numericDiv.classList.add("border-select");
    } else {
        numericDiv.classList.remove("border-select");
    }
    numericFlag++;
});

santeDiv.addEventListener("click", function(){
    if (santeFlag%2 == 0) {
        santeDiv.classList.add("border-select");
    } else {
        santeDiv.classList.remove("border-select");
    }
    santeFlag++;
});