<div class="row">
    <div class="col-12">

        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
                    <div class="row mx-3">
                        <div class="col-6">
                            <h6 class="text-white text-capitalize">Bills</h6>
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
                                <th><?= $this->Paginator->sort('quote_id') ?></th>
                                <th><?= $this->Paginator->sort('supplier_id') ?></th>
                                <th><?= $this->Paginator->sort('bank_account_id') ?></th>
                                <th><?= $this->Paginator->sort('status_id') ?></th>
                                <th><?= $this->Paginator->sort('date') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bills as $bill) : ?>
                                <tr>
                                    <td>
                                        <?= $this->Number->format($bill->id) ?>
                                    </td>
                                    <td>
                                        <?= $bill->has('quote') ? $this->Html->link($bill->quote->title, ['controller' => 'Quotes', 'action' => 'view', $bill->quote->id]) : '' ?>
                                    </td>
                                    <td>
                                        <?= $bill->has('supplier') ? $this->Html->link($bill->supplier->company_name, ['controller' => 'Suppliers', 'action' => 'view', $bill->supplier->id]) : '' ?>
                                    </td>
                                    <td>
                                        <?= $bill->has('bank_account') ? $this->Html->link($bill->bank_account->full_name, ['controller' => 'BankAccounts', 'action' => 'view', $bill->bank_account->id]) : '' ?>
                                    </td>
                                    <td>
                                        <?= $bill->has('bills_status') ? $this->Html->link($bill->bills_status->name, ['controller' => 'BillsStatuses', 'action' => 'view', $bill->bills_status->id]) : '' ?>
                                    </td>
                                    <td>
                                        <?= h($bill->date) ?>
                                    </td>
                                    <td>
                                        <?= h($bill->created) ?>
                                    </td>
                                    <td class="actions">
                                        <a class="btn btn-sm btn-action btn-icon btn-secondary shadow" href="<?= $this->Url->build(['action' => 'view', $bill->id]) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="view">
                                            <span class="btn-inner--icon"><i class="material-icons">description</i></span>
                                        </a>
                                        <a class="btn btn-sm btn-action btn-icon btn-secondary shadow" href="<?= $this->Url->build(['action' => 'edit', $bill->id]) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="edit">
                                            <span class="btn-inner--icon"><i class="material-icons">edit</i></span>
                                        </a>
                                        <a class="btn btn-sm btn-action btn-icon btn-secondary shadow" href="<?= $this->Url->build(['action' => 'makeWord', $bill->id]) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="download">
                                            <span class="btn-inner--icon"><i class="material-icons">file_present</i></span>
                                        </a>
                                        <?= $this->Form->postLink(
                                            '<span class="btn-inner--icon"><i class="material-icons">delete</i></span>',
                                            ['action' => 'delete', $bill->id],
                                            [
                                                'confirm' => __('Are you sure you want to delete # {0}?', $bill->id),
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