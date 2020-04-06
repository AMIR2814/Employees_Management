<?php

namespace App\Controller\admin\reports;

use App\Repository\BaseRepository;
use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/rep", name="adminRep_")
 */
class ReportsController extends AbstractController
{
    /**
     * @Route("/organizations", name="organizations")
     */
    public function organizations(EmployeeRepository $repository)
    {
        return $this->render('admin/reports/organizations.html.twig',[
            'orgs'      => $repository->numberOfEmployeesInOrganizations(),
            'contracts'  => $repository->numberOfContractTypeInOrganizations(),
        ]);
    }

    /**
     * @Route("/contracts", name="contracts")
     */
    public function contracts(EmployeeRepository $repository)
    {
        return $this->render('admin/reports/contract.html.twig',[
            'contracts'         => $repository->numberOfContracts(),
            'employeesEachOrg'  => $repository->numberOfEmployeeInOrganizationsBasedOnContracts(),
        ]);
    }

    /**
     * @Route("/sallaryorg", name="sallaryorg")
     */
    public function sallaryorg(EmployeeRepository $repository)
    {
        return $this->render("admin/reports/sallaryOrgs.html.twig",[
            'sallaryOrgs'    => $repository->numberOfEmployeesInSallaryOrg(),
            'contracts'     => $repository->numberOfContractTypeInSallaryOrg(),
        ]);
    }

}