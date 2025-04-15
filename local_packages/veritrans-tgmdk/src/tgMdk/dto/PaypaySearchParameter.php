<?php

namespace tgMdk\dto;

/**
 * 検索条件:Paypay検索パラメータクラス<br>
 *
 * @author Veritrans, Inc.
 *
 */
class PaypaySearchParameter
{

    /**
     * 詳細オーダー決済状態<br>
     */
    private $detailOrderType;

    /**
     * 詳細コマンドタイプ名<br>
     */
    private $detailCommandType;

    /**
     * paypayサービスタイプ<br>
     */
    private $paypayServiceType;

    /**
     * 課金種別<br>
     */
    private $accountingType;

    /**
     * オンライン決済タイプ<br>
     */
    private $onlinePaymentType;

    /**
     * スマートペイメント検証環境疎通フラグ<br>
     */
    private $testEnvFlag;

    /**
     * 詳細オーダー決済状態を取得する<br>
     *
     * @return string[] 詳細オーダー決済状態<br>
     */
    public function getDetailOrderType()
    {
        return $this->detailOrderType;
    }

    /**
     * 詳細オーダー決済状態を設定する<br>
     *
     * @param string[] $detailOrderType 詳細オーダー決済状態<br>
     */
    public function setDetailOrderType($detailOrderType)
    {
        $this->detailOrderType = $detailOrderType;
    }

    /**
     * 詳細コマンドタイプ名を取得する<br>
     *
     * @return string[] 詳細コマンドタイプ名<br>
     */
    public function getDetailCommandType()
    {
        return $this->detailCommandType;
    }

    /**
     * 詳細コマンドタイプ名を設定する<br>
     *
     * @param string[] $detailCommandType 詳細コマンドタイプ名<br>
     */
    public function setDetailCommandType($detailCommandType)
    {
        $this->detailCommandType = $detailCommandType;
    }

    /**
     * paypayサービスタイプを取得する<br>
     *
     * @return string[] paypayサービスタイプ<br>
     */
    public function getPaypayServiceType()
    {
        return $this->paypayServiceType;
    }

    /**
     * paypayサービスタイプを設定する<br>
     *
     * @param string[] $paypayServiceType paypayサービスタイプ<br>
     */
    public function setPaypayServiceType($paypayServiceType)
    {
        $this->paypayServiceType = $paypayServiceType;
    }

    /**
     * 課金種別を取得する<br>
     *
     * @return string 課金種別<br>
     */
    public function getAccountingType()
    {
        return $this->accountingType;
    }

    /**
     * 課金種別を設定する<br>
     *
     * @param string $accountingType 課金種別<br>
     */
    public function setAccountingType($accountingType)
    {
        $this->accountingType = $accountingType;
    }

    /**
     * オンライン決済タイプを取得する<br>
     *
     * @return string オンライン決済タイプ<br>
     */
    public function getOnlinePaymentType()
    {
        return $this->onlinePaymentType;
    }

    /**
     * オンライン決済タイプを設定する<br>
     *
     * @param string $onlinePaymentType オンライン決済タイプ<br>
     */
    public function setOnlinePaymentType($onlinePaymentType)
    {
        $this->onlinePaymentType = $onlinePaymentType;
    }

    /**
     * スマートペイメント検証環境疎通フラグを取得する<br>
     *
     * @return string スマートペイメント検証環境疎通フラグ<br>
     */
    public function getTestEnvFlag()
    {
        return $this->testEnvFlag;
    }

    /**
     * スマートペイメント検証環境疎通フラグを設定する<br>
     *
     * @param string $testEnvFlag スマートペイメント検証環境疎通フラグ<br>
     */
    public function setTestEnvFlag($testEnvFlag)
    {
        $this->testEnvFlag = $testEnvFlag;
    }


}
