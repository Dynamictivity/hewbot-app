<?php if (isset($newButton) && $newButton): ?>
    <div class="new_record">
        <?= $this->Html->link(__('New'), ['action' => 'add']) ?>
    </div>
<?php endif; ?>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
