<template>
  <q-page class="bg-grey-3">
    <q-card class="q-pa-md">
      <q-card-section>
        <div class="col-6 text-h5 text-bold text-center" style="text-transform: uppercase;">{{ evento.nombre }}<br><span class="text-h6">{{evento.descripcion}}</span></div>
        <div class="col-12"><q-input dense square outlined v-model="cedula" label="Carnet" /></div>
        <div class="col-12 q-pa-xs" align="center"> <q-btn color="green" label="Registrar"  @click="registro"/>
        </div>
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
      cedula:'',
      id:this.$route.params.id,
      mensaje:''
    }
  },
  created() {
    this.$q.loading.show()
    this.$api.get(`evento/${this.$route.params.id}`).then((response) => {
      this.evento = response.data
    }).finally(() => {
      this.$q.loading.hide()
    })
  },
  methods:{
    registro(){
    this.$api.post('buscarEventoEst',{id:this.id,ci:this.cedula}).then((response) => {
      console.log(response.data)
      this.$q.notify({
          message: 'REGISTRADO',
          icon: 'info',
          color:'green',
          position: 'top'
        })
      }).catch(err => {
        this.$q.notify({
          message: err.response.data.message,
          type: 'negative',
          icon: 'warning',
          position: 'top'
        })

    })
  }
}
}
</script>
