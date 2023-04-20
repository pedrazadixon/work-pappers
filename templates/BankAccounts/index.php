<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\BankAccount> $bankAccounts
 */
?>
<div class="bankAccounts index content">
    <?= $this->Html->link(__('New Bank Account'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Bank Accounts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('bank_name') ?></th>
                    <th><?= $this->Paginator->sort('account_type_id') ?></th>
                    <th><?= $this->Paginator->sort('account_number') ?></th>
                    <th><?= $this->Paginator->sort('holder_name') ?></th>
                    <th><?= $this->Paginator->sort('holder_identification_type_id') ?></th>
                    <th><?= $this->Paginator->sort('holder_identication_number') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bankAccounts as $bankAccount): ?>
                <tr>
                    <td><?= $this->Number->format($bankAccount->id) ?></td>
                    <td><?= h($bankAccount->bank_name) ?></td>
                    <td><?= $bankAccount->has('bank_account_type') ? $this->Html->link($bankAccount->bank_account_type->name, ['controller' => 'BankAccountTypes', 'action' => 'view', $bankAccount->bank_account_type->id]) : '' ?></td>
                    <td><?= h($bankAccount->account_number) ?></td>
                    <td><?= h($bankAccount->holder_name) ?></td>
                    <td><?= $bankAccount->has('identification_type') ? $this->Html->link($bankAccount->identification_type->name, ['controller' => 'IdentificationTypes', 'action' => 'view', $bankAccount->identification_type->id]) : '' ?></td>
                    <td><?= h($bankAccount->holder_identication_number) ?></td>
                    <td><?= h($bankAccount->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bankAccount->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bankAccount->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bankAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccount->id)]) ?>
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
