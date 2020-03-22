<?php

use Illuminate\Database\Eloquent\Model;

class AdminMenuTableSeeder extends MenuBaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->seedMenu($this->getData());

        $this->command->info(__CLASS__ . ' success!');
    }

    public function getData(): array
    {
        return [

            [
                'name' => 'Админ. меню',
                'system_name' => 'admin_menu',
                'data' => [
                    'has_hierarchy' => 1,
                ],
                'safe' => true,
                'children' => [
                    [
                        'name' => 'Меню',
                        'path' => '',
                        'data' => [
                            'permissions' => [],
                            'icon' => '',
                            'header' => 1,
                        ],
                    ],

                    [
                        'name' => 'Главная',
                        'path' => 'admin',
                        'data' => [
                            'permissions' => ['dashboard.home.read'],
                            'icon' => 'fa fa-dashboard',
                            'pattern_url' => '\S*admin\/?((\?{1}\S*)|$)',
                        ],
                    ],
                    [
                        'name' => 'Таксисты',
                        'path' => 'admin/drivers',
                        'data' => [
                            'permissions' => ['dashboard.home.read'],
                            'icon' => 'fa fa-users',
                            'pattern_url' => '\S*admin\/?((\?{1}\S*)|$)',
                        ],
                    ],
                    [
                        'name' => 'Заказы Ушарал',
                        'path' => 'admin/orders',
                        'data' => [
                            'permissions' => ['dashboard.home.read'],
                            'icon' => 'fa fa-book',
                            'pattern_url' => '\S*admin\/?((\?{1}\S*)|$)',
                        ],
                    ],
                    [
                        'name' => 'Заказы Межгород',
                        'path' => 'admin/intercity-orders',
                        'data' => [
                            'permissions' => ['dashboard.home.read'],
                            'icon' => 'fa fa-book',
                            'pattern_url' => '\S*admin\/?((\?{1}\S*)|$)',
                        ],
                    ],
                ],
            ],
        ];
    }
}
