<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class CalculatorController extends AbstractController
{
    #[Route('/calculator', name: 'app_calculator')]
    public function index(Request $request): Response
    {
        $result = $request->query->get('result');

        if ($request->isMethod('POST')) {
            $number1 = $request->request->get('number1');
            $number2 = $request->request->get('number2');
            $operator = $request->request->get('operator');
    
            if (is_numeric($number1) && is_numeric($number2)) {
                switch ($operator) {
                    case 'add':
                        $result = $number1 + $number2;
                        break;
                    case 'subtract':
                        $result = $number1 - $number2;
                        break;
                    case 'multiply':
                        $result = $number1 * $number2;
                        break;
                    case 'divide':
                        if ($number2 != 0) {
                            $result = $number1 / $number2;
                        } else {
                            $result = 'Division by zero error';
                        }
                        break;
                    default:
                        $result = 'Invalid operator';
                }
            } else {
                $result = 'Invalid input';
            }
    
            return $this->redirectToRoute('app_calculator', ['result' => $result]);
        }
    

        return $this->render('calculator/index.html.twig', [
            'result' => $result,
        ]);
    }
}