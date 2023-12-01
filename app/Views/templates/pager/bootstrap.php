<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>" class="datatable-pagination">
	<ul class="datatable-pagination-list">
		<?php if ($pager->hasPrevious()) : ?>
			<li class="datatable-pagination-list-item">
				<a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>" class="datatable-pagination-list-item-link">
					<span aria-hidden="true"><?= lang('Pager.first') ?></span>
				</a>
			</li>
			<li class="datatable-pagination-list-item">
				<a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>" class="datatable-pagination-list-item-link">
					<span aria-hidden="true"><?= lang('Pager.previous') ?></span>
				</a>
			</li>
		<?php endif ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li class="datatable-pagination-list-item <?= $link['active'] ? '"active"' : '' ?>">
				<a href="<?= $link['uri'] ?>" class="datatable-pagination-list-item-link">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>

		<?php if ($pager->hasNext()) : ?>
			<li>
				<a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
					<span aria-hidden="true"><?= lang('Pager.next') ?></span>
				</a>
			</li>
			<li>
				<a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
					<span aria-hidden="true"><?= lang('Pager.last') ?></span>
				</a>
			</li>
		<?php endif ?>
	</ul>
</nav>
