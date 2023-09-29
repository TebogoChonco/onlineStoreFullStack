document.addEventListener("DOMContentLoaded", function () {
    var addBtn = document.getElementById("addBtn");
    var modal = document.getElementById("productModal");
    var closeButton = document.getElementsByClassName("close")[0];

    function openModal() {
        modal.style.display = "block";
    }

    function closeModal() {
        modal.style.display = "none";
    }

    addBtn.addEventListener("click", openModal);
    closeButton.addEventListener("click", closeModal);

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});
