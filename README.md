# Penyelesaian Tindak Pidana Polda

[![Join the chat at https://gitter.im/penyelesaian-tindak-pidana-polda/Lobby](https://badges.gitter.im/penyelesaian-tindak-pidana-polda/Lobby.svg)](https://gitter.im/penyelesaian-tindak-pidana-polda/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/penyelesaian-tindak-pidana-polda/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/penyelesaian-tindak-pidana-polda/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/penyelesaian-tindak-pidana-polda/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/penyelesaian-tindak-pidana-polda/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/penyelesaian-tindak-pidana-polda/v/stable)](https://packagist.org/packages/bantenprov/penyelesaian-tindak-pidana-polda)
[![Total Downloads](https://poser.pugx.org/bantenprov/penyelesaian-tindak-pidana-polda/downloads)](https://packagist.org/packages/bantenprov/penyelesaian-tindak-pidana-polda)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/penyelesaian-tindak-pidana-polda/v/unstable)](https://packagist.org/packages/bantenprov/penyelesaian-tindak-pidana-polda)
[![License](https://poser.pugx.org/bantenprov/penyelesaian-tindak-pidana-polda/license)](https://packagist.org/packages/bantenprov/penyelesaian-tindak-pidana-polda)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/penyelesaian-tindak-pidana-polda/d/monthly)](https://packagist.org/packages/bantenprov/penyelesaian-tindak-pidana-polda)
[![Daily Downloads](https://poser.pugx.org/bantenprov/penyelesaian-tindak-pidana-polda/d/daily)](https://packagist.org/packages/bantenprov/penyelesaian-tindak-pidana-polda)

Persentase Penyelesaian Tindak Pidana Polda

### Install via composer

- Development snapshot

```bash
$ composer require bantenprov/penyelesaian-tindak-pidana-polda:dev-master
```

- Latest release:

```bash
$ composer require bantenprov/penyelesaian-tindak-pidana-polda
```

### Download via github

```bash
$ git clone https://github.com/bantenprov/penyelesaian-tindak-pidana-polda.git
```

#### Edit `config/app.php` :

```php
'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\TindakPidanaPolda\TindakPidanaPoldaServiceProvider::class,
```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=tindak-pidana-polda-seeds
```

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovTindakPidanaPoldaSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=tindak-pidana-polda-assets
$ php artisan vendor:publish --tag=tindak-pidana-polda-public
```
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/dashboard',
    redirect: '/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
         path: '/dashboard/tindak-pidana-polda',
         components: {
            main: resolve => require(['./components/views/bantenprov/tindak-pidana-polda/DashboardTindakPidanaPolda.vue'], resolve),
            navbar: resolve => require(['./components/Navbar.vue'], resolve),
            sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
          },
          meta: {
            title: "Persentase Penyelesaian Tindak Pidana Polda"
           }
       },
        //== ...
    ]
},
```

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/admin/tindak-pidana-polda',
            components: {
                main: resolve => require(['./components/bantenprov/tindak-pidana-polda/TindakPidanaPolda.index.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Persentase Penyelesaian Tindak Pidana Polda"
            }
        },
        {
            path: '/admin/tindak-pidana-polda/create',
            components: {
                main: resolve => require(['./components/bantenprov/tindak-pidana-polda/TindakPidanaPolda.add.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Add Persentase Penyelesaian Tindak Pidana Polda"
            }
        },
        {
            path: '/admin/tindak-pidana-polda/:id',
            components: {
                main: resolve => require(['./components/bantenprov/tindak-pidana-polda/TindakPidanaPolda.show.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "View Persentase Penyelesaian Tindak Pidana Polda"
            }
        },
        {
            path: '/admin/tindak-pidana-polda/:id/edit',
            components: {
                main: resolve => require(['./components/bantenprov/tindak-pidana-polda/TindakPidanaPolda.edit.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Edit Persentase Penyelesaian Tindak Pidana Polda"
            }
        },
        //== ...
    ]
},
```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
        //== ...
        {
        name: 'Persentase Penyelesaian Tindak Pidana Polda',
        link: '/dashboard/tindak-pidana-polda',
        icon: 'fa fa-angle-double-right'
      },
        //== ...
    ]
},
```

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
        name: 'Persentase Penyelesaian Tindak Pidana Polda',
        link: '/admin/tindak-pidana-polda',
        icon: 'fa fa-angle-double-right'
      },
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript
//== Persentase Penyelesaian Tindak Pidana Polda

import TindakPidanaPolda from './components/bantenprov/tindak-pidana-polda/TindakPidanaPolda.chart.vue';
Vue.component('echarts-tindak-pidana-polda-kota', TindakPidanaPolda);

import TindakPidanaPoldaKota from './components/bantenprov/tindak-pidana-polda/TindakPidanaPoldaKota.chart.vue';
Vue.component('echarts-tindak-pidana-polda-kota', TindakPidanaPoldaKota);

import TindakPidanaPoldaTahun from './components/bantenprov/tindak-pidana-polda/TindakPidanaPoldaTahun.chart.vue';
Vue.component('echarts-tindak-pidana-polda-tahun', TindakPidanaPoldaTahun);

import TindakPidanaPoldaAdminShow from './components/bantenprov/tindak-pidana-polda/TindakPidanaPoldaAdmin.show.vue';
Vue.component('admin-view-tindak-pidana-polda-kota-tahun', TindakPidanaPoldaAdminShow);

//== Echarts Group Egoverment

import TindakPidanaPoldaBar01 from './components/views/bantenprov/tindak-pidana-polda/TindakPidanaPoldaBar01.vue';
Vue.component('tindak-pidana-polda-bar-01', TindakPidanaPoldaBar01);

import TindakPidanaPoldaBar02 from './components/views/bantenprov/tindak-pidana-polda/TindakPidanaPoldaBar02.vue';
Vue.component('tindak-pidana-polda-bar-02', TindakPidanaPoldaBar02);

//== mini bar charts
import TindakPidanaPoldaBar03 from './components/views/bantenprov/tindak-pidana-polda/TindakPidanaPoldaBar03.vue';
Vue.component('tindak-pidana-polda-bar-03', TindakPidanaPoldaBar03);

import TindakPidanaPoldaPie01 from './components/views/bantenprov/tindak-pidana-polda/TindakPidanaPoldaPie01.vue';
Vue.component('tindak-pidana-polda-pie-01', TindakPidanaPoldaPie01);

import TindakPidanaPoldaPie02 from './components/views/bantenprov/tindak-pidana-polda/TindakPidanaPoldaPie02.vue';
Vue.component('tindak-pidana-polda-pie-02', TindakPidanaPoldaPie02);

//== mini pie charts
import TindakPidanaPoldaPie03 from './components/views/bantenprov/tindak-pidana-polda/TindakPidanaPoldaPie03.vue';
Vue.component('tindak-pidana-polda-pie-03', TindakPidanaPoldaPie03);
```
