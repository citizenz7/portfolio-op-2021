<?php

namespace App\Controller\Admin;

use App\Entity\Fiche;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FicheCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fiche::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('titre'),
            TextareaField::new('presentation')->onlyOnForms(),
            TextField::new('techno')->onlyOnForms(),
            DateField::new('annee'),
            UrlField::new('url')->onlyOnForms(),
            ImageField::new('image')->setBasePath('uploads/fiches')->setUploadDir('public/uploads/fiches'),
            SlugField::new('slug')->setTargetFieldName('titre')->hideOnIndex(),
            TextField::new('filter')->onlyOnForms(),
            AssociationField::new('categorie')
        ];
    }

    // On trie les infos avec created_at DESC
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['id' => 'DESC']);
    }
}
