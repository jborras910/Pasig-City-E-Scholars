const toggleMenu = document.getElementById("toggleMenu");

toggleMenu.addEventListener("click", function () {
  let icon = document.getElementById("icon");

  if (icon.className === "fa-solid fa-bars") {
    icon.classList.add("fa-xmark");
    icon.classList.remove("fa-bars");
  } else {
    icon.classList.remove("fa-xmark");
    icon.classList.add("fa-bars");
  }
});
