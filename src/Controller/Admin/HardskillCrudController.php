<?php

namespace App\Controller\Admin;

use App\Entity\Hardskill;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HardskillCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hardskill::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
