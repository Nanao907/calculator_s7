<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    #[Route('/', name: 'calculator')]
    public function index(Request $request): Response
    {
        $result = null;
        $operation = $request->request->get('operation');
        $num1 = $request->request->get('num1');
        $num2 = $request->request->get('num2');

        if ($operation && $num1 !== null && $num2 !== null) {
            $num1 = floatval($num1);
            $num2 = floatval($num2);

            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = 'Divisin by zero? Frrrrr?';
                    }
                    break;
                default:
                    $result = 'alebra anyway was not my thingy';
            }
        }

        return $this->render('calculator/index.html.twig', [
            'result' => $result,
            'num1' => $num1,
            'num2' => $num2,
            'operation' => $operation,
        ]);
    }
}
