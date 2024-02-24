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
echo <<<EOF
darkMode: "class",
    theme: {
      fontFamily: {
        sans: ["Roboto", "sans-serif"],
        body: ["Roboto", "sans-serif"],
        mono: ["ui-monospace", "monospace"],
      },
    },
    corePlugins: {
      preflight: false,
    },
  };
  ;
EOF;
echo '</script>';
?>
