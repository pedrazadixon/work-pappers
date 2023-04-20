<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 * @var \Cake\Collection\CollectionInterface|string[] $suppliers
 * @var \Cake\Collection\CollectionInterface|string[] $quotesStatuses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Quotes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quotes form content">
            <?= $this->Form->create($quote) ?>
            <fieldset>
                <legend><?= __('Add Quote') ?></legend>
                <?php
                    echo $this->Form->control('client_id', ['options' => $clients, 'empty' => true]);
                    echo $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('status_id', ['options' => $quotesStatuses, 'empty' => true]);
                    echo $this->Form->control('comment');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
