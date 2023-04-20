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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quotesStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quotesStatus->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Quotes Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quotesStatuses form content">
            <?= $this->Form->create($quotesStatus) ?>
            <fieldset>
                <legend><?= __('Edit Quotes Status') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
