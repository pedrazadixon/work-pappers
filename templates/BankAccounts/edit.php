<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankAccount $bankAccount
 * @var string[]|\Cake\Collection\CollectionInterface $bankAccountTypes
 * @var string[]|\Cake\Collection\CollectionInterface $identificationTypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bankAccount->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccount->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Bank Accounts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bankAccounts form content">
            <?= $this->Form->create($bankAccount) ?>
            <fieldset>
                <legend><?= __('Edit Bank Account') ?></legend>
                <?php
                    echo $this->Form->control('bank_name');
                    echo $this->Form->control('account_type_id', ['options' => $bankAccountTypes, 'empty' => true]);
                    echo $this->Form->control('account_number');
                    echo $this->Form->control('holder_name');
                    echo $this->Form->control('holder_identification_type_id', ['options' => $identificationTypes, 'empty' => true]);
                    echo $this->Form->control('holder_identication_number');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
