<?php

namespace Database\Seeders;

use App\Models\Delivery;
use App\Models\Layanan;
use App\Models\Price;
use App\Models\Profile;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Content;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(10)->create();

         $arr = array('Komo1','komo2');
         Setting::create([
            'setting_type' => 'KOMODITAS',
             'setting_value' => serialize($arr),
             'setting_code' => 'komoditas'
         ]);

         Role::create([
            'authority' => 'ROLE_ADMIN',
             'name' => 'Super Admin',
         ]);

        Role::create([
            'authority' => 'ROLE_CORPORATE',
            'name' => 'Corporate',
        ]);

        Role::create([
            'authority' => 'ROLE_CONTENT',
            'name' => 'Content Admin',
        ]);

         User::create([
             'username' => 'alriefqyd',
             'email' => 'al@gmail.com',
             'email_verified_at' => now(),
             'password' => Hash::make('29121996'), // password
             'remember_token' => Str::random(10),
             'profile_id' => 1,
             'created_by' => rand(1,2)
         ]);

         Content::create([
             'title' => 'About',
             'subtitle' => 'About',
             'content'=>'[{"order":"1","content":"Lorem Ipsum dolor sit amet","image":"google.com"},{"order":"2","content":"kedua","image":"facebook.com"}]',
             'page'=>'homepage',
             'created_by'=> 1
        ]);

        Content::create([
            'title' => 'Homepage',
            'subtitle' => 'About',
            'content'=>'[{"order":"1","content":"Lorem Ipsum dolor sit amet","image":"google.com"},{"order":"2","content":"kedua","image":"facebook.com"}]',
            'page'=>'page',
            'created_by'=> 2
        ]);

        Profile::create([
            'full_name' => 'Al Riefqy Dasmito',
            'address' => 'Gowa',
            'company_name' => 'Fairtech',
            'phone' => '012$314914',
            'created_by' => rand(1,2),
        ]);

        Price::create([
            'regular_price' => '9813913',
            'origin_location' => 1,
            'destination_location' =>2,
            'created_by' => 5,
            'isRegularPrice' => true
        ]);

        Price::create([
            'price' => '92881332',
            'company' => 5,
            'origin_location' => 1,
            'destination_location' =>2,
            'created_by' => 1,
            'isRegularPrice' => false
        ]);

        Price::create([
            'regular_price' => '9813913',
            'origin_location' => 3,
            'destination_location' =>4,
            'created_by' => 9,
            'isRegularPrice' => true
        ]);

        Price::create([
            'price' => '121',
            'company' => 1,
            'origin_location' => 3,
            'destination_location' =>4,
            'created_by' => 9,
            'isRegularPrice' => false
        ]);

        Delivery::create([
            'stt' => '988193231',
            'noReferensiExternal' => '988193231',
            'invoice' => '11LP1639018693986',
            'destination' => 22,
            'origin' => 33,
            'transaction_type' => 'Debit',
            'addressRecipient' => 'Broklyn',
            'addressSender' => 'New York',
            'created_by' => 1,
            'phone_sending_by' => '0920830123',
            'phone_recipient' => '092303901',
            'layanan_id' => '1',
            'komoditas' => 'Komoditas',
            'asuransi_pengiriman' => 'asuransi',
            'npwp' => '8728313',
            'company_sender' => 1,
            'sending_price' => 921,
            'senderName' => 'Al',
            'recipientName' => 'Dasmito',
//            'berat_barang' => 1,
//            'berat_volume' => 0.2,
            'harga' => 90000000,
        ]);

        Delivery::create([
            'stt' => '09313',
            'noReferensiExternal' => '12091912',
            'invoice' => '11LP1639018693986',
            'destination' => 23,
            'origin' => 12,
            'transaction_type' => 'Debit',
            'addressRecipient' => 'Broklyn',
            'addressSender' => 'New York',
            'created_by' => 1,
            'phone_sending_by' => '7263713',
            'phone_recipient' => '673721631',
            'layanan_id' => '1',
            'komoditas' => 'Komoditas',
            'asuransi_pengiriman' => 'asuransi',
            'npwp' => '8728313',
            'company_sender' => 1,
            'sending_price' => 10921,
            'senderName' => 'Al',
            'recipientName' => 'Dasmito',
//            'berat_barang' => 1,
//            'berat_volume' => 0.2,
            'harga' => 90000000,
        ]);

        Delivery::create([
            'stt' => '87231831',
            'noReferensiExternal' => '93103901',
            'invoice' => '9310321',
            'destination' => 8,
            'origin' => 11,
            'transaction_type' => 'Debit',
            'created_by' => 1,
            'phone_sending_by' => '90293011',
            'phone_recipient' => '234121',
            'addressRecipient' => 'Broklyn',
            'addressSender' => 'New York',
            'layanan_id' => '1',
            'komoditas' => 'Komoditas',
            'asuransi_pengiriman' => 'asuransi',
            'npwp' => '91239012',
            'company_sender' => 1,
            'sending_price' => '88812',
            'senderName' => 'Al',
            'recipientName' => 'Dasmito',
//            'berat_barang' => '2',
//            'berat_volume' => '0.3',
            'harga' => 90000000,
        ]);

        Layanan::create([
           'name' => 'Jagopack',
            'code' => 'JAGOPACK',
            'description' => 'Dapatkan diskon 50%',
            'origin' => 12,
            'destination' => 33,
            'price' => 90000
        ]);

        Layanan::create([
            'name' => 'DuaPack',
            'code' => 'DUALPACK',
            'description' => 'Dapatkan diskon 150%',
            'origin' => 12,
            'destination' => 33,
            'price' => 70000
        ]);
    }
}
