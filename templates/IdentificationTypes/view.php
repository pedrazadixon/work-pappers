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
            <?= $this->Html->link(__('Edit Identification Type'), ['action' => 'edit', $identificationType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Identification Type'), ['action' => 'delete', $identificationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $identificationType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Identification Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Identification Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="identificationTypes view content">
            <h3><?= h($identificationType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($identificationType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Acronym') ?></th>
                    <td><?= h($identificationType->acronym) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($identificationType->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Clients') ?></h4>
                <?php if (!empty($identificationType->clients)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Company Name') ?></th>
                            <th><?= __('Identification Type Id') ?></th>
                            <th><?= __('Identification Number') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($identificationType->clients as $clients) : ?>
                        <tr>
                            <td><?= h($clients->id) ?></td>
                            <td><?= h($clients->first_name) ?></td>
                            <td><?= h($clients->last_name) ?></td>
                            <td><?= h($clients->company_name) ?></td>
                            <td><?= h($clients->identification_type_id) ?></td>
                            <td><?= h($clients->identification_number) ?></td>
                            <td><?= h($clients->phone) ?></td>
                            <td><?= h($clients->email) ?></td>
                            <td><?= h($clients->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $clients->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Clients', 'action' => 'edit', $clients->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clients', 'action' => 'delete', $clients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clients->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Suppliers') ?></h4>
                <?php if (!empty($identificationType->suppliers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Company Name') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Identification Type Id') ?></th>
                            <th><?= __('Identification Number') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($identificationType->suppliers as $suppliers) : ?>
                        <tr>
                            <td><?= h($suppliers->id) ?></td>
                            <td><?= h($suppliers->first_name) ?></td>
                            <td><?= h($suppliers->last_name) ?></td>
                            <td><?= h($suppliers->company_name) ?></td>
                            <td><?= h($suppliers->title) ?></td>
                            <td><?= h($suppliers->identification_type_id) ?></td>
                            <td><?= h($suppliers->identification_number) ?></td>
                            <td><?= h($suppliers->phone) ?></td>
                            <td><?= h($suppliers->email) ?></td>
                            <td><?= h($suppliers->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Suppliers', 'action' => 'view', $suppliers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Suppliers', 'action' => 'edit', $suppliers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Suppliers', 'action' => 'delete', $suppliers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suppliers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
