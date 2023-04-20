<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\QuotesItem> $quotesItems
 */
?>
<div class="quotesItems index content">
    <?= $this->Html->link(__('New Quotes Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Quotes Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('quote_id') ?></th>
                    <th><?= $this->Paginator->sort('hours') ?></th>
                    <th><?= $this->Paginator->sort('hour_price') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quotesItems as $quotesItem): ?>
                <tr>
                    <td><?= $this->Number->format($quotesItem->id) ?></td>
                    <td><?= $quotesItem->has('quote') ? $this->Html->link($quotesItem->quote->title, ['controller' => 'Quotes', 'action' => 'view', $quotesItem->quote->id]) : '' ?></td>
                    <td><?= $quotesItem->hours === null ? '' : $this->Number->format($quotesItem->hours) ?></td>
                    <td><?= $quotesItem->hour_price === null ? '' : $this->Number->format($quotesItem->hour_price) ?></td>
                    <td><?= h($quotesItem->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $quotesItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quotesItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quotesItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quotesItem->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
