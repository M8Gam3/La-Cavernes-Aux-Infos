let checkSport = document.querySelector("#sport");
let checkEconomy = document.querySelector("#economy");
let checkEnvironment = document.querySelector("#environment");
let checkPolitics = document.querySelector("#politics");
let checkNumeric = document.querySelector("#numeric");
let checkSante = document.querySelector("#sante");

let sportDiv = document.querySelector("#sportDiv");
let economyDiv = document.querySelector("#economyDiv");
let environmentDiv = document.querySelector("#environmentDiv");
let politicsDiv = document.querySelector("#politicsDiv");
let numericDiv = document.querySelector("#numericDiv");
let santeDiv = document.querySelector("#santeDiv");

if (checkSport.checked) {
    sportDiv.classList.add("border-select");
}
if (checkEconomy.checked) {
    economyDiv.classList.add("border-select");
}
if (checkEnvironment.checked) {
    environmentDiv.classList.add("border-select");
}
if (checkPolitics.checked) {
    politicsDiv.classList.add("border-select");
}
if (checkNumeric.checked) {
    numericDiv.classList.add("border-select");
}
if (checkSante.checked) {
    santeDiv.classList.add("border-select");
}

checkSport.addEventListener("change", function(){
    if (this.checked) {
        sportDiv.classList.add("border-select");
    } else {
        sportDiv.classList.remove("border-select");
    }
});

checkEconomy.addEventListener("change", function(){
    if (this.checked) {
        economyDiv.classList.add("border-select");
    } else {
        economyDiv.classList.remove("border-select");
    }
});

checkEnvironment.addEventListener("change", function(){
    if (this.checked) {
        environmentDiv.classList.add("border-select");
    } else {
        environmentDiv.classList.remove("border-select");
    }
});

checkPolitics.addEventListener("change", function(){
    if (this.checked) {
        politicsDiv.classList.add("border-select");
    } else {
        politicsDiv.classList.remove("border-select");
    }
});

checkNumeric.addEventListener("change", function(){
    if (this.checked) {
        numericDiv.classList.add("border-select");
    } else {
        numericDiv.classList.remove("border-select");
    }
});

checkSante.addEventListener("change", function(){
    if (this.checked) {
        santeDiv.classList.add("border-select");
    } else {
        santeDiv.classList.remove("border-select");
    }
});