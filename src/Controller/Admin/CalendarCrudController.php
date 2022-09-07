<?php

namespace App\Controller\Admin;

use App\Entity\Calendar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class CalendarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Calendar::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('gite', 'Gîte');
        yield DateField::new('start', 'A partir du');
        yield DateField::new('end', 'Jusqu\'au');
        yield ChoiceField::new('book', 'Disponibilité')->setChoices([
            'Libre' => '#75B892',
            'Complet' => '#FB4646'
        ]);
}


    
}
