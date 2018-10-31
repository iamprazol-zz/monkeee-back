<?php

use Illuminate\Database\Seeder;
use App\dj;

class DjTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $d1 = [
            'id' => 1,
            'category_id' => 2,
            'resident' => 'Valley View Road 26',
            'name' => 'Steve',
            'label' => 'Super Beautiful club.',
            'mobile' => 3245698514,
            'email' => 'abc@gmail.com',
            'bio' => '"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"',
            'facebook' => 'asasasddas',
            'instagram' => 'sasasdfdcc'
        ];

        $d2 = [
            'id' => 2,
            'category_id' => 3,
            'resident' => 'View Road',
            'name' => 'David',
            'label' => 'best',
            'mobile' => 5245698526,
            'email' => 'abssc@gmail.com',
            'bio' => '"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."',
            'facebook' => '125aasddas',
            'instagram' => 'kk125ass'
        ];

        $d3 = [
            'id' => 3,
            'category_id' => 1,
            'resident' => 'Doroty',
            'name' => 'Darwin',
            'label' => 'Beautiful club.',
            'mobile' => 52468131654,
            'email' => 'asasas@gmail.com',
            'bio' => '"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"',
            'facebook' => 'as5656d',
            'instagram' => 'as562d1255'
        ];

        $d4 = [
            'id' => 4,
            'category_id' => 1,
            'resident' => 'sydney',
            'name' => 'Stephen',
            'label' => 'Excellent',
            'mobile' => 4562134562,
            'email' => 'kbc@gmail.com',
            'bio' => '"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"',
            'facebook' => 'asa5668sddas',
            'instagram' => 'sasas4444dfdcc'
        ];

        dj::create($d1);
        dj::create($d2);
        dj::create($d3);
        dj::create($d4);

    }

}
