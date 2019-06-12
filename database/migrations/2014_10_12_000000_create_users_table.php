<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('currency_name', 20)->default('');
            $table->string('iso_code', 5)->default('');
            $table->string('direction', 5)->default('');
            $table->string('symbol', 5)->default('');
            $table->integer('denary')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('currency_name');
            $table->index('iso_code');
            $table->index('deleted_at');
        });

        Schema::create('countries', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('currency_id', 20)->default('');
            $table->string('country_name', 20)->default('');
            $table->string('iso_code', 5)->default('');
            $table->string('phone_code', 5)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('country_name');
            $table->index('iso_code');
            $table->index('deleted_at');
        });

        Schema::create('timezones', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('country_id', 20)->default('');
            $table->string('timezone_name', 20)->default('');
            $table->integer('result')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('country_id');
            $table->index('timezone_name');
            $table->index('deleted_at');
        });

        Schema::create('wholesalers', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('currency_id', 20)->default('');
            $table->string('timezone_id', 20)->default('');
            $table->string('country_id', 20)->default('');
            $table->string('company_name', 50)->default('');
            $table->integer('synced_at')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('country_id');
            $table->index('company_name');
            $table->index('deleted_at');
        });

        Schema::create('warehouses', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('warehouse_name', 50)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('warehouse_name');
            $table->index('deleted_at');
        });

        Schema::create('positions', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('title', 50)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('title');
            $table->index('deleted_at');
        });

        Schema::create('permissions', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('role', 50)->default('');
            $table->string('task', 50)->default('');
            $table->string('detail')->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('task');
            $table->index('deleted_at');
        });

        Schema::create('position_permissions', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('position_id', 20)->default('');
            $table->string('permission_id', 20)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('position_id');
            $table->index('permission_id');
            $table->index('deleted_at');
        });

        Schema::create('employees', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('language_id', 20)->default('');
            $table->string('firstname', 50)->default('');
            $table->string('lastname', 50)->default('');
            $table->string('email', 70)->default('');
            $table->string('mobile_country', 5)->default('');
            $table->string('mobile_number', 15)->default('');
            $table->string('secret')->default('');
            $table->string('last_visit')->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('firstname');
            $table->index('lastname');
            $table->index('email');
            $table->index('mobile_number');
            $table->index('deleted_at');
        });

        Schema::create('employee_permissions', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('employee_id', 20)->default('');
            $table->string('permission_id', 20)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('employee_id');
            $table->index('permission_id');
            $table->index('deleted_at');
        });

        Schema::create('employee_tokens', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('employee_id', 20)->default('');
            $table->string('device_id', 20)->default('');
            $table->string('device_type', 10)->default('');
            $table->string('ip_address', 25)->default('');
            $table->string('user_agent')->default('');
            $table->string('api_token', 32)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('employee_id');
            $table->index('device_id');
            $table->index('api_token');
            $table->index('deleted_at');
        });

        Schema::create('units', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('measurement', 20)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('deleted_at');
        });

        Schema::create('item_categories', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('category_name', 50)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('deleted_at');
        });

        Schema::create('items', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('item_category_id', 20)->default('');
            $table->string('unit_id', 20)->default('');
            $table->string('item_name', 50)->default('');
            $table->integer('price')->default(0);
            $table->integer('hidden')->default(0);
            $table->integer('new_item')->default(0);
            $table->integer('best_selling')->default(0);
            $table->string('image', 20)->default('');
            $table->text('detail');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('item_category_id');
            $table->index('deleted_at');
        });

        Schema::create('tiers', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('tier_name', 50)->default('');
            $table->integer('discount')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('deleted_at');
        });

        Schema::create('tier_items', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('item_id', 20)->default('');
            $table->string('tier_id', 20)->default('');
            $table->integer('hidden')->default(0);
            $table->integer('price')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('tier_id');
            $table->index('item_id');
            $table->index('deleted_at');
        });

        Schema::create('inventories', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('warehouse_id', 20)->default('');
            $table->string('item_id', 20)->default('');
            $table->integer('quantity')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('warehouse_id');
            $table->index('item_id');
            $table->index('deleted_at');
        });

        Schema::create('merchants', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('company_name')->default('');
            $table->string('firstname', 50)->default('');
            $table->string('lastname', 50)->default('');
            $table->string('title', 50)->default('');
            $table->string('mobile_country', 5)->default('');
            $table->string('mobile_number', 15)->default('');
            $table->string('email', 70)->default('');
            $table->string('secret')->default('');
            $table->integer('verified_at')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('company_name');
            $table->index('firstname');
            $table->index('lastname');
            $table->index('mobile_country');
            $table->index('mobile_number');
            $table->index('deleted_at');
        });

        Schema::create('merchant_verifications', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('merchant_id', 20)->default('');
            $table->string('verify_prefix', 5)->default('');
            $table->string('verify_code', 5)->default('');
            $table->integer('verified_at')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('deleted_at');
        });

        Schema::create('merchant_tiers', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('merchant_id', 20)->default('');
            $table->string('tier_id', 20)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('merchant_id');
            $table->index('tier_id');
            $table->index('deleted_at');
        });

        Schema::create('merchant_addresses', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('title')->default('');
            $table->string('address')->default('');
            $table->string('postal_code', 10)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('deleted_at');
        });

        Schema::create('orders', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('merchant_id', 20)->default('');
            $table->string('merchant_address_id', 20)->default('');
            $table->string('order_number', 30)->default('');
            $table->string('company_name')->default('');
            $table->string('address')->default('');
            $table->string('contact_person', 50)->default('');
            $table->string('mobile_country', 5)->default('');
            $table->string('mobile_number', 15)->default('');
            $table->string('remark')->default('');
            $table->integer('subtotal')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('coupon')->default(0);
            $table->integer('net_sales')->default(0);
            $table->integer('service_charge')->default(0);
            $table->integer('tax')->default(0);
            $table->integer('total')->default(0);
            $table->integer('rounding')->default(0);
            $table->integer('sales_total')->default(0);
            $table->integer('submitted_at')->default(0);
            $table->integer('reviewed_at')->default(0);
            $table->integer('printed_at')->default(0);
            $table->integer('picked_at')->default(0);
            $table->integer('voided_at')->default(0);
            $table->integer('delivered_at')->default(0);
            $table->integer('returned_at')->default(0);
            $table->integer('recovered_at')->default(0);
            $table->integer('completed_at')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('order_number');
            $table->index('submitted_at');
            $table->index('deleted_at');
        });

        Schema::create('order_items', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('merchant_id', 20)->default('');
            $table->string('order_id', 20)->default('');
            $table->string('item_id', 20)->default('');
            $table->string('unit_id', 20)->default('');
            $table->string('item_name', 20)->default('');
            $table->string('remark')->default('');
            $table->integer('unit_price')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('subtotal')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('coupon')->default(0);
            $table->integer('net_sales')->default(0);
            $table->integer('service_charge')->default(0);
            $table->integer('tax')->default(0);
            $table->integer('total')->default(0);
            $table->integer('submitted_at')->default(0);
            $table->integer('reviewed_at')->default(0);
            $table->integer('printed_at')->default(0);
            $table->integer('picked_at')->default(0);
            $table->integer('voided_at')->default(0);
            $table->integer('delivered_at')->default(0);
            $table->integer('returned_at')->default(0);
            $table->integer('recovered_at')->default(0);
            $table->integer('completed_at')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('order_id');
            $table->index('item_id');
            $table->index('submitted_at');
            $table->index('deleted_at');
        });

        Schema::create('order_logs', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('order_id', 20)->default('');
            $table->string('employee_id', 20)->default('');
            $table->string('operation')->default('');
            $table->string('detail')->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('order_id');
            $table->index('deleted_at');
        });

        Schema::create('suppliers', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('company_name')->default('');
            $table->string('firstname', 50)->default('');
            $table->string('lastname', 50)->default('');
            $table->string('title', 50)->default('');
            $table->string('mobile_country', 5)->default('');
            $table->string('mobile_number', 15)->default('');
            $table->string('email', 70)->default('');
            $table->string('bank_account', 20)->default('');
            $table->string('remark')->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('company_name');
            $table->index('deleted_at');
        });

        Schema::create('purchases', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('warehouse_id', 20)->default('');
            $table->string('supplier_id', 20)->default('');
            $table->string('employee_id', 20)->default('');
            $table->string('purchase_number', 30)->default('');
            $table->string('remark')->default('');
            $table->integer('submitted_at')->default(0);
            $table->integer('delivered_at')->default(0);
            $table->integer('returned_at')->default(0);
            $table->integer('completed_at')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('purchase_number');
            $table->index('submitted_at');
            $table->index('deleted_at');
        });

        Schema::create('purchase_items', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('purchase_id', 20)->default('');
            $table->string('warehouse_id', 20)->default('');
            $table->string('supplier_id', 20)->default('');
            $table->string('employee_id', 20)->default('');
            $table->string('item_id', 20)->default('');
            $table->string('unit_id', 20)->default('');
            $table->string('item_name', 20)->default('');
            $table->integer('quantity')->default(0);
            $table->string('remark')->default('');
            $table->integer('submitted_at')->default(0);
            $table->integer('delivered_at')->default(0);
            $table->integer('returned_at')->default(0);
            $table->integer('completed_at')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('purchase_id');
            $table->index('submitted_at');
            $table->index('deleted_at');
        });

        Schema::create('transfers', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('employee_id', 20)->default('');
            $table->string('from_warehouse_id', 20)->default('');
            $table->string('to_warehouse_id', 20)->default('');
            $table->string('transfer_number', 30)->default('');
            $table->string('remark')->default('');
            $table->integer('submitted_at')->default(0);
            $table->integer('delivered_at')->default(0);
            $table->integer('returned_at')->default(0);
            $table->integer('completed_at')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('from_warehouse_id');
            $table->index('to_warehouse_id');
            $table->index('transfer_number');
            $table->index('deleted_at');
        });

        Schema::create('transfer_items', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('transfer_id', 20)->default('');
            $table->string('item_id', 20)->default('');
            $table->string('employee_id', 20)->default('');
            $table->string('from_warehouse_id', 20)->default('');
            $table->string('to_warehouse_id', 20)->default('');
            $table->integer('quantity')->default(0);
            $table->string('remark')->default('');
            $table->integer('submitted_at')->default(0);
            $table->integer('delivered_at')->default(0);
            $table->integer('returned_at')->default(0);
            $table->integer('completed_at')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('transfer_id');
            $table->index('from_warehouse_id');
            $table->index('to_warehouse_id');
            $table->index('deleted_at');
        });

        Schema::create('example', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('deleted_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
