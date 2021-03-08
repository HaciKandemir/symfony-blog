<?php


namespace App\Service;


use App\Entity\InSiteSetting;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InSiteSettingService extends AbstractController
{
    public  function  getInSiteVal(string $key): string
    {
        $repository = $this->getDoctrine()->getRepository(InSiteSetting::class);
        $data =  $repository->findOneBy(['name'=>$key]);

        return is_null($data) ? '' : $data->getValue();
    }
}