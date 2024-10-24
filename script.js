document.addEventListener("DOMContentLoaded", function() {
    const menuIcon = document.querySelector(".icon-menu");
    const mobileMenu = document.getElementById("menu-mobile");

    menuIcon.addEventListener("click", function() {
        if (mobileMenu.style.display === "none" || mobileMenu.style.display === "") {
            mobileMenu.style.display = "block";
        } else {
            mobileMenu.style.display = "none";
        }
    });
});
