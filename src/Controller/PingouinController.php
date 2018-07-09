<?php

namespace App\Controller;

use App\Entity\Pingouin;
use App\Form\PingouinType;
use App\Repository\PingouinRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PingouinController extends Controller
{
    /**
     * @Route("/pingouin", name="pingouin")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Pingouin::class);
        $lesPingouins = $repo->findAll();

        return $this->render('pingouin/index.html.twig', [
            'lesPingouins' => $lesPingouins,
        ]);
    }

    /**
     * @Route("/pingouin/{id}", name="pingouin_show")
     */
    public function show(Pingouin $lePingouin)
    {
        // Ici ça marche avec le '@ParamConverter' de symfony
        return $this->render('pingouin/show.html.twig', [
            'lePingouin' => $lePingouin,
        ]);
    }

    /**
     * @Route("/pingouin/new", name="pingouin_create")
     * @Route("/pingouin/{id}/edit", name="pingouin_edit")
     */
    public function createOrUpdate(Request $req, ObjectManager $manager, Pingouin $pingouin = null)
    {
        // Pingouin $pingouin = null ne fonctionne pas !
        if(!$pingouin) 
        {
            $pingouin = new Pingouin();
        }

        // Methode chiante
        // $form = $this->createFormBuilder($pingouin)
        //                 ->add('nom')
        //                 ->add('couleur')
        //                 ->getForm();

        // Methode facile ! (php bin/console make:form)
        $form = $this->createForm(PingouinType::class, $pingouin);

        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid())
        {
            if(!$pingouin->getId())
            {
                $pingouin->setCreatedAt(new \DateTime());
            }

            $manager->persist($pingouin);
            $manager->flush();

            return $this->redirectToRoute('welcome', [
                'id' => $pingouin->getId()
            ]);
        }
        
        return $this->render('pingouin/create.html.twig', [
            'formPingouin' => $form->createView()
        ]);
    }
}
