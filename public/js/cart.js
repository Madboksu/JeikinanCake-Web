/**
 * Jeikinan Cake - Cart & Order System (localStorage + WA Redirection)
 */

const CartManager = {
    STORAGE_KEY: 'jeikinan_cart',

    // Fetch array of items from localStorage
    getItems: function () {
        try {
            const data = localStorage.getItem(this.STORAGE_KEY);
            return data ? JSON.parse(data) : [];
        } catch (e) {
            console.error('Error reading cart from localStorage:', e);
            return [];
        }
    },

    // Save array of items to localStorage and sync UI
    saveItems: function (items) {
        try {
            localStorage.setItem(this.STORAGE_KEY, JSON.stringify(items));
            this.updateBadge();
            this.renderCartUI();
        } catch (e) {
            console.error('Error saving cart to localStorage:', e);
        }
    },

    // Add product to cart
    addItem: function (product, qty = 1) {
        const items = this.getItems();
        const existingIndex = items.findIndex(item => item.id == product.id);

        if (existingIndex > -1) {
            items[existingIndex].quantity += qty;
        } else {
            items.push({
                id: product.id,
                name: product.name,
                price: parseFloat(product.price),
                image: product.image,
                quantity: qty
            });
        }

        this.saveItems(items);
        this.showToast(`"${product.name}" berhasil ditambahkan ke keranjang!`);
    },

    // Update item quantity
    updateQuantity: function (id, qty) {
        let items = this.getItems();
        const target = items.find(item => item.id == id);

        if (target) {
            if (qty <= 0) {
                this.removeItem(id);
                return;
            }
            target.quantity = parseInt(qty);
            this.saveItems(items);
        }
    },

    // Remove single item
    removeItem: function (id) {
        let items = this.getItems();
        const itemToRemove = items.find(item => item.id == id);
        items = items.filter(item => item.id != id);
        this.saveItems(items);

        if (itemToRemove) {
            this.showToast(`"${itemToRemove.name}" dihapus dari keranjang.`, 'info');
        }
    },

    // Clear entire cart
    clearCart: function () {
        localStorage.removeItem(this.STORAGE_KEY);
        this.updateBadge();
        this.renderCartUI();
    },

    // Total items count
    getTotalCount: function () {
        const items = this.getItems();
        return items.reduce((total, item) => total + item.quantity, 0);
    },

    // Total price
    getTotalPrice: function () {
        const items = this.getItems();
        return items.reduce((total, item) => total + (item.price * item.quantity), 0);
    },

    // Update navbar badge
    updateBadge: function () {
        const badge = document.getElementById('cartBadge');
        if (!badge) return;

        const count = this.getTotalCount();
        if (count > 0) {
            badge.textContent = count > 99 ? '99+' : count;
            badge.style.display = 'flex';
            
            // Pop animation
            badge.classList.remove('pop-anim');
            void badge.offsetWidth; // trigger reflow
            badge.classList.add('pop-anim');
        } else {
            badge.style.display = 'none';
        }
    },

    // Render Cart Page / Drawer UI
    renderCartUI: function () {
        const container = document.getElementById('cartItemsContainer');
        const summaryTotalItems = document.getElementById('summaryTotalItems');
        const summaryTotalPrice = document.getElementById('summaryTotalPrice');
        if (!container) return;

        const items = this.getItems();
        const baseUrl = window.BASE_URL || '/';

        if (items.length === 0) {
            container.innerHTML = `
                <div class="empty-cart-state">
                    <div class="empty-icon"><i class="fa-solid fa-basket-shopping"></i></div>
                    <h3>Keranjang Belanja Kosong</h3>
                    <p>Anda belum menambahkan produk ke keranjang.</p>
                    <a href="${baseUrl}product" class="btn-browse-products">Lihat Katalog Produk</a>
                </div>
            `;

            if (summaryTotalItems) summaryTotalItems.textContent = '0 Item';
            if (summaryTotalPrice) summaryTotalPrice.textContent = 'Rp. 0';
            return;
        }

        let html = '';
        items.forEach(item => {
            const itemTotal = item.price * item.quantity;
            html += `
                <div class="cart-item-card" data-id="${item.id}">
                    <div class="item-header">
                        <h3 class="item-title">${this.escapeHtml(item.name)}</h3>
                        <button type="button" class="btn-remove-item" onclick="CartManager.removeItem('${item.id}')" title="Hapus Produk">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>

                    <div class="item-body">
                        <div class="item-image-col">
                            <img src="${baseUrl}image/${this.escapeHtml(item.image)}" 
                                 alt="${this.escapeHtml(item.name)}" 
                                 onerror="handleImgError(this, '${this.escapeHtml(item.name)}')">
                        </div>

                        <div class="item-detail-col">
                            <div class="detail-group">
                                <span class="detail-label">each</span>
                                <span class="detail-val">Rp. ${this.formatPrice(item.price)}</span>
                            </div>

                            <div class="detail-group">
                                <span class="detail-label">Quanty</span>
                                <div class="qty-control">
                                    <button type="button" onclick="CartManager.updateQuantity('${item.id}', ${item.quantity - 1})" aria-label="Kurangi">-</button>
                                    <input type="number" value="${item.quantity}" min="1" onchange="CartManager.updateQuantity('${item.id}', parseInt(this.value) || 1)">
                                    <button type="button" onclick="CartManager.updateQuantity('${item.id}', ${item.quantity + 1})" aria-label="Tambah">+</button>
                                </div>
                            </div>

                            <div class="detail-group">
                                <span class="detail-label">Total</span>
                                <span class="detail-val total-val">Rp. ${this.formatPrice(itemTotal)}</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        container.innerHTML = html;

        if (summaryTotalItems) {
            summaryTotalItems.textContent = `${this.getTotalCount()} Item`;
        }

        if (summaryTotalPrice) {
            summaryTotalPrice.textContent = `Rp. ${this.formatPrice(this.getTotalPrice())}`;
        }
    },

    // Toast Notification
    showToast: function (msg, type = 'success') {
        let toast = document.getElementById('cartToast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'cartToast';
            toast.className = 'cart-toast';
            document.body.appendChild(toast);
        }

        const iconClass = type === 'success' ? 'fa-circle-check' : 'fa-circle-info';
        toast.innerHTML = `<i class="fa-solid ${iconClass}"></i> <span>${this.escapeHtml(msg)}</span>`;
        toast.classList.add('show');

        clearTimeout(toast.timer);
        toast.timer = setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    },

    // Helpers
    formatPrice: function (num) {
        return new Intl.NumberFormat('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(num);
    },

    escapeHtml: function (str) {
        return (str || '').replace(/[&<>"']/g, function (m) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' }[m];
        });
    }
};

// Global Event Listeners & Modal Logic
document.addEventListener('DOMContentLoaded', function () {
    CartManager.updateBadge();
    CartManager.renderCartUI();

    // Delegate Add to Cart clicks
    document.addEventListener('click', function (e) {
        const btnCart = e.target.closest('.btn-cart');
        if (btnCart) {
            e.preventDefault();
            const id = btnCart.getAttribute('data-id');
            const name = btnCart.getAttribute('data-name');
            const price = btnCart.getAttribute('data-price');
            const image = btnCart.getAttribute('data-image');

            if (id && name && price) {
                CartManager.addItem({ id, name, price, image });
            }
            return;
        }

        // Delegate Buy Now clicks
        const btnBuy = e.target.closest('.btn-buy');
        if (btnBuy) {
            e.preventDefault();
            const id = btnBuy.getAttribute('data-id');
            const name = btnBuy.getAttribute('data-name');
            const price = btnBuy.getAttribute('data-price');
            const image = btnBuy.getAttribute('data-image');

            if (id && name && price) {
                openBuyNowModal({ id, name, price, image });
            }
            return;
        }
    });

    // Checkout via WA button handler (on Cart Page)
    const btnCheckoutWA = document.getElementById('btnCheckoutWA');
    if (btnCheckoutWA) {
        btnCheckoutWA.addEventListener('click', function () {
            const items = CartManager.getItems();
            if (items.length === 0) {
                CartManager.showToast('Keranjang Anda masih kosong!', 'info');
                return;
            }

            const nameInput = document.getElementById('customerName');
            const notesInput = document.getElementById('customerNotes');

            if (!nameInput || !nameInput.value.trim()) {
                alert('Silakan masukkan Nama Pemesan terlebih dahulu.');
                if (nameInput) nameInput.focus();
                return;
            }

            const name = nameInput.value.trim();
            const notes = notesInput ? notesInput.value.trim() : '';

            // Show Confirmation Modal
            openCartCheckoutModal(name, notes, items);
        });
    }
});

// Buy Now Mini Modal logic
let currentBuyNowItem = null;
let buyNowQty = 1;

function openBuyNowModal(product) {
    currentBuyNowItem = product;
    buyNowQty = 1;

    let modal = document.getElementById('buyNowModal');
    if (!modal) return;

    const imgEl = document.getElementById('buyNowImg');
    if (imgEl) {
        imgEl.src = (window.BASE_URL || '/') + 'image/' + product.image;
        imgEl.onerror = function() { handleImgError(this, product.name); };
    }

    const titleEl = document.getElementById('buyNowTitle');
    if (titleEl) titleEl.textContent = product.name;

    const unitEl = document.getElementById('buyNowUnitVal');
    if (unitEl) unitEl.textContent = 'Rp. ' + CartManager.formatPrice(product.price);

    const qtyInput = document.getElementById('buyNowQtyInput');
    if (qtyInput) qtyInput.value = buyNowQty;
    
    updateBuyNowTotal();

    modal.classList.add('active');
}

function updateBuyNowTotal() {
    if (!currentBuyNowItem) return;
    const total = currentBuyNowItem.price * buyNowQty;
    const totalEl = document.getElementById('buyNowTotalVal');
    if (totalEl) totalEl.textContent = 'Rp. ' + CartManager.formatPrice(total);
}

function changeBuyNowQty(delta) {
    buyNowQty = Math.max(1, buyNowQty + delta);
    const qtyInput = document.getElementById('buyNowQtyInput');
    if (qtyInput) qtyInput.value = buyNowQty;
    updateBuyNowTotal();
}

function closeBuyNowModal() {
    const modal = document.getElementById('buyNowModal');
    if (modal) modal.classList.remove('active');
}

function submitBuyNowWA() {
    if (!currentBuyNowItem) return;

    const nameInput = document.getElementById('buyNowCustomerName');
    const notesInput = document.getElementById('buyNowNotes');

    if (!nameInput || !nameInput.value.trim()) {
        alert('Silakan masukkan Nama Pemesan terlebih dahulu.');
        if (nameInput) nameInput.focus();
        return;
    }

    const name = nameInput.value.trim();
    const notes = notesInput ? notesInput.value.trim() : '';
    const total = currentBuyNowItem.price * buyNowQty;

    let waNum = window.STORE_WA || '';
    waNum = waNum.replace(/[^0-9]/g, '');
    if (!waNum) waNum = '628123456789';

    let text = `*Halo Jeikinan Cake, saya mau pesan langsung:*

*Detail Pesanan:*
• ${currentBuyNowItem.name} (x${buyNowQty}) - Rp ${CartManager.formatPrice(total)}

*Total Pembayaran:* Rp ${CartManager.formatPrice(total)}
*Nama Pemesan:* ${name}`;

    if (notes) {
        text += `\n*Catatan:* ${notes}`;
    }

    text += `\n\nTerima kasih!`;

    const waUrl = `https://wa.me/${waNum}?text=${encodeURIComponent(text)}`;
    closeBuyNowModal();
    window.open(waUrl, '_blank');
}

// Cart Checkout Confirmation Modal
function openCartCheckoutModal(name, notes, items) {
    let modal = document.getElementById('cartCheckoutModal');
    if (!modal) return;

    const itemsSummary = document.getElementById('confirmItemsSummary');
    const nameVal = document.getElementById('confirmNameVal');
    const notesVal = document.getElementById('confirmNotesVal');
    const totalVal = document.getElementById('confirmTotalVal');

    if (nameVal) nameVal.textContent = name;
    if (notesVal) notesVal.textContent = notes || '-';
    if (totalVal) totalVal.textContent = 'Rp. ' + CartManager.formatPrice(CartManager.getTotalPrice());

    if (itemsSummary) {
        let html = '<ul class="confirm-item-list">';
        items.forEach((item, index) => {
            html += `<li><strong>${index + 1}. ${CartManager.escapeHtml(item.name)}</strong> (x${item.quantity}) - Rp. ${CartManager.formatPrice(item.price * item.quantity)}</li>`;
        });
        html += '</ul>';
        itemsSummary.innerHTML = html;
    }

    modal.classList.add('active');
}

function closeCartCheckoutModal() {
    const modal = document.getElementById('cartCheckoutModal');
    if (modal) modal.classList.remove('active');
}

function confirmSendCartWA() {
    const items = CartManager.getItems();
    const nameInput = document.getElementById('customerName');
    const notesInput = document.getElementById('customerNotes');

    const name = nameInput ? nameInput.value.trim() : 'Pelanggan';
    const notes = notesInput ? notesInput.value.trim() : '';

    let waNum = window.STORE_WA || '';
    waNum = waNum.replace(/[^0-9]/g, '');
    if (!waNum) waNum = '628123456789';

    let text = `*Halo Jeikinan Cake, saya mau pesan dari Website:*

*Daftar Pesanan:*`;

    items.forEach((item, index) => {
        text += `\n${index + 1}. ${item.name} (x${item.quantity}) - Rp ${CartManager.formatPrice(item.price * item.quantity)}`;
    });

    text += `\n\n*Total Pembayaran:* Rp ${CartManager.formatPrice(CartManager.getTotalPrice())}`;
    text += `\n*Nama Pemesan:* ${name}`;

    if (notes) {
        text += `\n*Catatan:* ${notes}`;
    }

    text += `\n\nTerima kasih!`;

    const waUrl = `https://wa.me/${waNum}?text=${encodeURIComponent(text)}`;
    closeCartCheckoutModal();
    CartManager.clearCart();
    window.open(waUrl, '_blank');
}
