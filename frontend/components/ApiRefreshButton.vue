<script lang="ts" setup>
const store = useStore()
const {apiUpdating} = storeToRefs(store);

async function updateExchangeRates() {
  apiUpdating.value = true
  const data = await $fetch('http://localhost:8000/api/v1/exchange-rates')
  store.apiFrontEndUpdate([data])
  apiUpdating.value = false
}
</script>

<template>
  <button
    :class="{'animate-spin': apiUpdating}"
    @click="updateExchangeRates"
  >
    <svg
      class="w-10 h-10 lg:w-6 h-6 stroke-[1.8] lg:stroke-[1.5] stroke-black"
      fill="none"
      stroke="currentColor"
      viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
  </button>
</template>
