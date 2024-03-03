<script lang="js" setup>
const store = useStore();
const {exchangeRate, inverseExchangeRate} = storeToRefs(store);

const fromCurrency = computed({
  get() {
    return store.fromCurrency
  },
  set(value) {
    store.setFromCurrency(value)
  }
})

const toCurrency = computed({
  get() {
    return store.toCurrency
  },
  set(value) {
    store.setToCurrency(value)
  }
})
</script>

<template>
  <div class="grid grid-rows-4 grid-flow-col gap-1 p-2 mb-4 bg-amber-100 rounded md:my-4">
    <CurrencySelect
      v-model="fromCurrency"
      class="col-span-2 md:col-span-1 row-span-2 md:row-span-4 md:justify-self-start md:self-center"
      label="From Currency"
      select-name="from-currency"
    />

    <SwitcherButton
      class="row-span-4 col-start-1 md:col-start-2 md:col-span-1 justify-self-center self-center"
    />

    <CurrencySelect
      v-model="toCurrency"
      class="row-span-2 md:row-span-4 col-span-2 md:col-span-1 md:justify-self-end md:self-center"
      label="To Currency"
      select-name="to-currency"
    />
  </div>

  <div
    :class="{ 'animate-pulse blur-lg': store.apiUpdating }"
    class="bg-gray-200 rounded p-3"
  >
    <div class="text-l md:text-xl font-bold text-gray-800 pb-1">
      1.00 {{ fromCurrency }} =
    </div>

    <div class="text-3xl md:text-4xl font-light text-gray-950 pb-2 md:pb-3">
      {{ exchangeRate }} {{ toCurrency }}
    </div>

    <div class="text-base md:text-l text-amber-600 font-bold">
      1 {{ fromCurrency }} = {{ inverseExchangeRate }} {{ toCurrency }}
    </div>
  </div>
</template>
