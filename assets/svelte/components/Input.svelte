<script>
    export let label;
    export let labelFor = label;
    export let type;
    export let value;

    function handleChange(ev) {
        value = ev.target.value;
    }
</script>

<label
    for={labelFor}
    class="form-label "
    >{label}</label
>
<input
    {type}
    class="form-control"
    {value}
    on:change={handleChange}
/>
