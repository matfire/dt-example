<script>
    import { onMount } from "svelte";
    import Chart from "chart.js/auto";
    import zoomPlugin from "chartjs-plugin-zoom";
    import Input from "../components/Input.svelte";
    import LoadingScreen from "../components/LoadingScreen.svelte";

    Chart.register(zoomPlugin);

    export let siteId;
    export let beginTs;
    export let endTs;

    let loading = true;
    let delayThreshold = null;
    let advanceThreshold = null;
    let beginDate = "";
    let endDate = "";
    let canvasId = "delay-chart"
    let options = {
        type: "bar",
        data: {
            labels: [],
            datasets: [
                {
                    label: "retards",
                    data: [],
                },
                {
                    label: "avances",
                    data: [],
                },
            ],
        },
        options: {
            plugins: {
                zoom: {
                    zoom: {
                        wheel: {
                            enabled: true,
                        },
                        pinch: {
                            enabled: true,
                        },
                        mode: "xy",
                    },
                },
            },
        },
    };
    let chart;

    async function loadData(siteId, begin, end) {
        const res = await fetch(
            `/api/lcdv/range?siteId=${siteId}&beginTs=${begin}&endTs=${end}`
        );
        const data = await res.json();
        options.data.labels = data.res.labels;
        const delays = [];
        const advances = [];
        data.res.data.forEach((day) => {
            let dayDelay = 0;
            let dayAdvance = 0;
            day.forEach((point) => {
                if (point.LCDV_DateInDelay < 0) {
                    dayAdvance += point.LCDV_DateInDelay;
                } else {
                    dayDelay += point.LCDV_DateInDelay;
                }
            });
            delays.push(dayDelay / 60);
            advances.push(Math.abs(dayAdvance / 60));
        });
        options.data.datasets[0].data = [...delays];
        options.data.datasets[1].data = [...advances];
        options.data.datasets[0].backgroundColor = Array(
            options.data.datasets[0].data.length
        ).fill("gray");
        options.data.datasets[1].backgroundColor = Array(
            options.data.datasets[1].data.length
        ).fill("gray");
    }

    function colorBars() {
        if (delayThreshold) {
            options.data.datasets[0].backgroundColor =
                options.data.datasets[0].data.map((el) =>
                    el > delayThreshold ? "orange" : "green"
                );
        }
        if (advanceThreshold) {
            options.data.datasets[1].backgroundColor =
                options.data.datasets[1].data.map((el) =>
                    el > advanceThreshold ? "red" : "blue"
                );
        }
        chart.update();
    }

    async function handleDateSelect() {
        if (new Date(beginDate).getTime() > new Date(endDate).getTime()) {
            alert(
                "la date de début de selection ne peut pas être supérieure à la date de fin de selection"
            );
            return;
        }
        loading = true;
        const beTs = new Date(beginDate).getTime() / 1000;
        const enTs = new Date(endDate).getTime() / 1000;
        await loadData(siteId, beTs, enTs);
        colorBars();
        loading = false;
    }

    $: if (delayThreshold || advanceThreshold) {
        colorBars();
    }
    onMount(async () => {
        await loadData(siteId, beginTs, endTs);
        chart = new Chart(document.getElementById(canvasId), options);
        const begDate = new Date(beginTs * 1000);
        const enDate = new Date(endTs * 1000);
        beginDate = `${begDate.getFullYear()}-${(begDate.getMonth() + 1)
            .toString()
            .padStart(2, "0")}-${begDate
            .getDate()
            .toString()
            .padStart(2, "0")}`;
        endDate = `${enDate.getFullYear()}-${(enDate.getMonth() + 1)
            .toString()
            .padStart(2, "0")}-${enDate.getDate().toString().padStart(2, "0")}`;
        loading = false;
    });
</script>

<div class="flex flex-col w-full relative">
    {#if loading}
        <LoadingScreen />
    {/if}
    <div class="w-full flex justify-between">
        <Input label="Début sélection" type="date" bind:value={beginDate} />
        <Input label="Fin sélection" type="date" bind:value={endDate} />
        <button
            type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
            disabled={loading}
            on:click={handleDateSelect}>Filtrer</button
        >
    </div>
    <div class="w-full flex justify-between">
        <Input label="seuil rétard" type="number" bind:value={delayThreshold} />
        <Input
            label="seuil avance"
            type="number"
            bind:value={advanceThreshold}
        />
    </div>
    <canvas id={canvasId} />
</div>
