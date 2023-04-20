<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Supplier'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="suppliers view content">
            <h3><?= h($supplier->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($supplier->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($supplier->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Name') ?></th>
                    <td><?= h($supplier->company_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($supplier->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Identification Type') ?></th>
                    <td><?= $supplier->has('identification_type') ? $this->Html->link($supplier->identification_type->name, ['controller' => 'IdentificationTypes', 'action' => 'view', $supplier->identification_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Identification Number') ?></th>
                    <td><?= h($supplier->identification_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($supplier->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($supplier->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($supplier->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($supplier->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Bills') ?></h4>
                <?php if (!empty($supplier->bills)) : ?>
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
                        <?php foreach ($supplier->bills as $bills) : ?>
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
            <div class="related">
                <h4><?= __('Related Quotes') ?></h4>
                <?php if (!empty($supplier->quotes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Supplier Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Comment') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($supplier->quotes as $quotes) : ?>
                        <tr>
                            <td><?= h($quotes->id) ?></td>
                            <td><?= h($quotes->client_id) ?></td>
                            <td><?= h($quotes->supplier_id) ?></td>
                            <td><?= h($quotes->title) ?></td>
                            <td><?= h($quotes->status_id) ?></td>
                            <td><?= h($quotes->comment) ?></td>
                            <td><?= h($quotes->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Quotes', 'action' => 'view', $quotes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Quotes', 'action' => 'edit', $quotes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Quotes', 'action' => 'delete', $quotes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quotes->id)]) ?>
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
