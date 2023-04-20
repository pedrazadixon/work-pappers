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
            <?= $this->Html->link(__('Edit Bank Account Type'), ['action' => 'edit', $bankAccountType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bank Account Type'), ['action' => 'delete', $bankAccountType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccountType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bank Account Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bank Account Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bankAccountTypes view content">
            <h3><?= h($bankAccountType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($bankAccountType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bankAccountType->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
