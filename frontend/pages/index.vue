<script lang="js" setup>
import {onMounted} from "vue";

useHead({
  bodyAttrs: {
    class: 'h-full grid place-content-center mt-5 md:mt-10',
  }
});

onMounted(() => {
  updateExchangeRates()
})

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
  <section
    class="bg-white m-h-[600px] w-[90vw] md:w-[70vw] xl:w-[800px] rounded-2xl shadow-2xl p-5 pb-6"
  >
    <CardHeader>
      Live currency rates
    </CardHeader>

    <CardBody />

    <CardFooter />
  </section>
</template>
