<div class="row">
    <div class="col-12">

        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
                    <div class="row mx-3">
                        <div class="col-6">
                            <h6 class="text-white text-capitalize">Identification Types</h6>
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
                                <th><?= $this->Paginator->sort('name') ?></th>
                                <th><?= $this->Paginator->sort('acronym') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($identificationTypes as $identificationType) : ?>
                                <tr>
                                    <td><?= $this->Number->format($identificationType->id) ?></td>
                                    <td><?= h($identificationType->name) ?></td>
                                    <td><?= h($identificationType->acronym) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $identificationType->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $identificationType->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $identificationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $identificationType->id)]) ?>
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