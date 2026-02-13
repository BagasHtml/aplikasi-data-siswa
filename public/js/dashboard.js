// DOM Content Loaded
document.addEventListener("DOMContentLoaded", function () {
    // Add loading animation
    const dashboardCard = document.querySelector(".dashboard-card");
    dashboardCard.style.opacity = "0";
    dashboardCard.style.transform = "translateY(30px)";

    setTimeout(() => {
        dashboardCard.style.transition =
            "all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)";
        dashboardCard.style.opacity = "1";
        dashboardCard.style.transform = "translateY(0)";
    }, 300);

    // Menu item hover effects
    const menuItems = document.querySelectorAll(".menu-item");
    menuItems.forEach((item) => {
        item.addEventListener("mouseenter", function () {
            this.style.transform = "translateX(10px) scale(1.02)";
        });

        item.addEventListener("mouseleave", function () {
            this.style.transform = "translateX(0) scale(1)";
        });
    });

    // Logout confirmation
    const logoutForm = document.getElementById("logout-form");
    if (logoutForm) {
        logoutForm.addEventListener("submit", function (e) {
            e.preventDefault();
            if (confirm("Apakah Anda yakin ingin keluar dari sistem?")) {
                logoutForm.submit();
            }
        });
    }

    // Dynamic username color based on first letter
    const username = document.querySelector(".welcome-text span");
    if (username) {
        const firstLetter = username.textContent.charAt(0).toLowerCase();
        const colors = {
            a: "#ff6b6b",
            b: "#4ecdc4",
            c: "#45b7d1",
            d: "#f9ca24",
            e: "#6c5ce7",
            f: "#fd79a8",
            g: "#00b894",
            h: "#e17055",
            i: "#00cec9",
            j: "#0984e3",
            k: "#6c5ce7",
            l: "#a29bfe",
            m: "#fdcb6e",
            n: "#e84393",
            o: "#00b894",
            p: "#fd79a8",
        };
        const color = colors[firstLetter] || "#667eea";
        username.style.color = color;
    }

    // Add ripple effect to menu items
    menuItems.forEach((item) => {
        item.addEventListener("click", function (e) {
            createRipple(e, this);
        });
    });

    function createRipple(event, button) {
        const circle = document.createElement("span");
        const diameter = Math.max(button.clientWidth, button.clientHeight);
        const radius = diameter / 2;

        circle.style.width = circle.style.height = `${diameter}px`;
        circle.style.left = `${event.clientX - button.offsetLeft - radius}px`;
        circle.style.top = `${event.clientY - button.offsetTop - radius}px`;
        circle.classList.add("ripple");

        const ripple = button.getElementsByClassName("ripple")[0];
        if (ripple) {
            ripple.remove();
        }

        button.appendChild(circle);
    }
});

// Add CSS for ripple effect
const style = document.createElement("style");
style.textContent = `
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s linear;
        pointer-events: none;
    }
    
    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
