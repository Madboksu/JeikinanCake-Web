<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<style>
    .star-rating {
        color: #f6e05e;
        font-size: 14px;
    }
</style>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <h2 style="font-size: 20px; font-weight: 700; color: var(--text-light);">
        <i class="fa-solid fa-comments"></i> Manajemen Testimoni Pelanggan
    </h2>
    <button type="button" class="btn btn-primary" onclick="toggleAddForm()">
        <i class="fa-solid fa-plus"></i> Tambah Testimoni Baru
    </button>
</div>

<!-- Add Form -->
<div id="addFormCard" class="card form-card-container" style="display: none;">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Testimoni</h3>
        <button type="button" class="btn btn-secondary btn-sm" onclick="toggleAddForm()">Batal</button>
    </div>
    <form action="<?= base_url('admin/testimonials/save') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-grid">
            <div class="form-group">
                <label for="testimonial_name">Nama Pelanggan</label>
                <input type="text" id="testimonial_name" name="testimonial_name" required placeholder="Misal: Amanda Putri">
            </div>

            <div class="form-group">
                <label for="testimonial_star">Rating Bintang (1 - 5)</label>
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
                <textarea id="testimonial_desc" name="testimonial_desc" rows="3" required placeholder="Tuliskan ulasan kepuasan rasa cake dan pelayanan..."></textarea>
            </div>
        </div>

        <div style="margin-top: 20px; text-align: right;">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-check"></i> Simpan Testimoni
            </button>
        </div>
    </form>
</div>

<!-- Testimonials Table -->
<div class="card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama Pelanggan</th>
                    <th>Rating</th>
                    <th>Ulasan / Review</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($testimonials)) : ?>
                    <?php foreach ($testimonials as $t) : ?>
                        <tr>
                            <td>
                                <img src="<?= base_url('image/' . $t['testimonial_image']) ?>" alt="<?= esc($t['testimonial_name']) ?>" class="prod-thumb" style="border-radius: 50%;" onerror="this.src='https://via.placeholder.com/50?text=User'">
                            </td>
                            <td><strong><?= esc($t['testimonial_name']) ?></strong></td>
                            <td>
                                <div class="star-rating">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <?php if ($i <= $t['testimonial_star']) : ?>
                                            <i class="fa-solid fa-star"></i>
                                        <?php else : ?>
                                            <i class="fa-regular fa-star" style="color: var(--text-muted);"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                            </td>
                            <td><?= esc($t['testimonial_desc']) ?></td>
                            <td>
                                <div class="action-btns">
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="editTestimonial(<?= htmlspecialchars(json_encode($t)) ?>)">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </button>
                                    <a href="<?= base_url('admin/testimonials/delete/' . $t['testimonial_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus testimoni ini?')">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 30px;">
                            Belum ada testimoni.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Form -->
<div id="editFormCard" class="card form-card-container" style="display: none;">
    <div class="card-header">
        <h3 class="card-title">Edit Testimoni</h3>
        <button type="button" class="btn btn-secondary btn-sm" onclick="closeEditForm()">Batal</button>
    </div>
    <form id="editForm" action="" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-grid">
            <div class="form-group">
                <label for="edit_testimonial_name">Nama Pelanggan</label>
                <input type="text" id="edit_testimonial_name" name="testimonial_name" required>
            </div>

            <div class="form-group">
                <label for="edit_testimonial_star">Rating Bintang</label>
                <select id="edit_testimonial_star" name="testimonial_star" required>
                    <option value="5">⭐⭐⭐⭐⭐ (5 Bintang)</option>
                    <option value="4">⭐⭐⭐⭐ (4 Bintang)</option>
                    <option value="3">⭐⭐⭐ (3 Bintang)</option>
                    <option value="2">⭐⭐ (2 Bintang)</option>
                    <option value="1">⭐ (1 Bintang)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="edit_testimonial_image_file">Ganti Foto (Opsional)</label>
                <input type="file" id="edit_testimonial_image_file" name="testimonial_image_file" accept="image/*">
            </div>

            <div class="form-group full-width">
                <label for="edit_testimonial_desc">Ulasan / Testimoni</label>
                <textarea id="edit_testimonial_desc" name="testimonial_desc" rows="3" required></textarea>
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

    function editTestimonial(testimonial) {
        document.getElementById('addFormCard').style.display = 'none';
        const editCard = document.getElementById('editFormCard');
        editCard.style.display = 'block';

        const form = document.getElementById('editForm');
        form.action = '<?= base_url('admin/testimonials/update/') ?>' + testimonial.testimonial_id;

        document.getElementById('edit_testimonial_name').value = testimonial.testimonial_name;
        document.getElementById('edit_testimonial_star').value = testimonial.testimonial_star;
        document.getElementById('edit_testimonial_desc').value = testimonial.testimonial_desc;

        editCard.scrollIntoView({ behavior: 'smooth' });
    }

    function closeEditForm() {
        document.getElementById('editFormCard').style.display = 'none';
    }
</script>

<?= $this->endSection() ?>
