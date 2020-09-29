<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Lenovo ideapad',
            'price' => '2000',
            'description' => ' Vel recusandae officiis eum ducimus architecto at, dolor ea distinctio iusto sit similique esse. Temporibus.',
            'image' => 'lenovo ideapad.jpg',
        ]);

        Product::create([
            'name' => 'Lenovo thinkpad',
            'price' => '2330',
            'description' => ' Vel recusandae officiis eum ducimus architecto at, dolor ea distinctio iusto sit similique esse. Temporibus.',
            'image' => 'lenovo thinkpad.jpg',
        ]);

        Product::create([
            'name' => 'Lenovo yoga pro II',
            'price' => '2500',
            'description' => ' Vel recusandae officiis eum ducimus architecto at, dolor ea distinctio iusto sit similique esse. Temporibus.',
            'image' => 'lenovo yoga pro II.jpg',
        ]);

        Product::create([
            'name' => 'Lenovo Yoga',
            'price' => '3000',
            'description' => ' Vel recusandae officiis eum ducimus architecto at, dolor ea distinctio iusto sit similique esse. Temporibus.',
            'image' => 'yoga c740.jpg',
        ]);
    }
}
