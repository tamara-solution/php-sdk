<?php

namespace Tamara\HttpClient;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Tamara\Exception\RequestException;
use Tamara\Factory\RequestFactory;

class HttpClient
{
    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @var string
     */
    private $apiToken;

    /**
     * @var ClientInterface
     */
    private $transport;

    /**
     * @var RequestFactory
     */
    private $requestFactory;

    /**
     * @param string $apiUrl
     * @param string $apiToken
     * @param ClientInterface $transport
     * @param RequestFactory $requestFactory
     */
    public function __construct(
        string $apiUrl,
        string $apiToken,
        ClientInterface $transport,
        RequestFactory $requestFactory
    ) {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;
        $this->transport = $transport;
        $this->requestFactory = $requestFactory;
    }

    /**
     * @param string $path
     * @param array  $params
     *
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     * @throws RequestException
     */
    public function get(string $path, array $params = []): ResponseInterface
    {
        return $this->request('GET', $path, $params);
    }

    /**
     * @param string $path
     * @param array  $params
     *
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function put(string $path, array $params = []): ResponseInterface
    {
        return $this->request('PUT', $path, $params);
    }

    /**
     * @param string $path
     * @param array  $params
     *
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function post(string $path, array $params = []): ResponseInterface
    {
        return $this->request('POST', $path, $params);
    }

    /**
     * @param string $path
     * @param array  $params
     *
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function delete(string $path, array $params = []): ResponseInterface
    {
        return $this->request('DELETE', $path, $params);
    }

    /**
     * @param string $method
     * @param string $path
     * @param array  $params
     *
     * @return ResponseInterface
     * @throws ClientExceptionInterface|RequestException
     */
    private function request(string $method, string $path, array $params = []): ResponseInterface
    {
        if ('GET' === $method) {
            $path = $this->prepareQueryString($path, $params);
        }

        $request = $this->requestFactory->create($method, $this->prepareUrl($path), $params, $this->apiToken);

        try {
            return $this->transport->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            $level = (int) floor($exception->getCode() / 100);

            if ($level < 2 || $level > 4) {
                throw $exception;
            }

            if ($exception instanceof RequestException) {
                return $exception->getResponse();
            }
        }
    }

    /**
     * @param string $path
     *
     * @return string
     */
    private function prepareUrl(string $path): string
    {
        return $this->apiUrl . '/' . ltrim($path, '/');
    }

    /**
     * @param string $path
     * @param array  $params
     *
     * @return string
     */
    private function prepareQueryString(string $path, array $params = []): string
    {
        if (!$params) {
            return $path;
        }

        $path .= false === strpos($path, '?') ? '?' : '&';
        $path .= http_build_query($params, '', '&');

        return $path;
    }
}
