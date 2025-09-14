@include('partials.head')
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #680a83;
    }

    .card {
        max-width: 600px;
        text-align: center;
        border: none;
    }

    .icon {
        font-size: 50px;
        color: #dc3545;
    }
</style>

<body>

    <div class="row mx-2">
        <div class="card shadow-lg p-4">
            <i class="fas fa-exclamation-triangle icon"></i>
            <h2 class="text-danger">Account Suspended</h2>
            <p class="text-muted">This account has been suspended by the system administrator. Please contact support for
                more information.</p>
            <a href="mailto:support@example.com" class="btn btn-danger mb-2"><i class="fas fa-envelope"></i> Contact
                Support</a>
            <a href="/" class="btn btn-primary"><i class="fas fa-home"></i> Home Page</a>
        </div>
    </div>
</body>

</html>
