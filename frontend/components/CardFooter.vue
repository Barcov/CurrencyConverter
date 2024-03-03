<script lang="js" setup>
const store = useStore();
const {fromCurrency, toCurrency, currencies} = storeToRefs(store);
</script>

<template>
  <footer
    class="text-sm mt-9"
  >
    {{ currencies[fromCurrency].name }} to {{ currencies[toCurrency].name }} conversion
  </footer>
</template>
