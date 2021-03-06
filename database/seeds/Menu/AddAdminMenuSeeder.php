<?php

use Illuminate\Database\Eloquent\Model;

class AddAdminMenuSeeder extends MenuBaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                        'name' => 'Контактные особы',
                        'path' => 'admin/contact-persons',
                        'data' => [
                            'permissions' => ['dashboard.home.read'],
                            'icon' => 'fa fa-users',
                            'pattern_url' => '\S*admin\/?((\?{1}\S*)|$)',
                        ],
                    ],
                ],
            ],
        ];
    }
}
