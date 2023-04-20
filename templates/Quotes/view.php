<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Quote'), ['action' => 'edit', $quote->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Quote'), ['action' => 'delete', $quote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quote->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Quotes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Quote'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quotes view content">
            <h3><?= h($quote->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $quote->has('client') ? $this->Html->link($quote->client->company_name, ['controller' => 'Clients', 'action' => 'view', $quote->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Supplier') ?></th>
                    <td><?= $quote->has('supplier') ? $this->Html->link($quote->supplier->company_name, ['controller' => 'Suppliers', 'action' => 'view', $quote->supplier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($quote->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quotes Status') ?></th>
                    <td><?= $quote->has('quotes_status') ? $this->Html->link($quote->quotes_status->name, ['controller' => 'QuotesStatuses', 'action' => 'view', $quote->quotes_status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($quote->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($quote->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Comment') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($quote->comment)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Bills') ?></h4>
                <?php if (!empty($quote->bills)) : ?>
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
                        <?php foreach ($quote->bills as $bills) : ?>
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
                <h4><?= __('Related Documents') ?></h4>
                <?php if (!empty($quote->documents)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Quote Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Path') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($quote->documents as $documents) : ?>
                        <tr>
                            <td><?= h($documents->id) ?></td>
                            <td><?= h($documents->quote_id) ?></td>
                            <td><?= h($documents->name) ?></td>
                            <td><?= h($documents->path) ?></td>
                            <td><?= h($documents->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Documents', 'action' => 'view', $documents->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Documents', 'action' => 'edit', $documents->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Documents', 'action' => 'delete', $documents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documents->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Notes') ?></h4>
                <?php if (!empty($quote->notes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Quote Id') ?></th>
                            <th><?= __('Note') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($quote->notes as $notes) : ?>
                        <tr>
                            <td><?= h($notes->id) ?></td>
                            <td><?= h($notes->quote_id) ?></td>
                            <td><?= h($notes->note) ?></td>
                            <td><?= h($notes->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Notes', 'action' => 'view', $notes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Notes', 'action' => 'edit', $notes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notes', 'action' => 'delete', $notes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Quotes Items') ?></h4>
                <?php if (!empty($quote->quotes_items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Quote Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Hours') ?></th>
                            <th><?= __('Hour Price') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($quote->quotes_items as $quotesItems) : ?>
                        <tr>
                            <td><?= h($quotesItems->id) ?></td>
                            <td><?= h($quotesItems->quote_id) ?></td>
                            <td><?= h($quotesItems->description) ?></td>
                            <td><?= h($quotesItems->hours) ?></td>
                            <td><?= h($quotesItems->hour_price) ?></td>
                            <td><?= h($quotesItems->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'QuotesItems', 'action' => 'view', $quotesItems->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'QuotesItems', 'action' => 'edit', $quotesItems->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'QuotesItems', 'action' => 'delete', $quotesItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quotesItems->id)]) ?>
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
