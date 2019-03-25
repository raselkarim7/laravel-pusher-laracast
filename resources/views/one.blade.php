<!DOCTYPE html>
<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>

</head>
<body>
<h1>Pusher Test</h1>
<p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
</p>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('8671a1da7b105f413bb1', {
        cluster: 'ap2',
        forceTLS: true
    });

    var channel = pusher.subscribe('status-liked');
    channel.bind('App\\Events\\StatusLiked', function(data) {
        alert(JSON.stringify(data));
    });
</script>
</body>
