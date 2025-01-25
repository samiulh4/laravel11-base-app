<link rel="stylesheet" href="{{ asset('assets/plugins/tailwind/tailwind.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-6.7.2/css/all.min.css') }}" />
<style>
    /* Start -:- Facebook Chat Sidebar */
    .facebook_chat_sidebar.active {
        transform: translateX(0);
    }

    .facebook_chat_sidebar {
        position: fixed;
        right: 0;
        top: 0;
        bottom: 0;
        width: 280px;
        background: #f9fafb;
        border-left: 1px solid #e5e7eb;
        z-index: 50;
        overflow-y: auto;
        transition: transform 0.3s ease;
        transform: translateX(100%);
    }

    .facebook_chat_sidebar h3 {
        padding: 1rem;
        font-size: 1.25rem;
        font-weight: bold;
        background: #f3f4f6;
        border-bottom: 1px solid #e5e7eb;
    }

    .facebook_chat_sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .facebook_chat_sidebar ul li {
        padding: 0.75rem 1rem;
        display: flex;
        align-items: center;
        cursor: pointer;
        transition: background 0.2s;
    }

    .facebook_chat_sidebar ul li:hover {
        background: #e5e7eb;
    }

    .facebook_chat_sidebar ul li img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 0.75rem;
    }

    /* End -:- Facebook Chat Sidebar */

    /* Start -:- Facebook Chat Window */
    .facebook_chat_window {
        position: fixed;
        bottom: 0;
        right: 320px;
        width: 300px;
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px 8px 0 0;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        display: none;
        flex-direction: column;
        z-index: 60;
    }

    .facebook_chat_window_header {
        background: #4f46e5;
        color: white;
        padding: 10px;
        border-radius: 8px 8px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .facebook_chat_window_body {
        flex-grow: 1;
        overflow-y: auto;
        padding: 10px;
        background: #f9fafb;
    }

    .facebook_chat_window_footer {
        padding: 10px;
        border-top: 1px solid #e5e7eb;
    }

    .facebook_chat_input {
        width: 100%;
        padding: 8px;
        border: 1px solid #e5e7eb;
        border-radius: 4px;
    }

    /* End -:- Facebook Chat Window */



    #showFacebookChatSidebar {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 48px;
        height: 48px;
    }

    #hideFacebookChatSidebar {
        padding: 10px 0 10px 0;
    }
</style>
