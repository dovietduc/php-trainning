const buttonLogin = document.querySelector('.btn-primary');
const email = document.querySelector('.email');
const password = document.querySelector('.password');


function handleLogin(event) {
    event.preventDefault();
    const valueEmail = email.value;
    const valuePassword = password.value;
    const data = {
        email: valueEmail,
        password: valuePassword
    }

    // call api login
    axios.post('http://localhost:8000/api/v1/login.php', data)
    .then(function (response) {
        if(response.data.code === 200) {
            // lưu token đến client
            localStorage.setItem('token', response.data.token);
            // redirect to home page
            window.location.href = '/client/home/home.html';
        }
    })
    .catch(function (error) {
        console.log(error);
    });
    
}


buttonLogin.addEventListener('click', handleLogin);


// quy trình:
// 1. login server tạo ra jwt token
// 2. client lưu thông tin jwt

// 3.1 client add token to server
// 3.2 serve check token valid
// 3.3 serve return data news 

// 4. khi phai trang nao khác yêu cầu đăng nhập lặp lại bước 3