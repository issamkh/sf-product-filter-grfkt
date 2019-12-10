<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Product;
use App\Form\SearchForm;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/", name="product")
     */
    public function index(ProductRepository $repository, Request $request)
    {

        $data = new SearchData();

        //----definir le numero de page pour la pagination
        $data->page = $request->get("page" , 1);

        $form = $this->createForm(SearchForm::class,$data);
        $form->handleRequest($request);

        [$min,$max] = $repository->findMinMax($data);
        $products = $repository->findSearch($data);

        return $this->render('product/index.html.twig', [
            'products' => $products,
            'form' => $form->createView(),
            'min' => $min,
            'max' => $max,
        ]);
    }
}
