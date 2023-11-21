<script>
    import { fade } from "svelte/transition";
</script>

<div
    transition:fade
    class="w-100 h-100 d-flex flex-column justify-content-center align-items-center position-absolute top-0 left-0 bg-white bg-opacity-75"
>
    <p>On recupère les données, veuillez patienter...</p>
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
</div>
