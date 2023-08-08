document.addEventListener('DOMContentLoaded', function() {
    var targetElement = document.querySelector('#wpwrap');
    var fontSelect = document.querySelector('#admin_font');

    // Apply the selected font on page load
    applyFont(targetElement, fontSelect.value);

    // Apply the selected font when the font selection changes
    fontSelect.addEventListener('change', function() {
        applyFont(targetElement, this.value);
    });

    // Function to apply the font to the target element
    function applyFont(element, font) {
        element.style.fontFamily = font;
    }
});