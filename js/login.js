let togglePassword = document.getElementById("toggle-password");

togglePassword.addEventListener("click", PasswordToggle);

function PasswordToggle() {
  var x = document.getElementById("password");
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
