<?php
namespace App\Http\Controllers;
use App\IbmWatson;
use App\Post;
use GuzzleHttp;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
class IbmWatsonController extends Controller
{
    public function getNote(){

      return view('kids.notes');
    }
    public function getText(Request $request){

      $client = new GuzzleHttp\Client([
        'base_uri' => 'https://stream.watsonplatform.net/'
      ]);

      $audio = $request->recorder;
      dd($audio);
      $resp = $client->request('POST', 'speech-to-text/api/v1/recognize', [//speech-to-text/api/v1/recognize
        'auth' => ['533c2cff-69b9-4612-8f1b-05caed32fd29', 'MVpUnjA1CGHn'],
        'headers' => [
          'Content-Type' => 'audio/flac',
        ],
        'body' => $audio
      ]);
      dd($resp->getBody());
      return $resp->getBody();
    }
    public function getPersonalityTraits(Request $request)
    {
        $ibm = new IbmWatson();
        try {
            /* Get message from text that was converted by IBM Watson Speech to Text API */
            $results = $ibm->getPersonalityTraits($request->get('sentences')); //word count has to be more than 100
            /* Getting content message directly from post ID to fetch personality insights */
//            $results = $ibm->getPersonalityTraits(Post::find($request->get('id'))->post_content);
        } catch (ClientException $e) {
            return [
                'request error' => Psr7\str($e->getRequest()),
                'response error' => Psr7\str($e->getResponse())
            ];
        }
        return view('ibm.personality', compact('results'));
    }
    /**
     *
     * https://github.com/robbiepaul/cloudconvert-laravel converting video files to mp3
     */
    public function getSpeechToText(Request $request)
    {
        $ibm = new IbmWatson();
        try {
            $resultsSpeechToText = $ibm->getSpeechToText($request->file('toneFile'));
            $results = $resultsSpeechToText['results'];
            $sentences = null;
            $confidences = null;
            $countForeachLoop = 0;
            foreach ($results as $key => $arr) {
                foreach ($arr['alternatives'] as $result) {
                    $sentences .= $result['transcript']; //joining all sentences
                    $confidences += $result['confidence'] * 100; //adding up all confidence scores
                    $countForeachLoop++; //getting count of foreach loop
                }
            }
            $result = [
                'sentences' => $sentences,
                'confidences' => $confidences / $countForeachLoop,
            ];
            //update the user based on latest video post
            \Auth::user()->videos()->orderBy('id', 'desc')->update([
                'message' => $sentences
            ]);
            // put sentence in video
        } catch (ClientException $e) {
            return [
                'request error' => Psr7\str($e->getRequest()),
                'response error' => Psr7\str($e->getResponse())
            ];
        }
//        return $results;
        return view('ibm.speech_to_text', compact('result'));
    }
}
