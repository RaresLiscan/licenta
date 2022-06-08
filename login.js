// JavaScript source code
function switchForm(className, e) { //la login, apas pe register si apare pe pagina
    e.preventDefault();
    const allForm = document.querySelectorAll('form');
    const form = document.querySelector(`form.${className}`);

    allForm.forEach(item => {
        item.classList.remove('active');
    })
    form.classList.add('active');
}

const registerPassword = document.querySelector('form.register #password');
const registerConfirmPassword = document.querySelector('form.register #confirm-password');

registerPassword.addEventListener('input', function (){ //confirm password sa fie acelasi lucru cu password
    registerConfirmPassword.pattern = `${this.value}`;
})