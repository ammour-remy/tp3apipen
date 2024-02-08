<?php

namespace App\Controller\Admin;

use App\Entity\Brand;
use App\Entity\Color;
use App\Entity\Material;
use App\Entity\Pen;
use App\Entity\Type;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct( private AdminUrlGenerator $adminUrlGenerator
    )
    {
        
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
     
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Apipen');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Stylos', 'fas fa-list', Pen::class);
        yield MenuItem::linkToCrud('materiaux', 'fas fa-list', Material::class);
        yield MenuItem::linkToCrud('Marque', 'fas fa-list', Brand::class);
        yield MenuItem::linkToCrud('Types', 'fas fa-list', Type::class);
        yield MenuItem::linkToCrud('Couleurs', 'fas fa-list', Color::class);
        yield MenuItem::linkToCrud('Membres', 'fas fa-list', User::class);
    }
}
