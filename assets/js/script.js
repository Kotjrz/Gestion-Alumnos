const radioDni = document.querySelectorAll('.radio-dni');
const radioAr = document.querySelectorAll('.radio-ar');
const radioProv = document.querySelectorAll('.radio-prov');
const radioLoc = document.querySelectorAll('.radio-loc');
const dni_si = document.querySelector('.dni_si');
const dni_no = document.querySelector('.dni_no');
const arg = document.querySelector('.arg');
const prov = document.querySelector('.prov');
const otra = document.querySelector('.otra');
const radioHerm = document.querySelectorAll('.radioHerm');
const hermSi = document.querySelector('.hermSi');



radioDni[0].onclick = () => {

    dni_si.classList.add('active');
    dni_no.classList.remove('active');
}

radioDni[1].onclick = () => {

    dni_si.classList.add('active');
    dni_no.classList.remove('active');
}

radioDni[2].onclick = () => {

    dni_si.classList.add('active');
    dni_no.classList.remove('active');
}

radioDni[3].onclick = () => {

    dni_si.classList.remove('active');
    dni_no.classList.add('active');
}

radioAr[0].onclick = () => {

    arg.classList.add('active');
    otra.classList.remove('active')

}

radioAr[1].onclick = () => {

    arg.classList.remove('active');
    prov.classList.remove('active');
    otra.classList.remove('active');
}

radioProv[0].onclick = () => {

    prov.classList.add('active');
    otra.classList.remove('active');

}

radioProv[1].onclick = () => {

    otra.classList.add('active');
    prov.classList.remove('active');
}

radioHerm[0].onclick = () => {

    hermSi.classList.add('active');
}

radioHerm[1].onclick = () => {

    hermSi.classList.remove('active');
}



// document.getElementById("mySelectDni").onchange = function() {
//     var selectedOption = this.options[this.selectedIndex];
//     document.getElementById("myOutputDni").innerHTML = selectedOption.value;
//   };