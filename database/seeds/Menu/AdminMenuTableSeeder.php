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
                        'name' => 'Головна',
                        'path' => 'admin',
                        'data' => [
                            'permissions' => ['dashboard.home.read'],
                            'icon' => 'fa fa-dashboard',
                            'pattern_url' => '\S*admin\/?((\?{1}\S*)|$)',
                        ],
                    ],
                    [
                        'name' => 'Клієнти',
                        'path' => 'admin/clients',
                        'data' => [
                            'permissions' => ['dashboard.home.read'],
                            'icon' => 'fa fa-users',
                            'pattern_url' => '\S*admin\/?((\?{1}\S*)|$)',
                        ],
                    ],
                    [
                        'name' => 'Курси',
                        'path' => 'admin/courses',
                        'data' => [
                            'permissions' => ['dashboard.home.read'],
                            'icon' => 'fa fa-book',
                            'pattern_url' => '\S*admin\/?((\?{1}\S*)|$)',
                        ],
                    ],
                    [
                        'name' => 'Загрузка тестів',
                        'path' => 'admin/tests',
                        'data' => [
                            'permissions' => ['dashboard.home.read'],
                            'icon' => 'fa fa-upload',
                            'pattern_url' => '\S*admin\/?((\?{1}\S*)|$)',
                        ],
                    ],
                    [
                        'name' => 'Logs',
                        'path' => 'admin/telescope',
                        'data' => [
                            'permissions' => ['dashboard.home.read'],
                            'icon' => 'fa fa-cogs',
                            'pattern_url' => '\S*admin\/?((\?{1}\S*)|$)',
                        ],
                    ],

                    /*[
                        'name' => 'Материалы',
                        'path' => '',
                        'data' => [
                            'permissions' => [],
                            'icon' => 'fa fa-file-text-o',
                        ],
                        'children' => [
//                            [
//                                'name' => 'Товары',
//                                'path' => 'admin/products',
//                                'data' => [
//                                    'permissions' => ['product.read'],
//                                    'icon' => '',
//                                    //'pattern_url' => '\S*admin\/products\S*',
//                                ]
//                            ],
                            [
                                'name' => 'Страницы',
                                'path' => url('admin/nodes?type=pages'),
                                'data' => [
                                    'permissions' => ['page.read'],
                                    'icon' => '',
                                    //'pattern_url' => '\S*admin\/pages\S*',
                                ]
                            ],
                            [
                                'name' => 'Новости',
                                'path' => url('admin/nodes?type=news'),
                                'data' => [
                                    'permissions' => ['news.read'],
                                    'icon' => '',
                                    //'pattern_url' => '\S*admin\/pages\S*',
                                ]
                            ],
                            [
                                'name' => 'Предложения',
                                'path' => url('admin/nodes?type=offers'),
                                'data' => [
                                    'permissions' => ['news.read'],
                                    'icon' => '',
                                    //'pattern_url' => '\S*admin\/pages\S*',
                                ]
                            ],
//                            [
//                                'name' => 'Акции',
//                                'path' => 'admin/sales',
//                                'data' => [
//                                    'permissions' => ['sale.read'],
//                                    'icon' => '',
//                                    'pattern_url' => '',
//                                ]
//                            ],
                        ],
                    ],*/

                    /*[
                        'name' => 'Блоки',
                        'path' => 'admin/blocks',
                        'data' => [
                            'permissions' => ['dashboard.home.read'],
                            'icon' => 'fa fa-th-large',
                            'pattern_url' => '\S*admin\/?((\?{1}\S*)|$)',
                        ],
                    ],

                    [
                        'name' => 'Елементы',
                        'path' => 'items',
                        'data' => [
                            'permissions' => [],
                            'icon' => 'fa fa-list',
                        ],
                        'children' => [
//                            [
//                                'name' => 'Товары',
//                                'path' => 'admin/products',
//                                'data' => [
//                                    'permissions' => ['product.read'],
//                                    'icon' => '',
//                                    //'pattern_url' => '\S*admin\/products\S*',
//                                ]
//                            ],
                            [
                                'name' => 'Слайды',
                                'path' => url('admin/items?type=slides'),
                                'data' => [
                                    'permissions' => ['page.read'],
                                    'icon' => '',
                                    //'pattern_url' => '\S*admin\/pages\S*',
                                ]
                            ],
                            [
                                'name' => 'Деятельность',
                                'path' => url('admin/items?type=activities'),
                                'data' => [
                                    'permissions' => ['news.read'],
                                    'icon' => '',
                                    //'pattern_url' => '\S*admin\/pages\S*',
                                ]
                            ],
                            [
                                'name' => 'Контакты',
                                'path' => url('admin/items?type=contacts'),
                                'data' => [
                                    'permissions' => ['news.read'],
                                    'icon' => '',
                                    //'pattern_url' => '\S*admin\/pages\S*',
                                ]
                            ],
                        ],
                    ],

                    [
                        'name' => 'SEO',
                        'path' => '',
                        'data' => [
                            'permissions' => [],
                            'icon' => 'fa fa-rocket',
                        ],
                        'children' => [
                            [
                                'name' => 'URL-перенаправления',
                                'path' => 'admin/url-aliases',
                                'data' => [
                                    'permissions' => ['url-alias.read'],
                                    'icon' => '',
                                    'pattern_url' => '\S*url-aliases\/?$',
                                ],
                            ],
                            [
                                'name' => 'Мета-теги путей',
                                'path' => 'admin/meta-tags',
                                'data' => [
                                    'permissions' => ['meta-tag.read'],
                                    'icon' => '',
                                    'pattern_url' => '\S*meta-tags\S*',
                                ],
                            ],
                            [
                                'name' => 'Карта сайта',
                                'path' => 'admin/site-map',
                                'data' => [
                                    'permissions' => ['site-map.update'],
                                    'icon' => '',
                                    'pattern_url' => '\S*site-map\S*',
                                ],
                            ],
                        ],
                    ],

                    [
                        'name' => 'Конфигурации',
                        'path' => '',
                        'data' => [
                            'permissions' => [],
                            'icon' => 'fa fa-cogs',
                        ],
                        'children' => [
                            [
                                'name' => 'Настройка системы',
                                'path' => 'admin/variables',
                                'data' => [
                                    'permissions' => ['variable.read'],
                                    'icon' => '',
                                    'pattern_url' => '\S*variables\/?$',
                                ],
                            ],
                            [
                                'name' => 'Списки',
                                'path' => 'admin/variables/lists',
                                'data' => [
                                    'permissions' => ['variable.read'],
                                    'icon' => '',
                                    'pattern_url' => '\S*variables\/?$',
                                ],
                            ],
                            /*[
                                'name' => 'API-сервисы',
                                'path' => 'admin/variables?form=api',
                                'data' => [
                                    'permissions' => ['variable.read'],
                                    'icon' => '',
                                    'pattern_url' => '\S*form=api\S*',
                                ],
                            ],
                            [
                                'name' => 'Очистить кеш',
                                'path' => 'admin/cache-clear',
                                'data' => [
                                    'permissions' => [],
                                    'icon' => '',
                                ],
                            ],
                        ],
                    ],*/

                    /*[
                        'name' => 'Перевод',
                        'path' => 'admin/translations',
                        'data' => [
                            'permissions' => ['dashboard.home.read'],
                            'icon' => 'fa fa-language',
                            'pattern_url' => '\S*admin\/?((\?{1}\S*)|$)',
                        ],
                    ],*/
                    /*[
                        'name' => 'Веб-формы',
                        'path' => '',
                        'data' => [
                            'permissions' => [],
                            'icon' => 'fa fa-chrome',
                        ],
                        'children' => [
                            //[
                            //    'name' => 'Подписчики',
                            //    'path' => '/admin/forms/subscribers',
                            //    'data' => [
                            //        'permissions' => ['form.read',],
                            //        'icon' => '',
                            //    ],
                            //],
                            //[
                            //    'name' => 'Контакты',
                            //    'path' => '/admin/forms/contacts',
                            //    'data' => [
                            //        'permissions' => ['form.read',],
                            //        'icon' => '',
                            //    ],
                            //],
//                            [
//                                'name' => 'Отзывы о товарах',
//                                'path' => '/admin/product-reviews',
//                                'data' => [
//                                    'permissions' => ['form.read',],
//                                    'icon' => '',
//                                ],
//                            ],
                            [
                                'name' => 'Заявки',
                                'path' => '/admin/forms/request',
                                'data' => [
                                    'permissions' => ['form.read',],
                                    'icon' => '',
                                ],
                            ],
                        ],
                    ],*/

//                    [
//                        'name' => 'Заказы',
//                        'path' => 'admin/orders',
//                        'data' => [
//                            'permissions' => ['order.read'],
//                            'icon' => 'fa fa-shopping-cart',
//                            'pattern_url' => '\S*admin\/orders\S*',
//                        ],
//                    ],

                    /*[
                        'name' => 'Пользователи',
                        'path' => '',
                        'data' => [
                            'permissions' => [],
                            'icon' => 'fa fa-users',
                        ],
                        'children' => [
                            [
                                'name' => 'Все пользователи',
                                'path' => 'admin/users',
                                'data' => [
                                    'permissions' => ['user.read'],
                                    'icon' => '',
                                ],
                            ],
                            [
                                'name' => 'Роли/Права',
                                'path' => 'admin/permissions',
                                'data' => [
                                    'permissions' => ['permission.read'],
                                    'icon' => '',
                                ],
                            ],
                        ],
                    ],*/

                ],
            ],
        ];
    }
}
