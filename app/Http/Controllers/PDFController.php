<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elastic\Elasticsearch\ClientBuilder;

use App\Services\SearchComponent;
use App\Models\Documento;

class PDFController extends Controller
{
    private $client;

    public function __construct()
    {
        $hosts = [        
            getenv('ELASTIC_URL')
        ];
        $this->client = ClientBuilder::create()->setHosts($hosts)->build();
    }

    public function pdfNormativa(Request $request, $normativaId)
    {

        $documento = Documento::where('arquivo', $normativaId)->first();

        $result = $this->client->get([
            'index' => 'documentos_ifal',
            'type' => '_doc',
            'id' => $normativaId
        ]);

        $base64 =  $result['_source']['data'];
        
        $data = base64_decode($base64);

        if($documento){
            SearchComponent::loggingDownload($request, $documento);

            if($documento->formato === 'pdf')
                header('Content-Type: application/pdf');
            elseif($documento->formato === 'doc')
                header('Content-Type: application/msword');
            elseif($documento->formato === 'docx')
                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');  
            else
                header('Content-Type: application/pdf');
        }else{
            if(substr($normativaId,-3) === 'pdf')
                header('Content-Type: application/pdf');
            elseif(substr($normativaId,-3) === 'doc')
                header('Content-Type: application/msword');
            elseif(substr($normativaId,-4) === 'docx')
                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');  
            else
                header('Content-Type: application/pdf');
        }
        
        echo $data;
    }
}
