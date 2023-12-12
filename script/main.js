window.onload = function () {
    let login = document.getElementById("login");
    let regForm = document.getElementsByClassName("container");
    let regBtn = document.getElementsByClassName("registerbtn");
    let cancelBtn = document.getElementsByClassName("cancelbtn");

    regForm.style.display = 'none';
    regBtn.onclick = function () {
        regForm.style.display = 'block';
    };

    let first_pass = regForm.pass1;
    let confirm_pass = form.confirm_pass;
    first_pass.onchange = checkPassword;
    confirm_pass.onchange = checkPassword;

    login.onclick = function () {
        alert("You cannot login because required fields are left blank!");
    }

    function checkPassword() {
        let regForm = document.getElementById("registration-form");
        let confirm_pass = form.confirm_pass;
        let errors = '';
        if (first_pass.value === confirm_pass.value) {
            first_pass.setCustomValidity('');
        } else {
            errors += "Passwords do not match. Try again.";
        }
        if (first_pass.value.length < 8)
            errors += "Too short";
        if (first_pass.value.match(/[^a-zA-Z0-9]/))
            errors += "Only alphanumeric characters allowed!";
        if (!first_pass.value.match(/[a-z]/))
            errors += "Your password must contain a lower case letter!"
        if (!first_pass.value.match(/[A-Z]/))
            errors += "Your password must contain at least an upper case letter";
        if (!first_pass.value.match(/[0-9]/)) {
            errors += "Your password should contain at least one number";
        }
        first_pass.setCustomValidity(errors);
        first_pass.reportValidity();
    }

    function validateEmployeeForm() {
        const emailAddress = document.getElementById("emailAddress");
        const userPassword = document.getElementById("employeePassword");
        if (!emailAddress.checkValidity() && !userPassword.checkValidity() || !emailAddress.checkValidity() || !employeePassword.checkValidity()) {
            document.getElementById("employeeEmail").innerHTML = employeeEmail.validationMessage;
            document.getElementById("employeePassword").innerHTML = employeePassword.validationMessage;
        } else {
            location.replace("stock-page.html");
        }
    }
}