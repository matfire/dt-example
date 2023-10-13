<script>
    import { onMount } from "svelte";
    import Chart from "chart.js/auto";
    import LoadingScreen from "../components/LoadingScreen.svelte";
    import Input from "../components/Input.svelte";

    export let beginTs;
    export let siteId;
    let loading = true
    let canvasId = "connected_boxes-chart"
    let chart;
    let selectedDate = "";

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


    async function loadData(siteId, ts) {
        const res = await fetch(`/api/box/daily?siteId=${siteId}&dayTs=${ts}`)
        const data = await res.json();
        const date = new Date(selectedDate);
        options.data.datasets[0].data[0] = 0;
        options.data.datasets[0].data[1] = 0;
        console.log(data.boxes)
        data.boxes.forEach((el) => {
            const elDate = new Date(el.BOX_LastComDate * 1000)
            if (elDate.toDateString() >= date.toDateString()) {
                options.data.datasets[0].data[0]++
            } else {
                options.data.datasets[0].data[1]++
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
    })
</script>


<div class="flex flex-col w-full relative">
    {#if loading}
        <LoadingScreen />
    {/if}
    <div class="w-full flex justify-between">
        <Input label="Date" type="date" bind:value={selectedDate} />
        <button
            type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
            disabled={loading}
            on:click={handleDateSelect}>Selectionner</button
        >
    </div>
    <canvas id={canvasId} />
</div>