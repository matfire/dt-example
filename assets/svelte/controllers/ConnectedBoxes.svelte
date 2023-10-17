<script>
    import { onMount } from "svelte";
    import { DateTime } from "luxon";
    import Chart from "chart.js/auto";
    import LoadingScreen from "../components/LoadingScreen.svelte";

    export let siteId;
    export let disconnectedFactor;
    let loading = true
    let canvasId = "connected_boxes-chart"
    let chart;

    let options = {
        type: 'doughnut',
        data: {
            labels: ["Connecté", "Deconnecté"],
            datasets: [
                {
                    backgroundColor:["green", "red"],
                    data: [0, 0]
                },
            ]
        } 
    }


    async function loadData() {
        loading = true;
        const date = DateTime.now().setZone("GMT");
        const ts = Math.floor(date.toMillis() / 1000);
        const res = await fetch(`/api/box/daily?siteId=${siteId}&dayTs=${ts}`)
        const data = await res.json();
        options.data.datasets[0].data[0] = 0;
        options.data.datasets[0].data[1] = 0;
        data.boxes.forEach((el) => {
            const elDate = DateTime.fromSeconds(parseInt(el.BOX_LastComDate), {zone:"GMT"})
            const frequency = parseInt(el.BOX_TransmissionSampleRate)
            if (date.toSeconds() - elDate.toSeconds() > frequency * disconnectedFactor) {
                options.data.datasets[0].data[1]++
            } else {
                options.data.datasets[0].data[0]++
            }
        })
        if (chart) {
            chart.update()
            loading = false;
        }

    }

    onMount(async() => {
        await loadData();
        chart = new Chart(document.getElementById(canvasId), options);
        loading = false;
    })
</script>


<div class="flex flex-col w-full relative">
    {#if loading}
        <LoadingScreen />
    {/if}
    <canvas id={canvasId} />
    <button
    type="button"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
    disabled={loading}
    on:click={loadData}>Mettre à jour</button
></div>