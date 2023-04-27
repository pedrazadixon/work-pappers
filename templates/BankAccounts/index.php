<div class="row">
    <div class="col-12">

        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
                    <div class="row mx-3">
                        <div class="col-6">
                            <h6 class="text-white text-capitalize">Bank Accounts</h6>
                        </div>
                        <div class="col-6 text-end pe-3">
                            <a class="btn btn-white shadow-dark mb-0" href="<?= $this->Url->build(['action' => 'add']) ?>">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;New
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0 mx-3">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('bank_name') ?></th>
                                <th><?= $this->Paginator->sort('account_type_id') ?></th>
                                <th><?= $this->Paginator->sort('account_number') ?></th>
                                <th><?= $this->Paginator->sort('holder_name') ?></th>
                                <th><?= $this->Paginator->sort('holder_identification_type_id') ?></th>
                                <th><?= $this->Paginator->sort('holder_identication_number') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bankAccounts as $bankAccount) : ?>
                                <tr>
                                    <td><?= $this->Number->format($bankAccount->id) ?></td>
                                    <td><?= h($bankAccount->bank_name) ?></td>
                                    <td><?= $bankAccount->has('bank_account_type') ? $this->Html->link($bankAccount->bank_account_type->name, ['controller' => 'BankAccountTypes', 'action' => 'view', $bankAccount->bank_account_type->id]) : '' ?></td>
                                    <td><?= h($bankAccount->account_number) ?></td>
                                    <td><?= h($bankAccount->holder_name) ?></td>
                                    <td><?= $bankAccount->has('identification_type') ? $this->Html->link($bankAccount->identification_type->name, ['controller' => 'IdentificationTypes', 'action' => 'view', $bankAccount->identification_type->id]) : '' ?></td>
                                    <td><?= h($bankAccount->holder_identication_number) ?></td>
                                    <td><?= h($bankAccount->created) ?></td>
                                    <td class="actions">
                                        <a class="btn btn-sm btn-action btn-icon btn-secondary shadow" href="<?= $this->Url->build(['action' => 'view', $bankAccount->id]) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="view">
                                            <span class="btn-inner--icon"><i class="material-icons">description</i></span>
                                        </a>
                                        <a class="btn btn-sm btn-action btn-icon btn-secondary shadow" href="<?= $this->Url->build(['action' => 'edit', $bankAccount->id]) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="edit">
                                            <span class="btn-inner--icon"><i class="material-icons">edit</i></span>
                                        </a>
                                        <?= $this->Form->postLink(
                                            '<span class="btn-inner--icon"><i class="material-icons">delete</i></span>',
                                            ['action' => 'delete', $bankAccount->id],
                                            [
                                                'confirm' => __('Are you sure you want to delete # {0}?', $bankAccount->id),
                                                'escape' => false,
                                                'class' => 'btn btn-sm btn-action btn-icon btn-secondary shadow',
                                                'data-bs-toggle' => 'tooltip',
                                                'data-bs-placement' => 'top',
                                                'title' => 'delete',
                                            ]
                                        ) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center my-3">
                    <ul class="pagination pagination-secondary m-0">
                        <?php if ($this->Paginator->hasPrev()) : ?>
                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?php endif ?>
                        <?= $this->Paginator->numbers() ?>
                        <?php if ($this->Paginator->hasNext()) : ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                        <?php endif ?>
                    </ul>
                </div>
                <p class="text-center"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>

            </div>
        </div>
    </div>
</div>