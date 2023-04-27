<div class="row">
    <div class="col-12">

        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
                    <div class="row mx-3">
                        <div class="col-12">
                            <h6 class="text-white text-capitalize">Edit Bank Account</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body mt-0">

                <div class="row">
                    <div class="col-12 text-end">
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $bankAccount->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccount->id), 'class' => 'btn btn-sm btn-outline-danger m-0']
                        ) ?>
                    </div>
                </div>

                <?= $this->Form->create($bankAccount) ?>

                <div class="row">

                    <div class="col-12 col-sm-6">
                        <div class="input-group input-group-static mb-4">
                            <label>bank_name</label>
                            <?= $this->Form->control('bank_name', ['class' => 'form-control', 'label' => false]); ?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="input-group input-group-static mb-4">
                            <label class="ms-0">account_type_id</label>
                            <?= $this->Form->control('account_type_id', ['options' => $bankAccountTypes, 'empty' => true, 'class' => 'form-control', 'label' => false]); ?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="input-group input-group-static mb-4">
                            <label>account_number</label>
                            <?= $this->Form->control('account_number', ['class' => 'form-control', 'label' => false]); ?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="input-group input-group-static mb-4">
                            <label>holder_name</label>
                            <?= $this->Form->control('holder_name', ['class' => 'form-control', 'label' => false]); ?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="input-group input-group-static mb-4">
                            <label class="ms-0">holder_identification_type_id</label>
                            <?= $this->Form->control('holder_identification_type_id', ['options' => $identificationTypes, 'empty' => true, 'class' => 'form-control', 'label' => false]); ?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="input-group input-group-static mb-4">
                            <label>holder_identication_number</label>
                            <?= $this->Form->control('holder_identication_number', ['class' => 'form-control', 'label' => false]); ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-danger me-3']) ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success me-3']) ?>
                    </div>

                </div>

                <?= $this->Form->end() ?>

            </div>
        </div>
    </div>
</div>