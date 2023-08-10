const radioDni = document.querySelectorAll('.radio-dni');
const radioAr = document.querySelectorAll('.radio-ar');
const radioProv = document.querySelectorAll('.radio-prov');
const dni_si = document.querySelector('.dni_si');
const dni_no = document.querySelector('.dni_no');
const arg = document.querySelector('.arg');

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

}

radioAr[1].onclick = () => {

    arg.classList.remove('active');
}

radioProv[0].onclick = () => {

    arg.classList.add('active');
}


















// document.getElementById("mySelectDni").onchange = function() {
//     var selectedOption = this.options[this.selectedIndex];
//     document.getElementById("myOutputDni").innerHTML = selectedOption.value;
//   };