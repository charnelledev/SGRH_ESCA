<!DOCTYPE html>
<html lang="fr" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil - SGRH ESCA</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script>
    // Toggle theme
    function toggleTheme() {
      document.documentElement.classList.toggle('dark');
    }
  </script>
  <style>
    /* Orbit Loader */
    .orbit-loader {
      width: 64px;
      height: 64px;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .orbit-slice {
      width: 16px;
      height: 16px;
      background: #8b5cf6;
      border-radius: 50%;
      position: absolute;
      animation: orbit 1.2s linear infinite;
    }
    .orbit-slice:nth-child(2) { animation-delay: -0.2s; }
    .orbit-slice:nth-child(3) { animation-delay: -0.4s; }
    .orbit-slice:nth-child(4) { animation-delay: -0.6s; }
    .orbit-slice:nth-child(5) { animation-delay: -0.8s; }
    .orbit-slice:nth-child(6) { animation-delay: -1s; }
    @keyframes orbit {
      0% { transform: rotate(0deg) translateX(32px) rotate(0deg); }
      100% { transform: rotate(360deg) translateX(32px) rotate(-360deg); }
    }

    /* Jelly Loader */
    .container {
      --uib-size: 30px;
      --uib-color: #22c55e;
      --uib-speed: .9s;
      position: relative;
      height: var(--uib-size);
      width: var(--uib-size);
      filter: url('#uib-jelly-ooze');
    }
    .container::before,
    .container::after {
      content: '';
      position: absolute;
      top: 25%;
      left: 25%;
      width: 30%;
      height: 30%;
      background-color: var(--uib-color);
      border-radius: 50%;
    }
    .container::before {
      animation: shift-left var(--uib-speed) ease infinite;
    }
    .container::after {
      animation: shift-right var(--uib-speed) ease infinite, fade var(--uib-speed) ease infinite;
    }
    @keyframes shift-left {
      0%, 100% { transform: translateX(0%); }
      50% { transform: scale(0.65) translateX(-150%); }
    }
    @keyframes shift-right {
      0%, 100% { transform: translateX(0%); }
      50% { transform: scale(0.65) translateX(150%); }
    }
    @keyframes fade {
      0%, 100% { opacity: 1; }
      50% { opacity: 0; }
    }
  </style>
</head>
<body class="bg-white dark:bg-gradient-to-br dark:from-[#1a1824] dark:via-[#1a102f] dark:to-[#0f0c1f] text-gray-900 dark:text-white font-sans">

  <!-- Theme Switch -->
  <div class="fixed top-4 right-4 z-50">
    <button onclick="toggleTheme()" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-xl transition">🎨 Thème</button>
  </div>

  <!-- Header/Navbar -->
  <header class="w-full p-6 flex justify-between items-center shadow-lg bg-white dark:bg-[#1a102f]">
    <div class="text-2xl font-bold text-purple-700 dark:text-purple-400 animate-pulse">SGRH ESCA</div>
    <nav class="space-x-6">
      <a href="#" class="text-purple-600 dark:text-pink-300 hover:text-green-500 transition">Accueil</a>
      <a href="#features" class="text-purple-600 dark:text-pink-300 hover:text-green-500 transition">Fonctionnalités</a>
      <a href="#team" class="text-purple-600 dark:text-pink-300 hover:text-green-500 transition">Équipe</a>
      <a href="#contact" class="text-purple-600 dark:text-pink-300 hover:text-green-500 transition">Contact</a>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="min-h-screen flex items-center justify-center flex-col text-center px-4 bg-[#f9f7fc] dark:bg-transparent" id="hero">
    <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-purple-600 dark:text-purple-300 animate-fade-in">Bienvenue sur le Système de Gestion RH</h1>
    <p class="text-xl text-gray-700 dark:text-pink-200 mb-10 animate-fade-in delay-200">Une solution intelligente pour gérer vos employés avec efficacité.</p>
    <div class="orbit-loader mt-4">
      <div class="orbit-slice"></div><div class="orbit-slice"></div><div class="orbit-slice"></div>
      <div class="orbit-slice"></div><div class="orbit-slice"></div><div class="orbit-slice"></div>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="py-20 px-6">
    <h2 class="text-4xl text-center text-green-500 dark:text-green-300 font-bold mb-10">Fonctionnalités</h2>
    <div class="grid md:grid-cols-3 gap-10">
      <div class="bg-white dark:bg-[#2b1b3a] p-6 rounded-xl shadow-xl" data-sr>
        <h3 class="text-2xl font-semibold text-purple-800 dark:text-purple-200 mb-4">Suivi des employés</h3>
        <p class="text-gray-600 dark:text-pink-100">Gérez les profils, historiques, grades et régions de vos employés.</p>
      </div>
      <div class="bg-white dark:bg-[#2b1b3a] p-6 rounded-xl shadow-xl" data-sr>
        <h3 class="text-2xl font-semibold text-purple-800 dark:text-purple-200 mb-4">Exports Excel & PDF</h3>
        <p class="text-gray-600 dark:text-pink-100">Générez rapidement des rapports exportables pour vos ressources humaines.</p>
      </div>
      <div class="bg-white dark:bg-[#2b1b3a] p-6 rounded-xl shadow-xl" data-sr>
        <h3 class="text-2xl font-semibold text-purple-800 dark:text-purple-200 mb-4">Interface intuitive</h3>
        <p class="text-gray-600 dark:text-pink-100">Une navigation fluide avec design moderne et animations douces.</p>
      </div>
    </div>
    <div class="mt-16 flex justify-center">
      <div class="container"></div>
    </div>
  </section>

  <!-- Carousel/Slider Section -->
  <section class="py-20 bg-[#f3f2f7] dark:bg-[#1a102f]" id="partners">
    <h2 class="text-center text-4xl text-purple-600 dark:text-violet-300 font-bold mb-12">Nos partenaires</h2>
    <div class="overflow-x-auto whitespace-nowrap space-x-10 px-6 flex items-center">
      <img src="/images/partner1.png" class="h-16 inline-block" alt="Partenaire 1" />
      <img src="/images/partner2.png" class="h-16 inline-block" alt="Partenaire 2" />
      <img src="/images/partner3.png" class="h-16 inline-block" alt="Partenaire 3" />
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-[#eee] dark:bg-[#0e081c] py-10 text-center text-gray-700 dark:text-gray-300">
    <p>&copy; 2025 SGRH ESCA - Tous droits réservés</p>
  </footer>

  <svg width="0" height="0">
    <defs>
      <filter id="uib-jelly-ooze">
        <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur"></feGaussianBlur>
        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="ooze"></feColorMatrix>
        <feBlend in="SourceGraphic" in2="ooze"></feBlend>
      </filter>
    </defs>
  </svg>

  <script>
    ScrollReveal().reveal('[data-sr]', {
      delay: 200,
      duration: 1000,
      origin: 'bottom',
      distance: '30px',
      easing: 'ease-in-out'
    });
  </script>
</body>
</html>
 <div class="orbit-loader mb-6">
      <div class="orbit-slice"></div><div class="orbit-slice"></div><div class="orbit-slice"></div><div class="orbit-slice"></div><div class="orbit-slice"></div><div class="orbit-slice"></div>
    </div>

    
			<div>
				<p><font dir="auto" style="vertical-align: inherit;"><font dir="auto" style="vertical-align: inherit;">Trouvez rapidement des SVG. Concevez plus vite.</font></font></p>
				<p><font dir="auto" style="vertical-align: inherit;"><font dir="auto" style="vertical-align: inherit;">Avec des milliers de graphiques exclusifs à portée de main, rien ne peut vous ralentir.</font></font></p>
				<a href="/subscribe/?c=head" class="btn-pro" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 24"><path d="m18 0 8 12 10-8-4 20H4L0 4l10 8 8-12z"></path></svg><font dir="auto" style="vertical-align: inherit;"><font dir="auto" style="vertical-align: inherit;">Obtenez un accès complet</font></font></a>
			</div>
		<!-- <img src="/wp-content/uploads/2023/04/gem-duo-tone-icon.png" alt="premium graphic gem icon"/> -->
		</div>
            tab-size: 4;
    font-feature-settings: normal;
    font-variation-settings: normal;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: transparent;
    --ait-height-vh-100: 100vh;
    --ait-height-100: 100dvh;
    --ait-height-vh-95: 95vh;
    --ait-height-95: 95dvh;
    --ait-height-vh-90: 90vh;
    --ait-height-90: 90dvh;
    --ait-height-vh-75: 75vh;
    --ait-height-75: 75dvh;
    --ait-main-color: 1, 167, 125;
    --ait-master-color: 1, 167, 125;
    --ait-primary-color: rgba(var(--ait-fg-rgb), .8);
    --ait-primary-text-color: rgba(var(--ait-fg-rgb), .8);
    --ait-primary-content-text-color: rgba(var(--ait-fg-rgb), .65);
    --ait-primary-title-color: rgba(var(--ait-fg-rgb), .8);
    --ait-secondary-text-color: rgba(var(--ait-fg-rgb), .4);
    --ait-bg-opacity: 1;
    --ait-html-bg-color: rgb(240, 242, 245);
    --ait-option-bg-color: #f0f2f5;
    --ait-option-card-bg-color: white;
    --ait-option-card-border: 1px solid #f0f0f0;
    --ait-border-radius-lg: 12px;
    --ait-border-radius: 8px;
    --ait-sidebar-bg-color: #fff;
    --ait-sidebar-shadow: 0px 0px 10px rgba(0, 0, 0, .3);
    --ait-sidebar-border-color: #ececec;
    --ait-sidebar-icon-color: #545758;
    --ait-sidebar-icon-hover-color: rgba(var(--ait-main-color), .1);
    --ait-sidebar-icon-border-color: #ececee;
    --ait-sidebar-scrollbar-color: #e1e1e1;
    --ait-sidebar-scrollbar-hover-color: #d9d9d9;
    --ait-fg-rgb: 0, 0, 0;
    --ait-bg-rgb: 255, 255, 255;
    --ait-switchbar-bg-color: #f0f1f5;
    --ait-switchbar-btn-hover-bg-color: #e9e9ef;
    --ait-switchbar-shadow: 0px 4px 12px 0px rgba(0, 0, 0, .15);
    --ait-tab-menu-hover-bg-color: rgba(var(--ait-main-color), .1);
    --ait-tab-menu-hover-text-color: var(--ait-primary-text-color);
    --ait-tab-menu-active-bg-color: rgba(var(--ait-main-color), .9);
    --ait-tab-menu-active-orange-bg-color: rgba(224, 124, 13, .9);
    --ait-tab-menu-disabled-bg-color: rgba(var(--ait-main-color), .2);
    --ait-tab-menu-active-bg-active-color: rgb(0, 211, 157);
    --ait-tab-menu-active-text-color: #fff;
    --ait-loading-color: #fff;
    --ait-link-color: rgba(var(--ait-main-color), .9);
    --ait-master-link-color: rgba(var(--ait-master-color), .6);
    --ait-master-link-hover-color: rgba(var(--ait-master-color), 1);
    --ait-download-button-bg-color: rgba(255, 255, 255, .5);
    --ait-loading-bg-color: #f5f5f5;
    --ait-border-color: rgba(0, 0, 0, .15);
    --ait-pre-bg: rgba(var(--ait-fg-rgb), .05);
    --ait-sidebar-bg-color-sub: rgba( 245, 245, 245, var(--ait-bg-opacity) ) !important;
    --ait-border-spacing-x: 0;
    --ait-border-spacing-y: 0;
    --ait-translate-x: 0;
    --ait-translate-y: 0;
    --ait-rotate: 0;
    --ait-skew-x: 0;
    --ait-skew-y: 0;
    --ait-scale-x: 1;
    --ait-scale-y: 1;
    --ait-pan-x: ;
    --ait-pan-y: ;
    --ait-pinch-zoom: ;
    --ait-scroll-snap-strictness: proximity;
    --ait-gradient-from-position: ;
    --ait-gradient-via-position: ;
    --ait-gradient-to-position: ;
    --ait-ordinal: ;
    --ait-slashed-zero: ;
    --ait-numeric-figure: ;
    --ait-numeric-spacing: ;
    --ait-numeric-fraction: ;
    --ait-ring-inset: ;
    --ait-ring-offset-width: 0px;
    --ait-ring-offset-color: #fff;
    --ait-ring-color: rgba(59, 130, 246, .5);
    --ait-ring-offset-shadow: 0 0 rgba(0,0,0,0);
    --ait-ring-shadow: 0 0 rgba(0,0,0,0);
    --ait-shadow: 0 0 rgba(0,0,0,0);
    --ait-shadow-colored: 0 0 rgba(0,0,0,0);
    --ait-blur: ;
    --ait-brightness: ;
    --ait-contrast: ;
    --ait-grayscale: ;
    --ait-hue-rotate: ;
    --ait-invert: ;
    --ait-saturate: ;
    --ait-sepia: ;
    --ait-drop-shadow: ;
    --ait-backdrop-blur: ;
    --ait-backdrop-brightness: ;
    --ait-backdrop-contrast: ;
    --ait-backdrop-grayscale: ;
    --ait-backdrop-hue-rotate: ;
    --ait-backdrop-invert: ;
    --ait-backdrop-opacity: ;
    --ait-backdrop-saturate: ;
    --ait-backdrop-sepia: ;
    --ait-contain-size: ;
    --ait-contain-layout: ;
    --ait-contain-paint: ;
    --ait-contain-style: ;
    --fa-font-solid: normal 900 1em/1 "Font Awesome 6 Free";
    --fa-font-regular: normal 400 1em/1 "Font Awesome 6 Free";
    --fa-font-light: normal 300 1em/1 "Font Awesome 6 Pro";
    --fa-font-thin: normal 100 1em/1 "Font Awesome 6 Pro";
    --fa-font-duotone: normal 900 1em/1 "Font Awesome 6 Duotone";
    --fa-font-duotone-regular: normal 400 1em/1 "Font Awesome 6 Duotone";
    --fa-font-duotone-light: normal 300 1em/1 "Font Awesome 6 Duotone";
    --fa-font-duotone-thin: normal 100 1em/1 "Font Awesome 6 Duotone";
    --fa-font-brands: normal 400 1em/1 "Font Awesome 6 Brands";
    --fa-font-sharp-solid: normal 900 1em/1 "Font Awesome 6 Sharp";
    --fa-font-sharp-regular: normal 400 1em/1 "Font Awesome 6 Sharp";
    --fa-font-sharp-light: normal 300 1em/1 "Font Awesome 6 Sharp";
    --fa-font-sharp-thin: normal 100 1em/1 "Font Awesome 6 Sharp";
    --fa-font-sharp-duotone-solid: normal 900 1em/1 "Font Awesome 6 Sharp Duotone";
    --fa-font-sharp-duotone-regular: normal 400 1em/1 "Font Awesome 6 Sharp Duotone";
    --fa-font-sharp-duotone-light: normal 300 1em/1 "Font Awesome 6 Sharp Duotone";
    --fa-font-sharp-duotone-thin: normal 100 1em/1 "Font Awesome 6 Sharp Duotone";
    --wp--preset--font-size--normal: 16px;
    --wp--preset--font-size--huge: 42px;
    --wp--preset--aspect-ratio--square: 1;
    --wp--preset--aspect-ratio--4-3: 4/3;
    --wp--preset--aspect-ratio--3-4: 3/4;
    --wp--preset--aspect-ratio--3-2: 3/2;
    --wp--preset--aspect-ratio--2-3: 2/3;
    --wp--preset--aspect-ratio--16-9: 16/9;
    --wp--preset--aspect-ratio--9-16: 9/16;
    --wp--preset--color--black: #000000;
    --wp--preset--color--cyan-bluish-gray: #abb8c3;
    --wp--preset--color--white: #ffffff;
    --wp--preset--color--pale-pink: #f78da7;
    --wp--preset--color--vivid-red: #cf2e2e;
    --wp--preset--color--luminous-vivid-orange: #ff6900;
    --wp--preset--color--luminous-vivid-amber: #fcb900;
    --wp--preset--color--light-green-cyan: #7bdcb5;
    --wp--preset--color--vivid-green-cyan: #00d084;
    --wp--preset--color--pale-cyan-blue: #8ed1fc;
    --wp--preset--color--vivid-cyan-blue: #0693e3;
    --wp--preset--color--vivid-purple: #9b51e0;
    --wp--preset--color--purple: #808;
    --wp--preset--color--dark: #404;
    --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);
    --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);
    --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);
    --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);
    --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);
    --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);
    --wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);
    --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);
    --wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);
    --wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);
    --wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);
    --wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);
    --wp--preset--font-size--small: 13px;
    --wp--preset--font-size--medium: 20px;
    --wp--preset--font-size--large: 36px;
    --wp--preset--font-size--x-large: 42px;
    --wp--preset--spacing--20: 0.44rem;
    --wp--preset--spacing--30: 0.67rem;
    --wp--preset--spacing--40: 1rem;
    --wp--preset--spacing--50: 1.5rem;
    --wp--preset--spacing--60: 2.25rem;
    --wp--preset--spacing--70: 3.38rem;
    --wp--preset--spacing--80: 5.06rem;
    --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
    --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
    --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
    --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
    --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
    --BG-size: cover;
    --BG-color: none;
    --BG-image: none;
    --BG-repeat: no-repeat;
    --BG-position: center;
    --BG-attachment: scroll;
    --HEAD-MASK: "";
    --FOOT-MASK: "";
    --above-bg: "linear-gradient(#22347F, #22347F)";
    --main-bg: "";
    --below-bg: "";
    --mask-head-size: calc(.1 * 100cqw);
    --mask-foot-size: calc(.1 * 100cqw);
    --IMG-width: 400px;
    --IMG-padding: 5%;
    --IMG-ratio: 3;
    --IMG-backgroundColor: #FFF;
    direction: ltr;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-weight: 400;
    text-align: left;
    line-height: 1.2;
    font-size: 1.2rem;
    box-sizing: border-box;
    display: grid;
    grid-template-columns: 1fr;
    border-radius: 15px;
    color: #FFF;
    background-color: #404;
    background-image: radial-gradient(circle at top left, #404 30%, rgba(68, 0, 68, 0.7) 65%, rgba(68, 0, 68, 0) 100%), url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2000 1500'%3E%3Cdefs%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='0' y1='750' x2='1550' y2='750'%3E%3Cstop offset='0' stop-color='%23440044'/%3E%3Cstop offset='.5' stop-color='%23650065'/%3E%3Cstop offset='1' stop-color='%23606' /%3E%3C/linearGradient%3E%3Cpath id='s' fill='url(%23b)' d='M1549.2 51.6c-5.4 99.1-20.2 197.6-44.2 293.6c-24.1 96-57.4 189.4-99.3 278.6c-41.9 89.2-92.4 174.1-150.3 253.3c-58 79.2-123.4 152.6-195.1 219c-71.7 66.4-149.6 125.8-232.2 177.2c-82.7 51.4-170.1 94.7-260.7 129.1c-90.6 34.4-184.4 60-279.5 76.3C192.6 1495 96.1 1502 0 1500c96.1-2.1 191.8-13.3 285.4-33.6c93.6-20.2 185-49.5 272.5-87.2c87.6-37.7 171.3-83.8 249.6-137.3c78.4-53.5 151.5-114.5 217.9-181.7c66.5-67.2 126.4-140.7 178.6-218.9c52.3-78.3 96.9-161.4 133-247.9c36.1-86.5 63.8-176.2 82.6-267.6c18.8-91.4 28.6-184.4 29.6-277.4c0.3-27.6 23.2-48.7 50.8-48.4s49.5 21.8 49.2 49.5c0 0.7 0 1.3-0.1 2L1549.2 51.6z' /%3E%3Cg id='g'%3E%3Cuse href='%23s' transform='scale(0.15) rotate(60)' /%3E%3Cuse href='%23s' transform='scale(0.3) rotate(-20)' /%3E%3Cuse href='%23s' transform='scale(0.7) rotate(10)' /%3E%3Cuse href='%23s' transform='scale(0.93) rotate(40)' /%3E%3Cuse href='%23s' transform='scale(1.2) rotate(8)' /%3E%3Cuse href='%23s' transform='scale(1.45) rotate(-30)' /%3E%3C/g%3E%3Cg id='h'%3E%3Cuse href='%23s' transform='scale(0.2) rotate(10)' /%3E%3Cuse href='%23s' transform='scale(0.4) rotate(-30)' /%3E%3Cuse href='%23s' transform='scale(0.6) rotate(60)' /%3E%3Cuse href='%23s' transform='scale(1.05) rotate(25)' /%3E%3C/g%3E%3Cg id='i'%3E%3Cuse href='%23s' transform='scale(0.25) rotate(40)' /%3E%3Cuse href='%23s' transform='scale(0.5) rotate(20)' /%3E%3Cuse href='%23s' transform='scale(0.81) rotate(-40)' /%3E%3Cuse href='%23s' transform='scale(1.333) rotate(-60)' /%3E%3Cuse href='%23s' transform='scale(1.6) rotate(10)' /%3E%3C/g%3E%3C/defs%3E%3Cg %3E%3Cg transform='translate(0 750)'%3E%3Cg%3E%3Cuse href='%23g' transform='rotate(10)' /%3E%3Cuse href='%23g' transform='rotate(120)' /%3E%3Cuse href='%23g' transform='rotate(240)' /%3E%3CanimateTransform attributeName='transform' type='rotate' dur='120s' values='720%3B0' repeatCount='2'%3E%3C/animateTransform%3E%3C/g%3E%3Cg%3E%3Cuse href='%23h' transform='rotate(10)' /%3E%3Cuse href='%23h' transform='rotate(120)' /%3E%3Cuse href='%23h' transform='rotate(240)' /%3E%3CanimateTransform attributeName='transform' type='rotate' dur='120s' values='1080%3B0' repeatCount='2'%3E%3C/animateTransform%3E%3C/g%3E%3Cg%3E%3Cuse href='%23i' transform='rotate(10)' /%3E%3Cuse href='%23i' transform='rotate(120)' /%3E%3Cuse href='%23i' transform='rotate(240)' /%3E%3CanimateTransform attributeName='transform' type='rotate' dur='120s' values='1440%3B0' repeatCount='2'%3E%3C/animateTransform%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    background-size: cover;
    padding: 20px;
    document.querySelector("#set-details > div.explainerAA > div")