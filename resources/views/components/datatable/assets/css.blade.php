<style>
    .skeleton-cell {
        padding: 12px;
    }

    .skeleton-line {
        height: 18px;
        border-radius: 5px;
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 37%, #f0f0f0 63%);
        background-size: 200% 100%;
        animation: skeleton-shine 1.2s infinite ease-in-out;
    }
    .skeleton-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 37%, #f0f0f0 63%);
        background-size: 200% 100%;
        animation: skeleton-shine 1.2s infinite ease-in-out;
        display: inline-block;
    }

    .skeleton-rect {
        height: 30px;
        width: 42px;
        border-radius: 6px;
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 37%, #f0f0f0 63%);
        background-size: 200% 100%;
        animation: skeleton-shine 1.2s infinite ease-in-out;
        display: inline-block;
        margin: 2px;
    }

    .skeleton-line.short { width: 50%; }
    .skeleton-line.medium { width: 75%; }
    .skeleton-line.full { width: 100%; }

    @keyframes skeleton-shine {
        0% { background-position: -200px 0; }
        100% { background-position: calc(200px + 100%) 0; }
    }

</style>
<style>
    /* Modern SweetAlert2 Image Popup */
    .swal2-popup.image-preview-popup {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(12px);
        box-shadow: 0 12px 60px rgba(0, 0, 0, 0.35);
        border-radius: 20px;
        padding: 0;
        overflow: hidden;
    }

    /* Image Style */
    .swal2-image.image-preview-img {
        max-width: 90vw;
        max-height: 90vh;
        border-radius: 12px;
        object-fit: cover;
        transition: transform 0.25s ease;
    }

    .swal2-image.image-preview-img:hover {
        transform: scale(1.015);
    }

    /* Close button (soft, rounded, elegant) */
    .swal2-close.image-preview-close {
        /*background: rgba(255, 255, 255, 0.7);*/
        color: #111;
        border-radius: 50%;
        margin-top: 10px ;
        margin-right: 10px;
        width: 32px;
        height: 32px;
        font-size: 1.3rem;
        font-weight: bold;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        transition: all 0.2s ease;
    }
    /*.swal2-close.image-preview-close:hover {*/
    /*    background: rgba(255, 255, 255, 0.9);*/
    /*}*/
</style>
