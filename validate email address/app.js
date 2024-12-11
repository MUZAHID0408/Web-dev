function validateMail() {
    fetch('https://verify.maileroo.net/check', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json',
        },
        body: JSON.stringify({
            'api_key': '35d5ce0c02b77098b570d2a56fa505459a0bea32e89a9bbda810bab3825cda36',
            'email_address': emailValue,
        }),
    })
        .then(res => {
            // Log the status and headers
            console.log(`Status: ${res.status}`);
            console.log(`Content-Type: ${res.headers.get('Content-Type')}`);
            
            // Ensure the response is JSON
            if (!res.ok) throw new Error(`HTTP error! Status: ${res.status}`);
            if (!res.headers.get('Content-Type')?.includes('application/json')) {
                throw new Error('Response is not JSON');
            }

            return res.json();
        })
        .then(data => {
            // Log the actual JSON response
            console.log('API Response:', data);

            // Log individual fields for confirmation
            console.log('Email:', data.email);
            console.log('Format Valid:', data.format_valid);
            console.log('MX Found:', data.mx_found);
        })
        .catch(err => {
            console.log(`Error occurred: ${err}`);
        });
}
