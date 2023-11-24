const axios = require('axios');

const apiUrl = 'http://localhost/index.php';

// Dolar kuru 
axios.get(apiUrl + '?dollar-try')
    .then(response => {
        console.log('Dolar Kuru:', response.data['dollar-try']);
    })
    .catch(error => {
        console.error('Hata:', error);
    });

// Euro kuru 
axios.get(apiUrl + '?euro-try')
    .then(response => {
        console.log('Euro Kuru:', response.data['euro-try']);
    })
    .catch(error => {
        console.error('Hata:', error);
    });
