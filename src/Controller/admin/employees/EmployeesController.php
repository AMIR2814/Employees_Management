<?php

namespace App\Controller\admin\employees;

use App\Repository\EmployeeRepository;
use App\Repository\HistoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 */
class EmployeesController extends AbstractController
{

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/employees", name="showEmployees")
     */
    public function showAllEmployees(EmployeeRepository $repository)
    {
        return $this->render('admin/showAllEmployees.html.twig',[
            'employees' => $repository->returnAllEmployees(),
        ]);
    }

    /**
     * @Route("/employee/{nationalCode}", name="employeeWithNationalCode")
     */
    public function employeeWithNationalCode ($nationalCode, EmployeeRepository $employeeRepository, HistoryRepository $historyRepository)
    {
        return $this->render('admin/showEmployee.html.twig',[
            'employee' =>  $employeeRepository->employeeInfoWithNationalCode($nationalCode),
            'historys'  => $historyRepository->returnHistoryEmployee($nationalCode),
        ]);
    }
}