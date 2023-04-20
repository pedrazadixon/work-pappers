<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Supplier> $suppliers
 */
?>
<div class="suppliers index content">
    <?= $this->Html->link(__('New Supplier'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Suppliers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('company_name') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('identification_type_id') ?></th>
                    <th><?= $this->Paginator->sort('identification_number') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?= $this->Number->format($supplier->id) ?></td>
                    <td><?= h($supplier->first_name) ?></td>
                    <td><?= h($supplier->last_name) ?></td>
                    <td><?= h($supplier->company_name) ?></td>
                    <td><?= h($supplier->title) ?></td>
                    <td><?= $supplier->has('identification_type') ? $this->Html->link($supplier->identification_type->name, ['controller' => 'IdentificationTypes', 'action' => 'view', $supplier->identification_type->id]) : '' ?></td>
                    <td><?= h($supplier->identification_number) ?></td>
                    <td><?= h($supplier->phone) ?></td>
                    <td><?= h($supplier->email) ?></td>
                    <td><?= h($supplier->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $supplier->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplier->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?>
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
