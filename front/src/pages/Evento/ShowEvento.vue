<template>
  <q-page class="bg-grey-3">
    <q-card class="q-pa-md">
      <q-card-section>
        <pre>{{evento}}</pre>
      </q-card-section>
    </q-card>
  </q-page>
</template>
<script>
export default {
  name: `ShowEvento`,
  data() {
    return {
      evento: {},
    }
  },
  created() {
    this.$q.loading.show()
    this.$api.get(`eventoSearch/${this.$route.params.id}`).then((response) => {
      this.evento = response.data
    }).finally(() => {
      this.$q.loading.hide()
    })
  },
}
</script>
