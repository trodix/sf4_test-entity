<?php

namespace App\Controller;

use App\Entity\Pingouin;
use App\Form\PingouinType;
use App\Repository\PingouinRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

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
     * @Route("/pingouin/new", name="pingouin_create")
     */
    public function create(Request $req)
    {

        $pingouin = new Pingouin();

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

            $pingouin->setCreatedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($pingouin);
            $em->flush();

            return $this->redirectToRoute('pingouin', [
                'id' => $pingouin->getId()
            ]);
        }
        
        return $this->render('pingouin/create.html.twig', [
            'formPingouin' => $form->createView()
        ]);
    }

    // /**
    //  * @Route("/pingouin/{id}", name="pingouin_show")
    //  */
    // public function show(Pingouin $lePingouin)
    // {
    //     // Ici ça marche avec le '@ParamConverter' de symfony
    //     return $this->render('pingouin/show.html.twig', [
    //         'lePingouin' => $lePingouin,
    //     ]);
    // }

    /**
     * @Route("/pingouin/{id}", name="pingouin_show")
     */
    public function show($id)
    {

        $repo = $this->getDoctrine()->getrepository(Pingouin::class);
        $lePingouin = $repo->find($id);

        return $this->render('pingouin/show.html.twig', [
            'lePingouin' => $lePingouin,
        ]);
    }

     /**
     * @Route("/pingouin/{id}/edit", name="pingouin_edit")
     */
    public function Update(Request $req, Pingouin $pingouin)
    {

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

            $em = $this->getDoctrine()->getManager();
            $em->persist($pingouin);
            $em->flush();

            return $this->redirectToRoute('pingouin_show', [
                'id' => $pingouin->getId()
            ]);
        }
        
        return $this->render('pingouin/update.html.twig', [
            'formPingouin' => $form->createView()
        ]);
    }

    /**
     * @Route("/pingouin/{id}/delete", name="pingouin_delete")
     * @Method("POST")
     */
    public function delete(Pingouin $pingouin)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($pingouin);
        $em->flush();

        return $this->redirectToRoute('pingouin');
    }
}
