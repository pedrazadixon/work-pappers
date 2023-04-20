<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill $bill
 * @var \Cake\Collection\CollectionInterface|string[] $quotes
 * @var \Cake\Collection\CollectionInterface|string[] $suppliers
 * @var \Cake\Collection\CollectionInterface|string[] $bankAccounts
 * @var \Cake\Collection\CollectionInterface|string[] $billsStatuses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Bills'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bills form content">
            <?= $this->Form->create($bill) ?>
            <fieldset>
                <legend><?= __('Add Bill') ?></legend>
                <?php
                    echo $this->Form->control('quote_id', ['options' => $quotes, 'empty' => true]);
                    echo $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true]);
                    echo $this->Form->control('bank_account_id', ['options' => $bankAccounts, 'empty' => true]);
                    echo $this->Form->control('status_id', ['options' => $billsStatuses, 'empty' => true]);
                    echo $this->Form->control('date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
