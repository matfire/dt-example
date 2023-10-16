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


    async function loadData(siteId) {
        const date = DateTime.now().setZone("GMT");
        const ts = Math.floor(date.toMillis() / 1000);
        console.log(ts)
        const res = await fetch(`/api/box/daily?siteId=${siteId}&dayTs=${ts}`)
        const data = await res.json();
        options.data.datasets[0].data[0] = 0;
        options.data.datasets[0].data[1] = 0;
        console.log(data)
        data.boxes.forEach((el) => {
            const elDate = DateTime.fromSeconds(parseInt(el.BOX_LastComDate), {zone:"GMT"})
            const frequency = parseInt(el.BOX_TransmissionSampleRate)
            if (elDate + (frequency * disconnectedFactor) < date) {
                options.data.datasets[0].data[1]++
            } else {
                options.data.datasets[0].data[0]++
            }
        })
    }

    async function handleDateSelect() {
        loading = true;
        const ts = new Date(selectedDate).getTime() / 1000
        await loadData(siteId, ts);
        chart.update()
        loading = false;
    }

    onMount(async() => {
        await loadData(siteId);
        chart = new Chart(document.getElementById(canvasId), options);
        loading = false;
    })
</script>


<div class="flex flex-col w-full relative">
    {#if loading}
        <LoadingScreen />
    {/if}
    <canvas id={canvasId} />
</div>