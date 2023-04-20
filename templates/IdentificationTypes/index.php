<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\IdentificationType> $identificationTypes
 */
?>
<div class="identificationTypes index content">
    <?= $this->Html->link(__('New Identification Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Identification Types') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('acronym') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($identificationTypes as $identificationType): ?>
                <tr>
                    <td><?= $this->Number->format($identificationType->id) ?></td>
                    <td><?= h($identificationType->name) ?></td>
                    <td><?= h($identificationType->acronym) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $identificationType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $identificationType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $identificationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $identificationType->id)]) ?>
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
