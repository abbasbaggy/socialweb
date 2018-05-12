<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbas
 * Date: 19/04/2018
 * Time: 22:39
 */
class natural
{



    public function getSent($text)
    {

        $array = $_REQUEST['data'];

        $accessKey = 'dd0c99e93d534a2c9ad064d00907ca5f';
        $host = 'https://southcentralus.api.cognitive.microsoft.com';
        $path = '/text/analytics/v2.0/languages';


        function GetSentiment($host, $path, $key, $data)
        {

            $headers = "Content-type: text/json\r\n" .
                "Ocp-Apim-Subscription-Key: $key\r\n";

            $data = json_encode($data);

            // NOTE: Use the key 'http' even if you are making an HTTPS request. See:
            // http://php.net/manual/en/function.stream-context-create.php
            $options = array(
                'http' => array(
                    'header' => $headers,
                    'method' => 'POST',
                    'content' => $data
                )
            );
            $context = stream_context_create($options);
            $result = file_get_contents($host . $path, false, $context);
            return $result;
        }

        $dataSP = array(
            'documents' => array(
                array('id' => '1', 'language' => '$LanD', 'text' => $array)

            )
        );

        $SenD = GetSentiment($host, $path, $accessKey, $dataSP);

        return $SenD;


    }
}
?>