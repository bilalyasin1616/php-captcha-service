<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Services\Captcha\CaptchaService;

/**
 * Description of DefaultController
 */
class DefaultController extends Controller
{

    /**
     * @Route("/contact", name="app_contact")
     * @param Request $request
     */
    public function contactAction(Request $request)
    {

        $form = $this->generateForm($request);
        $tplVars = $this->afterForm($form, $request);

        if (!$tplVars) {
            $tplVars = [];
        }
        $form = $form->createView();
        $captchaData = CaptchaService::startCaptcha("#2E2E2D");
        return $this->render("default/contact.html.twig", array_merge($tplVars, [
            'form' => $form,
            'captcha' => $captchaData["image_src"]
        ]));

    }

    
    /**
     * @Route("/captcha", name="captcha")
     */
    public function captchaAction(Request $request)
    {
        if (isset($_GET['_CAPTCHA']) && isset($_GET['t'])) {
            $captcha_time = htmlspecialchars($request->get('t'));
            CaptchaService::captchaAction($captcha_time);
        }
        exit();
    }


}
