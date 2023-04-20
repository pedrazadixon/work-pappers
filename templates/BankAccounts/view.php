<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankAccount $bankAccount
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Bank Account'), ['action' => 'edit', $bankAccount->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bank Account'), ['action' => 'delete', $bankAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccount->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bank Accounts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bank Account'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bankAccounts view content">
            <h3><?= h($bankAccount->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Bank Name') ?></th>
                    <td><?= h($bankAccount->bank_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bank Account Type') ?></th>
                    <td><?= $bankAccount->has('bank_account_type') ? $this->Html->link($bankAccount->bank_account_type->name, ['controller' => 'BankAccountTypes', 'action' => 'view', $bankAccount->bank_account_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Account Number') ?></th>
                    <td><?= h($bankAccount->account_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Holder Name') ?></th>
                    <td><?= h($bankAccount->holder_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Identification Type') ?></th>
                    <td><?= $bankAccount->has('identification_type') ? $this->Html->link($bankAccount->identification_type->name, ['controller' => 'IdentificationTypes', 'action' => 'view', $bankAccount->identification_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Holder Identication Number') ?></th>
                    <td><?= h($bankAccount->holder_identication_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bankAccount->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($bankAccount->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Bills') ?></h4>
                <?php if (!empty($bankAccount->bills)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Quote Id') ?></th>
                            <th><?= __('Supplier Id') ?></th>
                            <th><?= __('Bank Account Id') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($bankAccount->bills as $bills) : ?>
                        <tr>
                            <td><?= h($bills->id) ?></td>
                            <td><?= h($bills->quote_id) ?></td>
                            <td><?= h($bills->supplier_id) ?></td>
                            <td><?= h($bills->bank_account_id) ?></td>
                            <td><?= h($bills->status_id) ?></td>
                            <td><?= h($bills->date) ?></td>
                            <td><?= h($bills->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Bills', 'action' => 'view', $bills->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Bills', 'action' => 'edit', $bills->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bills', 'action' => 'delete', $bills->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bills->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
