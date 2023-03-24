let sport = document.querySelector("#sport");
let economy = document.querySelector("#economy");
let environment = document.querySelector("#environment");
let politics = document.querySelector("#politics");
let numeric = document.querySelector("#numeric");
let sante = document.querySelector("#sante");

sportFlag = 0;
economyFlag = 0;
environmentFlag = 0;
politicsFlag = 0;
numericFlag = 0;
santeFlag = 0;

sport.addEventListener("click", function(){
    if (economyFlag%2 == 0) {
        sport.classList.add("border-select");
    } else {
        sport.classList.remove("border-select");
    }
    sportFlag++;
});

economy.addEventListener("click", function(){
    if (economyFlag%2 == 0) {
        economy.classList.add("border-select");
    } else {
        economy.classList.remove("border-select");
    }
    economyFlag++;
});

environment.addEventListener("click", function(){
    if (environmentFlag%2 == 0) {
        environment.classList.add("border-select");
    } else {
        environment.classList.remove("border-select");
    }
    environmentFlag++;
});

politics.addEventListener("click", function(){
    if (politicsFlag%2 == 0) {
        politics.classList.add("border-select");
    } else {
        politics.classList.remove("border-select");
    }
    politicsFlag++;
});

numeric.addEventListener("click", function(){
    if (numericFlag%2 == 0) {
        numeric.classList.add("border-select");
    } else {
        numeric.classList.remove("border-select");
    }
    numericFlag++;
});

sante.addEventListener("click", function(){
    if (santeFlag%2 == 0) {
        sante.classList.add("border-select");
    } else {
        sante.classList.remove("border-select");
    }
    santeFlag++;
});