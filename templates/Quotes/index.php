<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Quote> $quotes
 */
?>
<div class="quotes index content">
    <?= $this->Html->link(__('New Quote'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Quotes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('supplier_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quotes as $quote): ?>
                <tr>
                    <td><?= $this->Number->format($quote->id) ?></td>
                    <td><?= $quote->has('client') ? $this->Html->link($quote->client->company_name, ['controller' => 'Clients', 'action' => 'view', $quote->client->id]) : '' ?></td>
                    <td><?= $quote->has('supplier') ? $this->Html->link($quote->supplier->company_name, ['controller' => 'Suppliers', 'action' => 'view', $quote->supplier->id]) : '' ?></td>
                    <td><?= h($quote->title) ?></td>
                    <td><?= $quote->has('quotes_status') ? $this->Html->link($quote->quotes_status->name, ['controller' => 'QuotesStatuses', 'action' => 'view', $quote->quotes_status->id]) : '' ?></td>
                    <td><?= h($quote->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $quote->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quote->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quote->id)]) ?>
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
