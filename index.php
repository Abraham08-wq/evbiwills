<?php
require __DIR__ . '/data.php';

// ---- Order form: when submitted, send the customer to WhatsApp with the order typed out ----
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $f = fn($k) => trim(strip_tags($_POST[$k] ?? ''));
    $msg = "Hello {$business['name']}, I'd like to order:\n"
         . "Item: {$f('category')} - {$f('item')}\n"
         . "Quantity / size: {$f('qty')}\n"
         . "Name: {$f('name')}\n"
         . "Deliver to: {$f('location')}";
    header('Location: https://wa.me/' . $business['whatsapp'] . '?text=' . rawurlencode($msg));
    exit;
}

$wa = 'https://wa.me/' . $business['whatsapp'];
$waHello = $wa . '?text=' . rawurlencode("Hello {$business['name']}, I saw your website and I'd like to ask about your products.");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?= e($business['name']) ?></title>
<meta name="description" content="<?= e($business['name'] . ' — ' . $business['tagline']) ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,500;0,6..96,700;1,6..96,500&family=Jost:wght@400;500;600&display=swap">
<style>
/* Layout: black-lacquer storefront — gold monogram hero, category shelf, order slip, delivery strip */
:root {
  --ink: #0d0c0a;
  --panel: #17150f;
  --line: #3a3221;
  --gold: #d4a93c;
  --gold-soft: #e9cf8a;
  --text: #f3ecdc;
  --muted: #a99d84;
  --display: "Bodoni Moda", "Didot", Georgia, serif;
  --body: "Jost", "Futura", "Segoe UI", sans-serif;
  color-scheme: dark;
}
* { box-sizing: border-box; }
body { margin: 0; background: var(--ink); color: var(--text); font: 400 1rem/1.6 var(--body); }
a { color: inherit; }
.wrap { max-width: 1080px; margin: 0 auto; padding-inline: 20px; }
h1, h2, h3 { font-family: var(--display); font-weight: 500; text-wrap: balance; margin: 0; }
.label { font-size: .75rem; letter-spacing: .22em; text-transform: uppercase; color: var(--gold); font-weight: 600; }
:focus-visible { outline: 2px solid var(--gold); outline-offset: 3px; }

/* header */
.top { position: sticky; top: env(safe-area-inset-top, 0px); z-index: 5; background: color-mix(in srgb, var(--ink) 92%, transparent); backdrop-filter: blur(8px); border-bottom: 1px solid var(--line); }
.top .wrap { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding-block: 14px; }
.brand { font-family: var(--display); font-size: 1.5rem; font-style: italic; color: var(--gold); text-decoration: none; }
.top nav { display: flex; gap: 22px; font-size: .9rem; }
.top nav a { text-decoration: none; color: var(--muted); }
.top nav a:hover { color: var(--gold-soft); }

/* buttons */
.btn { display: inline-flex; align-items: center; gap: 10px; padding: 14px 24px; border-radius: 2px; font: 600 .95rem var(--body); letter-spacing: .04em; text-decoration: none; cursor: pointer; border: 1px solid var(--gold); transition: background .2s, color .2s; }
.btn-gold { background: var(--gold); color: var(--ink); }
.btn-gold:hover { background: var(--gold-soft); }
.btn-line { background: transparent; color: var(--gold); }
.btn-line:hover { background: var(--gold); color: var(--ink); }
.btn svg { width: 18px; height: 18px; }

/* hero */
.hero { padding-block: 72px 56px; display: grid; grid-template-columns: 1.3fr 1fr; gap: 48px; align-items: center; }
.hero h1 { font-size: clamp(2.6rem, 7vw, 4.8rem); line-height: 1.02; margin-block: 14px 20px; }
.hero h1 em { color: var(--gold); }
.hero p { color: var(--muted); font-size: 1.1rem; max-width: 34ch; margin: 0 0 30px; }
.hero .ctas { display: flex; flex-wrap: wrap; gap: 12px; }
.monogram { aspect-ratio: 1; max-width: 100%; border: 1px solid var(--gold); display: grid; place-items: center; position: relative; }
.monogram::before { content: ""; position: absolute; inset: 14px; border: 1px solid var(--line); }
.monogram span { font-family: var(--display); font-style: italic; font-size: clamp(6rem, 18vw, 11rem); color: var(--gold); line-height: 1; }
.monogram small { position: absolute; bottom: 30px; font-size: .7rem; letter-spacing: .3em; text-transform: uppercase; color: var(--muted); }

/* promise strip */
.strip { border-block: 1px solid var(--line); }
.strip .wrap { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; padding-block: 22px; }
.strip div { display: flex; flex-direction: column; gap: 2px; }
.strip b { font-family: var(--display); font-size: 1.15rem; font-weight: 500; color: var(--gold-soft); }
.strip span { color: var(--muted); font-size: .9rem; }

/* products */
section.block { padding-block: 72px; }
.head { display: flex; justify-content: space-between; align-items: end; gap: 20px; flex-wrap: wrap; margin-bottom: 36px; }
.head h2 { font-size: clamp(2rem, 4.5vw, 3rem); margin-top: 8px; }
.head p { color: var(--muted); max-width: 40ch; margin: 0; }
.grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1px; background: var(--line); border: 1px solid var(--line); }
.cat { background: var(--panel); padding: 30px 28px; display: flex; flex-direction: column; gap: 14px; min-width: 0; }
.cat svg { width: 52px; height: 52px; fill: none; stroke: var(--gold); stroke-width: 2; stroke-linejoin: round; stroke-linecap: round; }
.cat h3 { font-size: 1.7rem; }
.cat > p { color: var(--muted); margin: 0; }
.cat ul { list-style: none; padding: 0; margin: 0; border-top: 1px solid var(--line); }
.cat li { display: flex; justify-content: space-between; gap: 12px; padding-block: 9px; border-bottom: 1px dashed var(--line); font-size: .95rem; }
.cat li span:last-child { color: var(--gold-soft); white-space: nowrap; font-variant-numeric: tabular-nums; font-size: .85rem; }
.cat .ask { margin-top: auto; padding-top: 6px; color: var(--gold); font-weight: 600; font-size: .9rem; text-decoration: none; letter-spacing: .04em; }
.cat .ask:hover { color: var(--gold-soft); }

/* latest stock */
.filters { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 24px; }
.chip { background: transparent; color: var(--muted); border: 1px solid var(--line); padding: 8px 16px; font: 500 .9rem var(--body); cursor: pointer; border-radius: 999px; }
.chip:hover { color: var(--gold-soft); border-color: var(--gold); }
.chip.on { background: var(--gold); color: var(--ink); border-color: var(--gold); }
.stock { display: grid; grid-template-columns: repeat(auto-fill, minmax(210px, 1fr)); gap: 18px; }
.item { background: var(--panel); border: 1px solid var(--line); display: flex; flex-direction: column; min-width: 0; transition: border-color .2s; }
.item:hover { border-color: var(--gold); }
.ph { position: relative; aspect-ratio: 4 / 5; overflow: hidden; background: #000; max-width: 100%; }
.ph img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .4s; }
.item:hover .ph img { transform: scale(1.04); }
.code { position: absolute; top: 10px; left: 10px; background: var(--ink); color: var(--gold); font: 600 .72rem var(--body); letter-spacing: .12em; padding: 4px 8px; border: 1px solid var(--gold); }
.meta { padding: 14px 16px 16px; display: flex; flex-direction: column; gap: 4px; flex: 1; }
.cat-name { font-size: .7rem; letter-spacing: .18em; text-transform: uppercase; color: var(--muted); }
.meta h3 { font-family: var(--body); font-weight: 500; font-size: 1.02rem; line-height: 1.35; }
.row { margin-top: auto; padding-top: 10px; display: flex; justify-content: space-between; align-items: center; gap: 10px; }
.price { white-space: nowrap; color: var(--gold-soft); font-size: .88rem; font-variant-numeric: tabular-nums; }
.order { flex: none; background: var(--gold); color: var(--ink); text-decoration: none; font: 600 .82rem var(--body); letter-spacing: .06em; padding: 8px 14px; }
.order:hover { background: var(--gold-soft); }
.cover { margin: -30px -28px 6px; aspect-ratio: 16 / 9; overflow: hidden; max-width: calc(100% + 56px); }
.cover img { width: 100%; height: 100%; object-fit: cover; display: block; }

/* branding */
.brandbox { border: 1px solid var(--gold); background: var(--panel); padding: 40px; display: grid; grid-template-columns: 1fr 1.1fr; gap: 40px; align-items: center; }
.brandbox-text { display: flex; flex-direction: column; gap: 12px; align-items: flex-start; min-width: 0; }
.brandbox-text > svg { width: 52px; height: 52px; fill: none; stroke: var(--gold); stroke-width: 2; stroke-linejoin: round; stroke-linecap: round; }
.brandbox h2 { font-size: clamp(2rem, 4.5vw, 3rem); }
.brandbox p { color: var(--muted); margin: 0 0 8px; }
.chips { list-style: none; margin: 0; padding: 0; display: flex; flex-wrap: wrap; gap: 10px; }
.chips li { border: 1px solid var(--line); padding: 8px 14px; font-size: .92rem; color: var(--text); }
.chips li.more { border-style: dashed; color: var(--gold-soft); }
.work { grid-column: 1 / -1; display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
.work figure { margin: 0; min-width: 0; }
.work img { width: 100%; aspect-ratio: 1; object-fit: cover; display: block; border: 1px solid var(--line); }
.work figcaption { color: var(--muted); font-size: .85rem; padding-top: 8px; }

/* how it works */
.steps { display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px; }
.step { border-top: 1px solid var(--gold); padding-top: 18px; }
.step .n { font-family: var(--display); font-size: 2.4rem; color: var(--gold); line-height: 1; }
.step h3 { font-size: 1.3rem; margin-block: 10px 6px; }
.step p { color: var(--muted); margin: 0; }

/* order */
.order { display: grid; grid-template-columns: 1fr 1.2fr; gap: 48px; align-items: start; }
.order .intro p { color: var(--muted); }
.phone { font-family: var(--display); font-size: clamp(1.8rem, 5vw, 2.6rem); color: var(--gold); letter-spacing: .02em; user-select: all; margin-block: 6px 4px; }
.copy { background: none; border: 0; color: var(--muted); font: 500 .85rem var(--body); cursor: pointer; padding: 0; text-decoration: underline; }
form { background: var(--panel); border: 1px solid var(--line); padding: 28px; display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.field { display: flex; flex-direction: column; gap: 6px; min-width: 0; }
.field.full { grid-column: 1 / -1; }
label { font-size: .75rem; letter-spacing: .14em; text-transform: uppercase; color: var(--muted); }
input, select { width: 100%; background: var(--ink); color: var(--text); border: 1px solid var(--line); border-radius: 2px; padding: 12px 14px; font: 400 1rem var(--body); }
input:focus, select:focus { border-color: var(--gold); outline: none; }
form .btn { grid-column: 1 / -1; justify-content: center; }
.note { grid-column: 1 / -1; color: var(--muted); font-size: .85rem; margin: 0; text-align: center; }

footer { border-top: 1px solid var(--line); padding-block: 28px; color: var(--muted); font-size: .85rem; }
footer .wrap { display: flex; justify-content: space-between; gap: 16px; flex-wrap: wrap; }

/* floating WhatsApp */
.float { position: fixed; right: 18px; bottom: calc(18px + env(safe-area-inset-bottom, 0px)); width: 58px; height: 58px; border-radius: 50%; background: var(--gold); color: var(--ink); display: grid; place-items: center; box-shadow: 0 8px 24px rgba(0,0,0,.5); z-index: 6; }
.float svg { width: 28px; height: 28px; }

@media (max-width: 820px) {
  .hero, .order, .brandbox { grid-template-columns: 1fr; }
  .brandbox { padding: 24px; }
  .work { grid-template-columns: 1fr 1fr; }
  .stock { grid-template-columns: 1fr 1fr; gap: 12px; }
  .meta { padding: 12px; }
  .row { flex-wrap: wrap; }
  .cover { margin: -30px -28px 6px; }
  .monogram { max-width: 280px; }
  .steps, .strip .wrap { grid-template-columns: 1fr; }
  .top nav { display: none; }
  form { grid-template-columns: 1fr; padding: 20px; }
  .grid { grid-template-columns: 1fr; }
}
@media (prefers-reduced-motion: reduce) { * { transition: none !important; } }
</style>
</head>
<body>

<?php $waIcon = '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm0 18.2a8.2 8.2 0 0 1-4.2-1.2l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 1 1 12 20.2zm4.5-6.1c-.2-.1-1.5-.7-1.7-.8-.2-.1-.4-.1-.6.1l-.8 1c-.1.2-.3.2-.5.1a6.7 6.7 0 0 1-3.3-2.9c-.3-.4.2-.4.7-1.3.1-.2 0-.3 0-.4l-.8-1.8c-.2-.5-.4-.4-.6-.4h-.5a1 1 0 0 0-.7.3 3 3 0 0 0-.9 2.2 5.2 5.2 0 0 0 1.1 2.7 11.8 11.8 0 0 0 4.5 4c1.7.7 2.3.8 3.2.6.5-.1 1.5-.6 1.7-1.2.2-.6.2-1.1.2-1.2-.1-.1-.3-.2-.5-.3z"/></svg>'; ?>

<header class="top">
  <div class="wrap">
    <a class="brand" href="#top"><?= e($business['name']) ?></a>
    <nav>
      <a href="#stock">Latest stock</a>
      <a href="#products">Products</a>
      <a href="#branding">Branding</a>
      <a href="#how">How it works</a>
      <a href="#order">Order</a>
    </nav>
  </div>
</header>

<main id="top">
  <div class="wrap hero">
    <div>
      <div class="label">Nairobi · Delivered to you</div>
      <h1>Dress yourself.<br><em>Dress your home.</em></h1>
      <p>Jeans, sneakers, curtains, carpets, bedding, beads, locs and fresh flower bouquets. Plus tailor-made overalls and logo branding for SACCOs and groups. Delivered straight after you order.</p>
      <div class="ctas">
        <a class="btn btn-gold" href="<?= e($waHello) ?>" target="_blank" rel="noopener"><?= $waIcon ?> Order on WhatsApp</a>
        <a class="btn btn-line" href="#stock">See latest stock</a>
      </div>
    </div>
    <div class="monogram" aria-hidden="true">
      <span><?= e($business['monogram']) ?></span>
      <small>Est. Utawala</small>
    </div>
  </div>

  <div class="strip">
    <div class="wrap">
      <div><b>Direct delivery</b><span>Your order comes to your door</span></div>
      <div><b>Order anytime</b><span>WhatsApp or call <?= e($business['phone']) ?></span></div>
      <div><b>Based in <?= e(explode(',', $business['base'])[0]) ?></b><span>Delivering across Nairobi</span></div>
    </div>
  </div>

  <section class="block" id="stock">
    <div class="wrap">
      <div class="head">
        <div><div class="label">In stock now</div><h2>Latest stock</h2></div>
        <p>Real photos of what we have. Tap <b>Order</b> and WhatsApp opens with the item code ready.</p>
      </div>
      <?php $usedCats = array_unique(array_column($products, 'cat'));
            $catName = array_column($categories, 'name', 'id'); ?>
      <div class="filters" role="group" aria-label="Filter stock">
        <button type="button" class="chip on" data-f="all">All</button>
        <?php foreach ($categories as $c): if (!in_array($c['id'], $usedCats)) continue; ?>
        <button type="button" class="chip" data-f="<?= e($c['id']) ?>"><?= e($c['name']) ?></button>
        <?php endforeach; ?>
      </div>
      <div class="stock">
        <?php foreach ($products as $p):
          $msg = "Hello {$business['name']}, I'm interested in {$p['name']} ({$p['code']}). Is it available? What's the price?"; ?>
        <article class="item" data-cat="<?= e($p['cat']) ?>">
          <div class="ph"><img src="<?= e($p['image']) ?>" alt="<?= e($p['name']) ?>" loading="lazy"><span class="code"><?= e($p['code']) ?></span></div>
          <div class="meta">
            <span class="cat-name"><?= e($catName[$p['cat']] ?? '') ?></span>
            <h3><?= e($p['name']) ?></h3>
            <div class="row">
              <span class="price"><?= e($p['price'] ?: 'Ask price') ?></span>
              <a class="order" href="<?= e($wa . '?text=' . rawurlencode($msg)) ?>" target="_blank" rel="noopener">Order</a>
            </div>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="block" id="products" style="padding-top:0">
    <div class="wrap">
      <div class="head">
        <div><div class="label">What we sell</div><h2>The collection</h2></div>
        <p>Tell us what you want, your size or bed size, and we'll send photos and prices on WhatsApp.</p>
      </div>
      <div class="grid">
        <?php foreach ($categories as $c):
          $ask = $wa . '?text=' . rawurlencode("Hello {$business['name']}, please send me photos and prices of your {$c['name']}."); ?>
        <article class="cat" id="<?= e($c['id']) ?>">
          <?php if (!empty($c['image'])): ?>
          <div class="cover"><img src="<?= e($c['image']) ?>" alt="" loading="lazy"></div>
          <?php else: ?>
          <svg viewBox="0 0 64 64" aria-hidden="true"><?= $icons[$c['icon']] ?></svg>
          <?php endif; ?>
          <h3><?= e($c['name']) ?></h3>
          <p><?= e($c['blurb']) ?></p>
          <ul>
            <?php foreach ($c['items'] as $it): ?>
            <li><span><?= e($it['name']) ?></span><span><?= e($it['price'] ?: 'Ask price') ?></span></li>
            <?php endforeach; ?>
          </ul>
          <a class="ask" href="<?= e($ask) ?>" target="_blank" rel="noopener">Ask for photos &amp; prices →</a>
        </article>
        <?php endforeach; ?>
        <article class="cat">
          <svg viewBox="0 0 64 64" aria-hidden="true"><circle cx="32" cy="32" r="22"/><path d="M32 22v20M22 32h20"/></svg>
          <h3>Something else?</h3>
          <p>Looking for a specific item, colour or size? Describe it and we'll find it for you.</p>
          <a class="ask" href="<?= e($waHello) ?>" target="_blank" rel="noopener">Tell us what you need →</a>
        </article>
      </div>
    </div>
  </section>

  <section class="block" id="branding" style="padding-top:0">
    <div class="wrap">
      <div class="brandbox">
        <div class="brandbox-text">
          <svg viewBox="0 0 64 64" aria-hidden="true"><?= $icons['brand'] ?></svg>
          <div class="label">SACCOs · Chamas · Companies · Events</div>
          <h2><?= e($branding['title']) ?></h2>
          <p><?= e($branding['blurb']) ?></p>
          <?php $askBrand = $wa . '?text=' . rawurlencode("Hello {$business['name']}, I'd like a quote for branding. Item: ___  Quantity: ___  (I'll send our logo.)"); ?>
          <a class="btn btn-gold" href="<?= e($askBrand) ?>" target="_blank" rel="noopener"><?= $waIcon ?> Get a branding quote</a>
        </div>
        <ul class="chips">
          <?php foreach ($branding['items'] as $b): ?><li><?= e($b) ?></li><?php endforeach; ?>
          <li class="more">and more…</li>
        </ul>
        <div class="work">
          <?php foreach ($branding['photos'] as $ph): ?>
          <figure><img src="<?= e($ph['image']) ?>" alt="<?= e($ph['caption']) ?>" loading="lazy"><figcaption><?= e($ph['caption']) ?></figcaption></figure>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="block" id="how" style="padding-top:0">
    <div class="wrap">
      <div class="head"><div><div class="label">No shop visit needed</div><h2>How ordering works</h2></div></div>
      <div class="steps">
        <div class="step"><div class="n">1</div><h3>Send your order</h3><p>Use the form below, WhatsApp, or call <?= e($business['phone']) ?>.</p></div>
        <div class="step"><div class="n">2</div><h3>See photos &amp; price</h3><p>We send you pictures and the price so you know exactly what's coming.</p></div>
        <div class="step"><div class="n">3</div><h3>We deliver</h3><p>Your item is delivered straight to you. Confirm it, then pay.</p></div>
      </div>
    </div>
  </section>

  <section class="block" id="order" style="padding-top:0">
    <div class="wrap order">
      <div class="intro">
        <div class="label">Place an order</div>
        <h2 style="font-size:clamp(2rem,4.5vw,3rem);margin-top:8px">Order in a minute</h2>
        <p>Fill in the slip and it opens WhatsApp with your order ready to send. Prefer to call?</p>
        <div class="phone" id="phone"><?= e($business['phone']) ?></div>
        <button class="copy" type="button" id="copyBtn">Copy number</button>
      </div>
      <form method="post" action="" id="orderForm">
        <div class="field">
          <label for="category">Product</label>
          <select id="category" name="category" required>
            <?php foreach ($categories as $c): ?><option><?= e($c['name']) ?></option><?php endforeach; ?>
            <option>Branding</option>
            <option>Other</option>
          </select>
        </div>
        <div class="field">
          <label for="qty">Size / quantity</label>
          <input id="qty" name="qty" placeholder="e.g. Size 40, or 6x6, 2 pcs">
        </div>
        <div class="field full">
          <label for="item">What exactly do you want?</label>
          <input id="item" name="item" required placeholder="e.g. Black official shoes">
        </div>
        <div class="field">
          <label for="name">Your name</label>
          <input id="name" name="name" required placeholder="e.g. Mary">
        </div>
        <div class="field">
          <label for="location">Delivery location</label>
          <input id="location" name="location" required placeholder="e.g. Utawala, Mihango">
        </div>
        <button class="btn btn-gold" type="submit"><?= $waIcon ?> Send order on WhatsApp</button>
        <p class="note">Your order goes to <?= e($business['name']) ?> on <?= e($business['phone']) ?>.</p>
      </form>
    </div>
  </section>
</main>

<footer>
  <div class="wrap">
    <span>© <?= date('Y') ?> <?= e($business['name']) ?> · <?= e($business['base']) ?></span>
    <span>Delivery across Nairobi · <?= e($business['phone']) ?></span>
  </div>
</footer>

<a class="float" href="<?= e($waHello) ?>" target="_blank" rel="noopener" aria-label="Chat on WhatsApp"><?= $waIcon ?></a>

<script>
(function () {
  var WA = <?= json_encode($wa) ?>, NAME = <?= json_encode($business['name']) ?>;
  var form = document.getElementById('orderForm');
  form.addEventListener('submit', function (ev) {
    ev.preventDefault();
    var v = function (id) { return document.getElementById(id).value.trim(); };
    var msg = 'Hello ' + NAME + ", I'd like to order:\n" +
      'Item: ' + v('category') + ' - ' + v('item') + '\n' +
      'Quantity / size: ' + v('qty') + '\n' +
      'Name: ' + v('name') + '\n' +
      'Deliver to: ' + v('location');
    var a = document.createElement('a');
    a.href = WA + '?text=' + encodeURIComponent(msg);
    a.target = '_blank'; a.rel = 'noopener';
    document.body.appendChild(a); a.click(); a.remove();
  });
  var chips = document.querySelectorAll('.chip');
  chips.forEach(function (c) {
    c.addEventListener('click', function () {
      chips.forEach(function (x) { x.classList.toggle('on', x === c); });
      var f = c.getAttribute('data-f');
      document.querySelectorAll('.item').forEach(function (it) {
        it.hidden = !(f === 'all' || it.getAttribute('data-cat') === f);
      });
    });
  });
  var btn = document.getElementById('copyBtn');
  btn.addEventListener('click', function () {
    var num = document.getElementById('phone').textContent.trim();
    var done = function () { btn.textContent = 'Copied'; setTimeout(function () { btn.textContent = 'Copy number'; }, 1800); };
    try {
      navigator.clipboard.writeText(num).then(done, function () { selectNum(); });
    } catch (e) { selectNum(); }
    function selectNum() {
      var r = document.createRange(); r.selectNodeContents(document.getElementById('phone'));
      var s = getSelection(); s.removeAllRanges(); s.addRange(r);
    }
  });
})();
</script>
</body>
</html>
