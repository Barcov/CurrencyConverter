<script lang="js" setup>
useHead({
  bodyAttrs: {
    class: 'h-full grid place-content-center mt-5 md:mt-10',
  }
});

const currencies = ['USD', 'ZAR', 'EUR'];
</script>

<template>
  <section
    class="bg-white m-h-[600px] w-[90vw] md:w-[70vw] xl:w-[800px] rounded-2xl shadow-2xl p-5 pb-6"
  >
    <CardHeader
      from-currency="ZAR"
      to-currency="USD"
    >
      <template #title>
        Live currency rates
      </template>
    </CardHeader>

    <CardBody
      :currencies="currencies"
    />

    <CardFooter />
  </section>
</template>
