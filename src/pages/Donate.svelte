<script>
  export let isMobile;
</script>

<section class="donations flex w-full min-h-screen bg-white items-center gap-28 {isMobile ? 'mt-24' : ''}">
  <div class="donations-content">
    <h3 class="text-5xl {isMobile ? 'mt-48' : ''}">Donations</h3>
    <p class="text-lg {isMobile ? 'text-wrap w-8/12' : ''}">If you like my work and would like to support me, you can do so in a few different ways, including Bitcoin, Litecoin, Ethereum, PayPal, and Patronite.</p>
    <p class="text-lg mt-2 {isMobile ? 'text-wrap w-8/12' : ''}">There are two ways to do this: one is to visit my <a class="link" href="https://sech1p.link">card</a> and click <code>Send money</code>, and below are the methods to support me.</p>
    <p class="text-lg mt-2 mb-4 {isMobile ? 'text-wrap w-8/12' : ''}">Thank you in advance for any donations, they will be used to maintain my projects and will be a symbolic and important support for me.</p>
    <ul>
      <li><a class="text-lg link" href="https://paypal.me/elizasemeniuk">PayPal</a></li>
      <li><a class="text-lg link" href="https://patreon.com/sech1p">Patronite</a></li>
      <li><a class="text-lg link" href="https://github.com/sponsors/sech1p">GitHub Sponsors</a></li>
      <li>
        Ethereum:
        <pre class="{isMobile ? '' : 'hidden'}">
<code>0xca7b60BD4ed9aA7654
2Ad2fDf82A7F1909ee1D11</code>
        </pre>
        <code class="{isMobile ? 'hidden' : ''}">0xca7b60BD4ed9aA76542Ad2fDf82A7F1909ee1D11</code>
      </li>
    </ul>
  </div>
</section>