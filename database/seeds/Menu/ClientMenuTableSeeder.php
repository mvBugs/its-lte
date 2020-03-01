<?php

use Illuminate\Database\Eloquent\Model;

class ClientMenuTableSeeder extends MenuBaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

//        DB::table('menu_items')->delete();
//        DB::table('menus')->delete();
//        DB::table('menu_items')->truncate();
//        DB::table('menus')->truncate();

        $this->seedMenu($this->getData());

        $this->command->info(__CLASS__ . ' success!');
    }

    public function getData(): array
    {
        return [
            [
                'name' => 'Главное меню',
                'system_name' => 'main_menu',
                'data' => [
                    'has_hierarchy' => 1,
                ],
                'safe' => true,
                'children' => [
                    ['name' => 'Главная', 'path' => '/'],
                    ['name' => 'Предложения', 'path' => 'offers'],
                    ['name' => 'Форум', 'path' => 'forum'],
                    ['name' => 'Новости', 'path' => 'news'],
                    ['name' => 'Деятельность', 'path' => 'activities'],
                    ['name' => 'Контакты', 'path' => 'contacts'],
                ],
            ],
            /*[
                'name' => 'Социальные сети',
                'system_name' => 'social_networks',
                'data' => [
                    'has_hierarchy' => 0,
                ],
                'safe' => true,
                'children' => [
                    ['name' => 'ВК', 'path' => 'https://vk.com', 'target' => '_blank',],
                    ['name' => 'FB', 'path' => 'https://www.facebook.com', 'target' => '_blank',],
                    ['name' => 'OK', 'path' => 'https://ok.ru', 'target' => '_blank',],
                    ['name' => 'TW', 'path' => 'https://twitter.com', 'target' => '_blank',],
                ],
            ],*/
        ];
    }
}
