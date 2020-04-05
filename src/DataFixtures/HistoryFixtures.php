<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use App\Entity\History;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class HistoryFixtures extends Fixture implements DependentFixtureInterface
{
    /** @var \Faker\Generator */
    private $facker;

    public function __construct()
    {
        $this->facker=Factory::create('fa_IR');
    }

    public function load(ObjectManager $manager)
    {
        $employeeCount=EmpolyeeFixtures::EMP_COUNT;

        for($i=0; $i< $employeeCount*7; $i++){
            $history=new History();

//          size baseInfo in BaseFixtures
            $baseRnd=rand(1,58);

            $history->setEmployee($this->getReference('emp_'.rand(0, $employeeCount-1)))
                ->setBase($this->getReference('base_'.$baseRnd))
                ->setBaseDate($this->facker->dateTimeBetween('-5 years', '-1 years'))
                ->setNoticeNo(rand(1500,7000))
                ->setNoticeDate($this->facker->dateTimeBetween('-5 years', '-1 years'))
            ;
            $manager->persist($history);
        }

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            BaseFixtures::class,
            EmpolyeeFixtures::class,
        ];
    }
}
