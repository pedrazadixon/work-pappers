<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuotesItem $quotesItem
 * @var string[]|\Cake\Collection\CollectionInterface $quotes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quotesItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quotesItem->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Quotes Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quotesItems form content">
            <?= $this->Form->create($quotesItem) ?>
            <fieldset>
                <legend><?= __('Edit Quotes Item') ?></legend>
                <?php
                    echo $this->Form->control('quote_id', ['options' => $quotes, 'empty' => true]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('hours');
                    echo $this->Form->control('hour_price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
