<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? ($store['store_name'] ?? 'Jeikinan Cake')); ?></title>
    <style>
        html {scroll-behavior: smooth;}
    </style>
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <nav>
        <div class="logo">
            <?php if (!empty($store['store_name'])) : ?>
                <?= esc($store['store_name']) ?>
            <?php else : ?>
                JEN-<br>KEINAN'S<br>CAKE
            <?php endif; ?>
        </div>
        <ul class="menu" id="navMenu">
            <li><a href="<?= base_url('/#home') ?>">Home</a></li>
            <li><a href="<?= base_url('/#about') ?>">About</a></li>
            <li><a href="<?= base_url('product') ?>">Product</a></li> 
            <li><a href="<?= base_url('/#review') ?>">Review</a></li>
            <li><a href="<?= base_url('/#contact') ?>">Contact</a></li>
        </ul>
        <div class="nav-right">
            <div class="cart">
                <a href="<?= base_url('product') ?>" title="Katalog Produk">
                    <img src="<?= base_url('icon/cart.png'); ?>" alt="cart" width="24" height="24">
                </a>
            </div>
            <button class="hamburger" id="hamburgerBtn" aria-label="Toggle navigation menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main>
        <!-- 2. SECTION HOME -->
        <section id="home">
            <div class="hero">
                <?php 
                    $heroImage = !empty($store['hero_image']) ? $store['hero_image'] : (!empty($store['store_logo']) ? $store['store_logo'] : 'logo.png');
                ?>
                <img src="<?= base_url('image/' . esc($heroImage)); ?>" alt="<?= esc($store['store_name'] ?? 'Jeikinan Cake'); ?>" onerror="this.onerror=null;this.src='<?= base_url('image/logo.png'); ?>';">
            </div>

            <div class="search-bar-wrapper">
                <form action="<?= base_url('product') ?>" method="GET" class="search-bar">
                    <input type="text" name="search" placeholder="Search">
                    <button type="submit" aria-label="Search">
                        <i class="fa-solid fa-magnifying-glass" style="font-size: 16px;"></i>
                    </button>
                </form>
            </div>
        </section>

        <!-- 3. SECTION ABOUT -->
        <section id="about">
            <div class="about-image">
                <?php $aboutImg = !empty($store['store_image']) ? $store['store_image'] : 'donat.png'; ?>
                <img src="<?= base_url('image/' . esc($aboutImg)); ?>" alt="<?= esc($store['store_name'] ?? 'About Us'); ?>" onerror="this.onerror=null;this.src='<?= base_url('image/donat.png'); ?>';">
            </div>
            <div class="about-text">
                <h2>About Us</h2>
                <?php if (!empty($store['store_description'])) : ?>
                    <p><?= nl2br(esc($store['store_description'])); ?></p>
                <?php else : ?>
                    <p>Jeikinan Cake menyediakan berbagai macam kue ulang tahun, cupcake, custom cake, dan pastry lezat buatan tangan dengan bahan berkualitas tinggi.</p>
                <?php endif; ?>

                <?php if (!empty($store['opening_hours'])) : ?>
                    <p style="margin-top: 12px; font-weight: 500;">
                        <strong>Jam Operasional:</strong> <?= esc($store['opening_hours']); ?>
                    </p>
                <?php endif; ?>
            </div>
        </section>

        <!-- 4. SECTION BEST SELLERS -->
        <section id="best-sellers" class="best-sellers-section">
            <div class="section-header">
                <h2>Best Sellers</h2>
            </div>
            
            <div class="product-grid">
                <?php if (!empty($best_sellers)) : ?>
                    <?php foreach ($best_sellers as $produk) : ?>
                    <div class="catalog-card product-card">
                        <div class="image-wrapper">
                            <img src="<?= base_url('image/' . esc($produk['product_image'])); ?>" 
                                 alt="<?= esc($produk['product_name']); ?>"
                                 onerror="handleImgError(this, '<?= esc($produk['product_name']); ?>')">
                        </div>
                        <div class="product-info">
                            <h3><?= esc($produk['product_name']); ?></h3>
                            <p class="price">Rp. <?= number_format($produk['product_price'], 0, ',', '.'); ?> /pcs</p>
                            
                            <div class="card-actions">
                                <a href="<?= base_url('product?search=' . urlencode($produk['product_name'])); ?>" class="btn-buy" style="display:inline-flex; align-items:center; justify-content:center; text-decoration:none;">Beli Sekarang</a>
                                <a href="<?= base_url('product'); ?>" class="btn-cart" style="display:inline-flex; align-items:center; justify-content:center; text-decoration:none;" title="Tambah ke Keranjang">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a> 
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p style="text-align: center; width: 100%; color: #ffffff;">Belum ada produk best seller saat ini.</p>
                <?php endif; ?>
            </div>

            <div class="section-footer">
                <a href="<?= base_url('product'); ?>" class="view-all">
                    View all <i class="fa-solid fa-chevron-right" style="font-size: 13px;"></i>
                </a>
            </div>
        </section>

        <!-- 5. SECTION REVIEW -->
        <section id="review" class="review-section">
            <h2>What They Said</h2>

            <div class="testimonial-container">
                <div class="testimonial-grid" id="testimonialSlider">
                    <?php if (!empty($testimonials)) : ?>
                        <?php foreach ($testimonials as $testi) : ?>
                        <?php 
                            $testiImg = (!empty($testi['testimonial_image']) && $testi['testimonial_image'] !== 'default.png') 
                                ? base_url('image/' . esc($testi['testimonial_image'])) 
                                : base_url('image/bghome.png');
                        ?>
                        <div class="testimonial-card" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= $testiImg; ?>');">
                            
                            <div class="testimonial-content">
                                <h3><?= esc($testi['testimonial_name']); ?></h3>
                                <p class="review-text"><?= esc($testi['testimonial_desc']); ?></p>
                            </div>

                            <div class="testimonial-footer">
                                <p class="reviewer">@<?= strtolower(str_replace(' ', '', esc($testi['testimonial_name']))); ?></p>
                                <p class="date"><?= date('j F Y', strtotime($testi['testimonial_date'])); ?></p>
                                
                                <div class="stars">
                                    <?php 
                                        $starCount = (int)$testi['testimonial_star'];
                                        echo str_repeat('⭐', $starCount);
                                    ?>
                                </div>
                            </div>

                        </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p style="text-align: center; width: 100%; color: #666;">Belum ada testimoni.</p>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (!empty($testimonials) && count($testimonials) > 1) : ?>
            <div class="carousel-dots" id="testimonialDots"></div>
            <?php endif; ?>
        </section>

    </main>

    <!-- 6. FOOTER -->
    <footer id="contact" class="footer-section">
        <div class="footer-container">
            <div class="footer-brand">
                <h2 class="footer-logo"><?= esc($store['store_name'] ?? 'Jeikinan Cake'); ?></h2>
                <p class="footer-tagline">
                    <?= !empty($store['store_description']) ? esc(mb_substr($store['store_description'], 0, 110)) . '...' : 'Menyajikan kue dan pastry buatan tangan dengan bahan berkualitas tinggi.'; ?>
                </p>
            </div>

            <ul class="footer-nav">
                <li><a href="<?= base_url('/#home') ?>">Home</a></li>
                <li><a href="<?= base_url('/#about') ?>">About Us</a></li>
                <li><a href="<?= base_url('product') ?>">Katalog Produk</a></li>
                <li><a href="<?= base_url('/#review') ?>">Ulasan</a></li>
                <li><a href="<?= base_url('/#contact') ?>">Kontak</a></li>
            </ul>
            
            <div class="social-icons">
                <?php 
                    $igVal = $store['instagram'] ?? '';
                    $igUrl = !empty($igVal) ? (str_starts_with($igVal, 'http') ? $igVal : 'https://instagram.com/' . ltrim($igVal, '@')) : '#';

                    $waVal = $store['whatsapp'] ?? '';
                    $waNum = preg_replace('/[^0-9]/', '', $waVal);
                    $waUrl = !empty($waNum) ? 'https://wa.me/' . $waNum : '#';

                    $mapsUrl = !empty($store['address']) ? 'https://maps.google.com/?q=' . urlencode($store['address']) : '#';
                ?>
                <?php if (!empty($igVal)) : ?>
                    <a href="<?= esc($igUrl); ?>" target="_blank" aria-label="Instagram" title="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                <?php endif; ?>
                <a href="<?= esc($waUrl); ?>" target="_blank" aria-label="WhatsApp" title="WhatsApp">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
                <a href="https://facebook.com" target="_blank" aria-label="Facebook" title="Facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <?php if (!empty($store['address'])) : ?>
                    <a href="<?= esc($mapsUrl); ?>" target="_blank" aria-label="Location" title="<?= esc($store['address']); ?>">
                        <i class="fa-solid fa-location-dot"></i>
                    </a>
                <?php endif; ?>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?= date('Y'); ?> <?= esc($store['store_name'] ?? 'Jeikinan Cake'); ?>. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function handleImgError(el, label = 'Cake') {
            el.onerror = null;
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="240" height="230"><rect width="100%" height="100%" fill="#edf2ea"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#314424" font-size="14" font-family="sans-serif">${label}</text></svg>`;
            el.src = 'data:image/svg+xml;utf8,' + encodeURIComponent(svg);
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Mobile Navbar Toggle Handler
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            const navMenu = document.getElementById('navMenu');

            if (hamburgerBtn && navMenu) {
                hamburgerBtn.addEventListener('click', function () {
                    navMenu.classList.toggle('active');
                    const icon = hamburgerBtn.querySelector('i');
                    if (icon) {
                        if (navMenu.classList.contains('active')) {
                            icon.className = 'fa-solid fa-xmark';
                        } else {
                            icon.className = 'fa-solid fa-bars';
                        }
                    }
                });

                const navLinks = navMenu.querySelectorAll('a');
                navLinks.forEach(function (link) {
                    link.addEventListener('click', function () {
                        navMenu.classList.remove('active');
                        const icon = hamburgerBtn.querySelector('i');
                        if (icon) {
                            icon.className = 'fa-solid fa-bars';
                        }
                    });
                });
            }

            const grid = document.getElementById('testimonialSlider');
            const dotsContainer = document.getElementById('testimonialDots');
            
            if (!grid || !dotsContainer) return;
            const cards = grid.querySelectorAll('.testimonial-card');
            if (cards.length === 0) return;

            let currentIndex = 0;
            let autoPlayTimer = null;

            // Scroll to specific card index
            function scrollToCard(index) {
                const card = cards[index];
                if (!card) return;
                grid.scrollTo({
                    left: card.offsetLeft - grid.offsetLeft,
                    behavior: 'smooth'
                });
            }

            // Dynamically generate exact number of dots (2 cards = 2 dots, 3 cards = 3 dots, etc.)
            dotsContainer.innerHTML = '';
            cards.forEach((card, index) => {
                const dot = document.createElement('span');
                dot.className = 'dot' + (index === 0 ? ' active' : '');
                dot.setAttribute('aria-label', 'Go to testimonial ' + (index + 1));
                dot.addEventListener('click', function () {
                    currentIndex = index;
                    scrollToCard(index);
                    resetAutoPlay();
                });
                dotsContainer.appendChild(dot);
            });

            // Update active dot on scroll
            function updateActiveDot() {
                const scrollLeft = grid.scrollLeft;
                const maxScroll = grid.scrollWidth - grid.clientWidth;
                let activeIndex = 0;

                if (scrollLeft >= maxScroll - 15) {
                    activeIndex = cards.length - 1;
                } else {
                    let minDiff = Infinity;
                    cards.forEach((card, index) => {
                        const cardPos = card.offsetLeft - grid.offsetLeft;
                        const diff = Math.abs(cardPos - scrollLeft);
                        if (diff < minDiff) {
                            minDiff = diff;
                            activeIndex = index;
                        }
                    });
                }

                const dots = dotsContainer.querySelectorAll('.dot');
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === activeIndex);
                });

                return activeIndex;
            }

            grid.addEventListener('scroll', function () {
                currentIndex = updateActiveDot();
            });

            // Auto Play Carousel Loop
            function startAutoPlay() {
                if (cards.length <= 1) return;
                stopAutoPlay();
                autoPlayTimer = setInterval(function () {
                    currentIndex = (currentIndex + 1) % cards.length;
                    scrollToCard(currentIndex);
                }, 4000);
            }

            function stopAutoPlay() {
                if (autoPlayTimer) {
                    clearInterval(autoPlayTimer);
                    autoPlayTimer = null;
                }
            }

            function resetAutoPlay() {
                stopAutoPlay();
                startAutoPlay();
            }

            // Pause on interaction
            grid.addEventListener('mouseenter', stopAutoPlay);
            grid.addEventListener('mouseleave', startAutoPlay);
            grid.addEventListener('touchstart', stopAutoPlay, { passive: true });
            grid.addEventListener('touchend', startAutoPlay);
            dotsContainer.addEventListener('mouseenter', stopAutoPlay);
            dotsContainer.addEventListener('mouseleave', startAutoPlay);

            startAutoPlay();
        });
    </script>
</body>
</html>