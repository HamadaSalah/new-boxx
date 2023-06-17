<?php

use App\FrontBoxes;
use Illuminate\Database\Seeder;

class MainBoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrontBoxes::create([
            'name_en'=>'SILVERBOX',
            'name_ar'=>'البوكس السيلفر',
            'img'=>'mainboxes_1632091430Us6Zj0qd.png',
            'pricefrom'=>0,
            'priceto'=>1000,
            'endDate'=>'2021-09-22 23:22:55',
            'desc_en'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when",
            'desc_ar'=>"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة",
            'status'=>0,
        ]);
        FrontBoxes::create([
            'name_en'=>'GOLDENBOX',
            'name_ar'=>'البوكس الجولد',
            'img'=>'mainboxes_1632087533ysnRzeyT.png',
            'pricefrom'=>1000,
            'priceto'=>2000,
            'endDate'=>'2021-09-22 23:22:55',
            'desc_en'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when",
            'desc_ar'=>"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة",
            'status'=>0,
        ]);
        FrontBoxes::create([
            'name_en'=>'VIPBOX',
            'name_ar'=>'البوكس الخاص',
            'img'=>'mainboxes_1632091532qqfdBfgT.png',
            'pricefrom'=>2000,
            'priceto'=>3000,
            'endDate'=>'2021-09-22 23:22:55',
            'desc_en'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when",
            'desc_ar'=>"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة",
            'status'=>0,
        ]);
    }
}
