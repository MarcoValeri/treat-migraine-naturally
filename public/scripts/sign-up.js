window.onload = () => {

    // Define variables that have DOM elements as values
    const show_password = document.getElementById('show_password');
    const password = document.getElementById('password');
    const confirm_password = document.getElementById('confirm_password');

    // Create an event that shows the password in the form is the user select that option
    show_password.addEventListener('click', e => {
        
        if (password.type === 'password') {
            password.type = 'text';
            confirm_password.type = 'text';
        } else {
            password.type = 'password';
            confirm_password.type = 'password';
        }

    });

}