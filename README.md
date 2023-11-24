### Döviz Kuru API

Bu kod, Türkiye Cumhuriyet Merkez Bankası'nın (TCMB) günlük döviz kurlarını almak için kullanılan bir API servisidir.

#### `getCurrencyRates()` Fonksiyonu
- `$tcmbUrl`: TCMB'nin bugünün döviz kurlarını içeren XML dosyasının URL'sini tutar.
- `getCurrencyRates()`: Verilen URL'den XML dosyasını yükler, döviz kurlarını alır ve bunları bir dizi olarak döndürür.

#### `$_SERVER['REQUEST_METHOD'] === 'GET'` Kontrolü
- Kod, sadece GET isteklerini kabul eder. Eğer istek methodu GET değilse, uygun bir hata mesajı döndürür.

#### Parametre Bazlı İstekler
- Kod, parametre olarak `dollar-try` veya `euro-try` alır.
- `dollar-try` isteği yapıldığında, dolar kuru isteği gerçekleştirilir ve ekrana doların TL karşılığı JSON formatında yazdırılır.
- `euro-try` isteği yapıldığında, euro kuru isteği gerçekleştirilir ve ekrana euronun TL karşılığı JSON formatında yazdırılır.

#### Hata Durumları
- Eğer döviz kurları alınamazsa veya istekler geçersizse, uygun hata mesajları JSON formatında yazdırılır.

Not: Bu kod, TCMB tarafından sağlanan XML dosyasından döviz kurlarını almak için basit bir API oluşturur.
