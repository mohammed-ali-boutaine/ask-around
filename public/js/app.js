const profileButton = document.getElementById("profile-menu-button");
const dropdownMenu = profileButton.nextElementSibling;
const modal = document.getElementById("questionModal");
const menuButton = document.getElementById("menu-button");
let isOpen = false;

profileButton.addEventListener("mouseenter", () => {
    dropdownMenu.classList.remove("hidden");
});

dropdownMenu.addEventListener("mouseleave", () => {
    dropdownMenu.classList.add("hidden");
});

function toggleDropdown() {
    isOpen = !isOpen;
    dropdownMenu.classList.toggle("active");
    menuButton.setAttribute("aria-expanded", isOpen);
}

// Close dropdown when clicking outside
document.addEventListener("click", function (event) {
    const isClickInside =
        menuButton.contains(event.target) ||
        dropdownMenu.contains(event.target);

    if (!isClickInside && isOpen) {
        isOpen = false;
        dropdownMenu.classList.remove("active");
        menuButton.setAttribute("aria-expanded", "false");
    }
});

function openModal() {
    modal.style.display = "block";
    document.body.style.overflow = "hidden";
}

function closeModal() {
    modal.style.display = "none";
    document.body.style.overflow = "auto";
}

window.onclick = function (event) {
    if (event.target == modal) {
        closeModal();
    }
};

document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        closeModal();
    }
});
