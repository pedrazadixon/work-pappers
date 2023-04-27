<div class="row">
    <div class="col-12">

        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
                    <div class="row mx-3">
                        <div class="col-12">
                            <h6 class="text-white text-capitalize">New Quote</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body mt-2">

                <?= $this->Form->create($quote) ?>

                <div class="row">

                    <div class="col-12">
                        <div class="input-group input-group-static mb-4">
                            <label>title</label>
                            <?= $this->Form->control('title', ['class' => 'form-control', 'label' => false]); ?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="input-group input-group-static mb-4">
                            <label class="ms-0">client_id</label>
                            <?= $this->Form->control('client_id', ['options' => $clients, 'empty' => true, 'class' => 'form-control', 'label' => false]); ?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="input-group input-group-static mb-4">
                            <label>supplier_id</label>
                            <?= $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true, 'class' => 'form-control', 'label' => false]); ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group input-group-static mb-4">
                            <label>comment</label>
                            <?= $this->Form->control('comment', ['class' => 'form-control', 'label' => false, 'rows' => 2]); ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group input-group-static mb-4">
                            <label>status_id</label>
                            <?= $this->Form->control('status_id', ['options' => $quotesStatuses, 'empty' => true, 'class' => 'form-control', 'label' => false]); ?>
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