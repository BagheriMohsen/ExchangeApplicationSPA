<?php 

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAA7c9pVXw:APA91bHqnQLFShrEFxsS8VS-rCZ4KNHm7ng6lJ4YaZ1COdJi3ByzW2gDTM2RKFJwhqbj1H9UMs5BTW0bHh1YPCfAllUJUKLedajMvt2ER1q6IZ3w0imwmw665e5DuO51HXxhvS1JTDq_'),
        'sender_id' => env('FCM_SENDER_ID', '1021387036028'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];