<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Product;
use App\Form\ImageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ImageController extends AbstractController
{
    #[Route('/addimagetoproduct/{id}', name: 'app_add_image', methods: ['POST', 'GET'])]
    public function addToProduct(Product $product, Request $request, EntityManagerInterface $entityManager): Response
    {
        $image = new Image();
        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $image = $form->getData();
            $image->setProduct($product);
            $entityManager->persist($image);
            $entityManager->flush();


        }

        return $this->render('image/index.html.twig', [
            'controller_name' => 'ImageController',
            'form'=>$form,
            'product'=>$product
        ]);
    }
}
