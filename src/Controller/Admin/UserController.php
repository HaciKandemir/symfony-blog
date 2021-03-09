<?php


namespace App\Controller\Admin;


use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    /**
     * @Route("/admin/user-list", name="user_list")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(User::class);

        return $this->render('admin/user-list.html.twig',[
            'rows'=>$repository->findAll()
        ]);
    }
    /**
     * @Route("/admin/user/{id}/update", name="user_update")
     */
    public function update(int $id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository(User::class)->find($id);

        $form = $this->createForm(UserType::class, $data);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($data);
            $em->flush();

            $this->addFlash(
                'success',
                'Değişiklik kaydedildi!'
            );

            return $this->redirect($request->getUri());
        }

        return $this->render('admin/user-update.html.twig',[
            'form'=>$form->createView(),
            'rows'=>$data
        ]);
    }

    /**
     * @Route("/admin/user/{id}/delete", name="user_delete")
     */
    public function delete(int $id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if($data = $em->getRepository(User::class)->find($id)){
            $em->remove($data);
            $em->flush();

            $this->addFlash(
                'success',
                'Başarıyla silindi!'
            );
        }else{
            $this->addFlash(
                'warning',
                'Kullanıcı bulunamadı!'
            );
        }

        return $this->redirectToRoute('user_list');
    }
}