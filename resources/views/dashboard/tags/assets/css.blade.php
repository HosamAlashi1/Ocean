<style>
    /* Spinner animation */
    .spinner {
        width: 28px;
        height: 28px;
        border: 4px solid #ddd;
        border-top: 4px solid #6366f1;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
        margin: 0 auto;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Optional: fade-in for service container */
    .fade-in {
        animation: fadeIn 0.3s ease-in-out forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(7px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
