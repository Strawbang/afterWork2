<?php
/**
 * Created by PhpStorm.
 * User: sridar
 * Date: 13/06/2018
 * Time: 14:35
 */

namespace App\Controller;


use App\Entity\UserGroupe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Groupe;
use App\Entity\User;
use App\Entity\Event;
use App\Entity\Entreprise;
use App\Entity\Message;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\UserRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class DashboardController extends Controller
{


    public function showAction(Request $request)
    {
        
        $User = $this->getUser();
        $entityManager = $this->getDoctrine()->getManager();
        $allusers = $entityManager->getRepository(User::class)->findAll();
        $allGroupes = $entityManager->getRepository(Groupe::class)->findAll();
        $allEvents = $entityManager->getRepository(Event::class)->findAll();
        $allEntreprises = $entityManager->getRepository(Entreprise::class)->findAll();
        $allMessages = $entityManager->getRepository(Message::class)->findAll();






        $countUser = count($allusers);
        $countEvent = count($allEvents);
        $countGroupe = count($allGroupes);
        $countEntreprises = count($allEntreprises);
        $countMessages =count($allMessages);






        return $this->render('Dashboard/index.html.twig', array(
            'count' => $countUser,
            'nbgroupes' => $countGroupe,
            'events' => $countEvent,
            'Messages' => $countMessages,
            'Entreprise' => $countEntreprises,
            'users' => $allusers,
            'groupes' => $allGroupes
        ));

    }

}
