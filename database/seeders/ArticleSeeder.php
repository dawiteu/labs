<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class ArticleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('articles')->insert([
            [
                "image" => "img/blog/blog-1.jpg",
                "titre" => "JUST A SIMPLE BLOG POST",
                "description" => "text 200000 ",
                "deleted" => "0", 
                "categorie_id" => 3, 
                "user_id" => 1, 
                "created_at" => now() 
            ],
            [
                "image" => "img/blog/blog-2.jpg",
                "titre" => "JUST A SIMPLE BLOG POST 2",
                "description" => "text 3000000000",
                "deleted" => "0", 
                "categorie_id" => 1, 
                "user_id" => 1, 
                "created_at" => now()
            ],
            [
                "image" => "img/blog/blog-3.jpg",
                "titre" => "JUST A SIMPLE BLOG POST 3",
                "description" => "text 54000000000",
                "deleted" => "0", 
                "categorie_id" => 2,
                "user_id" => 1, 
                "created_at" => now()
            ],
            [
                "image" => "img/blog/blog-2.jpg",
                "titre" => "JUST A SIMPLE BLOG POST 4",
                "description" => "text 54000000000",
                "deleted" => "0", 
                "categorie_id" => 3,
                "user_id" => 1, 
                "created_at" => now()
            ],
            [
                "image" => "img/blog/blog-1.jpg",
                "titre" => "JUST A SIMPLE BLOG POST 5",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit vel adipisci tempore neque exercitationem, doloribus eos officia nostrum ipsum. Earum aspernatur ipsa, expedita et quis quasi officia. Temporibus ab eveniet aliquam porro quo nobis enim veniam maxime, assumenda sequi suscipit quae similique corporis accusamus sed architecto fuga culpa in. Quaerat fuga sed inventore ut voluptates aliquid harum, nostrum in optio consequuntur officia nisi perferendis omnis temporibus quis? Aspernatur in obcaecati neque assumenda facilis unde perspiciatis praesentium officiis possimus tempora natus deleniti delectus non nulla vitae quod similique, atque odio beatae accusantium sed distinctio aliquam. Tempora, iusto dolorem nulla quam aperiam repellat explicabo officia atque minima laudantium architecto eveniet quidem cum quo numquam deleniti facilis quisquam maiores velit voluptatem recusandae beatae pariatur cupiditate voluptate. Recusandae deserunt doloremque, tempora accusantium non ullam ipsum. Aliquam, atque repellat eaque autem amet, alias omnis suscipit nesciunt maxime fugit maiores dolorem quisquam facilis consequuntur, consequatur voluptates. Fuga possimus, quae corporis, debitis distinctio numquam voluptatem labore doloribus ducimus odio quasi molestias ut maiores aliquam quia asperiores, tempore velit exercitationem maxime nostrum modi pariatur eius qui magni? Sunt porro iusto, molestiae vero voluptatum atque? Quisquam ab eveniet, consequatur corporis sequi corrupti fugiat excepturi enim exercitationem facere sed inventore quasi minima sit adipisci earum quis at illum et laborum deserunt, ullam voluptatem expedita. Cum, dolores adipisci? Sequi labore tenetur minima cum quisquam deleniti suscipit quia, quos soluta expedita quam iusto? Quidem tenetur, molestias eius ipsa aperiam quae placeat reiciendis rerum in voluptates alias, quos cumque aliquam ad officiis laborum quisquam, fugit asperiores similique molestiae amet. Necessitatibus laudantium labore soluta voluptatibus dolorum fugit nihil neque culpa ullam suscipit molestiae non quis quaerat cupiditate vel velit, tempore libero maiores dolore sequi repellendus! Natus at adipisci doloribus iusto ut minima reprehenderit maxime assumenda inventore sit sapiente, excepturi veritatis cumque ab asperiores ad consequuntur corporis? Enim illo, sit temporibus dolor exercitationem quas! Repellat facere, voluptatibus explicabo accusantium hic voluptatum eum dolores sapiente enim qui iure temporibus quasi dolore doloremque, sint possimus at architecto voluptatem, recusandae esse libero! Amet fugit veritatis ab earum est eveniet. Autem, distinctio! Officiis eius quasi quas est enim voluptas odio illo architecto, modi esse amet rem labore facilis cupiditate fugiat quae. Rerum eveniet eius eum ducimus quos neque deserunt facere totam saepe, cumque, voluptatibus ex. Consequatur voluptate itaque, alias, nesciunt, molestias magnam in distinctio aut at saepe laudantium expedita similique minima sunt quia excepturi fuga corrupti quis! Ipsam obcaecati in enim nemo quisquam vitae esse eius quae ratione cupiditate at iure quo dicta alias fugiat, nostrum voluptatem! Quae, harum? Perferendis porro alias dolore ipsum maxime voluptatum blanditiis, cupiditate quidem accusamus suscipit natus eveniet, dignissimos earum placeat ab beatae, non illo sapiente molestiae aut. In asperiores et accusantium itaque, delectus laboriosam ipsam inventore expedita mollitia, error facilis deserunt. Recusandae corrupti aliquid similique debitis blanditiis impedit ut eveniet, vero mollitia dicta culpa accusantium ipsa quis doloremque inventore iusto modi? Ipsa deserunt aut veniam suscipit? Libero optio voluptatum laboriosam veritatis numquam perferendis in molestias magnam, rerum facilis excepturi laborum iste tenetur nostrum?",
                "deleted" => "0", 
                "categorie_id" => 1,
                "user_id" => 1, 
                "created_at" => now()
            ],
        ]);
    }
}
