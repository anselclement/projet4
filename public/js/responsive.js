(function(){
    var burger = document.querySelector('.burger');
    var nav = document.querySelector('#'+burger.dataset.target);

    burger.addEventListener('click', function(){
        burger.classList.toggle('is-active');
        nav.classList.toggle('is-active');
    });
})();

(function verif(){

    var formulaire = document.getElementById("submitcomment");
    var champ = document.getElementById('contentcomment');
    var comment = document.getElementById('commentValid');

    formulaire.addEventListener('click', function(e){

        if(champ.value === ""){
            comment.style.display = "flex";
            e.preventDefault();
        }
    });
})();