
<style>
    .swal2-popup {
        font-family: 'Segoe UI', sans-serif;
        border-radius: 18px;
        padding: 32px;
    }

    .swal2-html-container {
        text-align: left;
    }

    .swal2-label {
        display: inline-block;
        font-weight: 600;
        margin-bottom: 6px;
        font-size: 0.95rem;
        color: #444;
    }

    .swal2-select,
    .swal2-input[type="file"] {
        max-width: 70%;
        padding: 0px;
        margin-top: 6px;
        margin-bottom: 18px;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 0.95rem;
        background-color: #fff;
        transition: border 0.2s;
    }

    div:where(.swal2-container) .swal2-select {
        max-width: 80% !important;

    }

        .swal2-select:focus,
    .swal2-input:focus {
        outline: none;
        border-color: #6c63ff;
    }

    #photo::-webkit-file-upload-button {
        background: #f3f4f6;
        border: none;
        padding: 8px 14px;
        border-radius: 6px;
        margin-right: 10px;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.2s;
    }

    .swal2-inline-group {
        display: flex;
        align-items: center; /* This already helps! */
        margin-bottom: 20px;
    }

    .swal2-inline-label {
        flex: 0 0 110px; /* uniform width */
        text-align: right; /* aligns nicely with inputs */
        padding-right: 10px;
    }


    .swal2-inline-input {
        flex: 1;
    }

    #photo::-webkit-file-upload-button:hover {
        background: #e5e7eb;
    }

    .swal2-confirm.modern-confirm,
    .swal2-cancel.modern-cancel {
        border-radius: 10px !important;
        padding: 8px 22px !important;
        font-weight: 600;
    }

    .swal2-confirm.modern-confirm {
        background: #6c63ff !important;
        color: #fff !important;
    }

    .swal2-cancel.modern-cancel {
        background: #6b7280 !important;
        color: #fff !important;
    }

    .fade-spinner .spinner {
        width: 30px;
        height: 30px;
        border: 3px solid #ccc;
        border-top: 3px solid #6c63ff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: auto;
    }

    .fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
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
