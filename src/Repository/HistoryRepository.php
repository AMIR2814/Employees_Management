<?php

namespace App\Repository;

use App\Entity\History;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method History|null find($id, $lockMode = null, $lockVersion = null)
 * @method History|null findOneBy(array $criteria, array $orderBy = null)
 * @method History[]    findAll()
 * @method History[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, History::class);
    }

    public function returnHistoryEmployee($nationalCode)
    {
        return $this->createQueryBuilder('h')
            ->innerJoin('h.employee','employee')
            ->innerJoin('h.base','base')
            ->addSelect('base')
            ->andWhere('employee.nationalCode=:nationalCode')
            ->setParameter('nationalCode', $nationalCode)
            ->andWhere('h.isDeleted = false')
            ->orderBy('h.baseDate','DESC')
            ->getQuery()
            ->getResult()
        ;
    }

}
