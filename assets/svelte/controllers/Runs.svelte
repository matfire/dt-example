<script>
    import { onMount } from "svelte";
    import Chart from "chart.js/auto";
    import LoadingScreen from "../components/LoadingScreen.svelte";
    import { DateTime } from "luxon";

    export let beginTs;
    export let siteId;
    let loading = true;
    let canvasId = "daily_runs-chart";
    let chart;

    let options = {
        type: "bar",
        data: {
            labels: [],
            datasets: [
                {
                    label: "Planifiée",
                    backgroundColor: "red",
                    data: [],
                },
                {
                    label: "Instanciée",
                    backgroundColor: "green",
                    data: [],
                },
            ],
        },
        options: {
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    max: 100,
                    stacked: true,
                },
            },
        },
    };

    async function loadData() {
        loading = true;
        const date = DateTime.now().setZone("GMT");
        const ts = date.toUnixInteger();
        const res = await fetch(
            `/api/cch/range?siteId=${siteId}&dayTs=${1693785600}`
        );
        const data = await res.json();
        console.log(data)
        options.data.datasets[0].data = [];
        options.data.datasets[1].data = [];
        data.labels.forEach((_, idx) => {
            const instanciated = data.instanciated[idx];
            const planned = data.planned[idx];
            const percent =
                planned === 0 ? 0 : ((instanciated * 100) / planned).toFixed(2);
            console.log(planned);
            options.data.datasets[0].data.push(100 - percent);
            options.data.datasets[1].data.push(percent);
        });
        options.data.labels = data.labels;
        if (chart) {
            chart.update();
            loading = false;
        }
    }

    onMount(async () => {
        await loadData(siteId, beginTs);
        chart = new Chart(document.getElementById(canvasId), options);
        loading = false;
    });
</script>

<div class="flex flex-col w-full relative">
    {#if loading}
        <LoadingScreen />
    {/if}
    <div class="w-full flex justify-between" />
    <canvas id={canvasId} />
    <button
        type="button"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
        disabled={loading}
        on:click={loadData}>Mettre à jour</button
    >
</div>
