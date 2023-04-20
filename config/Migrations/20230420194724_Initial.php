<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up(): void
    {
        $this->table('bank_account_types')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->create();

        $this->table('bank_accounts')
            ->addColumn('bank_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('account_type_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('account_number', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('holder_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('holder_identification_type_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('holder_identication_number', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'holder_identification_type_id',
                ]
            )
            ->addIndex(
                [
                    'account_type_id',
                ]
            )
            ->create();

        $this->table('bills')
            ->addColumn('quote_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('supplier_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('bank_account_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('status_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'status_id',
                ]
            )
            ->addIndex(
                [
                    'bank_account_id',
                ]
            )
            ->addIndex(
                [
                    'supplier_id',
                ]
            )
            ->addIndex(
                [
                    'quote_id',
                ]
            )
            ->create();

        $this->table('bills_statuses')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->create();

        $this->table('clients')
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('company_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('identification_type_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('identification_number', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('phone', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'identification_type_id',
                ]
            )
            ->create();

        $this->table('documents')
            ->addColumn('quote_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('path', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'quote_id',
                ]
            )
            ->create();

        $this->table('identification_types')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('acronym', 'string', [
                'default' => null,
                'limit' => 25,
                'null' => true,
            ])
            ->create();

        $this->table('notes')
            ->addColumn('quote_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('note', 'text', [
                'default' => null,
                'limit' => 16777215,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'quote_id',
                ]
            )
            ->create();

        $this->table('payment_statuses')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->create();

        $this->table('payments')
            ->addColumn('bill_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('status_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('comment', 'text', [
                'default' => null,
                'limit' => 16777215,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'status_id',
                ]
            )
            ->addIndex(
                [
                    'bill_id',
                ]
            )
            ->create();

        $this->table('quotes')
            ->addColumn('client_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('supplier_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('status_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('comment', 'text', [
                'default' => null,
                'limit' => 16777215,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'status_id',
                ]
            )
            ->addIndex(
                [
                    'supplier_id',
                ]
            )
            ->addIndex(
                [
                    'client_id',
                ]
            )
            ->create();

        $this->table('quotes_items')
            ->addColumn('quote_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => 16777215,
                'null' => true,
            ])
            ->addColumn('hours', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('hour_price', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 10,
                'scale' => 0,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'quote_id',
                ]
            )
            ->create();

        $this->table('quotes_statuses')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->create();

        $this->table('suppliers')
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('company_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('identification_type_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('identification_number', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('phone', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'identification_type_id',
                ]
            )
            ->create();

        $this->table('bank_accounts')
            ->addForeignKey(
                'holder_identification_type_id',
                'identification_types',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'account_type_id',
                'bank_account_types',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('bills')
            ->addForeignKey(
                'status_id',
                'bills_statuses',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'bank_account_id',
                'bank_accounts',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'supplier_id',
                'suppliers',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'quote_id',
                'quotes',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('clients')
            ->addForeignKey(
                'identification_type_id',
                'identification_types',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('documents')
            ->addForeignKey(
                'quote_id',
                'quotes',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('notes')
            ->addForeignKey(
                'quote_id',
                'quotes',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('payments')
            ->addForeignKey(
                'status_id',
                'payment_statuses',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'bill_id',
                'bills',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('quotes')
            ->addForeignKey(
                'status_id',
                'quotes_statuses',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'supplier_id',
                'suppliers',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->addForeignKey(
                'client_id',
                'clients',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('quotes_items')
            ->addForeignKey(
                'quote_id',
                'quotes',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();

        $this->table('suppliers')
            ->addForeignKey(
                'identification_type_id',
                'identification_types',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT',
                ]
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down(): void
    {
        $this->table('bank_accounts')
            ->dropForeignKey(
                'holder_identification_type_id'
            )
            ->dropForeignKey(
                'account_type_id'
            )->save();

        $this->table('bills')
            ->dropForeignKey(
                'status_id'
            )
            ->dropForeignKey(
                'bank_account_id'
            )
            ->dropForeignKey(
                'supplier_id'
            )
            ->dropForeignKey(
                'quote_id'
            )->save();

        $this->table('clients')
            ->dropForeignKey(
                'identification_type_id'
            )->save();

        $this->table('documents')
            ->dropForeignKey(
                'quote_id'
            )->save();

        $this->table('notes')
            ->dropForeignKey(
                'quote_id'
            )->save();

        $this->table('payments')
            ->dropForeignKey(
                'status_id'
            )
            ->dropForeignKey(
                'bill_id'
            )->save();

        $this->table('quotes')
            ->dropForeignKey(
                'status_id'
            )
            ->dropForeignKey(
                'supplier_id'
            )
            ->dropForeignKey(
                'client_id'
            )->save();

        $this->table('quotes_items')
            ->dropForeignKey(
                'quote_id'
            )->save();

        $this->table('suppliers')
            ->dropForeignKey(
                'identification_type_id'
            )->save();

        $this->table('bank_account_types')->drop()->save();
        $this->table('bank_accounts')->drop()->save();
        $this->table('bills')->drop()->save();
        $this->table('bills_statuses')->drop()->save();
        $this->table('clients')->drop()->save();
        $this->table('documents')->drop()->save();
        $this->table('identification_types')->drop()->save();
        $this->table('notes')->drop()->save();
        $this->table('payment_statuses')->drop()->save();
        $this->table('payments')->drop()->save();
        $this->table('quotes')->drop()->save();
        $this->table('quotes_items')->drop()->save();
        $this->table('quotes_statuses')->drop()->save();
        $this->table('suppliers')->drop()->save();
    }
}
