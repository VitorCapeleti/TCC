
var configMenu = document.querySelector(".settings-menu");
var escuro = document.getElementById("dark-btn");


function abreConfig() {
    configMenu.classList.toggle("settings-menu-height");
}

escuro.onclick = function() {
    escuro.classList.toggle("dark-btn-on");
    document.body.classList.toggle("dark-theme"); 
    
    if(localStorage.getItem("theme") == "light"){
        localStorage.setItem("theme", "dark");
    }else{
        localStorage.setItem("theme", "light");
    }

}

if(localStorage.getItem("theme") == "light"){
    escuro.classList.remove("dark-btn-on");
    document.body.classList.remove("dark-theme"); 

}else if(localStorage.getItem("theme") == "dark"){

    escuro.classList.add("dark-btn-on");
    document.body.classList.add("dark-theme"); 
}else{
    localStorage.setItem("theme", "light");
    localStorage.setItem("theme");
}

//Mudar o input file
document.querySelector('#arquivo').addEventListener('change', function(){
    document.querySelector('.artigo-arquivo').textContent = this.files[0].name;
})

