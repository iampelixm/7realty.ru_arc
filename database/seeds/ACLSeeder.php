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

        Bouncer::allow('moderator')->to('view', Item::class);
        Bouncer::allow('moderator')->to('update', Item::class);
        Bouncer::allow('moderator')->to('create', Item::class);
        Bouncer::allow('moderator')->to('manageSpecialOffer'); //Управление спец предложениями объектов
        Bouncer::allow('moderator')->toManage(Type::class);
        Bouncer::allow('moderator')->toManage(Option::class);
        Bouncer::allow('moderator')->toManage(App\Models\Area::class);
        Bouncer::allow('moderator')->toManage(City::class);
        Bouncer::allow('moderator')->toManage(Category::class);
        Bouncer::allow('moderator')->to('view', Residence::class);
        Bouncer::allow('moderator')->to('update', Residence::class);
        Bouncer::allow('moderator')->to('create', Residence::class);
        Bouncer::allow('moderator')->toManage(ResidenceCategory::class);
        Bouncer::allow('moderator')->toManage(Page::class);
        Bouncer::allow('moderator')->to('manageUsers');
        Bouncer::allow('moderator')->to('manageItemActivity');
        Bouncer::allow('moderator')->to('manageItemUser');


        Bouncer::allow('broker')->to('create', Residence::class);
        Bouncer::allow('broker')->to('view', Residence::class);
        Bouncer::allow('broker')->to('update', Residence::class);

        Bouncer::allow('broker')->to('view', Item::class);
        Bouncer::allow('broker')->to('create', Item::class);
        Bouncer::allow('broker')->to('update', Item::class);

        /*
        Просмотр объектов
        Создание объектов
        Изменение объектов
        Удаление объектов
        Управление спец предложениями
        управление типами
        управление характеристиками
        управление районами
        управление городами
        управление категориями
        Просмотр ЖК
        Создание ЖК
        Изменение ЖК
        Удаление ЖК
        управление категориями ЖК
        управление страницами
        управление пользователями
        модерация объектов и ЖК
        управление ответственным у объекта и ЖК

        */
    }
}
