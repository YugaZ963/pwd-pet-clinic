// toggle class active untuk account
const account = document.querySelector('.account');
document.querySelector('#account-button').onclick = (e) => {
    account.classList.toggle('active');
    e.preventDefault();
}

// klik di luar element
const acc = document.querySelector('#account-button');

document.addEventListener('click', function (e) {
    if (!acc.contains(e.target) && !account.contains(e.target)) {
        account.classList.remove('active');
    }
});
