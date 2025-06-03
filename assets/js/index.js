document.addEventListener("DOMContentLoaded", () => {
    const loginLayout = document.getElementById("login-layout");
    const registerLayout = document.getElementById("register-layout");

    document.getElementById("mostrar-registro").addEventListener("click", () => {
        loginLayout.classList.remove("active");
        registerLayout.classList.add("active");
    });

    document.getElementById("mostrar-login").addEventListener("click", () => {
        registerLayout.classList.remove("active");
        loginLayout.classList.add("active");
    });
});
