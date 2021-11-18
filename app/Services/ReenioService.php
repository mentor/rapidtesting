<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ReenioService
{

    const REENIO_RESERVATION_STATUSES = [
        0  => 'created',
        1  => 'ended',
        2  => 'finished',
        3  => 'confirmed',
        4  => 'started',
        5  => 'registered',
        6  => 'unpaid',
        7  => 'paid',
        8  => 'withdrawn',
        9  => 'cancelled',
        10 => 'noshow',
        11 => 'notarrived',
    ];

    private $apiKey;
    private $apiHost;


    public function __construct(string $apiKey,string $apiHost)
    {
        $this->apiKey = $apiKey;
        $this->apiHost = $apiHost;
    }

    /**
     * @param $url
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    private function apiCall($url)
    {
        return Http::acceptJson()
            ->withToken($this->apiKey)
            ->get(rtrim($this->apiHost, '/') . '/' . ltrim($url, '/'));
    }

    /**
     * @param $reservationId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function getReservation($reservationId)
    {
        return $this->apiCall('/reservation/detail/' . $reservationId);
    }

    /**
     * @param $customerId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function getCustomer($customerId)
    {
        return $this->apiCall('/customer/detail/' . $customerId);
    }

    /**
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function getPlaces()
    {
        return $this->apiCall('/resource/place/');
    }

    /**
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function getServices()
    {
        return $this->apiCall('/resource/service/');
    }

    public function parsePlainValue($fields, string $key)
    {
        foreach ((array)$fields as $field) {
            if (isset($field['key'], $field['value']) && ($field['key'] == $key)) {
                return $field['value'];
            }
        }
        return '';
    }

    public function parseKeyedValue($fields, string $key)
    {
        foreach ((array)$fields as $field) {
            if (isset($field['key'], $field['valueKey']) && ($field['key'] == $key)) {
                return $field['valueKey'];
            }
        }
        return '';
    }

    public function response()
    {
        return response('REENIO', 200)
            ->header('Content-Type', 'text/plain');
    }
}
