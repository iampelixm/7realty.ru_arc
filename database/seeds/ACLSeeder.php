<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class ACLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::allow('admin')->everything();

        Bouncer::allow('moderator')->toManage(Item::class);
        Bouncer::allow('moderator')->to('manageSpecialOffer'); //Управление спец предложениями объектов
        Bouncer::allow('moderator')->toManage(Type::class);
        Bouncer::allow('moderator')->toManage(Option::class);
        Bouncer::allow('moderator')->toManage(App\Models\Area::class);
        Bouncer::allow('moderator')->toManage(City::class);
        Bouncer::allow('moderator')->toManage(Category::class);
        Bouncer::allow('moderator')->toManage(Residence::class);
        Bouncer::allow('moderator')->toManage(ResidenceCategory::class);
        Bouncer::allow('moderator')->toManage(Page::class);
        Bouncer::allow('moderator')->to('manageUsers');
        Bouncer::allow('moderator')->to('manageItemActivity');
        Bouncer::allow('moderator')->to('manageItemUser');


        Bouncer::allow('broker')->toManage(Residence::class);
        Bouncer::allow('broker')->toManage(Item::class);
    }
}
