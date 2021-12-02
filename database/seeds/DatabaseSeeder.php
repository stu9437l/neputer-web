<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(MenuSectionTableSeeder::class);
        $this->call(AdSectionTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
        $this->call(PanelTableSeeder::class);
        $this->call(OfferSectionTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(ProductSectionTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(AboutUsTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(OurWorksTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(IndustriesWeWorkForTableSeeder::class);
        $this->call(TestimonialTableSeeder::class);
        $this->call(SiteConfigsTableSeeder::class);
    }
}
