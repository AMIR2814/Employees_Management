<?php

namespace App\DataFixtures;

use App\Entity\Base;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BaseFixtures extends Fixture
{
    private $baseInfo=[
        ['id'=>1,	'parent'=>null,	'title'=>'شهرداری نیشابور',			            	'category'=>base::BASE_ORG,		'color'=>null],
        ['id'=>2,	'parent'=>1,	'title'=>'سازمان مدیریت حمل و نقل بار و مسافر',		'category'=>base::BASE_ORG,		'color'=>null],
        ['id'=>3,	'parent'=>1,	'title'=>'سازمان عمران و بازآفرینی شهری',		    'category'=>base::BASE_ORG,		'color'=>null],
        ['id'=>4,	'parent'=>1,	'title'=>'سازمان آتش نشانی',				        'category'=>base::BASE_ORG,		'color'=>null],
        ['id'=>5,	'parent'=>1,	'title'=>'سازمان آرامستان',				            'category'=>base::BASE_ORG,		'color'=>null],
        ['id'=>6,	'parent'=>1,	'title'=>'سازمان فضای سبز',				            'category'=>base::BASE_ORG,		'color'=>null],
        ['id'=>7,	'parent'=>1,	'title'=>'سازمان مدیریت پسماند',				    'category'=>base::BASE_ORG,		'color'=>null],

        ['id'=>8,	'parent'=>1,	'title'=>'ستاد',					                'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>9,	'parent'=>1,	'title'=>'منطقه دو',					            'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>10,	'parent'=>1,	'title'=>'منطقه یک',					            'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>11,	'parent'=>2,	'title'=>'پایانه مسافربری',					        'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>12,	'parent'=>2,	'title'=>'تعمیرگاه مرکزی',				            'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>13,	'parent'=>3,	'title'=>'ساختمان پارسه',				            'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>14,	'parent'=>3,	'title'=>'کارخانه آسفالت',				            'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>15,	'parent'=>4,	'title'=>'ستاد مرکزی',					            'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>16,	'parent'=>4,	'title'=>'ایستگاه 1',					            'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>17,	'parent'=>4,	'title'=>'ایستگاه 2',					            'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>18,	'parent'=>4,	'title'=>'ایستگاه 3',					            'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>19,	'parent'=>4,	'title'=>'ایستگاه 4',					            'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>20,	'parent'=>4,	'title'=>'ایستگاه 5',					            'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>21,	'parent'=>4,	'title'=>'ایستگاه 6',					            'category'=>base::BASE_BULIDING,		'color'=>null],
        ['id'=>22,	'parent'=>4,	'title'=>'ایستگاه 7',					            'category'=>base::BASE_BULIDING,		'color'=>null],

        ['id'=>23,	'parent'=>1,	'title'=>'حوزه شهردار',				                'category'=>base::BASE_UNIT,		'color'=>null],
        ['id'=>24,	'parent'=>23,	'title'=>'معاونت اداری و مالی',				        'category'=>base::BASE_UNIT,		'color'=>null],
        ['id'=>25,	'parent'=>23,	'title'=>'معاونت خدمات شهری',				        'category'=>base::BASE_UNIT,		'color'=>null],
        ['id'=>26,	'parent'=>23,	'title'=>'معاونت عمران',				            'category'=>base::BASE_UNIT,		'color'=>null],
        ['id'=>27,	'parent'=>23,	'title'=>'معاونت شهرسازی',				            'category'=>base::BASE_UNIT,		'color'=>null],
        ['id'=>28,	'parent'=>24,	'title'=>'حوزه اداری',					            'category'=>base::BASE_UNIT,		'color'=>null],
        ['id'=>29,	'parent'=>28,	'title'=>'کارگزینی',					            'category'=>base::BASE_UNIT,		'color'=>null],
        ['id'=>30,	'parent'=>28,	'title'=>'رفاهی',					                'category'=>base::BASE_UNIT,		'color'=>null],

        ['id'=>31,	'parent'=>null, 'title'=>'مرد',					                    'category'=>'null',		'color'=>null],
        ['id'=>32,	'parent'=>null,	'title'=>'زن',					                    'category'=>'null',		'color'=>null],

        ['id'=>33,	'parent'=>null,	'title'=>'کارگر قراردادی',					        'category'=>base::BASE_CONTRACT_TYPE,		'color'=>null],
        ['id'=>34,	'parent'=>null,	'title'=>'کارگر دائم',					            'category'=>base::BASE_CONTRACT_TYPE,		'color'=>null],
        ['id'=>35,	'parent'=>null,	'title'=>'شرکت مهران گستر',					        'category'=>base::BASE_CONTRACT_TYPE,		'color'=>null],
        ['id'=>36,	'parent'=>null,	'title'=>'شرکت سبزیور',					            'category'=>base::BASE_CONTRACT_TYPE,		'color'=>null],
        ['id'=>37,	'parent'=>null,	'title'=>'کارمند دائم',					            'category'=>base::BASE_CONTRACT_TYPE,		'color'=>null],
        ['id'=>38,	'parent'=>null,	'title'=>'کارمند پیمانی',					        'category'=>base::BASE_CONTRACT_TYPE,		'color'=>null],
        ['id'=>39,	'parent'=>null,	'title'=>'مستخدم موقت',					            'category'=>base::BASE_CONTRACT_TYPE,		'color'=>null],

        ['id'=>40,	'parent'=>null,	'title'=>'شهرداری نیشابور',			            	'category'=>base::BASE_SALLARY_ORG,		'color'=>null],
        ['id'=>41,	'parent'=>null,	'title'=>'سازمان مدیریت حمل و نقل بار و مسافر',		'category'=>base::BASE_SALLARY_ORG,		'color'=>null],
        ['id'=>42,	'parent'=>null,	'title'=>'سازمان عمران و بازآفرینی شهری',		    'category'=>base::BASE_SALLARY_ORG,		'color'=>null],
        ['id'=>43,	'parent'=>null,	'title'=>'سازمان آتش نشانی',				        'category'=>base::BASE_SALLARY_ORG,		'color'=>null],
        ['id'=>44,	'parent'=>null,	'title'=>'سازمان آرامستان',				            'category'=>base::BASE_SALLARY_ORG,		'color'=>null],
        ['id'=>45,	'parent'=>null,	'title'=>'شرکت سبزیور',				                'category'=>base::BASE_SALLARY_ORG,		'color'=>null],
        ['id'=>46,	'parent'=>null,	'title'=>'شرکت مهران گستر',				            'category'=>base::BASE_SALLARY_ORG,		'color'=>null],

        ['id'=>47,	'parent'=>null,	'title'=>'شهرداری نیشابور',			            	'category'=>base::BASE_ARCHIVE_DOC,		'color'=>null],
        ['id'=>48,	'parent'=>null,	'title'=>'سازمان مدیریت حمل و نقل بار و مسافر',		'category'=>base::BASE_ARCHIVE_DOC,		'color'=>null],
        ['id'=>49,	'parent'=>null,	'title'=>'سازمان عمران و بازآفرینی شهری',		    'category'=>base::BASE_ARCHIVE_DOC,		'color'=>null],
        ['id'=>50,	'parent'=>null,	'title'=>'سازمان آتش نشانی',				        'category'=>base::BASE_ARCHIVE_DOC,		'color'=>null],
        ['id'=>51,	'parent'=>null,	'title'=>'سازمان آرامستان',				            'category'=>base::BASE_ARCHIVE_DOC,		'color'=>null],
        ['id'=>52,	'parent'=>null,	'title'=>'سازمان فضای سبز',				            'category'=>base::BASE_ARCHIVE_DOC,		'color'=>null],
        ['id'=>53,	'parent'=>null,	'title'=>'سازمان مدیریت پسماند',				    'category'=>base::BASE_ARCHIVE_DOC,		'color'=>null],

        ['id'=>54,	'parent'=>null,	'title'=>'معاونت اداری و مالی',			            'category'=>base::BASE_UNIT_CATEGORY,		'color'=>null],
        ['id'=>55,	'parent'=>null,	'title'=>'حوزه شهردار',		                        'category'=>base::BASE_UNIT_CATEGORY,		'color'=>null],
        ['id'=>56,	'parent'=>null,	'title'=>'معاونت خدمات شهری',		                'category'=>base::BASE_UNIT_CATEGORY,		'color'=>null],
        ['id'=>57,	'parent'=>null,	'title'=>'معاونت شهرسازی',				            'category'=>base::BASE_UNIT_CATEGORY,		'color'=>null],
        ['id'=>58,	'parent'=>null,	'title'=>'معاونت عمران',				            'category'=>base::BASE_UNIT_CATEGORY,		'color'=>null],
    ];



    public function load(ObjectManager $manager)
    {
        foreach ($this->baseInfo as $item){
            $base=new Base();
            $base->setParentId($item['parent'])
                ->setCategory($item['category'])
                ->setTitle($item['title'])
            ;

            $this->addReference('base_'.$item['id'], $base);

            $manager->persist($base);
        }

        $manager->flush();
    }
}
