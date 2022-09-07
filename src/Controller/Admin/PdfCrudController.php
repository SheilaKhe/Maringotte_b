<?php

namespace App\Controller\Admin;

use App\Entity\Pdf;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PdfCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pdf::class;
    }

    public function configureFields(string $pageName): iterable
    {
        
            yield TextField::new('name', 'Choisir votre fichier...')
                ->setFormType(FileUploadType::class);
    }
}
