<script>
  import { onMount } from "svelte";
  import {
    Router,
    Route,
    Link,
  } from "svelte-routing";
  import Home from "./pages/Home.svelte";
  import Interests from "./pages/Interests.svelte";
  import Portfolio from "./pages/Portfolio.svelte";
  import Blahaj from "./pages/portfolio/Blahaj.svelte";
  import Sapphify from "./pages/portfolio/Sapphify.svelte";
  import Website from "./pages/portfolio/Website.svelte";
  import Donate from "./pages/Donate.svelte";
  import FAQ from "./pages/FAQ.svelte";
  import PrivacyPolicy from "./pages/PrivacyPolicy.svelte";

  let currentLocation = "";
  let isMobile;

  if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    isMobile = true;
  }

  onMount(() => {
    currentLocation = window.location.pathname;
  });

  const handleLinkClick = location => {
    currentLocation = location;
  }
</script>

<Router>
  <header class="header flex flex-1 flex-col sm:flex-row md:flex-row right-1/2 bg-black/80 fixed top-0 left-0 backdrop-filter backdrop-blur-md items-center justify-between w-full z-100">
    <Link on:click={() => handleLinkClick("/")} to="/" class="logo text-white"><span>sec</span>h1p</Link>
    <nav class="navbar flex flex-col sm:flex-row md:flex-row items-center justify-center text-xl text-white">
      <Link
        to="/"
        on:click={() => handleLinkClick("/")}
        class="{currentLocation === '/' ? 'active' : ''} nav-link block sm:inline md:inline"
      >
        Home
      </Link>
      <Link
        to="/interests"
        on:click={() => handleLinkClick("/interests")}
        class="{currentLocation === '/interests' ? 'active' : ''} nav-link"
      >
        My interests
      </Link>
      <Link
        to="/portfolio"
        on:click={() => handleLinkClick("/portfolio")}
        class="{currentLocation === '/portfolio' ? 'active' : ''} nav-link"
      >
        Portfolio
      </Link>
      <Link
        to="/donations"
        on:click={() => handleLinkClick("/donations")}
        class="{currentLocation === '/donations' ? 'active' : ''} nav-link"
      >
        Donations
      </Link>
    </nav>
    <a href="#contact" class="{currentLocation === '/' ? '' : 'invisible'} contact bg-white text-black border-2 rounded-3xl text-base hover:text-white">Contact Me</a>
  </header>

  <main class="{isMobile ? 'pb-80' : ''}">
    <Route path="/" component={Home} isMobile={isMobile} />
    <Route path="/interests" component={Interests} isMobile={isMobile} />
    <Route path="/portfolio" component={Portfolio} isMobile={isMobile} />
    <Route path="/portfolio/blahaj" component={Blahaj} isMobile={isMobile} />
    <Route path="/portfolio/sapphify" component={Sapphify} isMobile={isMobile} />
    <Route path="/portfolio/website" component={Website} isMobile={isMobile} />
    <Route path="/donations" component={Donate} isMobile={isMobile} />
    <Route path="/faq" component={FAQ} isMobile={isMobile} />
    <Route path="/privacy-policy" component={PrivacyPolicy} isMobile={isMobile} />
  </main>

  <footer class="footer relative bottom-0 w-full bg-black">
    <ul class="list mt-0 mb-0 p-0 text-lg text-center text-white">
      <li>
        <Link to="/faq">FAQ</Link>
      </li>
      <li>
        <a href="https://sech1p.link">My Card</a>
      </li>
      <li>
        <Link to="/privacy-policy">Privacy Policy</Link>
      </li>
      <li>
        <a href="https://github.com/sech1p/sech1p.ovh">Source code</a>
      </li>
    </ul>
    <p class="text-xs mt-15 text-white text-center">© 2024 Eliza Emilia "sech1p" Semeniuk. Licensed under Apache-2.0 license.</p>
  </footer>
</Router>