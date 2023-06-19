
// 1. goi api khi nguoi nhan submit
// 1.1 lay data o form
const buttonRegister = document.querySelector('.btn-primary');
const nameSelector = document.querySelector('.name');
const email = document.querySelector('.email');
const password = document.querySelector('.password');

function handleClickRegister(event) {
    event.preventDefault();
    // lay value
    const nameValue = nameSelector.value;
    const emailValue = email.value;
    const passwordValue = password.value;

    const data = {
        name: nameValue,
        email: emailValue,
        role: 1,
        password: passwordValue
    };
    // call api
    axios.post('http://localhost:8000/api/v1/register.php', data)
    .then(function (response) {
        if(response.data.code === 201) {
            window.location.href = '/client/login/login.html';
        }
    })
    .catch(function (error) {
        console.log(error);
    });

}

buttonRegister.addEventListener('click', handleClickRegister);
