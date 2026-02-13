document.addEventListener("DOMContentLoaded", () => {
    // Animasi staggered (bertahap) untuk menu item
    const menuItems = document.querySelectorAll(".menu-item");

    menuItems.forEach((item, index) => {
        item.style.opacity = "0";
        item.style.transform = "translateY(20px)";

        setTimeout(
            () => {
                item.style.transition =
                    "all 0.5s cubic-bezier(0.16, 1, 0.3, 1)";
                item.style.opacity = "1";
                item.style.transform = "translateY(0)";
            },
            300 + index * 100,
        ); // Delay 100ms antar item
    });

    // Tambahkan efek klik 'ripple' sederhana (opsional untuk UX)
    menuItems.forEach((item) => {
        item.addEventListener("mousedown", function (e) {
            this.style.transform = "scale(0.98)";
        });
        item.addEventListener("mouseup", function (e) {
            this.style.transform = "";
        });
        item.addEventListener("mouseleave", function (e) {
            this.style.transform = "";
        });
    });
});
