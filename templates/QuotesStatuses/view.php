<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuotesStatus $quotesStatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Quotes Status'), ['action' => 'edit', $quotesStatus->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Quotes Status'), ['action' => 'delete', $quotesStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quotesStatus->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Quotes Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Quotes Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quotesStatuses view content">
            <h3><?= h($quotesStatus->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($quotesStatus->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($quotesStatus->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
