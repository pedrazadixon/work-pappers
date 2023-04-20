<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentStatus $paymentStatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Payment Status'), ['action' => 'edit', $paymentStatus->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Payment Status'), ['action' => 'delete', $paymentStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentStatus->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Payment Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Payment Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="paymentStatuses view content">
            <h3><?= h($paymentStatus->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($paymentStatus->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($paymentStatus->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
