<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $sub }}</title>  <!-- Displaying dynamic subject -->
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #e0e0e0; border-radius: 10px; background-color: #f9f9f9;">
        <h2 style="color: #333;">{{ $msg }}</h2> <!-- Dynamically rendered message -->
        <h2 style="color: #333;">Welcome to EMeds</h2> 
        <p style="color: #555;">We're thrilled to have you join our community!</p>
        <p style="color: #555;">If you have any questions, feel free to reach out to us at <a href="mailto:support@emeds.com">support@emeds.com</a>.</p>
        <p style="color: #555;">Thank you for trusting us with your health.</p>
        <p style="text-align: center; font-size: 14px; color: #aaa;">&copy; {{ date('Y') }} EMeds. All rights reserved.</p>
    </div>
</body>

</html>
