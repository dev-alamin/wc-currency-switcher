# Currency Switcher Plugin

The Currency Switcher Plugin is a WordPress plugin that allows you to display product prices in different currencies based on the visitor's location. It uses the MaxMind GeoDB for accurate location detection. The plugin also ensures that the WooCommerce backend settings align with the selected currency for accurate invoicing.

## Features

- Automatically detects visitor's location using the MaxMind GeoDB and displays prices in their local currency.
- Allows the admin to set custom prices for each country through the plugin's options page.
- Ensures that the WooCommerce backend settings match the selected currency for accurate invoicing.

## Image
![See in action](./assets/images/wc-currency-switcher-image.png)
## Installation

1. Download the plugin files and extract them.
2. Upload the `currency-switcher-plugin` directory to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

1. Once the plugin is activated, it will automatically detect the visitor's location using the MaxMind GeoDB.
2. Admin can set custom prices for each country through the plugin's options page.
3. The plugin ensures that the WooCommerce backend settings match the selected currency for accurate invoicing.

## Configuration

To configure the plugin, follow these steps:

1. Go to the WordPress dashboard.
2. Navigate to the "Currency Switcher" menu.
3. You will find a sub-page for each country. Click on the desired country sub-page.
4. Set the custom price for the country and save the changes.
5. Repeat the process for other countries as needed.

## Contributors

- Al Amin (@dev-alamin)

## License

This project is licensed under the [MIT License](LICENSE).
