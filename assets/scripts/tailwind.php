<?php
echo <<<EOF
<!-- Roboto font -->
<link rel="icon" type="image/svg+xml" href="/vite.svg" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
<!-- TW Elements styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
<!-- Tailwind CSS config -->
<script src="https://cdn.tailwindcss.com/3.3.0"></script>
EOF;


echo <<<EOF

<script>
tailwind.config = {
  darkMode: "class",
  theme: {
      extend: {
      colors: {
        'bg-primary': '#0958cf',
      },
    },
    fontFamily: {
      sans: ["Sarabun", "Roboto", "sans-serif"],
      body: ["Sarabun", "Roboto", "sans-serif"],
      mono: ["ui-monospace", "monospace"],
    },
    safelist: ["[fade-in-down_0.5s_ease-out]"]
  },
  corePlugins: {
    preflight: false,
  }
};
</script>
EOF;
?>
