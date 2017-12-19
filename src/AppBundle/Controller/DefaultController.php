<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Form\BookType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);

        $errors = null;

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            $errors = $form->getErrors(true, true);
        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
            'errors' => $errors
        ));
    }
}
