<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Note $note
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Note'), ['action' => 'edit', $note->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Note'), ['action' => 'delete', $note->id], ['confirm' => __('Are you sure you want to delete # {0}?', $note->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Notes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Note'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="notes view content">
            <h3><?= h($note->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Quote') ?></th>
                    <td><?= $note->has('quote') ? $this->Html->link($note->quote->title, ['controller' => 'Quotes', 'action' => 'view', $note->quote->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($note->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($note->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Note') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($note->note)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
