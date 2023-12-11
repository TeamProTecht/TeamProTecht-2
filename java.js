function searchSQL(){
// call SQL table for products with name
}
function myPrices() {
    document.getElementById("myPriceDropdown").classList.toggle("show");
}
function myColours() {
    document.getElementById("myColourDropdown").classList.toggle("show");
}
function myBrands() {
    document.getElementById("myBrandDropdown").classList.toggle("show");
}
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}