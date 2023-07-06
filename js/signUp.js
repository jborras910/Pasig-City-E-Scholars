let togglePassword = document.getElementById("toggle-password1");
let togglePassword2 = document.getElementById("toggle-password2");

togglePassword.addEventListener("click", PasswordToggle);

togglePassword2.addEventListener("click", PasswordToggle2);

function PasswordToggle() {
  let x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    togglePassword.classList.add("fa-eye-low-vision");
    togglePassword.classList.remove("fa-eye");
  } else {
    x.type = "password";
    togglePassword.classList.remove("fa-eye-low-vision");
    togglePassword.classList.add("fa-eye");
  }
}

function PasswordToggle2() {
  let y = document.getElementById("password2");
  if (y.type === "password") {
    y.type = "text";
    togglePassword2.classList.add("fa-eye-low-vision");
    togglePassword2.classList.remove("fa-eye");
  } else {
    y.type = "password";
    togglePassword2.classList.remove("fa-eye-low-vision");
    togglePassword2.classList.add("fa-eye");
  }
}
