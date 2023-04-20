<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IdentificationType $identificationType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $identificationType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $identificationType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Identification Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="identificationTypes form content">
            <?= $this->Form->create($identificationType) ?>
            <fieldset>
                <legend><?= __('Edit Identification Type') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('acronym');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
