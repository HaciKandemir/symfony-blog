<?php


namespace App\Controller\Admin;


use App\Entity\InSiteSetting;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InSiteSettingController extends AbstractController
{
    /**
     * @Route("/admin/site-settings", name="side_setting")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(InSiteSetting::class);

        return $this->render('admin/site-settings.html.twig',[
           'rows'=>$repository->findAll()
        ]);
    }

    /**
     * @Route("/admin/site-settings/update", name="side-setting-update")
     */
    public function update(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(InSiteSetting::class);

        $posts=$request->request->all();
        foreach ($posts as $key => $value){
            if ($item = $repository->findOneBy(['name'=>$key])){
                $item->setValue($value);
                $em->persist($item);
            }
        }
        $em->flush();

        return $this->render('admin/site-settings.html.twig',[
            'rows'=>$repository->findAll()
            ]);
    }
}