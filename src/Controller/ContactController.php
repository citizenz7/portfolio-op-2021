<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(
        Request $request,
        MailerInterface $mailer,
        TranslatorInterface $translator
    ): Response {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();

            $message = (new Email())
                ->from($contactFormData['email'])
                ->to('contact@olivierprieur.fr')
                ->subject('Message depuis olivierprieur.fr')
                ->html('<h3>Message envoyé de puis mon Portfolio olivierprieur.fr</h3>'
                    . '<b>Expéditeur :</b> '
                    . $contactFormData['nom'] . '<br>'
                    . '<b>Email :</b> '
                    . $contactFormData['email']
                    . '<br>' . '<b>Message</b> : <p>'
                    . $contactFormData['message'] . '</p>', 'text/plain');

            $mailer->send($message);

            $message = $translator->trans('Votre message a bien été envoyé. Merci. J\'y répondrai dès que possible.');
            $this->addFlash('success', $message);

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
