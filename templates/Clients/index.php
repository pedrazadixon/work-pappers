<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Client> $clients
 */
?>
<div class="clients index content">
    <?= $this->Html->link(__('New Client'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Clients') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('company_name') ?></th>
                    <th><?= $this->Paginator->sort('identification_type_id') ?></th>
                    <th><?= $this->Paginator->sort('identification_number') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= $this->Number->format($client->id) ?></td>
                    <td><?= h($client->first_name) ?></td>
                    <td><?= h($client->last_name) ?></td>
                    <td><?= h($client->company_name) ?></td>
                    <td><?= $client->has('identification_type') ? $this->Html->link($client->identification_type->name, ['controller' => 'IdentificationTypes', 'action' => 'view', $client->identification_type->id]) : '' ?></td>
                    <td><?= h($client->identification_number) ?></td>
                    <td><?= h($client->phone) ?></td>
                    <td><?= h($client->email) ?></td>
                    <td><?= h($client->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $client->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $client->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
