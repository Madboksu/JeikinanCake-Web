<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- SECTION 1: TEKS & GAMBAR LANDING PAGE -->
<div id="store-section" class="card">
    <div class="card-header">
        <h2 class="card-title">
            <i class="fa-solid fa-pen-to-square"></i>
            Pengaturan Teks & Gambar Landing Page
        </h2>
    </div>

    <form action="<?= base_url('admin/store/update') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-grid">
            <div class="form-group full-width">
                <label for="store_name">Nama Toko / Brand</label>
                <input type="text" id="store_name" name="store_name" value="<?= esc($store['store_name'] ?? 'Jeikinan Cake') ?>" required>
            </div>

            <div class="form-group full-width">
                <label for="store_description">Deskripsi Toko (Tentang Kami)</label>
                <textarea id="store_description" name="store_description" rows="4" required><?= esc($store['store_description'] ?? '') ?></textarea>
            </div>

            <div class="form-group full-width">
                <label for="address">Alamat Lengkap Toko</label>
                <textarea id="address" name="address" rows="2" required><?= esc($store['address'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label for="whatsapp">Nomor WhatsApp (Contoh: 6281234567890)</label>
                <input type="text" id="whatsapp" name="whatsapp" value="<?= esc($store['whatsapp'] ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label for="instagram">Username Instagram (Contoh: @jeikinancake)</label>
                <input type="text" id="instagram" name="instagram" value="<?= esc($store['instagram'] ?? '') ?>" required>
            </div>

            <div class="form-group full-width">
                <label for="opening_hours">Jam Operasional Toko</label>
                <input type="text" id="opening_hours" name="opening_hours" value="<?= esc($store['opening_hours'] ?? '') ?>" required>
            </div>
        </div>

        <h3 style="margin: 28px 0 16px; color: var(--text-dark); font-size: 16px; font-weight: 800; border-top: 1px dashed var(--border-color); padding-top: 20px;">
            <i class="fa-solid fa-image" style="color: var(--green-primary);"></i> Kelola Gambar Landing Page
        </h3>

        <div class="form-grid">
            <div class="form-group">
                <label for="store_logo_file">Logo Toko</label>
                <input type="file" id="store_logo_file" name="store_logo_file" accept="image/*">
                <?php if (!empty($store['store_logo'])) : ?>
                    <div style="margin-top: 10px;">
                        <span style="font-size: 12px; color: var(--text-muted);">Logo Saat Ini:</span><br>
                        <img src="<?= base_url('image/' . $store['store_logo']) ?>" alt="Logo" class="img-thumb" style="width: 80px; height: 80px; margin-top: 4px;" onerror="handleImgError(this, 'Logo')">
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="hero_image_file">Gambar Banner Hero Landing Page</label>
                <input type="file" id="hero_image_file" name="hero_image_file" accept="image/*">
                <?php if (!empty($store['hero_image'])) : ?>
                    <div style="margin-top: 10px;">
                        <span style="font-size: 12px; color: var(--text-muted);">Hero Banner Saat Ini:</span><br>
                        <img src="<?= base_url('image/' . $store['hero_image']) ?>" alt="Hero Banner" class="img-thumb" style="width: 120px; height: 70px; margin-top: 4px;" onerror="handleImgError(this, 'Hero')">
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="store_image_file">Gambar Tentang Toko (About Section)</label>
                <input type="file" id="store_image_file" name="store_image_file" accept="image/*">
                <?php if (!empty($store['store_image'])) : ?>
                    <div style="margin-top: 10px;">
                        <span style="font-size: 12px; color: var(--text-muted);">Store Image Saat Ini:</span><br>
                        <img src="<?= base_url('image/' . $store['store_image']) ?>" alt="Store Image" class="img-thumb" style="width: 80px; height: 80px; margin-top: 4px;" onerror="handleImgError(this, 'Store')">
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div style="margin-top: 24px; text-align: right;">
            <button type="submit" class="btn btn-green">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan Teks & Gambar
            </button>
        </div>
    </form>
</div>


<!-- SECTION 2: KELOLA TESTIMONI PELANGGAN -->
<div id="testimonials-section" class="card">
    <div class="card-header">
        <h2 class="card-title">
            <i class="fa-solid fa-comments"></i>
            Kelola Testimoni Pelanggan
        </h2>
        <button type="button" class="btn btn-green btn-sm" onclick="toggleTestimonialAddForm()">
            <i class="fa-solid fa-plus"></i> Tambah Testimoni Baru
        </button>
    </div>

    <!-- Add Testimonial Form -->
    <div id="addTestimonialForm" style="display: none; background: var(--green-light); border: 1px solid var(--green-border); border-radius: 12px; padding: 20px; margin-bottom: 24px;">
        <h3 style="font-size: 16px; font-weight: 700; color: var(--text-dark); margin-bottom: 16px;">Form Tambah Testimoni</h3>
        <form action="<?= base_url('admin/testimonials/save') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-grid">
                <div class="form-group">
                    <label for="testimonial_name">Nama Pelanggan</label>
                    <input type="text" id="testimonial_name" name="testimonial_name" required placeholder="Misal: Amanda Putri">
                </div>

                <div class="form-group">
                    <label for="testimonial_star">Rating Bintang</label>
                    <select id="testimonial_star" name="testimonial_star" required>
                        <option value="5" selected>⭐⭐⭐⭐⭐ (5 Bintang)</option>
                        <option value="4">⭐⭐⭐⭐ (4 Bintang)</option>
                        <option value="3">⭐⭐⭐ (3 Bintang)</option>
                        <option value="2">⭐⭐ (2 Bintang)</option>
                        <option value="1">⭐ (1 Bintang)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="testimonial_image_file">Foto / Avatar Pelanggan</label>
                    <input type="file" id="testimonial_image_file" name="testimonial_image_file" accept="image/*">
                </div>

                <div class="form-group full-width">
                    <label for="testimonial_desc">Ulasan / Testimoni</label>
                    <textarea id="testimonial_desc" name="testimonial_desc" rows="3" required placeholder="Tulis ulasan pembeli..."></textarea>
                </div>
            </div>

            <div style="text-align: right; margin-top: 12px;">
                <button type="button" class="btn btn-secondary btn-sm" onclick="toggleTestimonialAddForm()">Batal</button>
                <button type="submit" class="btn btn-green btn-sm">
                    <i class="fa-solid fa-check"></i> Simpan Testimoni
                </button>
            </div>
        </form>
    </div>

    <!-- Edit Testimonial Form -->
    <div id="editTestimonialForm" style="display: none; background: #fffde7; border: 1px solid #ffe082; border-radius: 12px; padding: 20px; margin-bottom: 24px;">
        <h3 style="font-size: 16px; font-weight: 700; color: var(--text-dark); margin-bottom: 16px;">Form Edit Testimoni</h3>
        <form id="editTestimonialAction" action="" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-grid">
                <div class="form-group">
                    <label for="edit_t_name">Nama Pelanggan</label>
                    <input type="text" id="edit_t_name" name="testimonial_name" required>
                </div>

                <div class="form-group">
                    <label for="edit_t_star">Rating Bintang</label>
                    <select id="edit_t_star" name="testimonial_star" required>
                        <option value="5">⭐⭐⭐⭐⭐ (5 Bintang)</option>
                        <option value="4">⭐⭐⭐⭐ (4 Bintang)</option>
                        <option value="3">⭐⭐⭐ (3 Bintang)</option>
                        <option value="2">⭐⭐ (2 Bintang)</option>
                        <option value="1">⭐ (1 Bintang)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="edit_t_image">Ganti Foto Avatar (Opsional)</label>
                    <input type="file" id="edit_t_image" name="testimonial_image_file" accept="image/*">
                </div>

                <div class="form-group full-width">
                    <label for="edit_t_desc">Ulasan / Testimoni</label>
                    <textarea id="edit_t_desc" name="testimonial_desc" rows="3" required></textarea>
                </div>
            </div>

            <div style="text-align: right; margin-top: 12px;">
                <button type="button" class="btn btn-secondary btn-sm" onclick="closeEditTestimonialForm()">Batal</button>
                <button type="submit" class="btn btn-green btn-sm">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <!-- Testimonials Table -->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama Pelanggan</th>
                    <th>Rating</th>
                    <th>Ulasan</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($testimonials)) : ?>
                    <?php foreach ($testimonials as $t) : ?>
                        <tr>
                            <td>
                                <img src="<?= base_url('image/' . $t['testimonial_image']) ?>" alt="<?= esc($t['testimonial_name']) ?>" class="img-thumb" style="border-radius: 50%;" onerror="handleImgError(this, 'User')">
                            </td>
                            <td><strong><?= esc($t['testimonial_name']) ?></strong></td>
                            <td>
                                <span style="color: #f59e0b; font-size: 13px;">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <?= ($i <= $t['testimonial_star']) ? '★' : '☆' ?>
                                    <?php endfor; ?>
                                </span>
                            </td>
                            <td><?= esc($t['testimonial_desc']) ?></td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="editTestimonial(<?= htmlspecialchars(json_encode($t)) ?>)">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </button>
                                    <a href="<?= base_url('admin/testimonials/delete/' . $t['testimonial_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus testimoni ini?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 24px;">
                            Belum ada testimoni.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- SECTION 3: KELOLA KATALOG PRODUK -->
<div id="products-section" class="card">
    <div class="card-header">
        <h2 class="card-title">
            <i class="fa-solid fa-utensils"></i>
            Kelola Katalog Produk
        </h2>
        <button type="button" class="btn btn-green btn-sm" onclick="toggleProductAddForm()">
            <i class="fa-solid fa-plus"></i> Tambah Produk Baru
        </button>
    </div>

    <!-- Add Product Form -->
    <div id="addProductForm" style="display: none; background: var(--green-light); border: 1px solid var(--green-border); border-radius: 12px; padding: 20px; margin-bottom: 24px;">
        <h3 style="font-size: 16px; font-weight: 700; color: var(--text-dark); margin-bottom: 16px;">Form Tambah Produk Baru</h3>
        <form action="<?= base_url('admin/products/save') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-grid">
                <div class="form-group">
                    <label for="product_name">Nama Produk</label>
                    <input type="text" id="product_name" name="product_name" required placeholder="Misal: Strawberry Shortcake">
                </div>

                <div class="form-group">
                    <label for="product_price">Harga (Rp)</label>
                    <input type="number" id="product_price" name="product_price" step="500" required placeholder="150000">
                </div>

                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select id="category_id" name="category_id" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?= $cat['category_id'] ?>"><?= esc($cat['category_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_image_file">Foto Produk</label>
                    <input type="file" id="product_image_file" name="product_image_file" accept="image/*">
                </div>

                <div class="form-group full-width">
                    <label for="product_desc">Deskripsi Produk</label>
                    <textarea id="product_desc" name="product_desc" rows="3" placeholder="Deskripsi singkat produk..."></textarea>
                </div>

                <div class="form-group full-width" style="display: flex; gap: 20px;">
                    <label style="cursor: pointer;">
                        <input type="checkbox" name="product_is_available" value="1" checked style="width: auto; margin-right: 6px;">
                        Tersedia (Ready Stock)
                    </label>
                    <label style="cursor: pointer;">
                        <input type="checkbox" name="product_is_best_seller" value="1" style="width: auto; margin-right: 6px;">
                        Best Seller di Landing Page
                    </label>
                </div>
            </div>

            <div style="text-align: right; margin-top: 12px;">
                <button type="button" class="btn btn-secondary btn-sm" onclick="toggleProductAddForm()">Batal</button>
                <button type="submit" class="btn btn-green btn-sm">
                    <i class="fa-solid fa-check"></i> Simpan Produk
                </button>
            </div>
        </form>
    </div>

    <!-- Edit Product Form -->
    <div id="editProductForm" style="display: none; background: #fffde7; border: 1px solid #ffe082; border-radius: 12px; padding: 20px; margin-bottom: 24px;">
        <h3 style="font-size: 16px; font-weight: 700; color: var(--text-dark); margin-bottom: 16px;">Form Edit Produk</h3>
        <form id="editProductAction" action="" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-grid">
                <div class="form-group">
                    <label for="edit_p_name">Nama Produk</label>
                    <input type="text" id="edit_p_name" name="product_name" required>
                </div>

                <div class="form-group">
                    <label for="edit_p_price">Harga (Rp)</label>
                    <input type="number" id="edit_p_price" name="product_price" step="500" required>
                </div>

                <div class="form-group">
                    <label for="edit_p_category">Kategori</label>
                    <select id="edit_p_category" name="category_id" required>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?= $cat['category_id'] ?>"><?= esc($cat['category_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="edit_p_image">Ganti Foto (Opsional)</label>
                    <input type="file" id="edit_p_image" name="product_image_file" accept="image/*">
                </div>

                <div class="form-group full-width">
                    <label for="edit_p_desc">Deskripsi Produk</label>
                    <textarea id="edit_p_desc" name="product_desc" rows="3"></textarea>
                </div>

                <div class="form-group full-width" style="display: flex; gap: 20px;">
                    <label style="cursor: pointer;">
                        <input type="checkbox" id="edit_p_avail" name="product_is_available" value="1" style="width: auto; margin-right: 6px;">
                        Tersedia (Ready Stock)
                    </label>
                    <label style="cursor: pointer;">
                        <input type="checkbox" id="edit_p_best" name="product_is_best_seller" value="1" style="width: auto; margin-right: 6px;">
                        Best Seller di Landing Page
                    </label>
                </div>
            </div>

            <div style="text-align: right; margin-top: 12px;">
                <button type="button" class="btn btn-secondary btn-sm" onclick="closeEditProductForm()">Batal</button>
                <button type="submit" class="btn btn-green btn-sm">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <!-- Product Table -->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Best Seller</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)) : ?>
                    <?php foreach ($products as $p) : ?>
                        <tr>
                            <td>
                                <img src="<?= base_url('image/' . $p['product_image']) ?>" alt="<?= esc($p['product_name']) ?>" class="img-thumb" onerror="handleImgError(this, 'Cake')">
                            </td>
                            <td>
                                <strong><?= esc($p['product_name']) ?></strong>
                            </td>
                            <td><?= esc($p['category_name'] ?? 'Umum') ?></td>
                            <td>Rp <?= number_format($p['product_price'], 0, ',', '.') ?></td>
                            <td>
                                <?php if ($p['product_is_available']) : ?>
                                    <span class="badge badge-green">Tersedia</span>
                                <?php else : ?>
                                    <span class="badge badge-gray">Habis</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/products/toggle-best/' . $p['product_id']) ?>" style="text-decoration: none;">
                                    <?php if ($p['product_is_best_seller']) : ?>
                                        <span class="badge badge-brown">★ Best Seller</span>
                                    <?php else : ?>
                                        <span class="badge badge-gray">Biasa</span>
                                    <?php endif; ?>
                                </a>
                            </td>
                            <td>
                                <div style="display: flex; gap: 6px;">
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="editProduct(<?= htmlspecialchars(json_encode($p)) ?>)">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </button>
                                    <a href="<?= base_url('admin/products/delete/' . $p['product_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk ini?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 24px;">
                            Belum ada produk.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function toggleTestimonialAddForm() {
        const form = document.getElementById('addTestimonialForm');
        form.style.display = (form.style.display === 'none') ? 'block' : 'none';
        document.getElementById('editTestimonialForm').style.display = 'none';
    }

    function editTestimonial(t) {
        document.getElementById('addTestimonialForm').style.display = 'none';
        const editForm = document.getElementById('editTestimonialForm');
        editForm.style.display = 'block';

        document.getElementById('editTestimonialAction').action = '<?= base_url('admin/testimonials/update/') ?>' + t.testimonial_id;
        document.getElementById('edit_t_name').value = t.testimonial_name;
        document.getElementById('edit_t_star').value = t.testimonial_star;
        document.getElementById('edit_t_desc').value = t.testimonial_desc;

        editForm.scrollIntoView({ behavior: 'smooth' });
    }

    function closeEditTestimonialForm() {
        document.getElementById('editTestimonialForm').style.display = 'none';
    }

    function toggleProductAddForm() {
        const form = document.getElementById('addProductForm');
        form.style.display = (form.style.display === 'none') ? 'block' : 'none';
        document.getElementById('editProductForm').style.display = 'none';
    }

    function editProduct(p) {
        document.getElementById('addProductForm').style.display = 'none';
        const editForm = document.getElementById('editProductForm');
        editForm.style.display = 'block';

        document.getElementById('editProductAction').action = '<?= base_url('admin/products/update/') ?>' + p.product_id;
        document.getElementById('edit_p_name').value = p.product_name;
        document.getElementById('edit_p_price').value = p.product_price;
        document.getElementById('edit_p_category').value = p.category_id;
        document.getElementById('edit_p_desc').value = p.product_desc || '';
        document.getElementById('edit_p_avail').checked = (parseInt(p.product_is_available) === 1);
        document.getElementById('edit_p_best').checked = (parseInt(p.product_is_best_seller) === 1);

        editForm.scrollIntoView({ behavior: 'smooth' });
    }

    function closeEditProductForm() {
        document.getElementById('editProductForm').style.display = 'none';
    }
</script>

<?= $this->endSection() ?>
