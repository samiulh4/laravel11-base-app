import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    //forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    forceTLS: false, //Setting forceTLS: false disables secure WebSocket connections, which is appropriate for local development without HTTPS.
    //disableStats: true,//Disables Pusher or WebSocket server statistics collection. This is typically used to reduce unnecessary traffic for local development.
    enabledTransports: ['ws', 'wss'],
});