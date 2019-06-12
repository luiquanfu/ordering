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
            $table->string('name', 20)->default('');
            $table->string('code', 5)->default('');
            $table->string('direction', 5)->default('');
            $table->string('symbol', 5)->default('');
            $table->integer('denary')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('name');
            $table->index('code');
            $table->index('deleted_at');
        });

        Schema::create('countries', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('currency_id', 20)->default('');
            $table->string('name', 20)->default('');
            $table->string('iso_code', 5)->default('');
            $table->string('phone_code', 5)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('name');
            $table->index('iso_code');
            $table->index('deleted_at');
        });

        Schema::create('timezones', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('country_id', 20)->default('');
            $table->string('name', 20)->default('');
            $table->integer('value')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('country_id');
            $table->index('name');
            $table->index('deleted_at');
        });

        Schema::create('wholesalers', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('currency_id', 20)->default('');
            $table->string('timezone_id', 20)->default('');
            $table->string('country_id', 20)->default('');
            $table->string('name', 50)->default('');
            $table->integer('synced_at')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('country_id');
            $table->index('name');
            $table->index('deleted_at');
        });

        Schema::create('positions', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('name', 50)->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('name');
            $table->index('deleted_at');
        });

        Schema::create('permissions', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('role', 50)->default('');
            $table->string('name', 50)->default('');
            $table->string('detail')->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('name');
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
            $table->string('password')->default('');
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
            $table->string('name', 20)->default('');
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
            $table->string('name', 50)->default('');
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
            $table->string('name', 50)->default('');
            $table->integer('price')->default(0);
            $table->integer('active')->default(0);
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

        Schema::create('item_prices', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20)->default('');
            $table->string('item_id', 20)->default('');
            $table->string('merchant_group_id', 20)->default('');
            $table->integer('price')->default(0);
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('item_id');
            $table->index('merchant_group_id');
            $table->index('deleted_at');
        });

        Schema::create('merchants', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('firstname')->default('');
            $table->string('lastname')->default('');
            $table->string('company')->default('');
            $table->string('mobile_country', 5)->default('');
            $table->string('mobile_number', 15)->default('');
            $table->string('email', 70)->default('');
            $table->string('password')->default('');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('firstname');
            $table->index('lastname');
            $table->index('mobile_country');
            $table->index('mobile_number');
            $table->index('deleted_at');
        });

        Schema::create('merchant_addresses', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('name')->default('');
            $table->string('address')->default('');
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
            $table->string('order_number', 50)->default('');
            $table->string('company')->default('');
            $table->string('address')->default('');
            $table->string('contact_person', 50)->default('');
            $table->string('mobile_country', 5)->default('');
            $table->string('mobile_number', 15)->default('');
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
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('submitted_at');
            $table->index('deleted_at');
        });

        Schema::create('order_items', function (Blueprint $table)
        {
            $table->string('id', 20);
            $table->string('wholesaler_id', 20);
            $table->string('order_id', 20);
            $table->string('item_id', 20);
            $table->string('unit_id', 20);
            $table->string('name', 20);
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer('subtotal');
            $table->integer('discount');
            $table->integer('coupon');
            $table->integer('net_sales');
            $table->integer('service_charge');
            $table->integer('tax');
            $table->integer('total');
            $table->integer('submitted_at')->default(0);
            $table->integer('reviewed_at')->default(0);
            $table->integer('printed_at')->default(0);
            $table->integer('picked_at')->default(0);
            $table->integer('voided_at')->default(0);
            $table->integer('delivered_at')->default(0);
            $table->integer('returned_at')->default(0);
            $table->integer('recovered_at')->default(0);
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
            $table->string('wholesaler_id', 20);
            $table->string('order_id', 20);
            $table->string('employee_id', 20);
            $table->string('operation');
            $table->string('detail');
            $table->integer('created_at')->default(0);
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);

            $table->primary('id');
            $table->index('wholesaler_id');
            $table->index('order_id');
            $table->index('deleted_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
