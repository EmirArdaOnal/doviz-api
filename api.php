<?php
header("Content-Type: application/json");

$tcmbUrl = 'https://www.tcmb.gov.tr/kurlar/today.xml';

function getCurrencyRates() {
    global $tcmbUrl;

    $xml = simplexml_load_file($tcmbUrl);

    if ($xml === false) {
        return array("error" => "XML verisi alınamadı.");
    }

    $rates = array();
    foreach ($xml->Currency as $currency) {
        $currencyCode = (string) $currency->attributes()['CurrencyCode'];
        $rates[$currencyCode] = (float) str_replace(',', '.', $currency->BanknoteBuying);
    }

    return $rates;
}

// İstekleri işle
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['dollar-try'])) {
        $currencyRates = getCurrencyRates();
        if (isset($currencyRates['USD'])) {
            echo json_encode(array("dollar-try" => $currencyRates['USD']));
        } else {
            echo json_encode(array("error" => "Dolar kuru bulunamadı."));
        }
    } elseif (isset($_GET['euro-try'])) {
        $currencyRates = getCurrencyRates();
        if (isset($currencyRates['EUR'])) {
            echo json_encode(array("euro-try" => $currencyRates['EUR']));
        } else {
            echo json_encode(array("error" => "Euro kuru bulunamadı."));
        }
    } else {
        echo json_encode(array("error" => "Geçersiz istek."));
    }
} else {
    echo json_encode(array("error" => "Sadece GET istekleri kabul edilir."));
}
?>
