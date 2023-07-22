# Discordsunucu.com API Servisi (Dcsv.me)

## OY VERENLER LİSTESİ

Bu belge, Discordsunucu.com API'si kullanarak belirli bir Discord sunucusu için oy verenleri sorgulamanın nasıl yapılacağını anlatır.


## API URL

[https://discordsunucu.com/api/vote/SERVER_ID](https://discordsunucu.com/api/vote/SERVER_ID)

**Not:** `SERVER_ID` yeri, oy bilgilerini almak istediğiniz Discord sunucusunun kimliğiyle değiştirilmelidir.


## Token Almak

API'yi kullanabilmek için öncelikle bir erişim belirteci (token) almanız gerekmektedir. Token, Discord sunucunuzun #token-al kanalından elde edilebilir. [Discord Sunucumuz](https://discord.gg/dcsunucu) https://discord.gg/dcsunucu


## Limit

API'den alınan oyları belirli bir limitte almak için isteğin sonuna `?limit=XX` şeklinde ekleyebilirsiniz. `XX` yeri, almak istediğiniz oyların limitini belirlemek için kullanılır.

 ## Örnek PHP Kodu

Aşağıdaki PHP kodu, API'ye bir GET isteği yaparak oy bilgilerini alır:
```php
<?php
$url = "https://discordsunucu.com/api/vote/SERVER_ID";
//LİMİTLİ ÖRNEK
// $url = "https://discordsunucu.com/api/vote/SERVER_ID?limit=LIMIT";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Authorization: Bearer {TOKEN}",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);
?>
```

 ## Örnek NODEJS Kodu

Aşağıdaki NODEJS kodu, API'ye bir GET isteği yaparak oy bilgilerini alır:
```js
const http = require("https");

const url = 'https://discordsunucu.com/api/vote/1073918617487421531';

const options = {
    'Authorization': 'Bearer 2ece17a9cf5f9e05a616705d38501e95',
};

let result = '';
const req = http.request(url, options, (res) => {
    console.log(res.statusCode);

    res.setEncoding('utf8');
    res.on('data', (chunk) => {
        result += chunk;
    });

    res.on('end', () => {
        console.log(result);
    });
});

req.on('error', (e) => {
    console.error(e);
});

req.end();
```


API, bir JSON yanıtı döndürür. Yanıt, aşağıdaki bilgileri içerebilir:

- `total_user`: Toplam kullanıcı sayısı.
- `total_vote`: Toplam oy sayısı.
- `votes`: Kullanıcı oylarının detaylarını içeren bir dizi.

 ## API YANITI

```json
{
    "total_user": 162,
    "total_vote": 269,
    "votes": [{
        "userid": "348810453478277131",
        "username": "volkan1",
        "lastVoteTime": "2023-07-22 07:40:19",
        "voteCount": "22"
    }, {
        "userid": "745632127453888563",
        "username": "berk.dev",
        "lastVoteTime": "2023-07-22 07:42:42",
        "voteCount": "12"
    }, ....]
}
```
## UYARI

- Saatte 60 istekten fazla istek gönderdiğinizde uzun süre timeout sorunu yaşarsınız. İsteklerinizi sınırlı ve dikkatli kullanmaya özen gösterin.


## Notlar

- Bu örnek sadece API isteği yapmanın temel bir örneğidir ve gerçek uygulamanızda hata yönetimi ve güvenlik önlemleri gibi ek kontroller eklemeniz önemlidir.
- API belirtecinizi güvenli bir şekilde saklayın ve kimseyle paylaşmayın.
- Daha fazla bilgi için, dcsv.me discord sunucumuzdaki API kategorisini ziyaret edin.

`Bu README dosyası, Discordsunucu.com API'sini kullanarak oy bilgilerini sorgulamak için gerekli bilgileri ve örnekleri içermektedir.`

