<?php

namespace App\Repository;

use App\Entity\Employee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Employee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employee[]    findAll()
 * @method Employee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employee::class);
    }

    private function employeesWithAllRelations():QueryBuilder
    {
        $query= $this->createQueryBuilder('e')

            ->select('e')
            ->addSelect('org')
            ->addSelect('contract')
            ->addSelect('unit')
            ->addSelect('sallary')
            ->addSelect('unitCategory')
            ->addSelect('archiveDoc')
            ->addSelect('building')

            ->leftJoin('e.org','org')
            ->leftJoin('e.contractType','contract')
            ->leftJoin('e.unit','unit')
            ->leftJoin('e.sallaryOrg','sallary')
            ->leftJoin('e.unitCategory', 'unitCategory')
            ->leftJoin('e.archiveFileOrg','archiveDoc')
            ->leftJoin('e.building','building')
        ;

        return  $query;
    }

    public function returnAllEmployees()
    {
        return $this->employeesWithAllRelations()
            ->getQuery()
            ->getResult()
        ;
    }

    public function employeeInfoWithNationalCode(string $nationalCode)
    {
        return $this->employeesWithAllRelations()
            ->andWhere('e.nationalCode=:nationalCode')
            ->setParameter('nationalCode', $nationalCode)
            ->orderBy('e.lastName','ASC')
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

//  =======================================================================
//                            ORG  Reports
//  =======================================================================

    private function org():QueryBuilder
    {
        return $this->createQueryBuilder('e')
            ->leftJoin('e.org', 'org')
            ->groupBy('org.id')
            ->andWhere('org.notShow = false')
        ;
    }
    public function numberOfEmployeesInOrganizations()
    {
        return $this->org()
            ->Select('org.id, org.title, COUNT(org.title) as count')
            ->getQuery()
            ->getResult()
        ;
    }

    public function numberOfContractTypeInOrganizations()
    {
        return $this->org()
            ->leftJoin('e.contractType', 'contractType')
            ->select('org.id, contractType.title, COUNT(contractType.title) as count')
            ->addGroupBy('contractType.id')
            ->andWhere('contractType.notShow = false')
            ->getQuery()
            ->getResult()
        ;
    }

//  =======================================================================
//                        Contracts each ORG
//  =======================================================================

    public function numberOfContracts()
    {
        return $this->createQueryBuilder('e')
            ->leftJoin('e.contractType', 'contractType')
            ->addGroupBy('contractType.id')
            ->andWhere('contractType.notShow = false')
            ->Select('contractType.id, contractType.title, COUNT(contractType.title) as count')
            ->getQuery()
            ->getResult()
        ;
    }

    public function numberOfEmployeeInOrganizationsBasedOnContracts()
    {
        return $this->org()
            ->leftJoin('e.contractType', 'contractType')
            ->Select('org.id, org.title,contractType.id, COUNT(contractType.title) as count')
            ->addGroupBy('contractType.id')
            ->andWhere('contractType.notShow = false')
            ->getQuery()
            ->getResult()
            ;
    }

//  =======================================================================
//                            Sallary ORG  Reports
//  =======================================================================

    private function sallaryOrg():QueryBuilder
    {
        return $this->createQueryBuilder('e')
            ->leftJoin('e.sallaryOrg', 's')
            ->groupBy('s.id')
            ->andWhere('s.notShow = false')
            ;
    }

    public function numberOfEmployeesInSallaryOrg()
    {
        return $this->sallaryOrg()
            ->Select('s.id, s.title, COUNT(s.title) as count')
            ->getQuery()
            ->getResult()
            ;
    }

    public function numberOfContractTypeInSallaryOrg()
    {
        return $this->sallaryOrg()
            ->leftJoin('e.contractType', 'contractType')
            ->select('s.id, contractType.title, COUNT(contractType.title) as count')
            ->addGroupBy('contractType.id')
            ->andWhere('contractType.notShow = false')
            ->getQuery()
            ->getResult()
            ;
    }

}
