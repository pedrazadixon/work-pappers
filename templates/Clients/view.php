<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Clients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Client'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clients view content">
            <h3><?= h($client->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($client->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($client->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Name') ?></th>
                    <td><?= h($client->company_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Identification Type') ?></th>
                    <td><?= $client->has('identification_type') ? $this->Html->link($client->identification_type->name, ['controller' => 'IdentificationTypes', 'action' => 'view', $client->identification_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Identification Number') ?></th>
                    <td><?= h($client->identification_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($client->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($client->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($client->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($client->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Quotes') ?></h4>
                <?php if (!empty($client->quotes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Supplier Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Comment') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($client->quotes as $quotes) : ?>
                        <tr>
                            <td><?= h($quotes->id) ?></td>
                            <td><?= h($quotes->client_id) ?></td>
                            <td><?= h($quotes->supplier_id) ?></td>
                            <td><?= h($quotes->title) ?></td>
                            <td><?= h($quotes->status_id) ?></td>
                            <td><?= h($quotes->comment) ?></td>
                            <td><?= h($quotes->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Quotes', 'action' => 'view', $quotes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Quotes', 'action' => 'edit', $quotes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Quotes', 'action' => 'delete', $quotes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quotes->id)]) ?>
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
