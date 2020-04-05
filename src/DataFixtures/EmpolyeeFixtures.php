<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class EmpolyeeFixtures extends Fixture implements DependentFixtureInterface
{
    const EMP_COUNT=15;

    /** @var \Faker\Generator */
    private $facker;

    public function __construct()
    {
        $this->facker=Factory::create('fa_IR');
    }

    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<self::EMP_COUNT; $i++){
            $emp=new Employee();
            $emp->setFirstName($this->facker->firstName)
                ->setLastName($this->facker->lastName)
                ->setNationalCode(100000000+$i)
                ->setGender($this->facker->randomElement(Employee::GENDER))
                ->setFatherName($this->facker->firstName)
                ->setIdNo($this->facker->numberBetween(1, 10000000))
                ->setPlaceOfBirth($this->facker->city)
                ->setBirthDate($this->facker->dateTimeBetween('-45 years','-18 years'))
                ->setDegreeOfEducation($this->facker->randomElement(Employee::DEGREE))
                ->setImageFileName($this->facker->numberBetween(1, 10).".jpg")
            ;

            $org=       $this->facker->numberBetween(1,7);
            $building=  $this->facker->numberBetween(8, 22);
            $contract=  $this->facker->numberBetween(33, 39);
            $unit=      $this->facker->numberBetween(23, 30);
            $sallary=   $this->facker->numberBetween(40, 46);
            $archiveDoc= $this->facker->numberBetween(47, 53);
            $unitCategory= $this->facker->numberBetween(54, 58);

            $emp->setOrg($this->getReference('base_'.$org))
                ->setBuilding($this->getReference('base_'.$building))
                ->setContractType($this->getReference('base_'.$contract))
                ->setUnit($this->getReference('base_'.$unit))
                ->setSallaryOrg($this->getReference('base_'.$sallary))
                ->setArchiveFileOrg($this->getReference('base_'.$archiveDoc))
                ->setUnitCategory($this->getReference('base_'.$unitCategory))
            ;
            $this->addReference('emp_'.$i, $emp);

            $manager->persist($emp);
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
        ];
    }
}
