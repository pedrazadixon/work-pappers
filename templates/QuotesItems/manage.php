<div class="row">
    <div class="col-12">

        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
                    <div class="row mx-3">
                        <div class="col-12">
                            <h6 class="text-white text-capitalize">Quote Items</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body mt-2" id="app1">

                <form @submit="checkForm" action="" method="post">

                    <?= $this->Form->hidden('quote_id', ['value' => $quote->id]); ?>

                    <div class="row" v-for="(item, index) in items">

                        <div class="col-12 col-md-7">
                            <div class="input-group input-group-static mb-4">
                                <label>description</label>
                                <textarea v-model="item.description" class="form-control" required rows="1"></textarea>
                            </div>
                        </div>

                        <div class="col-12 col-md-2">
                            <div class="input-group input-group-static mb-4">
                                <label>hours</label>
                                <input type="number" v-model="item.hours" @keyup="updateTotals" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-2">
                            <div class="input-group input-group-static mb-4">
                                <label>hour_price</label>
                                <input type="number" v-model="item.hour_price" @keyup="updateTotals" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-1">
                            <button type="button" class="btn btn-danger" @click="deleteItem(index)">X</button>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12 col-md-7">
                        </div>

                        <div class="col-12 col-md-2">
                            <span id="hours_total"></span>
                        </div>

                        <div class="col-12 col-md-2">
                            <span id="price_total"></span>
                        </div>

                        <div class="col-12 col-md-1">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 text-end">
                            <button type="button" class="btn btn-info me-5" @click="addItem">Agregar item</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <?= $this->Html->link(__('Cancel'), ['controller' => 'Quotes', 'action' => 'index'], ['class' => 'btn btn-danger me-3']) ?>
                            <button type="submit" class="btn btn-success me-3">Agregar item</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<?php $token = $this->request->getAttribute('csrfToken') ?>

<?php $this->start('end_scripts') ?>


<?= $this->Html->scriptBlock(sprintf(
    'var quote_items = %s;',
    json_encode($quote_items, true)
)) ?>


<script src="//cdnjs.cloudflare.com/ajax/libs/vue/3.2.47/vue.global.prod.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>

<script>
    Vue.createApp({
        data: () => ({
            items: quote_items.length > 0 ? quote_items : [{
                id: null,
                description: '',
                hours: '',
                hour_price: '',
            }]
        }),
        mounted() {
            this.updateTotals()
        },
        methods: {
            updateTotals() {
                let total_hours = 0;
                let total_price = 0;
                for (let i = 0; i < this.items.length; i++) {
                    let el = this.items[i];

                    console.log(el.hours)

                    if (el.hours === '' || el.hour_price === '') {
                        total_hours = 0
                        total_price = 0
                        break;
                    }

                    total_hours += parseInt(el.hours)
                    total_price += parseInt(el.hour_price) * parseInt(el.hours)
                }

                document.getElementById('hours_total').textContent = total_hours
                document.getElementById('price_total').textContent = Intl.NumberFormat('es-CO', {
                    style: 'currency',
                    currency: 'COP',
                    maximumFractionDigits: 0,
                    minimumFractionDigits: 0,
                }).format(total_price)

            },
            addItem() {
                this.items.push({
                    id: null,
                    description: '',
                    hours: '',
                    hour_price: '',
                })
                this.updateTotals()
            },
            deleteItem(index) {
                if (this.items.length > 1)
                    this.items.splice(index, 1);
                this.updateTotals()
            },
            checkForm(e) {
                e.preventDefault();
                this.submit()
            },
            submit() {
                axios.post('<?= $this->Url->build('', ['fullBase' => true]) ?>',
                        this.items, {
                            headers: {
                                'X-CSRF-Token': '<?= $token ?>',
                            }
                        })
                    .then((response) => {
                        // location.reload()
                        console.log(response)
                        location.reload();

                    })
                    .catch((error) => {
                        location.reload();
                    });

            }

        }
    }).mount('#app1')
</script>

<?php $this->end() ?>