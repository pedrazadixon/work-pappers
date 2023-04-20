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
            <?= $this->Html->link(__('Edit Bills Status'), ['action' => 'edit', $billsStatus->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bills Status'), ['action' => 'delete', $billsStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $billsStatus->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bills Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bills Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="billsStatuses view content">
            <h3><?= h($billsStatus->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($billsStatus->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($billsStatus->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
