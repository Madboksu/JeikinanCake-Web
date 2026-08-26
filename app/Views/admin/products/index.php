<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<style>
    .table-responsive {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 16px;
    }

    th, td {
        padding: 14px 16px;
        text-align: left;
        border-bottom: 1px solid var(--border-color);
        font-size: 14px;
    }

    th {
        color: var(--primary);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
        background: rgba(15, 10, 7, 0.4);
    }

    tr:hover {
        background: rgba(212, 163, 89, 0.05);
    }

    .prod-thumb {
        width: 50px;
        height: 50px;
        border-radius: 8px;
        object-fit: cover;
        border: 1px solid var(--border-color);
    }

    .badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .badge-success {
        background: rgba(72, 187, 120, 0.2);
        color: #68d391;
        border: 1px solid #48bb78;
    }

    .badge-secondary {
        background: rgba(160, 174, 192, 0.2);
        color: #a0aec0;
        border: 1px solid #a0aec0;
    }

    .badge-gold {
        background: rgba(212, 163, 89, 0.25);
        color: var(--primary);
        border: 1px solid var(--primary);
    }

    .action-btns {
        display: flex;
        gap: 8px;
    }

    /* Form Card Hide/Show */
    .form-card-container {
        display: none;
        margin-bottom: 24px;
        animation: fadeIn 0.4s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Add Product Section Header -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <h2 style="font-size: 20px; font-weight: 700; color: var(--text-light);">
        <i class="fa-solid fa-utensils"></i> Manajemen Katalog Produk
    </h2>
    <button type="button" class="btn btn-primary" onclick="toggleAddForm()">
        <i class="fa-solid fa-plus"></i> Tambah Produk Baru
    </button>
</div>

<!-- Add Product Form Card -->
<div id="addFormCard" class="card form-card-container">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Produk Baru</h3>
        <button type="button" class="btn btn-secondary btn-sm" onclick="toggleAddForm()">Batal</button>
    </div>
    <form action="<?= base_url('admin/products/save') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-grid">
            <div class="form-group">
                <label for="product_name">Nama Produk</label>
                <input type="text" id="product_name" name="product_name" required placeholder="Misal: Chocolate Fudge Cake">
            </div>

            <div class="form-group">
                <label for="product_price">Harga (Rp)</label>
                <input type="number" id="product_price" name="product_price" step="500" required placeholder="Misal: 150000">
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
                <textarea id="product_desc" name="product_desc" rows="3" placeholder="Jelaskan keunikan dan rasa produk ini..."></textarea>
            </div>

            <div class="form-group" style="display: flex; gap: 20px; align-items: center; margin-top: 10px;">
                <label style="margin: 0; cursor: pointer;">
                    <input type="checkbox" name="product_is_available" value="1" checked style="width: auto; margin-right: 6px;">
                    Tersedia (Ready Stock)
                </label>
                <label style="margin: 0; cursor: pointer;">
                    <input type="checkbox" name="product_is_best_seller" value="1" style="width: auto; margin-right: 6px;">
                    Tampilkan di Best Seller Landing Page
                </label>
            </div>
        </div>

        <div style="margin-top: 20px; text-align: right;">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-check"></i> Simpan Produk
            </button>
        </div>
    </form>
</div>

<!-- Product Table Card -->
<div class="card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status Stok</th>
                    <th>Best Seller</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)) : ?>
                    <?php foreach ($products as $p) : ?>
                        <tr>
                            <td>
                                <img src="<?= base_url('image/' . $p['product_image']) ?>" alt="<?= esc($p['product_name']) ?>" class="prod-thumb" onerror="this.src='https://via.placeholder.com/50?text=Cake'">
                            </td>
                            <td>
                                <strong><?= esc($p['product_name']) ?></strong>
                                <div style="font-size: 12px; color: var(--text-muted); margin-top: 4px;">
                                    <?= esc(character_limiter($p['product_desc'] ?? '', 40)) ?>
                                </div>
                            </td>
                            <td><?= esc($p['category_name'] ?? 'Umum') ?></td>
                            <td>Rp <?= number_format($p['product_price'], 0, ',', '.') ?></td>
                            <td>
                                <?php if ($p['product_is_available']) : ?>
                                    <span class="badge badge-success">Tersedia</span>
                                <?php else : ?>
                                    <span class="badge badge-secondary">Habis</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/products/toggle-best/' . $p['product_id']) ?>" title="Klik untuk ubah status Best Seller">
                                    <?php if ($p['product_is_best_seller']) : ?>
                                        <span class="badge badge-gold"><i class="fa-solid fa-star"></i> Best Seller</span>
                                    <?php else : ?>
                                        <span class="badge badge-secondary">Biasa</span>
                                    <?php endif; ?>
                                </a>
                            </td>
                            <td>
                                <div class="action-btns">
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="editProduct(<?= htmlspecialchars(json_encode($p)) ?>)">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </button>
                                    <a href="<?= base_url('admin/products/delete/' . $p['product_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 30px;">
                            Belum ada produk yang ditambahkan.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Product Modal / Section -->
<div id="editFormCard" class="card form-card-container">
    <div class="card-header">
        <h3 class="card-title">Edit Produk</h3>
        <button type="button" class="btn btn-secondary btn-sm" onclick="closeEditForm()">Batal</button>
    </div>
    <form id="editForm" action="" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-grid">
            <div class="form-group">
                <label for="edit_product_name">Nama Produk</label>
                <input type="text" id="edit_product_name" name="product_name" required>
            </div>

            <div class="form-group">
                <label for="edit_product_price">Harga (Rp)</label>
                <input type="number" id="edit_product_price" name="product_price" step="500" required>
            </div>

            <div class="form-group">
                <label for="edit_category_id">Kategori</label>
                <select id="edit_category_id" name="category_id" required>
                    <?php foreach ($categories as $cat) : ?>
                        <option value="<?= $cat['category_id'] ?>"><?= esc($cat['category_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="edit_product_image_file">Ganti Foto Produk (Opsional)</label>
                <input type="file" id="edit_product_image_file" name="product_image_file" accept="image/*">
            </div>

            <div class="form-group full-width">
                <label for="edit_product_desc">Deskripsi Produk</label>
                <textarea id="edit_product_desc" name="product_desc" rows="3"></textarea>
            </div>

            <div class="form-group" style="display: flex; gap: 20px; align-items: center;">
                <label style="margin: 0; cursor: pointer;">
                    <input type="checkbox" id="edit_product_is_available" name="product_is_available" value="1" style="width: auto; margin-right: 6px;">
                    Tersedia (Ready Stock)
                </label>
                <label style="margin: 0; cursor: pointer;">
                    <input type="checkbox" id="edit_product_is_best_seller" name="product_is_best_seller" value="1" style="width: auto; margin-right: 6px;">
                    Tampilkan di Best Seller Landing Page
                </label>
            </div>
        </div>

        <div style="margin-top: 20px; text-align: right;">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    function toggleAddForm() {
        const formCard = document.getElementById('addFormCard');
        if (formCard.style.display === 'block') {
            formCard.style.display = 'none';
        } else {
            formCard.style.display = 'block';
            document.getElementById('editFormCard').style.display = 'none';
        }
    }

    function editProduct(product) {
        document.getElementById('addFormCard').style.display = 'none';
        const editCard = document.getElementById('editFormCard');
        editCard.style.display = 'block';

        const form = document.getElementById('editForm');
        form.action = '<?= base_url('admin/products/update/') ?>' + product.product_id;

        document.getElementById('edit_product_name').value = product.product_name;
        document.getElementById('edit_product_price').value = product.product_price;
        document.getElementById('edit_category_id').value = product.category_id;
        document.getElementById('edit_product_desc').value = product.product_desc || '';
        document.getElementById('edit_product_is_available').checked = (parseInt(product.product_is_available) === 1);
        document.getElementById('edit_product_is_best_seller').checked = (parseInt(product.product_is_best_seller) === 1);

        editCard.scrollIntoView({ behavior: 'smooth' });
    }

    function closeEditForm() {
        document.getElementById('editFormCard').style.display = 'none';
    }
</script>

<?= $this->endSection() ?>
