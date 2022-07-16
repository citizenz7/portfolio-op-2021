<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email'),
            TextField::new('prenom'),
            TextField::new('nom'),
            TextField::new('adresse')->hideOnIndex(),
            TextField::new('telephone')->hideOnIndex(),
            TextareaField::new('aPropos')->hideOnIndex(),
            TextField::new('twitter')->hideOnIndex(),
            TextField::new('github')->hideOnIndex(),
            TextField::new('gitlab')->hideOnIndex(),
            TextField::new('linkedin')->hideOnIndex(),
            ImageField::new('avatar')->setBasePath('uploads/users')->setUploadDir('public/uploads/users'),
            TextField::new('status')->hideOnIndex(),
        ];
    }

    // On modifie les différentes fonctions sur EasyAdmin
    // car on ne veut pas laisser la possibilité
    // de SUPPRIMER ou de CREER un nouveau user
    // Il n'y a qu'un seul user dans le cas de ce portfolio
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // On veut un bouton qui nous permette d'accéder aux Détails d'un user
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            // On DESACTIVE le bouton DELETE et le bouton NEW
            ->disable(Action::DELETE, Action::NEW);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Utilisateurs')
            ->setPageTitle('edit', 'Modifier')
            ->setDefaultSort(['id' => 'DESC']);
    }
}
