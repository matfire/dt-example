<script>
    import { onMount } from "svelte";
    import Chart from "chart.js/auto";
    import Input from "../components/Input.svelte";
    import LoadingScreen from "../components/LoadingScreen.svelte";
    import { DateTime } from "luxon";

    export let siteId;

    let loading = true;
    export let delayThreshold = 0;
    export let advanceThreshold = 0;
    let canvasId = "delay-chart"
    let canvasData = {};
    let options = {
        type: "bar",
        data: {
            labels: [],
            datasets: [
                {
                    label: "retards",
                    data: [],
                    backgroundColor: "orange"
                },
                {
                    label: "à l'heure",
                    data: [],
                    backgroundColor: "green"
                },
                {
                    label: "avances",
                    data: [],
                    backgroundColor: "red"
                },
            ],
        },
        options: {
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    max: 100,
                    stacked: true
                }
            }
        }
    };
    let chart;

    function fillChart() {
        options.data.labels = canvasData.res.labels;
        const delays = [];
        const advances = [];
        const onTime = []
        canvasData.res.data.forEach((day) => {
            let dayDelay = 0;
            let dayAdvance = 0;
            let dayOnTime = 0;
            day.forEach((point) => {
                const entryKey = point.LCDV_DateDo != 0 ? "LCDV_DateDo" : "LCDV_DateIn"
                const entryDelay = `${entryKey}Delay`
                const exit = point.LCDV_DateDone != 0 ? "LCDV_DateDone" : "LCDV_DateOut"
                const exitDelay = point.LCDV_DateDoneDelay != 0 ? "LCDV_DateDoneDelay" : undefined
                if (point.LCDV_DateDo === 0 && point.LCDV_DateIn === 0 && point.LCDV_DateDone === 0 && point.LCDV_DateOut === 0) {
                    console.log("invalid circuit, skipped")
                    return;
                }
                if (!exitDelay) {
                    return;
                }
                if (point[entryDelay] < -1 * advanceThreshold && point[exitDelay] >= delayThreshold) {
                    dayOnTime++;
                    return;
                }
                if (point.LCDV_DateIn === 0 && point.LCDV_DateDo === 0) {
                    if (point.LCDV_DateDoneDelay > delayThreshold) {
                        dayDelay++;
                    } else if (point.LCDV_DateDoneDelay < -1 * advanceThreshold) {
                        dayAdvance++;
                    }
                }
                if (point.LCDV_DateDone === 0 && point.LCDV_DateOut === 0) {
                    return
                }
                if (point[exitDelay] > delayThreshold) {
                    dayDelay++;
                } else {
                    dayAdvance++;
                }
            });
            const totalDay = dayDelay + dayAdvance + dayOnTime
            delays.push((dayDelay * 100 / totalDay).toFixed(2));
            advances.push((dayAdvance * 100 / totalDay).toFixed(2));
            onTime.push((dayOnTime * 100 / totalDay).toFixed(2));
        });
        options.data.datasets[0].data = [...delays];
        options.data.datasets[1].data = [...onTime];
        options.data.datasets[2].data = [...advances];
        if (chart) {
            chart.update()
            loading = false;
        }
    }

    async function loadData() {
        loading = true
        const begin = DateTime.now().setZone("GMT")
        const res = await fetch(
            `/api/lcdv/range?siteId=${siteId}&dayTs=${1693785600}`
        );
        const data = await res.json();
        canvasData = data;
        fillChart()
        
    }

    $: if (delayThreshold || advanceThreshold) {
        fillChart();
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
