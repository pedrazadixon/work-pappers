<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankAccountType $bankAccountType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bankAccountType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccountType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Bank Account Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bankAccountTypes form content">
            <?= $this->Form->create($bankAccountType) ?>
            <fieldset>
                <legend><?= __('Edit Bank Account Type') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
