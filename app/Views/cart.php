<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Keranjang Belanja - Jeikinan Cake'); ?></title>
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
    <!-- Top Navigation Bar -->
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
                <a href="<?= base_url('cart') ?>" id="cartIconLink" title="Keranjang Belanja" style="position: relative; display: inline-flex; align-items: center;">
                    <img src="<?= base_url('icon/cart.png'); ?>" alt="cart" width="24" height="24">
                    <span class="cart-badge" id="cartBadge" style="display: none;">0</span>
                </a>
            </div>
            <button class="hamburger" id="hamburgerBtn" aria-label="Toggle navigation menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Main Cart Content Container -->
    <main class="cart-main-container">
        <div class="cart-wrapper">
            <!-- Header Title Matching Mockup -->
            <div class="cart-header-row">
                <h1 class="cart-main-title">Your Cart</h1>
            </div>

            <!-- Two-Column Layout Grid -->
            <div class="cart-content-grid">
                <!-- Left Column: Cart Items List -->
                <div class="cart-items-column" id="cartItemsContainer">
                    <!-- Rendered dynamically by JS -->
                </div>

                <!-- Right Column: Order Summary Card -->
                <div class="cart-summary-column">
                    <div class="summary-card">
                        <h3>Order Summary</h3>
                        
                        <div class="summary-row">
                            <span>Total Item</span>
                            <span id="summaryTotalItems">0 Item</span>
                        </div>

                        <div class="summary-row total-row">
                            <span>Total Pembayaran</span>
                            <span id="summaryTotalPrice" class="highlight-price">Rp. 0,00</span>
                        </div>

                        <hr class="summary-divider">

                        <div class="summary-form">
                            <div class="form-group">
                                <label for="customerName">Nama Pemesan <span class="required">*</span></label>
                                <input type="text" id="customerName" placeholder="Masukkan nama Anda" required>
                            </div>

                            <div class="form-group">
                                <label for="customerNotes">Catatan Pesanan (Opsional)</label>
                                <textarea id="customerNotes" placeholder="Contoh: Ucapan lilin, jam pengiriman, dll." rows="3"></textarea>
                            </div>

                            <button type="button" class="btn-checkout-wa" id="btnCheckoutWA">
                                <i class="fa-brands fa-whatsapp"></i> Pesan via WhatsApp
                            </button>
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- Cart Confirmation Modal -->
    <div class="cart-modal-overlay" id="cartCheckoutModal">
        <div class="cart-modal-card">
            <div class="modal-header">
                <div class="modal-icon-wa"><i class="fa-brands fa-whatsapp"></i></div>
                <h3>Konfirmasi Pesanan</h3>
                <p>Silakan periksa kembali rincian pesanan Anda sebelum dikirimkan ke WhatsApp Toko:</p>
            </div>

            <div class="modal-body">
                <div class="confirm-info-box">
                    <p><strong>Nama Pemesan:</strong> <span id="confirmNameVal">-</span></p>
                    <p><strong>Catatan:</strong> <span id="confirmNotesVal">-</span></p>
                </div>
                <div class="confirm-items-title">Detail Barang:</div>
                <div id="confirmItemsSummary"></div>
                
                <div class="confirm-total-box">
                    <span>Total Pembayaran:</span>
                    <strong id="confirmTotalVal">Rp. 0</strong>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" onclick="closeCartCheckoutModal()">Kembali</button>
                <button type="button" class="btn-modal-wa" onclick="confirmSendCartWA()">
                    <i class="fa-brands fa-whatsapp"></i> Kirim ke WhatsApp
                </button>
            </div>
        </div>
    </div>

    <!-- JavaScript Base URLs & Cart Script -->
    <script>
        function handleImgError(el, label = 'Cake') {
            el.onerror = null;
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="240" height="230"><rect width="100%" height="100%" fill="#edf2ea"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#314424" font-size="14" font-family="sans-serif">${label}</text></svg>`;
            el.src = 'data:image/svg+xml;utf8,' + encodeURIComponent(svg);
        }
        window.BASE_URL = "<?= base_url('/'); ?>";
        window.STORE_WA = "<?= esc($store['whatsapp'] ?? '08123456789'); ?>";
    </script>
    <script src="<?= base_url('js/cart.js'); ?>"></script>
    <script>
        // Navbar Mobile Toggle
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
            }
        });
    </script>
</body>
</html>
