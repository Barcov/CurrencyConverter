<script lang="js" setup>
const props = defineProps({
  'currencies': {
    type: Array,
    default: () => ['USD', 'ZAR', 'EUR']
  }
});
</script>

<template>
  <div class="grid grid-rows-4 grid-flow-col gap-1 p-2 mb-4 bg-amber-100 rounded md:my-4">
    <CurrencySelect
      :currencies="currencies"
      class="col-span-2 md:col-span-1 row-span-2 md:row-span-4 md:justify-self-start md:self-center"
      label="From Currency"
      select-name="from-currency"
    />

    <SwitcherButton class="row-span-4 col-start-1 md:col-start-2 md:col-span-1 justify-self-center self-center" />

    <CurrencySelect
      :currencies="currencies"
      class="row-span-2 md:row-span-4 col-span-2 md:col-span-1 md:justify-self-end md:self-center"
      label="To Currency"
      select-name="to-currency"
    />
  </div>
</template>
