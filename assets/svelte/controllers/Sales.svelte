<script>
    import { onMount } from "svelte";
    import Chart from "chart.js/auto";
    import LoadingScreen from "../components/LoadingScreen.svelte";
    import { DateTime } from "luxon";

    export let siteId;
    let loading = true;
    let canvasId = "daily_sales-chart";
    let chart;

    let options = {
        type: "bar",
        data: {
            labels: [],
            datasets: [
                {
                    label: "Ventes",
                    backgroundColor: "green",
                    data: [],
                },
            ],
        },
        options: {
            elements: {
                line: {
                    tension: 0.4
                }
            }
        }
    };

    async function loadData() {
        loading = true;
        const date = DateTime.now().setZone("GMT");
        const ts = date.toUnixInteger();
        const res = await fetch(
            `/api/ticketing/sales/range?siteId=${siteId}&dayTs=${1693785600}`
        );
        const data = await res.json();
        console.log(data)
        options.data.labels = data.labels;
        options.data.datasets[0].data = data.sales
        if (chart) {
            chart.update();
            loading = false;
        }
    }

    onMount(async () => {
        await loadData();
        chart = new Chart(document.getElementById(canvasId), options);
        loading = false;
    });
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
    >
</div>
