const img = document.getElementById('img');
const fileInput = document.getElementById("file");
const fileLabel = document.getElementById("file__label");
function defaultBtnActive() {
    fileInput.click();
}
fileInput.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = () => {
            const result = reader.result;
            img.src = result;
        };
        reader.readAsDataURL(file);
    }
});
