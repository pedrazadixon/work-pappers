<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuotesItem $quotesItem
 * @var \Cake\Collection\CollectionInterface|string[] $quotes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Quotes Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quotesItems form content">
            <?= $this->Form->create($quotesItem) ?>
            <fieldset>
                <legend><?= __('Add Quotes Item') ?></legend>
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
