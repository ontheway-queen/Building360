<!DOCTYPE html>

<head>
    <title>Pusher Test</title>

<body>
    <form method="POST" action="{{ url('real-time-notice-post') }}">
        @csrf
        <!-- Your form fields go here -->
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </form>

    <div id="myDiv">
        @foreach ($msg as $item)
            <p class="krapta">{{ $item->msg }}</h1>
        @endforeach
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('cbcee89416d6d02a3125', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('pusher:subscription_succeeded', function(members) {
        // alert('successfully subscribed!');
    });

    channel.bind("App\\Events\\Noticable", function(data) {
        $('.krapta').append(data.name);
    });
</script>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>
</body>
