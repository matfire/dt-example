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
    let selectedDate = "";

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
                    //max: 100,
                    stacked: true,
                },
            },
        },
    };

    async function loadData() {
        loading = true;
        const date = DateTime.now().setZone("GMT");
        const ts = date.toSeconds();
        const res = await fetch(
            `/api/cch/daily?siteId=${siteId}&dayTs=${1693785600}`
        );
        const data = await res.json();
        data.labels.forEach((_, idx) => {
            const instanciated = data.instanciated[idx];
            const planned = data.planned[idx];
            const percent =
                planned === 0 ? 0 : ((instanciated * 100) / planned).toFixed(2);
            console.log(planned);
            options.data.datasets[0].data.push(100 - percent);
            options.data.datasets[1].data.push(percent);
        });
        /*         data.instanciated.forEach((el) => {
            const elDate = new Date(el.CCH_CreationDate * 1000)
            const key = `${elDate.getHours()}:${elDate.getMinutes() > 30 ? "30" : "00"}`
            slots.instanciated.set(key, slots.instanciated.has(key) ? (slots.instanciated.get(key) + 1) : 1);
        }) */
        options.data.labels = data.labels;
        //options.data.datasets[0].data = Array.from(slots.instanciated.values())
        if (chart) {
            chart.update();
            loading = false;
        }
    }

    onMount(async () => {
        await loadData(siteId, beginTs);
        chart = new Chart(document.getElementById(canvasId), options);
        const begDate = new Date(beginTs * 1000);
        selectedDate = `${begDate.getFullYear()}-${(begDate.getMonth() + 1)
            .toString()
            .padStart(2, "0")}-${begDate
            .getDate()
            .toString()
            .padStart(2, "0")}`;
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
