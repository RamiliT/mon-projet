<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Product;
use BlogBundle\Form\ProductType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     *@Route("/add", name="addProduct")
     */
    public function addAction(Request $request)
    {
        //on crée un produit
        $product = new Product();

        //on récupère le formulaire
        $form = $this->createForm(ProductType::class, 
    $product);

    $form->handleRequest($request);

  //Si le formulaire est soumi
        if($form->isSubmitted()){

        //on enregistre le produit en bdd
        $em = $this->$this->getDoctrine()->getManager();
        $em->persist();
        $em->flush();

        return new Response('Produit ajouté!');

        }

    //on génère le HTML du formulaire crée
        $formView = $form->createView();

        //on rend la vue
         return $this->render('@Blog/Product/productAdd.html.twig', array
    ('form'=>$formView));

    }
}