<template>
  <q-page class="bg-grey-3">
    <q-card class="q-pa-md">
      <q-card-section>
        <div class="col-6 text-h5 text-bold text-center" style="text-transform: uppercase;">{{ evento.nombre }}<br><span class="text-h6">{{evento.descripcion}}</span></div>
        <div class="col-12"><q-input dense square outlined v-model="cedula" label="Carnet" /></div>
        <div class="col-12 q-pa-xs" align="center"> <q-btn color="green" label="Registrar"  @click="registro"/>
        </div>
      </q-card-section>
      <div class="row">
        <div class="col-12">
          <q-table :rows-per-page-options="[0]" :rows="evento.cupo" :columns="columns" row-key="id">
            <template v-slot:body-cell-acciones="props">
              <q-td :props="props">
                <q-btn dense flat round icon="delete" @click="eliminar(props.row)" />
              </q-td>
            </template>
          </q-table>
        </div>
      </div>
    </q-card>
<!--    {-->
<!--    "id": 1,-->
<!--    "nombre": "ALMUERZO",-->
<!--    "descripcion": "sadsa",-->
<!--    "codigo": "NSX6lrynq8",-->
<!--    "fecha_inicio": "2024-05-18 23:33:00",-->
<!--    "fecha_fin": "2024-05-25 23:33:00",-->
<!--    "estado": "ACTIVO",-->
<!--    "cupos": 2,-->
<!--    "libres": 0,-->
<!--    "cupo": [-->
<!--    {-->
<!--    "id": 1,-->
<!--    "evento_id": 1,-->
<!--    "cupos_id": 205,-->
<!--    "estado": "PENDIENTE",-->
<!--    "fecha_registro": null,-->
<!--    "ci": "7317856",-->
<!--    "user_id": null-->
<!--    },-->
<!--    {-->
<!--    "id": 2,-->
<!--    "evento_id": 1,-->
<!--    "cupos_id": 206,-->
<!--    "estado": "PENDIENTE",-->
<!--    "fecha_registro": null,-->
<!--    "ci": "7388240",-->
<!--    "user_id": null-->
<!--    }-->
<!--    ]-->
<!--    }-->
    <pre>{{evento}}</pre>
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
      mensaje:'',
      columns: [
        { name: 'opcion', label: 'Opcion', align: 'center', field: row => row.opcion },
        { name: 'ci', label: 'Carnet', align: 'center', field: row => row.ci },
        { name: 'estado', label: 'Estado', align: 'center', field: row => row.estado },
        { name: 'fecha_registro', label: 'Fecha Registro', align: 'center', field: row => row.fecha_registro },
        { name: 'user_id', label: 'Usuario', align: 'center', field: row => row.user?.name },
      ]
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
