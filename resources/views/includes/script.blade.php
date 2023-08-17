<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const imageButton = document.querySelector(".image-button");
        const imageInput = document.getElementById("imageInput");
        imageButton.addEventListener("click", function () {
            imageInput.click();
        });
        imageInput.addEventListener("change", function (event) {
            const selectedFile = event.target.files[0];
        });
    });
</script>
</body>
</html>
