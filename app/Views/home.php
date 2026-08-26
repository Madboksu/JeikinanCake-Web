<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenkeinan's Cake</title>
    <style>
        html {scroll-behavior: smooth;}
    </style>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <nav>
        <div class="logo">JEN-<br>KEINAN'S<br>CAKE</div>
        <ul class="menu">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
            
                <li><a href="/product">Product</a></li> 
            
                <li><a href="#review">Review</a></li>
                <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="cart"><img src="<?= base_url('icon/cart.png'); ?>" alt="cart" width="24" height="24"></div>
    </nav>
    <!-- KONTEN UTAMA -->
    <main>
        <div class="search-bar-wrapper">
            <div class="search-bar">
                <input type="text" placeholder="Search">
                <button><img src="<?= base_url('icon/Search.png'); ?>" alt="search" width="24" height="24"></button>
            </div>
        </div>
        
        <!-- 2. SECTION HOME -->
        <section id="home">
            
            <div class="hero">
                <img src="<?= base_url('image/logo.png'); ?>" alt="logo">
            </div>
        </section>

        <!-- 3. SECTION ABOUT -->
        <section id="about">
            <div class="about-image">
                <img src="<?= base_url('image/donat.png'); ?>" alt="Donat Coklat">
            </div>
            <div class="about-text">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.</p>
                <p>Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur pellentesque nibh nibh, at maximus ante fermentum sit amet.</p>
            </div>
        </section>

        <!-- 4. SECTION BEST SELLERS -->
        <section id="best-sellers" class="best-sellers-section">

            <div class="section-header">
                <h2>Best Sellers</h2>
            </div>
            
            <div class="product-grid">
                <!-- Looping PHP dari Controller -->
                <?php foreach ($best_sellers as $produk) : ?>
                <div class="product-card">
                    <div class="image-wrapper">
                        <img src="<?= base_url('image/' . $produk['product_image']); ?>" alt="<?= $produk['product_name']; ?>">
                    </div>
                    <div class="product-info">
                        <h3><?= $produk['product_name']; ?></h3>
                        <p class="price">Rp. <?= number_format($produk['product_price'], 2, ',', '.'); ?> /pcs</p>
                        
                        <div class="card-actions">
                            <button class="btn-buy">Buy Now</button>
                            <button class="btn-cart">🛒</button> 

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>


            <div class="section-footer">
                <a href="/product" class="view-all">View all ></a>
            </div>
        </section>

        <!-- 5. SECTION REVIEW -->
       <section id="review" class="review-section">
    <h2>What They Said</h2>

    <div class="testimonial-grid">
        <!-- Looping PHP dari Controller -->
        <?php foreach ($testimonials as $testi) : ?>
        <div class="testimonial-card" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url('image/' . $testi['testimonial_image']); ?>');">
            
            <div class="testimonial-content">
                <!-- Judul Kartu (Sesuai mockup: Roti Sourdough) -->
                <h3>ROTI SOURDOUGH</h3>
                
                <!-- Isi Ulasan -->
                <p class="review-text"><?= $testi['testimonial_desc']; ?></p>
            </div>

            <div class="testimonial-footer">
                <!-- Username & Tanggal -->
                <p class="reviewer">@<?= strtolower(str_replace(' ', '', $testi['testimonial_name'])); ?></p>
                <p class="date"><?= date('j F Y', strtotime($testi['testimonial_date'])); ?></p>
                
                <!-- Bintang Kuning -->
                <div class="stars">
                    <?php 
                        $starCount = (int)$testi['testimonial_star'];
                        echo str_repeat('⭐', $starCount);
                    ?>
                </div>
            </div>

        </div>
        <?php endforeach; ?>
    </div>

    <!-- Titik indikator slider -->
    <div class="carousel-dots">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</section>

    </main>

    <!-- 6. FOOTER -->
        <footer class="footer-section">
            <div class="footer-container">
                <!-- Nama Website / Domain -->
                <h2 class="footer-logo">jenkeinancake.com</h2>
                
                <!-- Ikon Sosial Media -->
                <div class="social-icons">
                    <a href="<?= $store['instagram_url'] ?? '#'; ?>" target="_blank" aria-label="Instagram">
                        <i class="fab fa-instagram">📸</i> <!-- Ganti dengan tag ikon jika pakai FontAwesome -->
                    </a>
                    <a href="<?= $store['facebook_url'] ?? '#'; ?>" target="_blank" aria-label="Facebook">
                        <i class="fab fa-facebook">📘</i>
                    </a>
                    <a href="https://wa.me/<?= $store['whatsapp_number'] ?? ''; ?>" target="_blank" aria-label="WhatsApp">
                        <i class="fab fa-whatsapp">💬</i>
                    </a>
                    <a href="<?= $store['maps_url'] ?? '#'; ?>" target="_blank" aria-label="Location">
                        <i class="fas fa-map-marker-alt">📍</i>
                    </a>
                </div>
            </div>
        </footer>
</body>
</html>