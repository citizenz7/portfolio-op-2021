<?php

namespace App\Controller\Admin;

use App\Entity\Softskill;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SoftskillCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Softskill::class;
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
