<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TalentController extends Controller
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * TalentController constructor.
     * @param Client $client
     */
    public function __construct(Client $client) {
        $this->client = $client;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request) {
        $endpoint = 'http://apis.data.go.kr/B552474/JeOdJobOffExInServ/jegetOdJobOffExInItem?ServiceKey=';
        $serviceKey = env('GOV_SERVICE_KEY');
        $dstrCdL = $request->query('dstrCdL') ? '&dstrCdL=' . urlencode($request->query('dstrCdL')) : '';
        $dstrNmM = $request->query('dstrNmM') ? '&dstrNmM=' . urlencode($request->query('dstrNmM')) : '';
        $queryString = '&numOfRows=1000' . $dstrCdL . $dstrNmM;

        $url = $endpoint . $serviceKey . $queryString;

        $response = $this->client->get($url);
        $contents = $response->getBody()->getContents();

        $xml = simplexml_load_string($contents);
        $json = json_encode($xml, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $array = json_decode($json, true);
//        return [
//            'origin' => 'http://apis.data.go.kr/B552474/JeOdJobOffExInServ/jegetOdJobOffExInItem?ServiceKey=KhRy1%2FGLGNCyqcRSLxjibtqq1yNsXxshRkMVW3Ptni%2FJJVKandn8ZGFjUs2LiKNZF8r60x%2BrX69tnOYfV4zxuA%3D%3D&numOfRows=1000&dstrCdL=%EA%B2%BD%EA%B8%B0%EB%8F%84&dstrNmM=%EC%9D%98%EC%A0%95%EB%B6%80%EC%8B%9C',
//            'url' => $url
//        ];
        if ($result = $array['body']['items']) {
            return response()->json($result['item']);
        } else {
            return response()->json([
                'message' => 'Notfound'
            ], 404);
        }
    }

}
