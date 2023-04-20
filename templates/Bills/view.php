<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Bill'), ['action' => 'edit', $bill->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bill'), ['action' => 'delete', $bill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bill->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bills'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bill'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bills view content">
            <h3><?= h($bill->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Quote') ?></th>
                    <td><?= $bill->has('quote') ? $this->Html->link($bill->quote->title, ['controller' => 'Quotes', 'action' => 'view', $bill->quote->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Supplier') ?></th>
                    <td><?= $bill->has('supplier') ? $this->Html->link($bill->supplier->title, ['controller' => 'Suppliers', 'action' => 'view', $bill->supplier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Bank Account') ?></th>
                    <td><?= $bill->has('bank_account') ? $this->Html->link($bill->bank_account->id, ['controller' => 'BankAccounts', 'action' => 'view', $bill->bank_account->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Bills Status') ?></th>
                    <td><?= $bill->has('bills_status') ? $this->Html->link($bill->bills_status->name, ['controller' => 'BillsStatuses', 'action' => 'view', $bill->bills_status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bill->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($bill->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($bill->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Payments') ?></h4>
                <?php if (!empty($bill->payments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Bill Id') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Comment') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($bill->payments as $payments) : ?>
                        <tr>
                            <td><?= h($payments->id) ?></td>
                            <td><?= h($payments->bill_id) ?></td>
                            <td><?= h($payments->status_id) ?></td>
                            <td><?= h($payments->comment) ?></td>
                            <td><?= h($payments->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id)]) ?>
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
