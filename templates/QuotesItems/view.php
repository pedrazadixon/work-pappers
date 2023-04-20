<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuotesItem $quotesItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Quotes Item'), ['action' => 'edit', $quotesItem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Quotes Item'), ['action' => 'delete', $quotesItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quotesItem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Quotes Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Quotes Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quotesItems view content">
            <h3><?= h($quotesItem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Quote') ?></th>
                    <td><?= $quotesItem->has('quote') ? $this->Html->link($quotesItem->quote->title, ['controller' => 'Quotes', 'action' => 'view', $quotesItem->quote->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($quotesItem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hours') ?></th>
                    <td><?= $quotesItem->hours === null ? '' : $this->Number->format($quotesItem->hours) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hour Price') ?></th>
                    <td><?= $quotesItem->hour_price === null ? '' : $this->Number->format($quotesItem->hour_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($quotesItem->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($quotesItem->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
