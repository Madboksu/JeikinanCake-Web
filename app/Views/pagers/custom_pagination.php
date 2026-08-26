<?php
/**
 * Custom Pagination View for Jeikinan Cake Catalog Page
 * Plain text/icon controls without background color or container borders
 */
$pager->setSurroundCount(2);
?>

<?php if ($pager->getPageCount() > 1) : ?>
<div class="pagination-wrapper" role="navigation" aria-label="Page navigation">
    <ul class="pagination-list">
        <?php if ($pager->hasPreviousPage()) : ?>
            <li>
                <a href="<?= $pager->getFirst() ?>" class="page-link" aria-label="First" title="Halaman Pertama">
                    <i class="fa-solid fa-angles-left"></i>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getPreviousPage() ?>" class="page-link" aria-label="Previous" title="Halaman Sebelumnya">
                    <i class="fa-solid fa-angle-left"></i>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a href="<?= $link['uri'] ?>" class="page-link <?= $link['active'] ? 'active' : '' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNextPage()) : ?>
            <li>
                <a href="<?= $pager->getNextPage() ?>" class="page-link" aria-label="Next" title="Halaman Selanjutnya">
                    <i class="fa-solid fa-angle-right"></i>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getLast() ?>" class="page-link" aria-label="Last" title="Halaman Terakhir">
                    <i class="fa-solid fa-angles-right"></i>
                </a>
            </li>
        <?php endif ?>
    </ul>
</div>
<?php endif ?>
