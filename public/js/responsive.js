(function(){
    var burger = document.querySelector('.burger');
    var nav = document.querySelector('#'+burger.dataset.target);

    burger.addEventListener('click', function(){
        burger.classList.toggle('is-active');
        nav.classList.toggle('is-active');
    });
})();


(function(){

    var formulaire = document.getElementById("submitcomment");
    var champ = document.getElementById('contentcomment');
    var comment = document.getElementById('commentValid');

    formulaire.addEventListener('click', function(){

        console.log('test');
            comment.style.display = "flex";

    });
})();