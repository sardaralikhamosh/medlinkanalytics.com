<?php
// quick_test_form.php - Test form submission
?>
<!DOCTYPE html>
<html>
<head>
    <title>Test Form Submission</title>
    <style>
        body { font-family: Arial; max-width: 500px; margin: 50px auto; }
        input, textarea, button { width: 100%; padding: 10px; margin: 5px 0; }
        .success { background: #d4edda; color: #155724; padding: 10px; }
        .error { background: #f8d7da; color: #721c24; padding: 10px; }
    </style>
</head>
<body>
    <h2>Test Form Submission</h2>
    
    <form id="testForm">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="practice" placeholder="Practice Name">
        <input type="tel" name="phone" placeholder="Phone">
        <textarea name="message" placeholder="Message" rows="5" required></textarea>
        <button type="submit">Submit Test</button>
    </form>
    
    <div id="result"></div>
    
    <script>
        document.getElementById('testForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            formData.append('source', 'test');
            
            const resultDiv = document.getElementById('result');
            resultDiv.className = '';
            resultDiv.innerHTML = 'Sending...';
            
            try {
                const response = await fetch('submit_contact.php', {
                    method: 'POST',
                    body: formData
                });
                
                const data = await response.json();
                
                if (data.success) {
                    resultDiv.className = 'success';
                    resultDiv.innerHTML = '✓ Success! ' + data.message;
                    if (data.db_saved) resultDiv.innerHTML += '<br>✓ Saved to database';
                    if (data.email_sent) resultDiv.innerHTML += '<br>✓ Email sent';
                } else {
                    resultDiv.className = 'error';
                    resultDiv.innerHTML = '✗ Error: ' + data.message;
                }
            } catch (error) {
                resultDiv.className = 'error';
                resultDiv.innerHTML = '✗ Network error: ' + error.message;
            }
        });
    </script>
</body>
</html>