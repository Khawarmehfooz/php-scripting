const sector = document.getElementById('sectors');
const productType = document.getElementById('product-type');
const productContainer = document.getElementById('products-container')
const searchBtn = document.getElementById('search-btn');

function findSectorChild() {
    let sectorChildId = sector.options[sector.selectedIndex].value;
    let url = "find-sector-child.php?sector_child_id=" + sectorChildId;
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            productType.innerHTML = xhr.responseText;
        }
    }
    xhr.send();
}
function findProduct(e) {
    e.preventDefault();
    let sectorVal = sector.options[sector.selectedIndex].value;
    let productTypeVal = productType.options[productType.selectedIndex].value;
    let url = `find-products.php?sectors=${sectorVal}&product-type=${productTypeVal}`
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            productContainer.innerHTML = xhr.responseText;
        }
    }
    xhr.send();

}

sector.addEventListener('change', findSectorChild)
searchBtn.addEventListener('click', findProduct)