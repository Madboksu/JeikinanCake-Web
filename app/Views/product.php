<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? "Product - Jeikinan's Cake") ?></title>
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <!-- Top Navigation Bar (Identical to Landing Page) -->
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

    <!-- Main Catalog Container -->
    <main>
        <!-- Title & Search Bar Row -->
        <div class="catalog-header">
            <div class="catalog-title">
                <h1>What We Serve</h1>
            </div>
            <div class="catalog-search">
                <form action="<?= base_url('product') ?>" method="GET" class="catalog-search-form">
                    <?php if (!empty($selectedCat)) : ?>
                        <input type="hidden" name="category" value="<?= esc($selectedCat) ?>">
                    <?php endif; ?>
                    <?php if (!empty($selectedSort)) : ?>
                        <input type="hidden" name="sort" value="<?= esc($selectedSort) ?>">
                    <?php endif; ?>
                    <input type="text" name="search" placeholder="Search" value="<?= esc($keyword ?? '') ?>">
                    <button type="submit" aria-label="Search">
                        <i class="fa-solid fa-magnifying-glass" style="font-size: 16px;"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Sidebar & Product Grid Area -->
        <div class="catalog-container">
            <!-- Mobile Filter & Sort Toggle Button -->
            <div class="mobile-filter-toggle-wrapper">
                <button class="mobile-filter-btn" id="mobileFilterBtn" aria-label="Toggle Filter & Sort">
                    <span><i class="fa-solid fa-sliders" style="margin-right: 8px;"></i> Filter & Urutkan</span>
                    <i class="fa-solid fa-chevron-down toggle-arrow"></i>
                </button>
            </div>

            <!-- Left Sidebar Filters -->
            <aside class="catalog-sidebar">
                <!-- Sorted By Card -->
                <div class="filter-card">
                    <h4>Sorted By</h4>
                    <ul class="filter-list">
                        <?php
                        function buildFilterUrl($paramType, $paramVal, $selectedCat, $selectedSort, $keyword) {
                            $params = [];
                            $cat = ($paramType === 'category') ? $paramVal : $selectedCat;
                            $sort = ($paramType === 'sort') ? $paramVal : $selectedSort;

                            if ($cat) $params['category'] = $cat;
                            if ($sort) $params['sort'] = $sort;
                            if ($keyword) $params['search'] = $keyword;

                            return base_url('product') . ($params ? '?' . http_build_query($params) : '');
                        }
                        ?>
                        <li>
                            <a href="<?= buildFilterUrl('sort', 'available', $selectedCat, $selectedSort, $keyword) ?>"
                               class="<?= ($selectedSort === 'available') ? 'active' : '' ?>">
                                Available Product
                            </a>
                        </li>
                        <li>
                            <a href="<?= buildFilterUrl('sort', 'a-z', $selectedCat, $selectedSort, $keyword) ?>"
                               class="<?= ($selectedSort === 'a-z') ? 'active' : '' ?>">
                                A - Z
                            </a>
                        </li>
                        <li>
                            <a href="<?= buildFilterUrl('sort', 'z-a', $selectedCat, $selectedSort, $keyword) ?>"
                               class="<?= ($selectedSort === 'z-a') ? 'active' : '' ?>">
                                Z - A
                            </a>
                        </li>
                        <li>
                            <a href="<?= buildFilterUrl('sort', 'recommended', $selectedCat, $selectedSort, $keyword) ?>"
                               class="<?= ($selectedSort === 'recommended') ? 'active' : '' ?>">
                                Recommended
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Category Card -->
                <div class="filter-card">
                    <h4>Category</h4>
                    <ul class="filter-list">
                        <li>
                            <a href="<?= buildFilterUrl('category', null, $selectedCat, $selectedSort, $keyword) ?>"
                               class="<?= (empty($selectedCat)) ? 'active' : '' ?>">
                                All
                            </a>
                        </li>
                        <?php if (!empty($categories)) : ?>
                            <?php foreach ($categories as $cat) : ?>
                                <li>
                                    <a href="<?= buildFilterUrl('category', $cat['category_id'], $selectedCat, $selectedSort, $keyword) ?>"
                                       class="<?= ($selectedCat == $cat['category_id']) ? 'active' : '' ?>">
                                        <?= esc($cat['category_name']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </aside>

            <!-- Right Product Catalog Content -->
            <section class="catalog-content">
                <?php if (!empty($products)) : ?>
                    <div class="catalog-grid">
                        <?php foreach ($products as $p) : ?>
                            <div class="catalog-card product-card">
                                <div class="image-wrapper">
                                    <img src="<?= base_url('image/' . $p['product_image']) ?>"
                                         alt="<?= esc($p['product_name']) ?>"
                                         onerror="handleImgError(this, '<?= esc($p['product_name']) ?>')">
                                </div>
                                <div class="product-info">
                                    <h3><?= esc($p['product_name']) ?></h3>
                                    <p class="price">Rp. <?= number_format($p['product_price'], 0, ',', '.') ?> /pcs</p>
                                    <div class="card-actions">
                                        <button class="btn-buy">Beli Sekarang</button>
                                        <button class="btn-cart" title="Tambah ke Keranjang">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-container">
                        <?= $pager->links('default', 'custom_pagination') ?>
                    </div>
                <?php else : ?>
                    <div class="no-products">
                        <i class="fa-solid fa-cookie-bite" style="font-size: 48px; color: #a0aec0; margin-bottom: 16px;"></i>
                        <p>Tidak ada produk yang ditemukan untuk kriteria pencarian ini.</p>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>

    <!-- Footer -->
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

    <!-- JavaScript Fallback Handler -->
    <script>
        function handleImgError(el, label = 'Cake') {
            el.onerror = null;
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="240" height="230"><rect width="100%" height="100%" fill="#edf2ea"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#314424" font-size="14" font-family="sans-serif">${label}</text></svg>`;
            el.src = 'data:image/svg+xml;utf8,' + encodeURIComponent(svg);
        }

        document.addEventListener('DOMContentLoaded', function () {
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

            // Mobile Filter & Sort Toggle Handler
            const mobileFilterBtn = document.getElementById('mobileFilterBtn');
            const catalogSidebar = document.querySelector('.catalog-sidebar');

            if (mobileFilterBtn && catalogSidebar) {
                mobileFilterBtn.addEventListener('click', function () {
                    catalogSidebar.classList.toggle('active');
                    const arrow = mobileFilterBtn.querySelector('.toggle-arrow');
                    if (arrow) {
                        arrow.style.transform = catalogSidebar.classList.contains('active') ? 'rotate(180deg)' : 'rotate(0deg)';
                    }
                });
            }
        });
    </script>
</body>
</html>
