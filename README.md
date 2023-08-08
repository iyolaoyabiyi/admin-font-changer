# Admin Font Changer

The Admin Font Changer is a WordPress plugin that allows you to change the font used in the WordPress admin area.

## Installation

1. Download the plugin ZIP file.
2. Extract the contents of the ZIP file.
3. Upload the `admin-font-changer` directory to the `wp-content/plugins/` directory of your WordPress installation.
4. Log in to your WordPress admin area and navigate to the **Plugins** page.
5. Locate the "Admin Font Changer" plugin and click the **Activate** button.

## Usage

1. After activating the plugin, a new menu item called "Font Changer" will appear under the **Settings** menu in the WordPress admin area.
2. Click on the "Font Changer" menu item to access the font selection page.
3. On the font selection page, choose the desired font from the dropdown list.
4. Click the **Save Font** button to apply the selected font to the admin area.
5. The font change will take effect immediately, and you will see the updated font throughout the WordPress admin area.

## Custom Fonts

If you want to use a custom font, follow these steps:

1. Upload your custom font file (in `.woff` formats) to a location accessible on your server.
2. Open the `css/admin-style.css` file in the `admin-font-changer` plugin directory.
3. Locate the `@font-face` rule and update the `src` property with the path to your custom font file.
4. Save the changes to the `css/admin-style.css` file.

```css
@font-face {
    font-family: 'CustomFont';
    src: url('path-to-your-font/custom-font.ttf') format('truetype');
}
Replace 'path-to-your-font/custom-font.ttf' with the actual path to your custom font file.

Contributing
Contributions are welcome! If you have any bug reports, feature requests, or suggestions, please open an issue or submit a pull request on the GitHub repository.

Support
If you need any assistance or have questions, feel free to reach out to us by creating an issue on the GitHub repository.

Enjoy customizing your WordPress admin area with the Admin Font Changer plugin!