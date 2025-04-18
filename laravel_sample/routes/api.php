<?php

use App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use tgMdk\dto\AccountAddRequestDto;
use tgMdk\dto\CardCancelRequestDto;
use tgMdk\dto\CardCaptureRequestDto;
use tgMdk\dto\CardInfoAddRequestDto;
use tgMdk\dto\CardInfoAddResponseDto;
use tgMdk\dto\CardInfoGetRequestDto;
use tgMdk\dto\CardInfoGetResponseDto;
use tgMdk\dto\MpiAuthorizeRequestDto;
use tgMdk\TGMDK_Config;
use tgMdk\TGMDK_Transaction;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

TGMDK_Config::getInstance();

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/3ds', function (Request $request) {
    $request_data = new MpiAuthorizeRequestDto();
    $request_data->setServiceOptionType('mpi-complete');
    $request_data->setRedirectionUri('http://127.0.0.1:8000/api/redirect');
    $request_data->setOrderId($request->request->get("orderId"));
    $request_data->setAmount($request->request->get("amount"));
    $request_data->setToken($request->request->get("token"));
    $request_data->setWithCapture($request->request->get("withCapture"));
    $request_data->setRequestorChallengeIndicator('03');
    $request_data->setDeviceChannel('02');
    $request_data->setJpo(
        Helpers::generateJpo($request->request->get("jpo1"), $request->request->get("jpo2"))
    );
    $transaction = new TGMDK_Transaction();
    $response_data = $transaction->execute($request_data);
    return response()->json([
        'content' => $response_data->getResResponseContents(),
    ]);
});

Route::post('/test', function (Request $request) {
    logger('test', ['test' => $request->all()]);
    return response()->json(['message' => 'success']);
});

Route::post('/create-user', function (Request $request) {
    $a = new AccountAddRequestDto();
    $b = new TGMDK_Transaction();
    $a->setAccountId(time());
    $a->setToken($request->get("token"));
    $a->setWithAuthorize('1');
    $a->setDefaultCard('1');
    $c = $b->execute($a);
    return response()->json(['data' => json_decode($c, true)]);
});

Route::post('/add-card', function (Request $request) {
    $cardInfoAddRequestDto = new CardInfoAddRequestDto();
    $transaction = new TGMDK_Transaction();
    $cardInfoAddRequestDto->setAccountId($request->get("account_id"));
    $cardInfoAddRequestDto->setToken($request->get("token"));
    $cardInfoAddRequestDto->setDefaultCard('0');
    $response = $transaction->execute($cardInfoAddRequestDto);
    if ($response instanceof CardInfoAddResponseDto) {
        return response()->json(['data' => json_decode($response, true)]);
    }
});

Route::post('/cards', function (Request $request) {
    $cardInfoGetRequestDto = new CardInfoGetRequestDto();
    $transaction = new TGMDK_Transaction();
    $cardInfoGetRequestDto->setAccountId($request->get("account_id"));
    $cardInfoGetRequestDto->setToken($request->get("token"));
    $response = $transaction->execute($cardInfoGetRequestDto);
    if ($response instanceof CardInfoGetResponseDto) {
        return response()->json(['data' => json_decode($response, true)]);
    }
});

Route::get('/capture', function () {
    $transaction = new TGMDK_Transaction();
    $cardCaptureRequestDto = new CardCaptureRequestDto();
    $cardCaptureRequestDto->setOrderId('dummy1748920729227');
    $cardCaptureRequestDto->setAmount(10);
    $response = $transaction->execute($cardCaptureRequestDto);
    dd($response);
});

Route::get('/refund', function () {
    $transaction = new TGMDK_Transaction();
    $cardCancelRequestDto = new CardCancelRequestDto();
    $cardCancelRequestDto->setOrderId('dummy1748920981465');
    $cardCancelRequestDto->setAmount(10);
    $response1 = $transaction->execute($cardCancelRequestDto);
    dd($response1);
});

Route::post('/redirect', function (Request $request) {
    logger('redirect', ['request' => $request->all()]);
    return response()->json(['message' => 'success']);
});
