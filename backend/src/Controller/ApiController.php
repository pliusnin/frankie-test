<?php


namespace App\Controller;

use App\Model\Frankiefinancial\VerifyRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ApiController
 * @package App\Controller
 */
class ApiController
{
    /**
     * @param VerifyRequest $verifyRequest
     * @param Request $request
     * @return JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @Route("/v1/search")
     */
    public function index(VerifyRequest $verifyRequest, Request $request)
    {
        $client = new Client([
            'base_uri' => 'https://sandbox.frankiefinancial.com/compliance/v1.2/'
        ]);

        try {
            $filter = \json_decode($request->getContent(), 1);
            // TODO: add validation

            $requestData = $verifyRequest->create($filter);
        } catch (\Exception $e) {
            return $this->errorResponse('Request error', ['message' => $e->getMessage()]);
        }

        try {
            $apiResponse = $client->request(
                'POST',
                'entity/new/verify/two_plus,id,pep/summary',
                [
                    'json' => $requestData,
                    'headers' => $this->getApiHeaders(),
                ]
            );
        } catch (ClientException $e) {
            $body = $e->getResponse()->getBody();
            if (false == ($apiResponse = \json_decode($body, true))) {
                $apiResponse = ['message' => $body->getContents()];
            }
            return $this->errorResponse('Api error', $apiResponse);
        } catch (\Exception $e) {
            return $this->errorResponse('Api error', ['message' => $e->getMessage()]);
        }

        return $this->successResponse(\json_decode($apiResponse->getBody(), true));
    }

    private function getApiHeaders()
    {
        return [
            'X-Frankie-CustomerID' => 'f4341b5c-1264-d7a0-2830-9780ba4e33b1',
            'api_key' => '580ce42e974c8361de066a807a13a0aecf5e706999aaf6ddff6eaa3a988d2c77',
        ];
    }

    /**
     * @param string $data
     * @return JsonResponse
     */
    private function successResponse($data = '')
    {
        return new JsonResponse([
            'success' => true,
            'data' => $data,
        ]);
    }

    /**
     * @param $message
     * @param array $data
     * @return JsonResponse
     */
    private function errorResponse($message, array $data = [])
    {
        return new JsonResponse([
            'success' => false,
            'message' => $message,
            'data' => $data,
        ]);
    }
}
