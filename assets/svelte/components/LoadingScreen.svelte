<script>
    import { fade } from "svelte/transition";
</script>

<div
    transition:fade
    class="w-full h-full flex flex-col justify-center items-center absolute top-0 left-0 bg-white/70"
>
    <p>On recupère les données, veuillez patienter...</p>
    <div
        class="border-black h-10 w-10 animate-spin rounded-full border-8 border-t-blue-600"
    />
</div>
