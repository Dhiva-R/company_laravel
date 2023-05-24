
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Company</title>
</head>
<body>
    <h1>Welcome, {{ $employee->FirstName }}!</h1>

    <p>We are thrilled to have you join our team at Our Company. Your hard work and contributions will be valued and rewarded. Below are your login details:</p>

    <p>Email: {{ $employee->Email }}</p>


    <p>If you have any questions or need assistance, please don't hesitate to reach out to our HR department.</p>

    <p>Best regards,</p>
    <p>The Our Company Team</p>
</body>
