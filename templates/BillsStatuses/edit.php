<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BillsStatus $billsStatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $billsStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $billsStatus->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Bills Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="billsStatuses form content">
            <?= $this->Form->create($billsStatus) ?>
            <fieldset>
                <legend><?= __('Edit Bills Status') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
