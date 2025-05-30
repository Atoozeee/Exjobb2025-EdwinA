<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22256%22 height=%22256%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 rx=%2220%22 fill=%22%236ec007%22></rect><path d=%22M51.98 88.52L51.98 88.52Q56.57 88.52 60.94 86.31Q65.30 84.11 68.36 79.70L68.36 79.70L68.99 80.78Q65.75 86.63 59.05 89.87Q52.34 93.11 45.14 93.11Q37.94 93.11 32.68 89.42Q27.41 85.73 27.41 78.89L27.41 78.89Q27.41 71.06 33.71 65.39L33.71 65.39Q36.77 62.69 39.74 60.71Q42.71 58.73 46.67 56.30L46.67 56.30Q53.15 52.25 53.15 51.26L53.15 51.26Q53.15 50.90 52.34 50.90Q51.53 50.90 43.97 51.89Q36.41 52.88 33.53 52.88L33.53 52.88Q19.40 52.88 19.40 44.24L19.40 44.24Q19.40 38.30 24.94 32.31Q30.47 26.33 38.34 21.92Q46.22 17.51 54.59 14Q62.96 10.49 68.90 8.69Q74.84 6.89 76.37 6.89Q77.90 6.89 79.25 8.02Q80.60 9.14 80.60 10.58L80.60 10.58Q80.60 13.10 77.22 15.08Q73.85 17.06 70.43 17.78L70.43 17.78L67.10 18.50Q66.20 18.50 66.20 17.87Q66.20 17.24 67.19 16.25Q68.18 15.26 68.18 15.08Q68.18 14.90 67.28 14.90Q66.38 14.90 59.50 17.15Q52.61 19.40 44.56 22.69Q36.50 25.97 30.20 30.42Q23.90 34.88 23.90 38.57L23.90 38.57Q23.90 43.79 34.61 43.79L34.61 43.79Q39.11 43.79 46.27 43.29Q53.42 42.80 56.12 42.80L56.12 42.80Q60.89 42.80 60.89 46.40L60.89 46.40Q60.89 47.84 58.78 49.73Q56.66 51.62 52.30 54.45Q47.93 57.29 44.92 59.49Q41.90 61.70 39.34 65.57Q36.77 69.44 36.77 73.94L36.77 73.94Q36.77 88.52 51.98 88.52Z%22 fill=%22%23fff%22></path></svg>" />
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const langToggle = document.getElementById("lang-toggle");
      let currentLang = localStorage.getItem("siteLanguage") || "sv";

      function updateText(lang) {
        document.querySelectorAll("[data-key]").forEach(el => {
          const key = el.getAttribute("data-key");
          el.textContent = translations[lang][key] || `[${key}]`;
        });

        langToggle.textContent = lang === "sv" ? "English" : "Svenska";
        localStorage.setItem("siteLanguage", lang);
        currentLang = lang;
      }

      langToggle.addEventListener("click", () => {
        const newLang = currentLang === "sv" ? "en" : "sv";
        updateText(newLang);
      });

      updateText(currentLang);
    });
  </script>
  <title><?php wp_title('|', true, 'right'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <nav class="navbar">
    <ul class="nav-links">
      <li><button class="nav-btn"><a href="/">Edvintorp</a></button></li>
      <li><button class="nav-btn"><a href="/booking" data-key="nav_booking"></a></button></li>
      <li><button class="nav-btn" id="lang-toggle">English</button></li>
    </ul>
  </nav>
</header>
