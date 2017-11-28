<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new Menu();
        $menu->id = '1';
        $menu->name = 'Song';
        $menu->link = '/songs';
        $menu->oder = '1';
        $menu->save();


        $menu = new Menu();
        $menu->id = '2';
        $menu->name = 'Album';
        $menu->link = '/albums';
        $menu->oder = '2';
        $menu->save();


        $menu = new Menu();
        $menu->id = '3';
        $menu->name = 'Artists';
        $menu->link = '/artists';
        $menu->oder = '3';
        $menu->save();

    }
}
