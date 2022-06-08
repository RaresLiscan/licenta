// JavaScript source code
//pentru bara de navigare
const navSlide = () => { //vrem ca atunci cand apasa pe burger(Cele 3 liniute), nav-linkul sa ia clasa nav-active
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li'); //ca sa punem linkurile de navigare sa apara in partea dreapta

    burger.addEventListener('click', () => { //cand facem click vrem sa ruleze o functie
        nav.classList.toggle('nav-active');

        //sa animam linkurile MA MAI GANDESC DACA PASTREZ ASTA
        navLinks.forEach((link, index) => { //pentru fiecare link vom rula o functie
            if (link.style.animation) {
                link.style.animation = ''; //dupa ce inchidem bara din dreapta, cand o redeschidem vrem sa faca din nou smecheria
            }
            else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 5 + 0.5}s`;
            }
            //delay egal intre fiecare nav link, de aceea avem nevoie si de index
            //1.5 este ca sa inceapa si primul automat cu un delay
        });
        //Animatia pt burger
        burger.classList.toggle('toggle');
    });
}
//trebuie invocata functia
navSlide();