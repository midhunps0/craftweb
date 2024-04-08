<div style="padding:4px;">
    <div style="margin: 5px 0; border-bottom: 1px solid #888888;">
        <img src="{{URL::to('/').'/images/icons/logo.webp'}}" alt="" style="width: 250px; margin: auto;">
    </div>
    <p style="margin: 2px 0;">
        Hi {{$name}},<br>
        Welcome to <strong>Craft IVF Hospital!</strong><br>
        Your appointment is confirmed with the following details:
    </p>
    <div>
        <p style="margin: 2px 0;">Appointment ID: {{$appointment_id}}</p>
        <p style="margin: 2px 0;">Consultation Date: {{$date}}</p>
        <p style="margin: 2px 0;">Consultation Time: {{$time}}</p>
        <p style="margin: 2px 0;">Department: {{$sp_name}}</p>
        <p style="margin: 2px 0;">Doctor: {{$cons_name}}</p>
        <p style="margin: 2px 0;">Patient Name: {{$name}}</p>
        <p style="margin: 2px 0;">Phone No.: {{$phone}}</p>
        <p style="margin: 2px 0;">Email: {{$email}}</p>
    </div>
    <p>
        We are looking forward to providing you the best health care.<br><br>
        Thank You!
    </p>
</div>

