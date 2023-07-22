// Örnek NODEJS Kodu
// Aşağıdaki NODEJS kodu, API'ye bir GET isteği yaparak oy bilgilerini alır:

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
