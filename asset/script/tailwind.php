<?php
echo "<!-- Roboto font -->";
echo '<link rel="icon" type="image/svg+xml" href="/vite.svg" />';
echo '<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />';
echo '<!-- TW Elements styles-->';
echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />';
echo '<!-- Tailwind CSS config -->';
echo '<script src="https://cdn.tailwindcss.com/3.3.0"></script>';

echo '<script>';
echo 'tailwind.config = {';
echo 'darkMode: "class",';
echo 'theme: {';
echo 'fontFamily: {';
echo 'sans: ["Roboto", "sans-serif"],';
echo 'body: ["Roboto", "sans-serif"],';
echo 'mono: ["ui-monospace", "monospace"],';
echo '},';
echo '},';
echo 'corePlugins: {';
echo 'preflight: false,';
echo '},';
echo '};';
echo ';';
echo '</script>';
?>
