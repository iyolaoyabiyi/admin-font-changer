document.addEventListener('DOMContentLoaded', function() {
    var targetElements = document.querySelectorAll('.my-plugin-container, body, button, input, select, textarea');
    var fontSelect = document.querySelector('#admin_font');

    // Apply the selected font on page load
    applyFont(targetElements, fontSelect.value);

    // Apply the selected font when the font selection changes
    fontSelect.addEventListener('change', function() {
        applyFont(targetElements, this.value);
    });

    // Function to apply the font to the target elements
    function applyFont(elements, font) {
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.fontFamily = font;
        }
    }
});