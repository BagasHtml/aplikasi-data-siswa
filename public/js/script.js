const loginForm = document.getElementById("loginForm");
const siswaForm = document.getElementById("siswaForm");
const btnLogin = document.getElementById("btnLogin");
const btnSubmit = document.getElementById("submitBtn");

// Fungsi pembantu untuk efek loading
function setLoader(formElement, buttonElement) {
    if (formElement && buttonElement) {
        formElement.addEventListener("submit", function () {
            buttonElement.innerHTML = "Mohon Tunggu...";
            buttonElement.style.opacity = "0.7";
            buttonElement.style.pointerEvents = "none";
            // JANGAN gunakan e.preventDefault() agar data tetap terkirim ke Laravel
        });
    }
}

setLoader(loginForm, btnLogin);
setLoader(siswaForm, btnSubmit);

/* 2. Animasi Input Focus */
const inputs = document.querySelectorAll("input");
inputs.forEach((input) => {
    input.addEventListener("focus", () => {
        const label = input.parentElement.querySelector("label");
        if (label) label.style.color = "var(--primary-green)";
    });
    input.addEventListener("blur", () => {
        const label = input.parentElement.querySelector("label");
        if (label) label.style.color = "var(--text-main)";
    });
});

/* 3. Konfirmasi Hapus */
function confirmDelete() {
    return confirm(
        "Apakah Anda yakin ingin menghapus data siswa ini? Tindakan ini tidak bisa dibatalkan.",
    );
}

/* 4. Auto-hide Alert Success */
const alertBox = document.getElementById("successAlert");
if (alertBox) {
    setTimeout(() => {
        alertBox.style.opacity = "0";
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 500);
    }, 3000);
}
