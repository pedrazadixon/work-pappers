<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var string[]|\Cake\Collection\CollectionInterface $bills
 * @var string[]|\Cake\Collection\CollectionInterface $paymentStatuses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payments form content">
            <?= $this->Form->create($payment) ?>
            <fieldset>
                <legend><?= __('Edit Payment') ?></legend>
                <?php
                    echo $this->Form->control('bill_id', ['options' => $bills, 'empty' => true]);
                    echo $this->Form->control('status_id', ['options' => $paymentStatuses, 'empty' => true]);
                    echo $this->Form->control('comment');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
